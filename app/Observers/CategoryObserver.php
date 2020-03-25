<?php

namespace App\Observers;

use App\Models\Category;
use Str;

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
