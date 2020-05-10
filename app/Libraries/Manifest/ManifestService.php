<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 */

namespace App\Libraries\Manifest;

/**
 * Class ManifestService
 * @package App\Libraries\Manifest
 */
class ManifestService
{
    /**
     * @return array
     */
    public function generate(): array
    {
        $basicManifest =  [
            'name' => config('pwa.manifest.name'),
            'short_name' => config('pwa.manifest.short_name'),
            'start_url' => asset(config('pwa.manifest.start_url')),
            'display' => config('pwa.manifest.display'),
            'theme_color' => config('pwa.manifest.theme_color'),
            'background_color' => config('pwa.manifest.background_color'),
            'orientation' =>  config('pwa.manifest.orientation'),
            'status_bar' =>  config('pwa.manifest.status_bar'),
            'splash' =>  config('pwa.manifest.splash')
        ];

        foreach (config('pwa.manifest.icons') as $size => $file) {
            $fileInfo = pathinfo($file['path']);
            $basicManifest['icons'][] = [
                'src' => $file['path'],
                'type' => 'image/' . $fileInfo['extension'],
                'sizes' => $size,
                'purpose' => $file['purpose']
            ];
        }

        foreach (config('pwa.manifest.custom') as $tag => $value) {
            $basicManifest[$tag] = $value;
        }
        return $basicManifest;
    }
}
