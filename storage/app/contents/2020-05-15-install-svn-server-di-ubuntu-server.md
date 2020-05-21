---
title: Install SVN server di ubuntu 20.04
category: 4
subtitle: Install SVN Server di Ubuntu 20.04 LTS.
meta_description: Apache Subversion atau yang biasa di kenal dengan SVN adlaah aplikasi open source yang cukup populer untuk mengatur proses pengembangan perangkat lunak yang dilakukan oleh suatu kelompok pemrogram yang terpisah menjadi runut dan teratur.
is_sticky: false
draft : true
type: blog
image: svn.jpg
---

Apache Subversion atau yang biasa di kenal dengan SVN adlaah aplikasi *open source* yang cukup populer untuk mengatur proses pengembangan perangkat lunak yang dilakukan oleh suatu kelompok pemrogram yang terpisah menjadi runut dan teratur. Sistem kontrol versi memungkinkan Anda merekam perubahan pada file atau kumpulan file selama periode waktu tertentu sehingga Anda dapat mengingat versi tertentu saat dibutuhkan.

Agar bisa menggunakan SVN server kita harus menginstall svn terlebih dahulu pada server.
Untuk memiliki kontrol versi untuk proyek Anda, Anda harus terlebih dahulu menginstal server SVN di mesin Ubuntu Anda.

In order to have version control for your project, you first need to install SVN server on your Ubuntu machine.


## Install SVN server pada Ubuntu 20.04 LTS

Disini kita akan menggunakan Ubuntu Server 20.04 LTS install menginstall SVN Apache.

### Langkah 1. Install Apache

Sebelum kita melangkah dalama instalasi, alahkah baiiknya kita update terlebih dahulu sistem repository yang ada pada server kita.


```shell script
sudo apt update
sudo apt upgrade 
sudo apt install apache2
```

Cek apakah Apache sudah berjalan dengan benar.

```shell script
sudo systemctl status apache2
```

Jika servis apache belum berjalan maka kita menjalankanya dengan peritah berikut ini

```shell script
sudo systemctl start apache2
```

Aktifkan Apache pada sistem boot.

```shell script
sudo systemctl enable apache2
```
Verifikasi instalasi Apache sudah berhasil atau belum. Cukup dengan membuka web browser Anda dan ketik IP server web atau nama host. Jika Anda dapat melihat halaman default Apache, instalasi Apache berhasil seperti di bawah ini.

### Langkah 2. Install Apache Subversion

Install subversion dan beberapa paket tambahan lainya.

```shell script
sudo apt install subversion libapache2-mod-svn
```

Setelah instalasi selesai, secara otomatis sistem akan  mengaktifkan modul SVN yang diperlukan (dav_module, dav_svn_module, authz_svn_module).

Untuk mengecek module yang telah aktif bisa mengetikan perintah berikut ini.

```shell script
sudo apachectl -M
```
Jika module svn belum aktif, bisa menjalankan perintah berikut ini untuk mengaktifkanya.


```shell script
sudo a2enmod dav
sudo a2enmod dav_svn
sudo a2enmod authz_svn
```

Setelah mengaktifkan module tersebut, kita perlu mengrestart service Apache kembali.
After enabling those modules, we need to restart the Apache service.


```shell script
sudo service apache2 restart
```

### Step 3. Konfigirasi Apache Subversion

Sekarang kita akan membuat repositori SVN. Di sini kita menggunakan direktori "/ opt" untuk membuat repositori.

Perintah untuk membuat sebuah direktori untuk svn.

```shell script
sudo mkdir -p  /opt/svn
```

Buat sebuah repository SVN. Disini kita akan membuat sebuah repositori dengan nama "turaherepo"

```shell script
sudo svnadmin create /opt/svn/turaherepo
```

Ubah kepemilikan repositori ke apache.

```shell script
sudo chown -R www-data:www-data /opt/svn/turaherepo/
```

Ubah permisi repositori

