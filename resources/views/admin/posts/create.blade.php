@extends('admin.layouts.app')

@section('content')
    <h1>@lang('posts.create')</h1>

    <form method="POST" action="{{ route('admin.posts.store') }}"  enctype="multipart/form-data">

        @include('admin/posts/_form')

        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">{{  __('forms.actions.back') }}</a>
        <input class="btn btn-primary" type="submit" value="{{ __('forms.actions.save') }}">
    </form>
@endsection
