@extends('admin.layouts.app', [
    'title' => __('posts.posts')
])

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">@lang('dashboard.posts')</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@lang('dashboard.posts')</h6>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary btn-sm d-flex justify-content-end">
                <i class="fa fa-plus-square" aria-hidden="true"></i> @lang('forms.actions.add')
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable">
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

    <!-- /.container-fluid -->
@endsection

@push('scripts')
    <script src="{{ mix('js/datatables.js') }}"></script>

@endpush
