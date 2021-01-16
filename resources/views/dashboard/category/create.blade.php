@extends('layouts.admin')
@section('title')
    Add Category
@endsection
@section('content')
    <form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    @include('dashboard.includes.alerts.success')
                    @include('dashboard.includes.alerts.errors')
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Category</h3>
                        </div>
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="name_ar" placeholder="Name By Arabic">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="name_en" placeholder="Name By English">
                            </div>
                            <input type="file" class="form-control" name="photo"
                                   placeholder="Photos">
                            <br>
                            <div class="panel footer">
                                <input type="submit" value="save" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
    </form>

@stop