```shell script
sudo chmod -R 775/ opt/svn/turaherepo
```

Tambahkan pengguna SVN, disini kita akan menambahkan file kata sandi pada direktori "/etc"


```shell script
sudo htpasswd -cm /etc/svn-auth-users  turahe
```

Membuat nama pengguna yang kedua

```shell script
sudo htpasswd -m /etc/svn-auth-users turahe2
```

Buat sebuah berkas Virtual Host Apache untuk svn yang baru kita buat dengan cara seperti berikut ini. Disini kita akan membuat sebuah berkas Virtual Host Apache dengan nama "turahesvn.conf".

```shell script
sudo nano /etc/apache2/sites-available/turahesvn.conf
```

atau

```shell script
sudo vim /etc/apache2/sites-available/turahesvn.conf
```

> Gunakan editor terminal yang biasa kamu pakai. 


Tambahkan baris kode berikut pada file yang telah kita buat.

```apacheconfig
<VirtualHost *:80>
        ServerName svn.turahe.com
        ServerAlias svn.turahe.com
        <Location /svn>
     DAV svn
     SVNParentPath /opt/svn
     AuthType Basic
     AuthName "Subversion Repository"
     AuthUserFile /etc/svn-auth-users
     Require valid-user
</Location>
    ErrorLog ${APACHE_LOG_DIR}/svn.turahe.com-error.log
    CustomLog ${APACHE_LOG_DIR}/svn.turahe.com-access.log combined
</VirtualHost>
```

Ubah "svn.turahe.id" dengan nama hostname Anda. kemdian tutup editor

Non aktifkan berkas Virtual Host defaul yang aktif pada Apache.

```shell script
sudo a2dissite 000-default.conf
```

Aktifkan berkas Virtual Host yang baru kita buat.

```shell script
sudo a2ensite turahesvn.conf
```
Cek apakah sintak apache sudah benar.

```shell script
sudo apachectl -t
```
Kemudian restart Apache.


```shell script
sudo systemctl restart apache2
```
### Lankah 4. Test Configured Apache Subversion

Buka browser dan ketikan alamat URL repo dan tekan enter

```shell script
http://svn.turahe.id/svn/turaherepo/
```

> Ganti svn.turahe.id dengan nama hostname Anda.


When you will get the Authentication popup screen, enter the already created Username and Password to access svn repository.

Authentication
Authentication
Now you can see the created repository.

SVN-Repo
SVN-Repo
Let us now create a project called “RnD_works ” inside the repository.

svn mkdir file:///opt/svn/turaherepo/RnD_works -m "added RnD_works repository"
svn mkdir file:///opt/svn/turaherepo/RnD_works/trunk -m "added RnD_works trunk repository"
svn mkdir file:///opt/svn/turaherepo/RnD_works/branches -m "added RnD_works branches repository"
svn mkdir file:///opt/svn/turaherepo/RnD_works/tags -m "added RnD_works tags repository"
Let us check if this new project can be viewed inside the repository.

New Project
New Project
Click and Open “RnD_works”

Inside Project
Inside Project
If you want to delete a created project you can use below command to delete it.

svn delete file:///opt/svn/turaherepo/RnD_works -m "delete RnD_works repository"
Step 5. Schedule Repository Backup
Create a backup folder.

sudo mkdir -p /etc/backcups
Change user to root user.

sudo su -
Edit crontab.

crontab -e
In the following command, we schedule svn backup midnight every day.

0 0 * * * svnadmin dump /opt/svn/turaherepo > /etc/backcups/svnbackups-$(date +%Y%m%d).dump
CronJob
CronJob
Then save and exit.

Step 6. Restore Repository
If you need to restore svn repository from backup file use below commands.

Create a new repository.

svnadmin create /opt/svn/restorerepo
Restore backup:

svnadmin load /opt/svn/restorerepo < /etc/backups/svnbackups-20190204.dump
That’s all. We hope this article has helped you to configure subversion successfully. If you have any questions or comments, please visit the Comments section below.
