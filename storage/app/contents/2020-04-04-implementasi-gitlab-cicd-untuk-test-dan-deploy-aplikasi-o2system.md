---
title:  Implementasi Gitlab CI/CD untuk Test dan Deploy Aplikasi O2System,
category:  4
subtitle:  Creative UI/UX desingerr how loves to craft beautiful that satisfy users needs the product.,
meta_description:  Praktik CI di gitlab dikenal dengan Test dan Build yang artinya setiap kali tim push kode kedalam aplikasi, kita hanya akan melakukan Test dan Build dengan cara manual  ataupun otomatis.
is_sticky: false
draft : true
type: blog
---

Tahukah anda bahwa sekarang ini ada praktik pengembangan perangkat lunak yang disebut 
Continuous Integration (CI), Continuous Delivery (CD) dan Continuous Deployment (CD) ???
Sebenarnya praktik ini sudah ada sejak dulu, silahkan baca wikipedia. sebelum praktek 
saya akan jelaskan dulu secara singkat.

## Continuous Integration

Praktek CI di gitlab dikenal dengan Test dan Build yang artinya setiap kali tim push
kode kedalam aplikasi, kita hanya akan melakukan Test dan Build dengan cara manual 
ataupun otomatis.

> Continuous Integration TEST — BUILD

### Continuous Delivery

Continuous Delivery merupakan pendekatan rekayasa perangkat lunak yaitu continuous 
integration, automated testing, dan automated deployment yang memungkinkan perangkat 
lunak dikembangkan dan digunakan dengan cepat. Namun, saat delivery ke production 
praktik ini menggunakan sedikit intervensi manusia.

> Continuous Delivery TEST-BUILD-INTERVENSI-DEPLOY

### Continuous Deployment

Kalau Continuous Deployment tidak akan ada lagi intervensi manusia, saat delivery 
ke production semua dilakukan otomatis.

> Continuous Deployment TEST-BUILD-OTOMATIS-DEPLOY

### Implementasi

Disaat menerapkan CI/CD bisa saja dilakukan dengan stages yang 
berbeda dan ideal nya adalah TEST-BUILD-RELEASE-STAGING-PRODUCTION. 
dalam tutorial ini kita hanya akan belajar melakukan TEST dan deploy 
ke PRODUCTION saja dengan implementasi menggunakan Laravel Framework 
dan Gitlab CI/CD.

### Inisialisasi Laravel dan Gitlab

Saya asumsikan anda telah menginstal laravel kedalam proyek baru. 
Laravel menggunakan PHPUnit untuk tes secara default, Setiap 
instalasi baru, laravel memiliki dua jenis tes, ‘Feature’ dan 
‘Unit’ terletak di folder tests. Tes default sederhana ini yang 
akan kita gunakan untuk menguji aplikasi di Gitlab CI/CD.
Buat project baru di gitlab, saya beri nama laravel-test-deploy 
setelah itu inisialisai git dan lakukan push.

```shell script
cd o2system-test-deploy
git init
git remote add origin git@gitlab.com:<USERNAME>/laravel-test-deploy.git
git add .
git commit -m 'Initial Commit'
git push -u origin master
```

### Konfigurasi Server Production

Pastikan kita memiliki server production yang siap untuk deployment. 
disini saya menggunakan Ubuntu 16.04 server dan tentunya sudah terpasang 
Nginx, Mysql, PHP dan requirement yang diperlukan laravel secara default 
lihat disini

Semua web developer pasti sudah terbiasa membuat user baru di server 
production yang berperan sebagai deployer (cmiiw). mari kita buat!

sudo adduser davidhs
sudo setfacl -R -m u:davidhs:rwx /var/www

dan selanjutnya kita buat SSH Key Pair untuk user davidhs yang akan kita 
gunakan di gitlab, singkatnya biar server dan gitlab bisa komunikasi 
tanpa kita ketik password. lalu copy isi public_key ke $authorized_keys

cat ~/.ssh/id_rsa.pub >> ~/.ssh/authorized_keys
Sekarang kita copy private key ke gitlab project sebagai secret variable. yang berguna untuk meng-identifikasi user .
cat ~/.ssh/id_rsa
Paste ke secret variables project gitlab lihat di settings > CI/CD

