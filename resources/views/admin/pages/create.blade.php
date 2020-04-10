@extends('admin.layouts.app', [
    'title' => __('create_post')
])

@section('content')
    <h1>@lang('posts.create')</h1>

    <form method="POST" action="{{ route('admin.posts.store') }}"  enctype="multipart/form-data">
        @csrf

        <div class="container-fluid">
            <div class="row">
                @include('admin/posts/_form')
            </div>
        </div>


        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">{{  __('forms.actions.back') }}</a>
        <input class="btn btn-primary" type="submit" value="{{ __('forms.actions.save') }}">
    </form>
@endsection
