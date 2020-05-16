<div class="widget">
    <div class="section-heading heading-dark">
        <h3 class="item-heading">CATEGORIES</h3>
    </div>
    <div class="widget-categories">
        <ul>
            @foreach($categories as $category)
                @if(!empty($category->posts->count()))
                    <li>
                        <a href="{{ $category->url }}">{{ $category->title }}
                            <span>({{ $category->posts->count() }})</span>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>
