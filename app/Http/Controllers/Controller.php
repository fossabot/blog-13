<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 */

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Instagram;

/**
 * Class Controller
 * @package App\Http\Controllers
 */
abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @throws Instagram\Exception\InstagramCacheException
     * @throws Instagram\Exception\InstagramException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return Instagram\Hydrator\Component\Feed
     */
    protected function instagram(): Instagram\Hydrator\Component\Feed
    {
        $cache = new Instagram\Storage\CacheManager(storage_path('app/public/instagram/'));
        $api = new Instagram\Api($cache);
        $api->setUserName('wach_1');

        $feed = $api->getFeed();
        return $feed;
    }
}
