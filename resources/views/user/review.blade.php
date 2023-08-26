@extends('layouts.app')
@section('content')
    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }} );"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">add review</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>add
                                review</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <form method="POST" action="{{ route('user.reviewsend',["id"=>$id,"type"=>$type]) }}"
                        class="billing-form ftco-bg-dark p-3 p-md-5">
                        @csrf
                        <h3 class="mb-4 billing-heading">Billing Details</h3>
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">name</label>
                                    <input type="text" name="name" value="{{ Auth::user()->name }} "
                                        class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="w-100"></div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="streetaddress">message</label>
                                    <textarea name="message" class="form-control" value="{{ old("message")}}" placeholder="House number and street name" id="" cols="30"
                                        rows="4"></textarea>
                                </div>
                            </div>


                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group mt-4">
                                    <div class="radio">
                                        <p><button type="submit" name="submit" class="btn btn-primary py-3 px-4">send
                                                review</button></p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form><!-- END -->



                </div> <!-- .col-md-8 -->


            </div>

        </div>
        </div>
    </section> <!-- .section -->
@endsection
