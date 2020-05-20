---
title: Memilih versi PHP di Debian/Ubuntu
category: 4
subtitle: null
meta_description: null
is_sticky: false
draft : false
type: blog
image: php1.png
---

Ada kalanya sebuah aplikasi PHP yang kita install tidak support dengan server yang telah kita install. Hal yang lebih menjengkelkan juga adalah kode yang kita tulis tidak berjalan dengan baik pada versi PHP tertentu.

Sebagai contoh kode berikut ini berjalan di PHP 7.4 tapi tidak di versi sebelumnya

```php
array_map(fn (User $user) => $user->id, $users)
```

Gampangnya sih bisa kode di atas bisa di ubah ke versi 7.2 yang ada pada server seperti berikut ini

```php
array_map(function (User $user) { 
    return $user->id; 
}, $users)
```

Tapi jika kode seperti itu banyak. Apakah akan di cari satu persatu, kayaknya cukup melelahkan. Gampangnya sih tinggal ubah versi pada server sama persis dengan versi PHP yanf ada di lokal.

OKey udah cukup basa-basinya. kita langsung lanjut aja.

## Mengubah Versi PHP

Karena bawaanya di sini php7.2 maka saya matikan terlebih dahulu _module_ php7.2 untuk apache

```
sudo a2dismod php7.2
```

Setelah itu aktifkan _module_ apache untuk php7.4

```
sudo a2enmod php7.4
```

Terakhir _restart_ apache _service_

```
sudo systemctl restart apache2
```

## Mengembalikan ke PHP7.2

Untuk mengembalikan ke versi php7.2 caranya sama dengan yang di atas hanya diubah mana yang dimatikan 
dan mana yang dihidupkan.

Matikan dahulu _module_ php7.4

`sudo a2dismod 7.4`

Aktifkan kembali _module_ untuk php7.2

`sudo a2enmod php7.2`

_Restart_ kembali apache

`sudo systemctl restart apache2`

Maka php7.2 sudah kembali sebagai php _default_ OS Anda.

## Catatan Tambahan

Jika saat _restart_  apache gagal, pastikan _module_ php untuk apache sudah terpasang. 
Untuk kasus yang saya alami saat mengubah dari php7 ke 7.4 saya cukup memasang _module_ 
yang dibutuhkannya dengan cara :

`sudo apt install libapache2-mod-7.4`
