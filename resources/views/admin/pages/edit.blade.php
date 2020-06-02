@extends('admin.layouts.app', [
    'title' => __('dashboard.edit') . $page->title
])

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <p>@lang('pages.show') : <a href="{{ $page->url }}">{{ $page->url }}</a></p>

                <form method="POST" action="{{ route('admin.pages.update', $page) }}">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    {{--                    @include('admin.shared.errors')--}}
                    {{--                    @include('admin.shared.success')--}}

                    <div class="container">
                        <div class="row">
                            @include('admin.pages._form')
                        </div>
                    </div>

                    <div class="pull-left">
                        <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">
                            {{  __('forms.actions.back') }}
                        </a>

                        <button type="submit" class="btn btn-primary" name="action" value="continue">
                            <i class="fa fa-floppy-o"></i>
                            @lang('forms.actions.save_continue')
                        </button>
                        <button type="submit" class="btn btn-success" name="action" value="finished">
                            <i class="fa fa-floppy-o"></i>
                            @lang('forms.actions.save_finished')
                        </button>

                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                            @lang('forms.actions.delete')
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Logout Modal-->


    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{ route('admin.pages.destroy', $page) }}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" name="submit" class="btn btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                            @lang('pages.delete')
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            <i class="fas fa-close" aria-hidden="true"></i>
                            @lang('pages.close')
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
