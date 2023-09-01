@extends('admin.layout.master')
@section('content')



<div class="main-container">
<div class="pd-ltr-20 xs-pd-20-10">
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Add Position Section</h4>
        </div>
        <br><br>
    </div>

    <form action="{{route('about.position.store')}}" method="POST" enctype="multipart/form-data">
       @csrf
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Title</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="title" value="{{old('title')}}"placeholder="Title">
                <p style="color:red">@error('title'){{$message}}@enderror</p>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Category</label>
            <div class="col-sm-12 col-md-10">
                {{-- <textarea id="editor1" name="discription" rows="7" cols="50">{{old('discription')}}</textarea> --}}
            <input class="form-control" type="text" name="category" value="{{old('category')}}"placeholder="Category">
            <p style="color:red">@error('category'){{$message}}@enderror</p>

        </div>

        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Job Type</label>
            <div class="col-sm-12 col-md-10">
            {{-- <input class="form-control" type="text" name="category" value="{{old('category')}}"placeholder="Category"> --}}
        <select class="form-control" name="job_type">
        <option value="remote">Remote</option>
        <option value="fulltime">Full time</option>

        </select>
        </div>
            <p style="color:red">@error('job_type'){{$message}}@enderror</p>

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
