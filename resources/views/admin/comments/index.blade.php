@extends('admin.layouts.app', [
    'title' => __('comments.comments')
])

@section('content')
    <div class="page-header">
      <h1>@lang('dashboard.comments')</h1>
    </div>

    @include ('admin/comments/_list')
@endsection
