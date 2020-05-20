---
title: Install Apache, Mariadb, PHP dan phpMyAdmin di Debian/Ubuntu
category: 4
subtitle: null
meta_description: null
is_sticky: false
draft : false
type: blog
image: lamp-debian.png
---

Pada tutorial kali ini, saya menyajikan mengenai tentang bagaimana cara memasang LAMP 
(Linux, Apache, Mariadb, PHP) dan phpMyAdmin di Debian/Ubuntu 18.04.

Sebenarnya, pembahasan mengenai cara penginstalan LAMP di GNU/Linux distro Ubuntu memang sudah banyak sekali, jika kita mencarinya di mesin pencarian `Google`. Maka akan muncul banyak sekali tutorial yang bermunculan. Meski demikian, penulis tetap menuliskan di sini. Tujuannya adalah mempermudah sebagai catatan pribadi kalau lupa bagaimana mengintall LAMP di server.


# Install LAMP dan phpMyAdmin

Lakukan instalasi seluruhnya apache, mariadb, php dan phpmyadmin dengan cara berikut:

```
sudo apt install apache2 php libapache2-mod-php mariadb-server php7.2 php7.2-cli php7.2-common php7.2-curl php7.2-gd php7.2-mysql php7.2-mbstring php7.2-mcrypt php-gettext phpmyadmin
```

Begitu selesai proses pemasangan, silahkan cek pada browser
Anda dengan memasukan URL `localhost`:

<http://localhost/>

Lihat seperti gambar di bawah ini:
![alt lamp](http:/master.test/storage/images/posts/apache-on.png "LAMP")

# Pengaturan

## Mariadb

Pertama-tama atur dahulu MariaDB kita yakni mengeset _password_ pada akun `root`.

```
sudo mysql_secure_installation
```

## Apache

Pertama-tama *backup* dahulu berkas `default` 
dari _virtual host_ dengan cara berikut:

```
cd /etc/apache2/sites-available/
sudo cp 000-default.conf 000-default.conf.bak
```
Lalu ubah nama berkas `000-default.conf` dengan nama misalnya `lokal.conf`.

```
sudo mv 000-default.conf lokal.conf
```
Dan sunting berkas `lokal.conf` seperti kode di bawah ini:

```
<VirtualHost *:80>

ServerAdmin webmaster@localhost
DocumentRoot /code/web

<Directory /code/web>
    Options +Indexes +FollowSymLinks
    AllowOverride All
    Order allow,deny
    allow from all
</Directory>

</VirtualHost>
```
Perhatikan skrip di atas pada baris **ke-4** yakni `DocumentRoot /code/web`. 
Kode itu disesuaikan dengan alamat direktori Anda, jika ingin dirubah misalnya 
ke `/opt` tinggal ganti saja.

Skrip di atas sudah mendukung `directory Index` berserta `.htaccess` jadi bisa 
langsung Anda gunakan untuk keperluan `PHP framework` ataupun CMS 
(_Content Management System_).

Agar skrip di atas dapat berjalan dengan baik perlu disunting pula pada 
berkas `apache2.conf` yakni:

```
sudo gedit /etc/apache2/apache2.conf
```
Lalu tambahkan skrip berikut:

```
<Directory /code/web/>
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
</Directory>
```

Setelah itu kita _disable_ `000-default` dan jadikan `lokal.conf` sebagai 
_default_ lakukan perintah berikut:

```
sudo a2dissite 000-default
sudo a2ensite lokal
```
Kemudian _restart_ Apache Anda:

```
sudo systemctl restart apache2
```
