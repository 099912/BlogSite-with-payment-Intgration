@extends('admin.layout.master')
@section('content')



<div class="main-container">
<div class="pd-ltr-20 xs-pd-20-10">
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Update Testimonials</h4>
        </div>

    </div>
    <form action="{{route('home.testimonial.update',$data->id)}}" method="POST" enctype="multipart/form-data">
       @csrf
       <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Name</label>
        <div class="col-sm-12 col-md-10">
            <input class="form-control" type="text" name="name" value="{{$data->name}}"placeholder="Name">
            <p style="color:red">@error('name'){{$message}}@enderror</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Profession</label>
        <div class="col-sm-12 col-md-10">
            <input class="form-control" type="text" name="profession" value="{{$data->profession}}"placeholder="profession">
            <p style="color:red">@error('profession'){{$message}}@enderror</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Discription</label>
        <div class="col-sm-12 col-md-10">
            <textarea id="editor1" name="discription" rows="7" cols="50">{{$data->discription}}</textarea>
        </div>
        <p style="color:red">@error('discription'){{$message}}@enderror</p>

    </div>


        <div class="form-group">
            <label>Image</label>
            <div class="custom-file">
                <input type="file" name="image" class="custom-file-input" >
                <img src="{{asset('/testimonialimage/'.$data->image)}}" width="80px" alt="">

                <label class="custom-file-label">Choose file</label>
                <p style="color:red">@error('image'){{$message}}@enderror</p>

            </div>
        </div><br><br><br>

            <div style="text-align:center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

               </div>
            </div>
    </div>
 </div>



@endsection
