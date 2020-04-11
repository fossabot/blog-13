@extends('admin.layouts.app', [
    'title' => __('users.edit')
])

@section('content')
    <p>@lang('users.show') : {{ link_to_route('users.show', route('users.show', $user), $user) }}</p>

    @include('admin/users/_form')
@endsection
