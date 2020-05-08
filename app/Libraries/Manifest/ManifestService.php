<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 */

namespace App\Libraries\Manifest;


class ManifestService
{
    public function generate()
    {
        $basicManifest =  [
            'name' => config('pwa.name'),
            'short_name' => config('pwa.short_name'),
            'start_url' => asset(config('pwa.start_url')),
            'display' => config('pwa.display'),
            'theme_color' => config('pwa.theme_color'),
            'background_color' => config('pwa.background_color'),
            'orientation' =>  config('pwa.orientation'),
            'status_bar' =>  config('pwa.status_bar'),
            'splash' =>  config('pwa.splash')
        ];

        foreach (config('pwa.icons') as $size => $file) {
            $fileInfo = pathinfo($file['path']);
            $basicManifest['icons'][] = [
                'src' => $file['path'],
                'type' => 'image/' . $fileInfo['extension'],
                'sizes' => $size,
                'purpose' => $file['purpose']
            ];
        }

        foreach (config('pwa.custom') as $tag => $value) {
            $basicManifest[$tag] = $value;
        }
        return $basicManifest;
    }

}
