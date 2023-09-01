@extends('admin.layout.master')
@section('content')



<div class="main-container">
<div class="pd-ltr-20 xs-pd-20-10">
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Add Tetimonial Section</h4>
        </div>
        <br><br>
    </div>

    <form action="{{route('home.testimonial.store')}}" method="POST" enctype="multipart/form-data">
       @csrf
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Name</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="name" value="{{old('name')}}"placeholder="Name">
                <p style="color:red">@error('name'){{$message}}@enderror</p>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Profession</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="profession" value="{{old('profession')}}"placeholder="Profession">
                <p style="color:red">@error('profession'){{$message}}@enderror</p>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Discription</label>
            <div class="col-sm-12 col-md-10">
                <textarea id="editor1" name="discription" rows="7" cols="50">{{old('discription')}}</textarea>
            </div>
            <p style="color:red">@error('discription'){{$message}}@enderror</p>

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
