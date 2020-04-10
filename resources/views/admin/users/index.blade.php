@extends('admin.layouts.app', [
    'title' => __('users.users')
])

@section('content')
    <div class="page-header">
      <h1>@lang('dashboard.users')</h1>
    </div>

    @include ('admin/users/_list')
@endsection

@push('scripts')
    <script src="{{ mix('js/datatables.js') }}"></script>

@endpush
