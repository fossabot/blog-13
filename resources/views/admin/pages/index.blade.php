@extends('admin.layouts.app', [
    'title' => 'Posts'
])

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">@lang('dashboard.pages')</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@lang('dashboard.pages')</h6>
            <a href="{{ route('admin.pages.create') }}" class="btn btn-primary btn-sm d-flex justify-content-end">
                <i class="fa fa-plus-square" aria-hidden="true"></i> @lang('forms.actions.add')
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Published</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pages as $index => $page)
                        <tr>
                            <th>{{ ++$index }}</th>
                            <td>{{ $page->title }}</td>
                            <td>{{ $page->subtitle }}</td>
                            <td>
                                <span data-toggle="tooltip" data-placement="top" title="{{ $page->published_at->toIso8601String() }}">
                                    {{ $page->time_elapsed }}
                                </span>
                            </td>
                            <td class="p-1 btn-group" role="group" aria-label="action">
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.pages.edit', $page) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
{{--                                <a class="btn btn-danger btn-sm" href="{{ route('admin.pages.destroy', $page) }}">--}}
{{--                                    <i class="fa fa-trash"></i>--}}
{{--                                </a>--}}
                                {!! Form::model($page, ['method' => 'DELETE', 'route' => ['admin.pages.destroy', $page], 'class' => 'form-inline', 'data-confirm' => __('forms.pages.delete')]) !!}
                                {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-danger btn-sm', 'name' => 'submit', 'type' => 'submit']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- /.container-fluid -->
@endsection

@push('scripts')
    <script src="{{ mix('js/datatables.js') }}"></script>

@endpush
