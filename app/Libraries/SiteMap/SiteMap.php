<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/6/20, 1:29 AM
 *  @name          SiteMap.php
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */

namespace App\Libraries\SiteMap;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class SiteMap
{
    /**
     * Return the content of the Site Map
     */
    public function getSiteMap()
    {
        if (Cache::has('site-map')) {
            return Cache::get('site-map');
        }

        $siteMap = $this->buildSiteMap();
        Cache::add('site-map', $siteMap, 120);
        return $siteMap;
    }

    /**
     * Build the Site Map
     */
    protected function buildSiteMap()
    {
        $postsInfo = $this->getPostsInfo();
        $lastPost = $postsInfo->last();
        $lastmod = $lastPost->published_at->toIso8601String();
        $url = trim(url('/'), '/') . '/';


        $xml = [];
        $xml[] = '<?xml version="1.0" encoding="UTF-8"?'.'>';
        $xml[] = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        $xml[] = '  <url>';
        $xml[] = "    <loc>$url</loc>";
        $xml[] = "    <lastmod>$lastmod</lastmod>";
        $xml[] = '    <changefreq>daily</changefreq>';
        $xml[] = '    <priority>0.8</priority>';
        $xml[] = '  </url>';

//        dd($postsInfo);

        foreach ($postsInfo as $post) {
            $xml[] = '  <url>';
            $xml[] = "    <loc>$post->url</loc>";
            $xml[] = "    <lastmod>$post->published_at</lastmod>";
            $xml[] = "  </url>";
        }

        $xml[] = '</urlset>';

        return join("\n", $xml);
    }

    /**
     * Return all the posts
     */
    protected function getPostsInfo()
    {
        return Post::where('published_at', '<=', Carbon::now())
            ->where('is_draft', 0)
            ->orderBy('published_at', 'desc')
            ->get();
    }
}
