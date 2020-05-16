<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/16/20, 1:40 AM
 *  @name          ResponsiveImagesGenerated.php
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */

namespace App\Events;

use App\Models\Media;
use Illuminate\Queue\SerializesModels;

/**
 * Class ResponsiveImagesGenerated
 * @package App\Events
 */
class ResponsiveImagesGenerated
{
    use SerializesModels;

    /**
     * @var Media
     */
    public Media $media;

    /**
     * ResponsiveImagesGenerated constructor.
     * @param Media $media
     */
    public function __construct(Media $media)
    {
        $this->media = $media;
    }
}
