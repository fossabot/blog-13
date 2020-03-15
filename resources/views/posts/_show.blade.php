<div class="card">


  <div class="card-body">
    <h4 v-pre class="card-title">
        <a href="{{ route('posts.show', $post->slug) }}"></a>
        {{ $post->title }}
    </h4>

    <p class="card-text"><small v-pre class="text-muted">
            <a href="{{ route('users.show', $post->user->slug ) }}"></a>
            {{ $post->user->name }}
        </small></p>

    <p class="card-text">
      <small class="text-muted">{{ $post->published_at }}</small><br>
      <small class="text-muted">
        <i class="fa fa-comments-o" aria-hidden="true"></i> {{ $post->comments_count }}
        <like
          :likes-count="{{ $post->likes_count }}"
          :liked="{{ json_encode($post->isLiked()) }}"
          :item-id="{{ $post->id }}"
          item-type="posts"
          :logged-in="{{ json_encode(Auth::check()) }}"
        />
      </small>
    </p>
  </div>
</div>