Secret Variables Gitlab
Karena contoh server production ini saya pakai compute engine Google Cloud, key nya saya beri nama SPK_GCL (server private key google cloud) biar gampang ingat aja :) bebas ko mau ngasih nama apa aja yang penting diingat, nama key ini akan kita gunakan di .gitlab-ci.yml
Kita juga membutuhkan public key yang bertindak sebagai Deploy Keys agar server bisa diberi akses ke repository gitlab. copy public key dan input ke Deploy Keys Project. Project > Setting > Repository
cat ~/.ssh/id_rsa.pub

Deploy Keys gitlab
Sekarang kita uji dulu apakah user davidhs sudah punya akses ke repository dengan cara clone project.
git clone git@gitlab.com:<USERNAME>/laravel-tes-deploy.git
Konfigurasi Nginx
Buka file konfigurasi default blok server Nginx:
sudo nano /etc/nginx/sites-available/default
dan ubah konfigurasi webroot:
server {
    root /var/www/current/public;
}
Zero Downtime Deployment
Dulu sekali saya pernah deploy aplikasi yang di develop menggunakan CodeIgniter Framework, dengan cara mengarahkan dulu webroot ke maintenance page, lalu melakukan fetch project, tag ke versi baru, lakukan migration database, install composer, restart job queue, konfigurasi cache, arahkan kembali webroot. semua itu saya lakukan manual LIVE di server! kalau ada rilis baru pekerjaan itu diulang lagi terus menerus, bayangkan jika web yang mau di deploy ada banyak? sudah lah manual, downtime pula! —
Kita tidak akan melakukan strategi aneh itu, kita akan melakukan semua proses build secara otomatis dan tanpa downtime yang disebut zero-downtime deployment.
Pertanyaannya kenapa bisa dilakukan zero-downtime?
Jawabnya karena seluruh proses — clone, install composer migration, config cache, dll. tidak terjadi di webroot yang melayani situs, sebagai gantinya setiap rilis baru akan memiliki folder ‘releases’ tersendiri, sementara situs yang live masih menggunakan folder ‘current’. ketika proses build selesai, buat folder ‘releases’ yang baru, lalu membuat symlink ke folder ‘current’ yang mengarah ke folder ‘releases’ tersebut dan boom! Now that release is live.
Jadi, sekarang kita punya aplikasi laravel yang siap untuk production, selanjutnya kita akan menyiapkan envoy untuk melakukan zero-downtime deployment. pertama-pertama kita harus install envoy di komputer lokal, lihat intruksinya di dokumentasi laravel.
Menyiapkan Envoy
Berikut full script Envoy.blade.php yang akan kita gunakan.
@servers(['web' => 'davidhs@35.198.233.156'])
@setup
    $repository = 'git@gitlab.com:<USERNAME>/laravel-test-deploy.git';
    $releases_dir = '/var/www/releases';
    $app_dir = '/var/www/';
    $release = date('dmYHis');
    $new_release_dir = $releases_dir .'/'. $release;
@endsetup
@story('deploy')
    clone_repository
    run_composer
    update_symlinks
@endstory
@task('clone_repository')
    echo 'Cloning repository'
    [ -d {{ $releases_dir }} ] || mkdir {{ $releases_dir }}
    git clone --depth 1 {{ $repository }} {{ $new_release_dir }}
    echo 'Done'
@endtask
@task('run_composer')
    echo "Starting deployment ({{ $release }})"
    cd {{ $new_release_dir }}
    composer install --prefer-dist --no-scripts -q -o
    echo 'Done'
@endtask
@task('update_symlinks')
    echo "Linking storage directory"
    rm -rf {{ $new_release_dir }}/storage
    ln -nfs {{ $app_dir }}/storage {{ $new_release_dir }}/storage
    echo 'Done'
echo 'Linking .env file'
    ln -nfs {{ $app_dir }}/.env {{ $new_release_dir }}/.env
    echo 'Done'
