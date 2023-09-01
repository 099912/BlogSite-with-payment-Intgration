@extends('admin.layout.master')
@section('content')



<div class="main-container">
<div class="pd-ltr-20 xs-pd-20-10">
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Update Position</h4>
        </div>

    </div>
    <form action="{{route('about.position.update',$data->id)}}" method="POST" enctype="multipart/form-data">
       @csrf
       <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Title</label>
        <div class="col-sm-12 col-md-10">
            <input class="form-control" type="text" name="title" value="{{$data->title}}"placeholder="Title">
            <p style="color:red">@error('title'){{$message}}@enderror</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Category</label>
        <div class="col-sm-12 col-md-10">
            <input class="form-control" placeholder="Category" value="{{$data->category}}" type="text" name="category">
            <p style="color:red">@error('category'){{$message}}@enderror</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">JOB Type</label>
        <div class="col-sm-12 col-md-10">
            <select class="form-control" name="job_type" value="{{$data->job_type}}">
                <option value="remote">Remote</option>
                <option value="fulltime">Full time</option>

                </select>
            <p style="color:red">@error('job_type'){{$message}}@enderror</p>
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
