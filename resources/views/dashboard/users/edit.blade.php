@extends('layouts.admin')
@section('title')
    Edit User
@stop

@section('content')
    <form method="post" action="{{route('edit.post.user',$user->id)}}" enctype="multipart/form-data">
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
                            <h3 class="card-title">Edit User</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" value="{{$user->name}}" class="form-control" name="name"
                                       placeholder="Section Name ">
                            </div>
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <div class="form-group">
                                <input type="email" value="{{$user->email}}" class="form-control" name="email"
                                       placeholder="Email ">
                            </div>
                            <br>
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
                                <input  type="password" class="form-control" name="password" placeholder="Password">
                            </div>

                            <div class="panel footer">
                                <input type="submit" value="save" class="btn btn-primary">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            Delete Image
                        </div>
                        <table class="table table-bordered table-hover">
                            <div class="card-body">
                                @foreach($photos as $photo)
                                    <img src="{{asset('uploads')}}/{{$photo->path}}"
                                         style="width: 100px; height: 100px; margin-bottom: 5px"
                                    >
                                    <input {{$user->Photo()->where('id',$photo->id)->count() == 1 ?'checked':''}}  type="checkbox" name="path[]" value="{{$photo->id}}">
                                @endforeach
                            </div>
                        </table>

                    </div>

                </div>
            </div>

        </div>
    </form>
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
                    '<a href="#" class="remove_field">Remove</a></div></div>'); //add input box
                x++;
            }
        });
        $(wrapper).on("click", ".remove_field", function () { //user click on remove text
            $(this).parent('div').remove();
            x--;
        });
    });
</script>

