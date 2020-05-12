@extends('admin.layouts.app', [
    'title' => 'Tags'
])

@section('content')

    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{ __('News Tags')}} </h1>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-title">{{ __('Add Tag')}}</div>
                    <div class="card-body">
                        <form action="{{route('admin.tags.store',['id'=>-1])}}" method="POST">
                            @csrf
                            @include('admin.tags._form',['parents'=>$tags])
                            <div class="">
                                <button class="btn btn-primary" type="submit"> {{ __('Add new')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{ __('News Tags')}} </h1>
        </div>
        <div class="tag">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-title">{{ __('Add Tag')}}</div>
                    <div class="card-body">
                        <form action="{{route('admin.tags.store',['id'=>-1])}}" method="POST">
                            @csrf
                            @include('admin.tags._form',['parents'=>$tags])
                            <div class="">
                                <button class="btn btn-primary" type="submit"> {{ __('Add new')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="filter-div d-flex justify-content-between ">
                    <div class="col-left">
                        @if(!empty($tags))
                            <form method="post" action="{{url('admin/module/news/tag/bulkEdit')}}" class="filter-form filter-form-left d-flex justify-content-start">
                                {{csrf_field()}}
                                <select name="action" class="form-control">
                                    <option value="">{{__(" Bulk Action ")}}</option>
                                    <option value="delete">{{__(" Delete ")}}</option>
                                </select>
                                <button data-confirm="{{__("Do you want to delete?")}}" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button">{{__('Apply')}}</button>
                            </form>
                        @endif
                    </div>
                    <div class="col-left">
                        <form method="get" action="{{url('/admin/module/news/tag/')}} " class="filter-form filter-form-right d-flex justify-content-end" role="search">
                            @csrf
                            <input placeholder="{{__("Search keyword ...")}}" type="text" name="s" value="{{ Request()->s }}" class="form-control">
                            <button class="btn-info btn btn-icon btn_search" id="search-submit" type="submit">{{__('Search Tag')}}</button>
                        </form>
                    </div>
                </div>
                <div class="text-right">
{{--                                        <p><i>{{__('Found :total items',['total'=>$tags->total()])}}</i></p>--}}
                </div>
                <div class="card">
                    <form action="" class="bravo-form-item">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th width="60px"><input type="checkbox" class="check-all"></th>
                                    <th> Tag</th>
                                    <th> Title</th>
                                    <th> Subtitle</th>
                                    <th> Meta Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="check-item" name="ids[]" value="{{$tag->id}}">
                                        </td>
                                        <td class="title">
                                            <a href="{{url('admin/module/news/tag/edit/'.$tag->id)}}">{{ $tag->tag}}</a>
                                        </td>
                                        <td>{{ $tag->title}}</td>
                                        <td>{{ $tag->subtitle }}</td>
                                        <td>{{ $tag->meta_description }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                {{--                {{$tags->appends(request()->query())->links()}}--}}
            </div>
        </div>
    </div>
@endsection
