<?php

return [

    'title' => env('APP_TITLE', 'turahe'),
    'name' => env('APP_NAME', 'turahe'),
#-------------------------------
# Author Settings
    'author' =>[
        'name' => env('APP_AUTHOR', 'turahe'),
    ],
    'socials' => [
        'facebook' => 'https://facebook.com/' .env('SOCIAL_FACEBOOK', 'turahe'),
        'twitter' => 'https://twitter.com/' .env('SOCIAL_TWITTER', 'turahe'),
        'github' => 'https://github.com/' .env('SOCIAL_GITHUB', 'turahe')
    ],
#-------------------------------
# Contact Info
    'contact' => [
        'email' => 'example@ymail.com',
        'phone' => '+90 000 333 22',
        'address' =>[
            'city' => 'Sydney',
            'street' => '6 rip carl Avenue CA 90733',
        ]
    ]
];