echo 'Linking current release'
    ln -nfs {{ $new_release_dir }} {{ $app_dir }}/current
    echo 'Done'
@endtask
Anda bebas mengubah script ini sesuai dengan apa yang anda butuhkan, Seperti yang anda tau, ubah user dan ip server yang anda miliki.
@servers(['web' => 'davidhs@35.198.233.156'])
@setup directive
...
@setup
    $repository = 'git@gitlab.com:<USERNAME>/laravel-test deploy.git';
    $releases_dir = '/var/www/releases';
    $app_dir = '/var/www/';
    $release = date('YmdHis');
    $new_release_dir = $releases_dir .'/'. $release;
@endsetup
...
Langkah pertama dari proses deployment dengan menentukan satu set variabel dalam @setup directive.
$repository alamat repository
$releases_dir direktori deploy
$app_dir lokasi webroot situs kita yang live
$release setiap kali kita menerapkan rilis baru dengan tgl,bulan,tahun
$new_release_dir folder rilis terbaru
@story directive
...
@story('deploy')
    clone_repository
    run_composer
    update_symlinks
@endstory
...
Perintah @story memungkinkan kita mendefinisikan daftar tugas yang dapat dijalankan sekaligus. Di sini kita memiliki tiga tugas yang disebut $clone_repository, $run_composer, $update_symlinks.
@task clone repository
...
@task('clone_repository')
    echo 'Cloning repository'
    [ -d {{ $releases_dir }} ] || mkdir {{ $releases_dir }}
    git clone --depth 1 {{ $repository }} {{ $new_release_dir }}
    echo 'Done'
@endtask
...
Tugas pertama adalah membuat direktori $releases_dir (jika tidak ada) dan kemudian mengkloning cabang master dari repositori (secara default) ke dalam direktori rilis baru, yang diberi variabel $new_release_dir . Direktori rilis akan menampung semua proses deployment.
Menginstal depedensi dengan Composer
...
@task('run_composer')
    echo "Starting deployment ({{ $release }})"
    cd {{ $new_release_dir }}
    composer install --prefer-dist --no-scripts -q -o
    echo 'Done'
@endtask
...
Tugas ini hanya menavigasi ke direktori rilis baru dan menjalankan Composer untuk menginstal dependensi aplikasi
Aktifkan rilis baru
...
@task('update_symlinks')
    echo "Linking storage directory"
    rm -rf {{ $new_release_dir }}/storage
    ln -nfs {{ $app_dir }}/storage {{ $new_release_dir }}/storage
    echo 'Done'
echo 'Linking .env file'
    ln -nfs {{ $app_dir }}/.env {{ $new_release_dir }}/.env
    echo 'Done'
echo 'Linking current release'
    ln -nfs {{ $new_release_dir }} {{ $app_dir }}/current
    echo 'Done'
@endtask
...
Tugas terakhir ini adalah menghapus direktori storage dari direktori rilis yang baru dan membuat 3 symbolic link yaitu direktori storage, file .env dan direktori webroot current untuk rilis terbaru.
Sebelum melakukan deployment kita harus copy direktori storage dan file .env kedalam webroot aplikasi , anda juga bisa membuat nya menggunakan task envoy tapi hanya digunakan sekali saja.
Sekarang commit Envoy.blade.php dan lakukan push ke branch master
git add .
git commit -m 'Add Envoy'
git push origin master
CI/CD dengan Gitlab
Sekarang aplikasi laravel sudah siap di gitlab dan agar bisa TEST dan DEPLOY kita perlu menyiapkan environment CI/CD di gitlab. disini kita akan menggunakan docker images, let’s do this!
Buat Container Image
Install dulu Docker di komputer lokal anda. lalu berikut full script Dockerfile yang kita punya dan buat di root aplikasi.
# Set the base image for subsequent instructions
FROM php:7.1

# Update packages
RUN apt-get update

# Install PHP and composer dependencies
RUN apt-get install -qq git curl libmcrypt-dev libjpeg-dev libpng-dev libfreetype6-dev libbz2-dev

# Clear out the local repository of retrieved package files
RUN apt-get clean

