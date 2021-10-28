@extends('layouts.master')

@section('title')
    {{ trans('backend/products.Edit Product') }}
@endsection

@section('css')

@endsection

@section('content')
    @include('massage')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('backend/products.Edit Product') }}  </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ trans('backend/products.Home') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('backend/products.Products') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- main body -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form action="{{route('products.update',$product->id)}}" method="post" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>{{ trans('backend/products.Product name in Arabic') }}   </label>
                                <input type="text" name="name" value="{{$product->getTranslation('name','ar')}}" class="form-control @error('name') is-invalid @enderror">
                                {{-- Input hidden id --}}
                                <input type="hidden" name="id" value="{{$product->id}}">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ trans('backend/products.Product name in English') }}   </label>
                                <input type="text" name="name_en" value="{{$product->getTranslation('name','en')}}" class="form-control @error('name_en') is-invalid @enderror" required>
                                @error('name_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>{{ trans('backend/products.Product name') }} </label>
                                <select name="category_id" id="" class="form-control p-1">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $product->cat_id ? 'selected' : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ trans('backend/products.Product price') }} </label>
                                <input type="number" name="price" value="{{$product->price}}" class="form-control @error('price') is-invalid @enderror">
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label>{{ trans('backend/products.Notes') }}</label>
                            <textarea name="notes" class="form-control" rows="5">{{$product->notes}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success">{{ trans('backend/products.Saving data') }} </button>
                    </form>
                </div>
            </div>
@endsection

@section('js')

@endsection
