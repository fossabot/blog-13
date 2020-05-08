<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 */

namespace App\Libraries\Manifest;


class MetaService
{
    public function render()
    {
        return "<?php \$config = (new ManifestService)->generate();
        echo \$__env->make( 'pwa::meta' , ['config' => \$config])->render(); ?>";
    }

}
