@extends('layouts.admin')
@section('title')
    Display User
@stop

@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                @include('dashboard.includes.alerts.success')
                @include('dashboard.includes.alerts.errors')
            </div>
        </div>
        <a style="margin-bottom:10px;" class="btn btn-primary" href="{{route('create.user')}}">Add User</a>
        <table id="example2" class="table table-bordered table-hover">
            <div class="card-header bg-primary">
                <h3 class="card-title">All Users</h3>
            </div>
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a class="btn btn-success" href="{{route('edit.user',$user->id)}}">Edit</a>
                        <a class="btn btn-danger" href="{{route('delete.user',$user->id)}}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop
