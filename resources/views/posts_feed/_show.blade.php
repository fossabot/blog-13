<item>
    <title>{{ $post->title }}</title>
    <guid>{{ route('posts.show', $post) }}</guid>
    <pubDate>{{ $post->published_at->format('r') }}</pubDate>
    <author>{{ $post->user->email }} ({{ $post->user->name }})</author>
    <description>{{ $post->excerpt }}</description>
</item>
