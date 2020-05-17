<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Blog Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your blog. This value is used when the
    | blog needs to place the blog's name in a notification or
    | any other location as required by the blog.
    |
    */
    'title' => env('APP_TITLE', 'turahe'),
    'name' => env('APP_NAME', 'turahe'),
    'subtitle' => 'A clean blog written in Laravel 5.1',
    'description' => 'This is my meta description',

    /*
     * Whether or not minute/second should be abbreviated as min/sec
     */
    'abbreviate_time_measurements' => false,

    /*
     * Omit seconds from being displayed in the read time estimate
     */
    'omit_seconds' => true,

    /*
     * Whether or not only the time should be displayed
     */
    'time_only' => false,

    /*
     * The average words per minute reading time
     */
    'words_per_minute' => 230,

    /*
    |--------------------------------------------------------------------------
    | Blog Author
    |--------------------------------------------------------------------------
    |
    | This value is the name of your blog. This value is used when the
    | blog needs to place the blog's name in a notification or
    | any other location as required by the blog.
    |
    */
    'author' =>[
        'name' => env('APP_AUTHOR', 'turahe'),
        'description' => 'This is my meta description',
    ],
    'posts_per_page' => 10,
    'rss_size' => 25,

    /*
    |--------------------------------------------------------------------------
    | Socials blog settings
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */
    'socials' => [
        [
            'name' => 'facebook',
            'url'=> 'https://facebook.com/' .env('SOCIAL_FACEBOOK', 'turahe'),
            'text' => 'LIKE ME ON',
        ],
        [
            'name' => 'instagram',
            'url'=> 'https://instagram.com/' .env('SOCIAL_INSTAGRAM', 'turahe'),
            'text' => 'FOLLOW ME',
        ],
        [
            'name' => 'linkedin',
            'url'=> 'https://instagram.com/' .env('SOCIAL_LINKEDIN', 'turahe'),
            'text' => 'FOLLOW ME',
        ],
        [
            'name' => 'behance',
            'url'=> 'https://behance.net/' .env('SOCIAL_BEHANCE', 'turahe'),
            'text' => 'FOLLOW ME',
        ],
        [
            'name' => 'twitter',
            'url'=> 'https://twitter.com/' .env('SOCIAL_TWITTER', 'turahe'),
            'text' => 'FOLLOW ME',
        ],
        [
            'name' => 'github',
            'url'=> 'https://github.com/' .env('SOCIAL_GITHUB', 'turahe'),
            'text' => 'FOLLOW ME',
        ],
        [
            'name' => 'youtube',
            'url'=> 'https://youtube.com/' .env('SOCIAL_YOUTUBE', 'turahe'),
            'text' => 'SUBSCRIBE',
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Blog Address
    |--------------------------------------------------------------------------
    |
    | This value is the name of your blog. This value is used when the
    | blog needs to place the blog's name in a notification or
    | any other location as required by the blog.
    |
    */
    'contact' => [
        'email' => env('CONTACT_EMAIL', 'example@ymail.com'),
        'phone' => env('CONTACT_PHONE', '+90 000 333 22'),
        'address' =>[
            'city' => 'Sydney',
            'street' => '6 rip carl Avenue CA 90733',
        ]
    ]
];
