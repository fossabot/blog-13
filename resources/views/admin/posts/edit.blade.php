@extends('admin.layouts.app')

@section('content')
    <p>@lang('posts.show') : {{ link_to_route('posts.show', route('posts.show', $post), $post) }}</p>

{{--    @include('admin/posts/_thumbnail')--}}

    <form method="POST" action="{{ route('admin.posts.update', $post) }}">
        <form method="POST" action="{{ route('admin.posts.update', $post) }}" enctype="multipart/form-data" accept-charset="UTF-8">
            <input name="_method" type="hidden" value="PUT">
            @csrf


        @include('admin/posts/_form')

        <div class="pull-left">
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">{{  __('forms.actions.back') }}</a>
            <input class="btn btn-primary" type="submit" value="{{ __('forms.actions.update') }}">
        </div>
    </form>


    <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" accept-charset="UTF-8" class="form-inline pull-right" data-confirm="{{ __('forms.posts.delete') }}">
        <input name="_method" type="hidden" value="DELETE">
        @csrf
        <button class="btn btn-danger" name="submit" type="submit">
            <i class="fa fa-trash" aria-hidden="true"></i>
            {{  __('posts.delete') }}
        </button>
    </form>
@endsection
