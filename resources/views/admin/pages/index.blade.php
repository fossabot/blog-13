@extends('admin.layouts.app', [
    'title' => 'Posts'
])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@lang('dashboard.pages')</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.pages.create') }}" class="btn btn-danger btn-sm">
                            <i class="fa fa-plus-square" aria-hidden="true"></i>@lang('forms.actions.add')
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="dataTable">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Published</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pages as $index => $page)
                            <tr>
                                <th>{{ ++$index }}</th>
                                <td>{{ $page->title }}</td>
                                <td>
                                <span data-toggle="tooltip" data-placement="top" title="{{ $page->published_at->toIso8601String() }}">
                                    {{ $page->time_elapsed }}
                                </span>
                                </td>
                                <td class="p-1 btn-group" role="group" aria-label="action">
                                    <a class="btn btn-warning btn-sm" href="{{ route('admin.pages.edit', $page) }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('admin.pages.destroy', $page) }}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ mix('js/datatables.js') }}"></script>

@endpush
