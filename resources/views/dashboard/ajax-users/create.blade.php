@extends('layouts.admin')
@section('title')
    Add User
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @include('dashboard.includes.alerts.success')
                @include('dashboard.includes.alerts.errors')
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add User</h3>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">

                        <form method="post" id="userForm" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="User Name ">
                            </div>
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <div class="form-group">
                                <input type="email" class="form-control" autocomplete="off" name="email"
                                       placeholder="Email ">
                            </div>
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <br>

                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <div class="panel footer">
                                <input id="save_user" type="submit" value="save" class="btn btn-primary">
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

    </div>
    <!-- /.card-body -->
@stop
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    $(document).on('click', '#save_user', function (e) {
        e.preventDefault();
        $.ajax({
        type: 'post',
        url: "{{route('ajax.users.store')}}",
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
    });
    });
</script>
