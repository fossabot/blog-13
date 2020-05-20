---
title: Easy deployment with git push
category: 4
subtitle: null
meta_description: null
is_sticky: false
draft : true
type: blog
image: deploy-git.png
---

Mendeploy perubahan aplikasi web dengan menggunakan FTP bisa sangat membosankan dan lambat. Entah dengan menyalin semua kode atau dengan membuat sebuah folder tertentu untuk di upload secara terpisah satu persatu. Jika ada file yang terlupakan untukdi upload ke server  maka server bisa saja down tidak berjalan. Git menawarkan solusi sempurna untuk semua masalah itu, menggunakan dengan dorongan sederhana, jadi mari kita lihat bagaimana Anda bisa mengaturnya.
 

## Ide dibalik metode ini

Jika kita menggunakan Git sebagai kontrol versi. Maka Git tahu semua perubahan kode yang kita lakukan dan hanya menyimpan baris kode yang diubah untuk setiap versi. Hal ini membuat Git menjadi sangat ringan dan cepat. setiap kali ada perubahan di repository, misalnya di Github maka saat mengupload akan sangat cepat karena yang di upload hanyalah baris kode yang di ubah.

Pada tutorial ini akan di jelaskan bagaimana membuat sebuah repository pribadi yang digunakan untuk mendeploy aplikasi ke server.


## Setting server

Kita membutuhkan sebuah akses `ssh` yang terhubung ke server yang telah terinstall ssh dan git.

### Login menggunakan ssh

Untuk mengakses server kita memerlukan akses seperti username, IP dan password. Ketikan kode perintah berikut ini

```bash
# -p untuk mendefinisikan port, jika port masih default bisa dihilangkan.
$ ssh -p 1234 user@host.com
```

Tekan enter dan masukan password server 


Pada server perlu kita menginstal


Once you hit return you will be asked to enter your password (you will not see anything while typing it). Now you are in, perfect. Just type `exit` and hit return to log out.

However, we still have one problem. Pushing something to the server is like logging in, you will need to enter your password every time and this can get annoying very quickly. But luckily, there is a way: `ssh keys` for the rescue.

So the idea behind an `ssh key` is that it is a pair of a secret and a public key, that match up. You create the key pair on your machine and transfer the public key to your server. Everybody may know the public key, because you can only verify the private key, but not create it, using the public one.

```bash
# generate key pair (remeber your password well or leave it empty)
$ ssh-keygen
```

This command will have create a file `~/.ssh/id_rsa.pub` which holds you public key. You need to transfer it to your server. First we copy the content to out clipboard, afterwards we need to login to our server and save the key to `~/.ssh/authorized_keys`.

```bash
# copy ssh key to clipboard
$ cat ~/.ssh/id_rsa.pub | pbcopy
# login to your server
$ ssh -p 1234 user@host.com
# create the folder & file to place your key
$ mkdir .ssh
$ touch .ssh/authorized_keys
# open the file, paste in your key and save it
$ nano .ssh/authorized_keys
```

Now get out of your server using the `exit` command and verify that it works. `$ ssh -p 1234 user@host.com` should now log you in without the need for a password.

### Setting repositori pada server

To be able to push to our server we need a repository, but as we are not going to store any history here, it should be bare and only track the current version of our project. Assuming git is working on your server, login and run the following command once you are on your server.

```bash
# create the folder where your project lives
$ mkdir myWebsite
# create the git folder and cd into it
$ mkdir myWebsite.git
$ cd myWebsite.git
# init the repo as a bare git repo
$ git init —bare
```

### Menyiapkan hook
Git hooks are code snippets that are run at specific times during the execution of a git process, for example a push. What we want to do is use the `post-receive` hook which is run after data is received via a `git push` and execute a script, that will bring all updates into our `myWebsite` folder.

```bash
# move to git folder
$ cd ~/myWebsite.git
# create hook
$ touch hooks/post-receive
# set correct permissions
$ chmod +x hooks/post-receive
# open in nano
$ nano hooks/post-receive
```

Once the file is in place we need to add the command to make git checkout the new version, using the `-f` tag to force the checkout to overwrite the current files. If you are using *composer* you might want to add a `composer install` command so that every time you locally run `composer update`, the packages will be updated as well. Make sure to commit your `composer.lock` file to your version control, otherwise composer install will have nothing new to install. Also, be very careful **NOT** to to add `composer update` to this file, as this might lead to new versions with breaking changes beeing installed on your production environment without you noticing it.

You can also add more scripts, like the `artisan clear-compiled` if you are using Laravel. Make sure to get the correct path, you might be able to change the path, or you have to use the full path from you server. On my server by default `php` is running version 4, so I have to use `/usr/local/bin/php5-56STABLE-CLI` to run the needed php version.

```bash
#!/bin/sh
GIT_WORK_TREE=../myWebsite git checkout -f
# cd to myWebsite in order ro run composer
cd ../myWebsite
# run composer install
/usr/local/bin/php5-56STABLE-CLI /path/to/composer/composer.phar install --no-dev --no-scripts
# run artisan commands for laravel
/usr/local/bin/php5-56STABLE-CLI artisan clear-compiled && /usr/local/bin/php5-56STABLE-CLI artisan optimize
```

## Menghubungkan repositori

There is only one step left, adding the remote repository to our git. This works just like it normally would: Add a new remote named *server*, push defining `master` as the default repo by using the `—set-upstream` flag, commit changes and `push` to *server* for every subsequent update.

```bash
# move to your local repo
$ cd ~/myWebsiteLocal
# add the remote repo
$ git remote add server user@host.com:~/myWebsite.git
# git add & commit something and do the initial push
$ git add --all
$ git commit -m 'inital upload'
$ git push —set-upstream server master
# for subsequent pushes after committing changes
$ git push server
```

Perfect, now you can upload you changes by committing them to *git* and running a `git push server` afterwards. I would say this is a huge improvement to uploading via ftp.

## Extra points: A staging environment
Sometimes, especially if you are working on a more complicated app, it is nice to have a staging environment, a place for you to test your app before it is actually released. This is very easy to do, on your server, create a second pair of folders `staging.myWebsite` and `staging.myWebsite.git`. Now cd into `staging.myWebsite.git` , do a *bare init* and add the hook. Once this is done, just add another remote to your local git repo named `staging`. Now you can do a `git push staging` to upload to your test environment, before deploying to you live app.
