@extends('admin.layouts.app', [
    'title' => __('dashboard.edit') . $page->title
])

@section('content')



    <p>@lang('pages.show') : <a href="{{ $page->url }}">{{ $page->url }}</a></p>

    <form method="POST" action="{{ route('admin.pages.update', $page) }}" enctype="multipart/form-data" accept-charset="UTF-8">
        @csrf

        <div class="container-fluid">
            <div class="row">
                @include('admin.pages._form')
            </div>
        </div>
        <div class="pull-left">
            <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">{{  __('forms.actions.back') }}</a>
            <input class="btn btn-primary" type="submit" value="{{ __('forms.actions.update') }}">
        </div>
    </form>


    <form method="POST" action="{{ route('admin.pages.destroy', $page) }}" accept-charset="UTF-8" class="form-inline pull-right" data-confirm="{{ __('forms.pages.delete') }}">
        <input name="_method" type="hidden" value="DELETE">
        @csrf
        <button class="btn btn-danger" name="submit" type="submit">
            <i class="fa fa-trash" aria-hidden="true"></i>
            {{  __('pages.delete') }}
        </button>
    </form>
@endsection
