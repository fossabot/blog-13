<?php
/**
 * This file is part of the jagopedia package.
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         wachid
 *  @copyright      Copyright (c) wachid 2017-2019.
 *
 */


if (! function_exists('set_active')) {


    /**
     * Menambahkan CSS class active Pada Menu Sesuai Route yang di Akses di Laravel 5
     *
     * https://medium.com/laravel-indonesia/menambahkan-css-class-active-pada-menu-sesuai-route-yang-di-akses-di-laravel-5-d0d35e91a7fd
     *
     *
     * @param $uri
     * @param string $output
     * @return string
     */
    function set_active($uri, $output = 'active'): string
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return $output;
                }
            }
        } else {
            if (Route::is($uri)) {
                return $output;
            }
        }
    }
}


if (! function_exists('svg')) {

    /**
     * SVG helper
     *
     * @param $src
     * @return bool|string
     */
    function svg($src): string
    {
        return file_get_contents(storage_path('app/public/' . $src . '.svg'));
    }
}


if (! function_exists('dirToArray')) {

    /**
     * @param $dir
     * @return array
     */
    function dirToArray($dir): array
    {
        $result = [];

        $cdir = scandir($dir);
        foreach ($cdir as $key => $value) {
            if (!in_array($value, [".",".."])) {
                if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
                    $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
                } else {
                    $result[] = $value;
                }
            }
        }

        return $result;
    }

    if (! function_exists('random_unique')) {
        /**
         * @param $min
         * @param $max
         * @return int
         */
        function random_unique($min, $max): int
        {
            $uniques = [];
            for ($i = 0; $i < 500; $i++) {
                do {
                    $code = mt_rand($min, $max);
                } while (in_array($code, $uniques));
                $uniques[] = $code;
            }
        }
    }
}
