@extends('layouts.master')
@section('css')

@section('title')
{{trans('backend/main-sidebar.categories')}}
@stop
@endsection


@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('backend/main-sidebar.categories')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="default-color">{{ trans('backend/main-sidebar.home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('backend/main-sidebar.categories') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection



@section('content')
<!-- row -->

@include('massage')

<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <div class="row">
                    <div class="col mb-3">
                        <button class="btn btn-success" data-toggle="modal" data-target="#AddCategories">
                            {{ trans('backend/main-sidebar.addSection') }}
                        </button>
                    </div>

                </div>

                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0 text-center table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('backend/main-sidebar.sectionName') }}</th>
                            <th>{{ trans('backend/main-sidebar.notes') }}</th>
                            <th>{{ trans('backend/main-sidebar.processes') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->notes==true?$category->notes:trans('backend/categories.There is no notes')}}</td>
                                    <td>

                                        <button class="btn btn-success btn-sm" title="{{ trans('backend/categories.Edit') }}" data-toggle="modal"
                                                data-target="#Editcategory{{$category->id}}"><i
                                                class="fa  fa-2x fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm" title="{{ trans('backend/categories.Delete') }}" data-toggle="modal"
                                                data-target="#Deleted{{$category->id}}"><i class="fa fa-2x fa-trash"></i>
                                        </button>

                                    </td>
                                    @include('backend/categories.edit')
                                    @include('backend/categories.delete')
                                </tr>
                                @endforeach
                        </tbody>


                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@include('backend/categories.create')
<!-- row closed -->
@endsection
@section('js')

@endsection



