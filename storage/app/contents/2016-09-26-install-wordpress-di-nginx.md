---
title: Install Wordpress di LEMP (Linux, Nginx MySQL PHP)
category: 4
subtitle: null
meta_description: Wordpress merupakan CMS yang paling populer saat ini. Dengan wordpress kita bisa membuat sebuah website blog, ecommerce, situs berita bahkan social media.
is_sticky: false
draft : false
type: blog
image: install-wordpress.png
---

Wordpress merupakan CMS yang paling populer saat ini. Dengan wordpress
kita bisa membuat sebuah website blog, ecommerce, situs berita bahkan
social media. WordPress telah bannyak mengadopsi  banyak teknologi yang
luar biasa dan merupakan sebuah pilihan yang bagus untuk membuat situs 
dengan cepat dan mudah. Semua setup hampir semunya di dapat dilakukan
melalui halaman *Front End* website.


# Persyaratan

Untuk memulai melakukan tutorial ini, ada beberapa persyaratan 
yang harus Anda miliki.

- Membuat user sudo pada server. Pada tutorial ini kita menggunakan user
yang bukan root tapi memiliki hak akses sudo sehingga 

# Tahap Unduhan

Pertama-tama kita unduh terlebih dahulu Wordpress-nya:

```bash
$ wget https://wordpress.org/latest.tar.gz
```

Kemudian ekstrak:

```bash
$ tar xvzf latest.tar.gz
```

Lalu langsung saja kita pindahkan misalnya di direktori _default_ Nginx yakni di:

```
/usr/share/nginx/html
```
Direktori tersebut berlaku untuk berbagai distro GNU/Linux.

```bash
$ sudo mv wordpress /usr/share/nginx/html
```

# Tahap Konfigurasi

Karena sebelumnya kita memindahkan satu direktori Wordpress ke `/usr/share/nginx/html`. Jadi kita perlu mengkonfigurasi _virtual host_ dari berkas yang bernama `default` yakni:

## Pengguna Debian/Ubuntu

```bash
$ sudo vim /etc/nginx/sites-available/default
```

## Pengguna Centos/Fedora/RHEL dan Arch Linux

Kebanyakan pengguna distro Non Debian/Ubuntu konfigurasi _virtual host_ terletak pada:

```bash
$ sudo vim /etc/nginx/nginx.conf
```

Ganti `root` direktori dengan `/usr/share/nginx/html/wordpress;` Juga `index` tambahkan `index.php`. Seperti berikut:

```
...

root /usr/share/nginx/html/wordpress;
index index.php index.html index.htm;

...
```

Kemudian `location / {}` tambahkan ini:

```
...

location / {
  try_files $uri /index.php$is_args$args;
}

...
````

Skrip di atas agar Wordpress Anda dapat menggunakan _pretty_ URL.

Kemudian tambahkan ini, agar Nginx dapat menjalankan PHP:

```
location ~ \.php$ {
	fastcgi_split_path_info ^(.+\.php)(/.+)$;
	
	# Pengguna Ubuntu 14.04
	# fastcgi_pass unix:/var/run/php5-fpm.sock;
	
	# Pengguna Ubuntu 16.04
	# fastcgi_pass unix:/var/run/php7.0-fpm.sock;
	
	# Pengguna Arch Linux
	# fastcgi_pass unix:/var/run/php-fpm/php-fpm.sock;
	
	# Jika Anda tidak tahu, coba cek di direktori /var/run/
	# ls -l /var/run/
	# fastcgi_pass unix:/var/run/ ...
	
	fastcgi_index index.php;
	include fastcgi_params;
}
```
Perhatikan kode di atas untuk kode `fastcgi_pass`, saya tulis untuk berbagai distro. Sengaja saya beri _comment_ (tanda pagar `#`) karena di sesuaikan dengan distro yang Anda gunakan. Ada sedikit perbedaan letak _socket_ dari `php-fpm` ini. Sesuaikan dengan distro yang Anda gunakan. Umumnya semua berada pada direktori `/var/run`. Jika sudah benar, maka uncomment salah satu dari kode di atas.

Kemudian ubah semua _permission_ **direktori 755** sedangkan **berkas 644**, yakni dengan cara berikut:

```bash
$ cd /usr/share/nginx/html/wordpress
$ sudo find . -type d -exec chmod 0755 {} \;
$ sudo find . -type f -exec chmod 0644 {} \;
```

Kemudian jangan lupa pula `owner` nya ubah ke `www-data` (bagi pengguna Debian/Ubuntu) dan `http` (bagi pengguna Arch Linux/RHEL/Fedora/Centos ). Saya asumsikan Anda hanya pengguna Wordpress sendiri. Dalam artian lain, tidak ada user lain selain Anda yang menggunakan Wordpress.

```bash
$ sudo chown http:http -R /usr/share/nginx/html/wordpress/*
```

# Tahap Pembuatan Database

Sebelum beralih ke tahap instalasi Anda harus membuat databasesnya terlebih dahulu, kita gunakan Mariadb/MySQL.
Pertama-tama login dahulu MariaDB/MySQL:

```bash
$ sudo mysql -u root -p
```

Dan kita buat databasenya:

```sql
mysql > CREATE DATABASE wordpress DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
```

Kita buatkan `username` juga:

```sql
mysql > GRANT ALL ON wordpress.* TO 'wordpressuser'@'localhost' IDENTIFIED BY 'password';
mysql > FLUSH PRIVILEGES;
mysql > EXIT;
```


# Tahap Instalasi Wordpress

Sekarang baru kita memasuki tahap pamasangan WP. Langsung saja buka _domain_ atau `IP` _address_ Anda di peramban (_browser_):

![wordpress](https://statis.situsali.comhttps://statis.situsali.com/imgs/situsali-wp-nginx-install-1.png)

Klik `Let's Go`. Kemdian,

![wordpress](https://statis.situsali.com/imgs/situsali-wp-nginx-install-2.png)

Masukan `nama database`, `username`, dan `password` yang telah kita buat sebelumnya. Kemudian masalah `table prefix`, bebas Anda isi apa saja asalkan tambahkan _underscore_ (garis bawah) setelahnya. Lalu Klik `Submit`. Dan,

![wordpress](https://statis.situsali.com/imgs/situsali-wp-nginx-install-3.png)

Langsung saja, klik `Run the Install`.

![wordpress](https://statis.situsali.com/imgs/situsali-wp-nginx-install-4.png)

Masukan informasi yang dibutuhkan di atas. Jika sudah, langsung klik `Install Wordpress`.

![wordpress](https://statis.situsali.com/imgs/situsali-wp-nginx-install-5.png)

Jika sudah seperti gambar di atas, Anda bisa langsung `log In`. Dan hasilnya akan seperti gambar di bawah ini:

![wordpress](https://statis.situsali.com/imgs/situsali-wp-nginx-install-6.png)

Jika berhasil Anda akan diarahkan ke halaman administrasi.

## Tambahan

Untuk mempercantik WP kita, bisa buat prety URL dari `Settings` -> `Permalink` dan pilih:

![wordpress](https://statis.situsali.com/imgs/situsali-wp-nginx-pretty-url-1.png)

Disesuaikan dengan situs Anda. Penulis lebih memilih `post name`, karena menurut penulis ini pilihan yang baik untuk situs yang tidak terlalu sering di-_update_. Jika situs Anda seperti situs berita baiknya pilih day and name. Karena dengan demikian terlihat artikel Anda apakah sudah lama atau belum.

![wordpress](https://statis.situsali.com/imgs/situsali-wp-nginx-pretty-url-2.png)

Semoga bermanfaat 😄
