@extends('admin.layout.master')
@section('content')



<div class="main-container">
<div class="pd-ltr-20 xs-pd-20-10">
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Add Header</h4>
        </div>
        <br><br>
    </div>

    <form action="{{route('about.header.store')}}" method="POST" enctype="multipart/form-data">
       @csrf
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Title</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="title" value="{{old('title')}}"placeholder="Title">
                <p style="color:red">@error('title'){{$message}}@enderror</p>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Discription</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" placeholder="Discription" value="{{old('discription')}}" type="text" name="discription">
                <p style="color:red">@error('discription'){{$message}}@enderror</p>
            </div>
        </div>

        <div class="form-group">
            <label>Image</label>
            <div class="custom-file">

                <input type="file" name="image" class="custom-file-input" >

                <label class="custom-file-label">Choose file</label>
                <p style="color:red">@error('image'){{$message}}@enderror</p>

            </div>
        </div>
        <div style="text-align:center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

               </div>
            </div>
    </div>
 </div>



@endsection
