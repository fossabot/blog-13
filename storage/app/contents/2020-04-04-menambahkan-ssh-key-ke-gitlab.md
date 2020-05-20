---
title:  Menambahkan ssh key ke Gitlab
category:  4
subtitle:  Creative UI/UX desingerr how loves to craft beautiful that satisfy users needs the product.,
meta_description:  SSH key adalah metode altenartif untuk autentikasi ke Server. Menggunakan motode SSH key ini lebih nyaman digunakan dan aman daripada menggunakan password untuk menghubungkan komputer kita dan server.
is_sticky: false
draft : true
type: blog
---

Jika kita menggunakan metode HTTPS pada gitlab, biasanya kita akan  diminta password
setiap kali melakukan *push* ke Gitlab. setiap kali melakukan push, kita harus mengisi
usernama dan password.

Hal ini bisa di baypass dengan menggunakan SSH key, kita tidak perlu lagi mengisi
username dan password.

SSH key adalah metode altenartif untuk autentikasi ke Server.
 Menggunakan motode SSH key ini lebih nyaman digunakan dan aman
daripada menggunakan password untuk menghubungkan komputer kita dan server.
SSH key cukup dibuat satu kali dan bisa digunakan untuk mengautentikasi server,
kode repository seperti   seperti [Github](https://github.com), [Gitlab](https://gitlab.com)
atua [Bitbucket]().

Berikut ini cara mmebuat SSH key.

## 1. SSH Key

Pertama kita harus membuat dua buah key:

1. Private key
2. Public Key

Caranya dengan menggunakan terminal untuk pengguna Linux atau Mac OS atau git bash bagi 
pengguna windows dengan menggunakan perintah berikut ini.

```shell script
ssh-keygen -t rsa -C "email@example.com" -b 4096
```

![Generate SSH](http://master.test/storage/images/posts/ssh-generate.PNG)

Silahkan ubah "email@example.com" dengan email kamu sendiri.

Berikutnya, kia akan di minta nengisi `id` dan `passphrase`.

Pada contoh di atas, saya mengisi `id` dan `passphrase` kosong. Jika kosong key yang
dibaut di tempatkan dengan nama default. Kamu bisa mengisi `id` dengan sejenis username 
dan `passphrase` dengan password. 

Setelah selesai akan ada dua file baru di dalam direcktori `~/.ssh`


![SSh key](http://master.test/storage/images/posts/ssh-key.PNG)
 
*Private key* berisi kunci rahasia yang tidak boleh diketahui siapapun dan *Public key*
berisi kunci publik yang akan di taruh di server.

## 2. Menambahkan SSH Key ke Gitlab, Github, Bitbucket atau ke Server

Silahkan buka public key yang sudah dibuat dengan teks editor.

Lalu copy semua isinya.

### a. Menambahkan kode ke SSH key ke Gitlab

Buka gitlab dan masuk ke <span >Settings > SSh Keys </span>. lalu paste *Public key* 
yang telah di copy tadi dan ke klik tombol **Add Key** untuk menambahkannya.

Kita bisa mengecek apakah SSH yang kita install di Gitlab sudah terinstall dengan baik
dengan mengetikan perintah berikut ini pada terminal/gitbash.

```shell script
ssh -T git@gitlab.com
```

makan akan keluar seperti berikut ini

jika gagal maka akan keluar seperti berikut ini


