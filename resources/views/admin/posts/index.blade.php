@extends('admin.layouts.app', [
    'title' => __('posts.posts')
])

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@lang('dashboard.posts')</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.posts.create') }}" class="btn btn-danger btn-sm">
                            <i class="fa fa-plus-square" aria-hidden="true"></i> @lang('forms.actions.add')
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="dataTable">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Post Likes</th>
                            <th>Comment count</th>
                            <th>Published</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $index => $post)
                            <tr>
                                <th>{{ ++$index }}</th>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category->title }}</td>
                                <td class="text-center">
                                    <p data-toggle="tooltip" data-placement="top" title="{{ trans_choice('likes.count', ['count' => $post->likes_count ?? $post->likes()->count()]) }}">
                                        {{ $post->likes_count ?? $post->likes()->count() }}
                                        <i class="fa fa-thumbs-up"></i>
                                    </p>

                                </td>
                                <td class="text-center">
                                    <p data-toggle="tooltip" data-placement="top" title="{{ trans_choice('comments.count', ['count' => $post->comments_count ?? $post->comments()->count()]) }}">
                                        {{ $post->comments_count ?? $post->comments()->count() }}
                                        <i class="fa fa-comment-alt"></i>
                                    </p>

                                </td>
                                <td>
                                <span data-toggle="tooltip" data-placement="top" title="{{ $post->published_at->toIso8601String() }}">
                                    {{ $post->time_elapsed }}
                                </span>
                                </td>
                                <td class="p-1 btn-group" role="group" aria-label="action">
                                    <a class="btn btn-warning btn-sm" href="{{ route('admin.posts.edit', $post) }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('admin.posts.destroy', $post) }}">
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
