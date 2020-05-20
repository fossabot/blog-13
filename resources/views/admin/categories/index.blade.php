@extends('admin.layouts.app', [
    'title' => __('categories.categories')
])

@section('content')

    <!-- Page Heading -->
{{--    <h1 class="h3 mb-2 text-gray-800">@lang('dashboard.categories')</h1>--}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@lang('dashboard.categories')</h6>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm d-flex justify-content-end">
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
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $index => $category)
                        <tr>
                            <th>{{ ++$index }}</th>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->subtitle }}</td>
                            <td>{{ $category->description }}</td>
                            <td class="p-1 btn-group" role="group" aria-label="action">
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.categories.edit', $category) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.categories.destroy', $category) }}">
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

    <!-- /.container-fluid -->
@endsection

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="/assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endpush

@push('scripts')
    <script src="/assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>

@endpush
