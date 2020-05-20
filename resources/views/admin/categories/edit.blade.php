@extends('admin.layouts.app', [
    'title' => __('edit') .$category->title
])

@section('content')



    <p>@lang('categories.show') : <a href="{{ $category->url }}">{{ $category->url }}</a></p>

    <form method="POST" action="{{ route('admin.categories.update', $category) }}" enctype="multipart/form-data" accept-charset="UTF-8">
        @csrf

        <div class="container-fluid">
            <div class="row">
                @include('admin/categories/_form')
            </div>
        </div>
        <div class="pull-left">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">{{  __('forms.actions.back') }}</a>
            <input class="btn btn-primary" type="submit" value="{{ __('forms.actions.update') }}">
        </div>
    </form>


    <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" accept-charset="UTF-8" class="form-inline pull-right" data-confirm="{{ __('forms.categories.delete') }}">
        <input name="_method" type="hidden" value="DELETE">
        @csrf
        <button class="btn btn-danger" name="submit" type="submit">
            <i class="fa fa-trash" aria-hidden="true"></i>
            {{  __('categories.delete') }}
        </button>
    </form>
@endsection
