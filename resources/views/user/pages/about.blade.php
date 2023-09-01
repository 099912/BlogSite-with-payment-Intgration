@extends('user.layout.master')
@section('content')
<div class="hero overlay">
    @foreach($header as $item)
    <div class="img-bg rellax">
        <img src="{{asset('aboutheaderimage/' .  $item->image)}}" alt="Image" class="img-fluid">
    </div>

    <div class="container">
        <div class="row align-items-center justify-content-start">
            <div class="col-lg-5">

                <h1 class="heading" data-aos="fade-up">{{ $item->title}}</h1>
                <p class="mb-5" data-aos="fade-up">{{$item->discription}}</p>

                {{-- <div data-aos="fade-up">
                    <a href="https://www.youtube.com/watch?v=5n-e6lOhVq0" class="play-button align-items-center d-flex glightbox3" >
                        <span class="icon-button me-3">
                            <span class="icon-play"></span>
                        </span>
                        <span class="caption">Watch Video</span>
                    </a>
                </div> --}}
            </div>


        </div>
    </div>
    @endforeach


</div>


<div class="section section-2">
    @foreach($explores as $explore)
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6 order-lg-2 mb-5 mb-lg-0">
                <div class="image-stack mb-5 mb-lg-0">
                    <div class="image-stack__item image-stack__item--bottom" data-aos="fade-up"  >
                        <img src="{{asset('images/img_v_1.jpg')}}" alt="Image" style="transform: translate3d(0px, 90px, 0px);" class="img-fluid">
                    </div>
                    <div class="image-stack__item image-stack__item--top" data-aos="fade-up" data-aos-delay="100"  data-rellax-percentage="0.5">
                        <img src="{{asset('exploreimage/' . $explore->image)}}" alt="Image" class="img-fluid">
                    </div>
                </div>

            </div>
            <div class="col-lg-4 order-lg-1">

                <div>
                    <h2 class="heading mb-3" data-aos="fade-up" data-aos-delay="100">{{$explore->title}}</h2>

                    <p data-aos="fade-up" data-aos-delay="300">{!!$explore->discription!!}</p>

                    {{-- <p data-aos="fade-up" data-aos-delay="300">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p> --}}

                    <p class="my-4" data-aos="fade-up" data-aos-delay="300"><a href="{{route('home.view')}}" class="btn btn-primary">Read more</a></p>
                </div>
            </div>

        </div>

    </div>
    @endforeach
</div>

<div class="section service-section-1">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 mb-4 mb-lg-0">
                <div class="heading-content" data-aos="fade-up">
                    <h2>Our <span class="d-block">Philosphy</span></h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="my-4" data-aos="fade-up" data-aos-delay="300"><a href="{{route('home.services.view')}}" class="btn btn-primary">View All</a></p>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    @foreach($service as $item)
                    <div class="col-6 col-md-6 col-lg-3 mb-4 mb-lg-0" data-aos="fade-up"  data-aos-delay="100">
                        <div class="service-1">
                            <span class="icon">
                                <img src="{{ asset('feature_image/' . $item->image) }}" alt="Image" class="img-fluid">
                            </span>
                            <div>
                                <h3>{{$item->title}}</h3>
                                <p>{{$item->discription}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6 mx-auto text-center">
                <div class="heading-content" data-aos="fade-up">
                    <h2 class="heading">Meet Our Team of Experts</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                </div>
            </div>
        </div>
        @foreach($team as $item)
        <div class="row">

            <div class="col-lg-3">
                <a href="#" class="person">
                    <img src="{{asset('teamimage/' . $item->image)}}" alt="Image" class="img-fluid mb-4">
                    <span class="subheading d-inline-block">{{$item->profession}}</span>
                    <h3 class="mb-3">{{$item->name}}</h3>
                    <p class="text-muted">{{$item->discription}}</p>
                </a>
            </div>
          @endforeach
        </div>
    </div>
</div>

<div class="section service-section-1">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6 mx-auto text-center">
                <div class="heading-content" data-aos="fade-up">
                    <h2 class="heading">Open Positions</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($position as $item)
            <div class="col-lg-12">
                <div class="bg-white p-4 rounded job-position">
                    <div class="row">
                        <div class="col-lg-7">
                            <span class="block subtitle">{{$item->category}}</span>
                            <h2>{{$item->title}}</h2>
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center me-4">
                                    <span class="icon-room me-2"></span> <span>{{$item->job_type}}</span>
                                </div>
                                {{-- <div class="d-flex align-items-center">
                                    <span class="icon-clock-o me-2"></span> <span>Fulltime</span>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-5 text-lg-end">
                            <a href="#" class="d-inline-flex align-items-center"><span class="me-2">View Position</span> <span class="icon-link2"></span></a>
                        </div>

                    </div>

                </div>
            </div>


        </div>
        @endforeach
    </div>
</div>
@endsection
