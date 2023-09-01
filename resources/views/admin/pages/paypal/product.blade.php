@extends('admin.layout.master')
@section('content')
<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Product</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Product</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="product-wrap">
					<div class="product-list">
						<ul class="row">
							<li class="col-lg-4 col-md-6 col-sm-12">
								<div class="product-box">
									<div class="producct-img"><img src="{{asset('vendors/images/product-img1.jpg')}}" alt=""></div>
									<div class="product-caption">
										<h4><a href="#">Gufram Bounce Black</a></h4>
										<div class="price">
											<del>$55.5</del><ins>$49.5</ins>
										</div>
                                        {{-- paypal --}}
                                        <form action="{{route('paypal')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="name" value="Gufram Bounce Black">
                                            <input type="hidden" name="price" value="49.5">
										<button type="submit" class="btn btn-outline-primary">Pay with Paypal</button>
                                    </form>

                                    {{-- stripe --}}
                                    <form action="{{route('stripe')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="name" value="Gufram Bounce Black">
                                        <input type="hidden" name="price" value="49.5">
                                    <button type="submit" class="btn btn-outline-primary">Pay with Stripe</button>
                                </form>
									</div>
								</div>
							</li>

						</ul>
					</div>

				</div>
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
			</div>
		</div>
	</div>


@endsection