# Install needed extensions
# Here you can install any other extension that you need during the test and deployment process
RUN docker-php-ext-install mcrypt pdo_mysql zip

# Install Composer
RUN curl --silent --show-error https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Laravel Envoy
RUN composer global require "laravel/envoy=~1.0"
sekarang kita build dan push ke Gitlab Container Registry, pertama kita login dulu dengan username dan password ke registry gitlab
docker login registry.gitlab.com
kedua kita build dan push
docker build -t registry.gitlab.com/<USERNAME>/laravel-tes-deploy .

docker push registry.gitlab.com/<USERNAME>/laravel-tes-deploy
kalau sudah berhasil lihat di menu registry gitlab

jangan lupa commit dan push Dockerfile yang dibuat tadi
git add Dockerfile
git commit -m 'Add Dockerfile'
git push origin master
Buat file .gitlab-ci.yml
buat file baru di direktori root aplikasi dengan nama .gitlab-ci.yml, script terlihat seperti berikut:
image: registry.gitlab.com/<USERNAME>/laravel-test-deploy:latest
services:
  - mysql:5.7
variables:
  MYSQL_DATABASE: homestead
  MYSQL_ROOT_PASSWORD: secret
  DB_HOST: mysql
  DB_USERNAME: root
stages:
  - test
  - deploy
unit_test:
  stage: test
  script:
    - composer install
    - cp .env.example .env
    - php artisan key:generate
    - php artisan migrate
    - vendor/bin/phpunit
deploy_production:
  stage: deploy
  script:
    - 'which ssh-agent || ( apt-get update -y && apt-get install openssh-client -y )'
    - eval $(ssh-agent -s)
    - ssh-add <(echo "$SPK_GCL")
    - mkdir -p ~/.ssh
    - '[[ -f /.dockerenv ]] && echo -e "Host *\n\tStrictHostKeyChecking no\n\n" > ~/.ssh/config'
- ~/.composer/vendor/bin/envoy run deploy
  environment:
    name: production
    url: http://35.198.233.156
  when: manual
  only:
    - master
Gitlab Runners akan menjalankan script yang kita tentukan di .gitlab-ci.yml tentunya akan menggunakan services image docker yang kita build tadi, disini kita menggunakan MySQL 5.7
Note: Jika ingin menguji aplikasi dengan versi PHP dan sistem pengelolaan basis data yang berbeda, Anda dapat menentukan kata kunci images dan services yang berbeda untuk setiap test. jangan lupa build dan push ke container registry gitlab.
image: registry.gitlab.com/<USERNAME>/laravel-sample:latest

services:
  - mysql:5.7

...
didalam file .gitlab-ci.yml anda juga bisa menambahkan job untuk staging environment pengujian tahap akhir aplikasi. jangan lupa commit dan push .gitlab-ci.yml
Sekarang lihat Pipelines di project gitlab, disini terlihat proses test saya gagal.

ternyata karena nama databases yang saya buat tidak sesuai dengan job di .gitlab-ci.yml

setelah di ubah dan sukses. klik untuk proses deployment

Seiring berkembang nya aplikasi, jika terjadi sesuatu yang tidak diinginkan, anda juga bisa rollback ke versi aplikasi terbaru. Pipelines > Environments

Klik View development untuk melihat hasil.

dan struktur direktori aplikasi di server setelah deployment terlihat seperti berikut.
www-data 4096 Sep  7 07:02 ./
www-data 4096 Aug 11 06:15 ../
www-data    1 Sep  7 07:02 .env
www-data   46 Sep  7 07:11 current -> ./releases/20170907071102
www-data 4096 Sep  7 07:11 releases/
www-data 4096 Sep  7 07:02 storage/
Kesimpulan
Kita telah berhasil meng-implentasikan Gitlab CI/CD untuk Test dan Deploy Aplikasi Laravel dengan metode Continuous Delivery dan juga menggunakan Envoy untuk zero-downtime deploys.
Gitlab memudahkan kita untuk melakukan proses software development dalam satu web interface, yang pasti GRATIS dan Open Source. sudah selayaknya dipertimbangkan untuk digunakan dalam real world project!
