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

                        <form method="post" action="{{route('post.user')}}" enctype="multipart/form-data">
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
                            <div class="input_photos">
                                <div class="form-group">
                                    <input type="file" class="form-control" autocomplete="off" name="path[]"
                                           placeholder="Photos">
                                </div>

                                <div class="new-photo">

                                </div>
                                <button  class="btn btn-primary add-more-photo">Add More</button>
                            </div>
                            <br>

                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <div class="panel footer">
                                <input type="submit" value="save" class="btn btn-primary">
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
<script>
    $(document).ready(function () {
        var max_fields = 10;
        var wrapper = $(".new-photo");
        var add_button = $(".add-more-photo");
        var x = 1;
        $(add_button).click(function (e) {
            e.preventDefault();
            if (x < max_fields) {
                $(wrapper).append('<div class="form-group">\n' +
                    '<input type="file" class="form-control" autocomplete="off" name="path[]"\n' +
                    'placeholder="Photos">\n' +
                    '<a href="#" class="remove_field">Remove</a></div></div>');
                x++;
            }
        });
        $(wrapper).on("click", ".remove_field", function () {
            $(this).parent('div').remove();
            x--;
        });
    });
</script>
