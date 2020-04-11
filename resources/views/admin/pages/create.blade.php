@extends('admin.layouts.app', [
    'title' => __('create_pages')
])

@section('content')


    <form method="POST" action="{{ route('admin.pages.store') }}">
        @csrf

        <div class="container-fluid">
            <div class="row">
                @include('admin.pages._form')
            </div>
        </div>


        <button type="button" class="btn btn-secondary" onclick="window.history.back()">
            <i class="fa fa-arrow-left"></i>
            @lang('forms.actions.back')
        </button>

        <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i>
            @lang('forms.actions.save')
        </button>

    </form>
@endsection
