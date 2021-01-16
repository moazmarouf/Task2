@extends('layouts.admin')
@section('title')
    All Category
@stop
@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                @include('dashboard.includes.alerts.success')
                @include('dashboard.includes.alerts.errors')
            </div>
        </div>
        <a style="margin-bottom:10px;" class="btn btn-primary" href="{{route('category.create')}}">Add Category</a>
        <table id="example2" class="table table-bordered table-hover">
            <div class="card-header bg-primary">
                <h3 class="card-title">All Category</h3>
            </div>
            <thead>
            <tr>
                <th>Category Name Arabic</th>
                <th>Category Name English</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $cat)
                <tr>
                    <td>{{$cat->name_ar}}</td>
                    <td>{{$cat->name_en}}</td>
                    <td> <img style="width: 50px; height: 50px;" class="img" src="{{asset('category')}}/{{$cat->photo}}">&nbsp;</a></td>
                    <td>
                        <a class="btn btn-success" href="{{route('category.edit',$cat->id)}}">Edit</a>
                        <a class="btn btn-danger" href="{{route('category.get.delete',$cat->id)}}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop
