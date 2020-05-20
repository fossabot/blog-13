---
title:  Konfigurasi Auto Deploy dari Gitlab-CI ke server,
category: 4
subtitle: null
meta_description: null
is_sticky: false
draft : true
type: blog
image: cicd_pipeline_infograph.png
---


Biasannya jika kita mau mendeploy aplikasi ke server. kita akan melakukan secara manual dengan mengunggah kode tersebut ke server melalui FTP. Atau kalau yang lebih canggih dikit dengan menunggah kode menggunakan Git ke server Git kemudian di clone di server secara manual.

Semua yang di lakukan tersebut tidaklah salah. Tapi bagaimana jika hal tersebut bisa dilakukan secara otomatis tanpa harus kita mengulangi setiap kali mendeploy sebuah aplikasi. 

Gitlab-CI merupakan metode alternatif untuk mendeploy sebuah aplikasi secara otomatis.

Prasyarat membaca ini adalah bahwa Anda sudah terbiasa dengan SSH, GITLAB, dan fitur Integrasi Berkelanjutan dari gitlab, disebut sebagai gitlab-ci. Lain, klik masing-masing untuk membaca lebih lanjut tentang mereka.

Sekarang, dengan asumsi kami memiliki koneksi ssh ke server kami, dan git diinstal pada server kami, kami dapat melanjutkan dengan yang berikut:

```yaml
before_script:
  - apt-get update -qq
  - apt-get install -qq git
  # Setup SSH deploy keys
  - 'which ssh-agent || ( apt-get install -qq openssh-client )'
  - eval $(ssh-agent -s)
  - ssh-add <(echo "$SSH_PRIVATE_KEY")
  - mkdir -p ~/.ssh
  - '[[ -f /.dockerenv ]] && echo -e "Host *\n\tStrictHostKeyChecking no\n\n" > ~/.ssh/config'
    
deploy_staging:
  type: deploy
  environment:
    name: staging
    url: example.com
  script:
    - ssh root@example.com "cd var/www/ && git checkout master && git pull origin master && exit"
  only:
    - master
```
