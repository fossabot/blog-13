<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/16/20, 1:05 AM
 *  @name          ConversionHasBeenCompleted.php
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */

namespace App\Events;

use App\Libraries\Media\Conversions\Conversion;
use App\Models\Media;
use Illuminate\Queue\SerializesModels;

/**
 * Class ConversionHasBeenCompleted
 * @package App\Libraries\Media\Conversions\Events
 */
class ConversionHasBeenCompleted
{
    use SerializesModels;

    /**
     * @var Media
     */
    public Media $media;

    /**
     * @var Conversion
     */
    public Conversion $conversion;

    /**
     * ConversionHasBeenCompleted constructor.
     * @param Media $media
     * @param Conversion $conversion
     */
    public function __construct(Media $media, Conversion $conversion)
    {
        $this->media = $media;

        $this->conversion = $conversion;
    }
}
