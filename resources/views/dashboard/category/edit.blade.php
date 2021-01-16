@extends('layouts.admin')
@section('title')
    Edit Category
@stop

@section('content')
    <form method="post" action="{{route('category.update',$category->id)}}">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('dashboard.includes.alerts.success')
                    @include('dashboard.includes.alerts.errors')
                </div>
                <div class="col-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Category</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" value="{{$category->name_ar}}" class="form-control" name="name_ar"
                                       placeholder="Category Name Arabic ">
                            </div>

                            <div class="form-group">
                                <input  value="{{$category->name_en}}" class="form-control" name="name_en"
                                       placeholder="Category Name English">
                            </div>
                            <br>
                            <div class="panel footer">
                                <input type="submit" value="save" class="btn btn-primary">
                            </div>
                        </div>
                    </div>

                </div></div>
        </div>
    </form>
    <!-- /.card-body -->

@stop
