<div class="widget">
    <div class="section-heading heading-dark">
        <h3 class="item-heading">INSTAGRAM</h3>
    </div>
    <div class="widget-instagram">
        <ul>
            @foreach($instagram->medias as $image)
                <li>
                    <div class="item-box">
                        <img src="{{ $image->displaySrc }}" alt="{{ $image->caption }}" class="img-fluid">
                        <a href="{{ $image->link }}" class="item-icon"><i class="fab fa-instagram"></i></a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
