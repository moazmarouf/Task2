@extends('layouts.admin')
@section('title')
    Delete User
@stop

@section('content')

    <div class="row">
        <div class="col-md-6">
            @include('dashboard.includes.alerts.success')
            @include('dashboard.includes.alerts.errors')
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Delete User</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body card-danger">
                    <form method="post" action="{{route('delete.user',$user->id)}}">
                        @csrf
                        <div class="form-group">
                            <div class="card-body text-danger">
                                <label>Are You Sure Delete User </label>
                                <span> {{$user->name . '' .'?'}} </span>
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
