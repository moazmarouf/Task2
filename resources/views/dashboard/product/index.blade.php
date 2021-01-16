@extends('layouts.admin')
@section('title')
     All Product
@stop
@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                @include('dashboard.includes.alerts.success')
                @include('dashboard.includes.alerts.errors')
            </div>
        </div>
        <a style="margin-bottom:10px;" class="btn btn-primary" href="{{route('product.create')}}">Add Product</a>
        <table id="example2" class="table table-bordered table-hover">
            <div class="card-header bg-primary">
                <h3 class="card-title">All Products</h3>
            </div>
            <thead>
            <tr>
                <th>Product Name Arabic</th>
                <th>Product Name English</th>
                <th>Price</th>
                <th>View</th>
                <th>Buy</th>
                <th>Photo</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->name_ar}}</td>
                    <td>{{$product->name_en}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->views}}</td>
                    <td>{{$product->buy}}</td>
                    <td> <img style="width: 50px; height: 50px;" class="img" src="{{asset('products')}}/{{$product->photo}}">&nbsp;</a></td>
                    <td>{{$product->Category->name_en}}</td>
                    <td>
                        <a class="btn btn-success" href="{{route('product.edit',$product->id)}}">Edit</a>
                        <a class="btn btn-danger" href="{{route('product.get.delete',$product->id)}}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop
