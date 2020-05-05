<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 */

namespace App\Observers;

use App\Models\Category;
use Str;

/**
 * Class CategoryObserver
 * @package App\Observers
 */
class CategoryObserver
{
    /**
     * Listen to the Post saving event.
     * @param Category $category
     */
    public function saving(Category $category): void
    {
        $category->slug = Str::slug($category->title, '-');
    }
}
