<item>
    <title>{{ $post->title }}</title>
    <guid>{{ $post->url }}</guid>
    <pubDate>{{ $post->published_at->format('r') }}</pubDate>
    <author>{{ $post->user->email }} ({{ $post->user->name }})</author>
    <description>{{ $post->meta_description }}</description>
</item>
