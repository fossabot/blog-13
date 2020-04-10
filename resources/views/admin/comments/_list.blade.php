<table class="table table-striped table-sm table-responsive-md">
    <thead>
    <tr>
        <th>@lang('comments.attributes.content')</th>
        <th>@lang('comments.attributes.post')</th>
        <th>@lang('comments.attributes.user')</th>
        <th>@lang('comments.attributes.published_at')</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($comments as $comment)
        <tr>
            <td>{{ Str::limit($comment->content, 50) }}</td>
            <td>
{{--                {{ link_to_route('admin.posts.edit', $comment->post->title, $comment->post) }}--}}
            </td>
            <td>{{ link_to_route('admin.users.edit', $comment->user->name, $comment->user) }}</td>
            <td>
                <p data-toggle="tooltip" data-placement="top" title="{{ $comment->published_at->toIso8601String() }}">
                    {{ $comment->time_elapsed }}
                </p>
            </td>
            <td>
                <a href="{{ route('admin.comments.edit', $comment) }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-edit" aria-hidden="true"></i>
                </a>

                {!! Form::model($comment, ['method' => 'DELETE', 'route' => ['admin.comments.destroy', $comment], 'class' => 'form-inline', 'data-confirm' => __('forms.comments.delete')]) !!}
                {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-danger btn-sm', 'name' => 'submit', 'type' => 'submit']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
