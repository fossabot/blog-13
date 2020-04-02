<?php

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
