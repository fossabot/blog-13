<form method="POST" action="{{ route(['admin.comments.update', $comment]) }}">
    {{ method_field('PATCH') }}
    {{ csrf_field() }}

    <div class="form-row">
        <div class="form-group col-md-6">
            {!! Form::label('user_id', __('comments.attributes.author')) !!}
            {!! Form::select('user_id', $users, null, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'required']) !!}

            @error('user_id')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            {!! Form::label('published_at', __('comments.attributes.published_at')) !!}
            <input type="datetime-local" name="published_at" class="form-control {{ ($errors->has('published_at') ? ' is-invalid' : '') }}" required value="{{ old('published_at') ?? $comment->published_at->format('Y-m-d\TH:i') }}">

            @error('published_at')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('content', __('comments.attributes.content')) !!}
        {!! Form::textarea('content', null, ['class' => 'form-control' . ($errors->has('content') ? ' is-invalid' : ''), 'required']) !!}

        @error('content')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="pull-left">
        {{ link_to_route('admin.comments.index', __('forms.actions.back'), [], ['class' => 'btn btn-secondary']) }}
        {!! Form::submit(__('forms.actions.update'), ['class' => 'btn btn-primary']) !!}
    </div>

</form>

{!! Form::model($comment, ['method' => 'DELETE', 'route' => ['admin.comments.destroy', $comment], 'class' => 'form-inline pull-right', 'data-confirm' => __('forms.comments.delete')]) !!}
    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> ' . __('comments.delete'), ['class' => 'btn btn-link text-danger', 'name' => 'submit', 'type' => 'submit']) !!}
{!! Form::close() !!}
