@extends('layouts.admin')
@section('title')
    Delete Category
@stop

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Delete Category</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <form method="post" action="{{route('category.delete',$category->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="card-body text-danger">
                                <label>Are You Sure Delete This Category </label>
                                <span> {{$category->name_en . '' .'?'}} </span>
                            </div>
                        </div>
                        <div class="panel footer">
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </div>
                    </form>
                </div>
                <!-- /.form-group -->
            </div>
            <!-- /.col -->

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.card-body -->

@stop
