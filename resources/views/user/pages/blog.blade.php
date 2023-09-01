@extends('user.layout.master')
@section('content')
<div class="hero overlay">
@foreach ($header as $item)
    <div class="img-bg rellax">
        <img src="{{asset('bloghead_image/' . $item->image)}}" alt="Image" class="img-fluid">
    </div>
    <div class="container">
        <div class="row align-items-center justify-content-start">
            <div class="col-lg-6 mx-auto text-center">

                <h1 class="heading" data-aos="fade-up">{{$item->title}}</h1>
                <p class="mb-4" data-aos="fade-up">{{$item->discription}}</p>


            </div>
        </div>
    </div>
@endforeach

</div>



<div class="section">
    <div class="container">


        <div class="row align-items-stretch">
            @foreach($detail as $item)
            <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="media-entry">
                    <a href="index.html">
                        <img src="{{asset('blogdetail_image/' . $item->image)}}" alt="Image" class="img-fluid">
                    </a>
                    <div class="bg-white m-body">
                        <span class="date">{{$item->created_at}}</span>
                        <h3><a href="index.html">{{$item->title}}</a></h3>
                        <p>Author {{$item->user->name}}</p>
                        <p>{!!$item->discription!!}</p>

                        <a href="single.html" class="more d-flex align-items-center float-start">
                            <span class="label">Read More</span>
                            <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
                        </a>
                    </div>
                </div>
            </div>
           @endforeach



            <nav class="mt-5" aria-label="Page navigation example" data-aos="fade-up" data-aos-delay="100">
                <ul class="custom-pagination pagination">
                    <li class="page-item prev"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item next"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

@endsection
