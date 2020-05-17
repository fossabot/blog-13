<div class="widget">
    <div class="widget-newsletter-subscribe-dark">
        <h3>GET LATEST UPDATES</h3>
        <p>NEWSLETTER SUBSCRIBE</p>
        <form class="newsletter-subscribe-form" method="POST" action="{{ url('newsletter-subscriptions') }}">
            @csrf
            <div class="form-group">
                <label for="newsletter_email" class="sr-only"></label>
                <input id="newsletter_email" type="text" placeholder="@lang('newsletter.placeholder')" class="form-control" name="email" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group mb-none">
                <button type="submit" class="item-btn">SUBSCRIBE</button>
            </div>
        </form>
    </div>
</div>
