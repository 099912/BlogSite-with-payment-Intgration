@extends('user.layout.master')
@section('content')

<div class="hero overlay">
    <div class="img-bg rellax">
        <img src="{{asset('images/hero_2.jpg')}}" alt="Image" class="img-fluid">
    </div>
    <div class="container">
        <div class="row align-items-center justify-content-start">
            <div class="col-lg-6 mx-auto text-center">
                <h1 class="heading" data-aos="fade-up">Contact</h1>
                <p data-aos="fade-up">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-12"	data-aos="fade-up" data-aos-delay="0">

                <h2 class="heading mb-5">Get In Touch</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-info">

                    <div class="address mt-4">
                        <i class="icon-room"></i>
                        <h4 class="mb-2">Location:</h4>
                        <p>43 Raymouth Rd. Baltemoer, London 3910</p>
                    </div>

                    <div class="open-hours mt-4">
                        <i class="icon-clock-o"></i>
                        <h4 class="mb-2">Open Hours:</h4>
                        <p>
                            Sunday-Friday:<br>
                            11:00 AM - 2300 PM
                        </p>
                    </div>

                    <div class="email mt-4">
                        <i class="icon-envelope"></i>
                        <h4 class="mb-2">Email:</h4>
                        <p>info@</p>
                    </div>

                    <div class="phone mt-4">
                        <i class="icon-phone"></i>
                        <h4 class="mb-2">Call:</h4>
                        <p>+1 1234 55488 55</p>
                    </div>

                </div>
            </div>
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                <form action="{{route('contact.store')}}" method="POST">
                   @csrf
                    <div class="row">
                        <div class="col-6 mb-3">
                            <input type="text" class="form-control" name='name' placeholder="Your Name">
                            <p style="color:red">@error('name'){{$message}}@enderror</p>

                        </div>
                        <div class="col-6 mb-3">
                            <input type="email" class="form-control" name='email' placeholder="Your Email">
                            <p style="color:red">@error('email'){{$message}}@enderror</p>

                        </div>
                        <div class="col-12 mb-3">
                            <input type="text" class="form-control" name='subject'  placeholder="Subject">
                            <p style="color:red">@error('subject'){{$message}}@enderror</p>

                        </div>
                        <div class="col-12 mb-3">
                            <textarea  id="" cols="30" rows="7" name='message' class="form-control" placeholder="Message"></textarea>
                            <p style="color:red">@error('message'){{$message}}@enderror</p>

                        </div>

                        <div class="col-12">
                            <input type="submit" value="Send Message" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> <!-- /.untree_co-section -->

@endsection
