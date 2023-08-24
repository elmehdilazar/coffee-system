@extends('layouts.app')
@section('content')
    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Our Menu</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Menu</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-intro">
        <div class="container-wrap">
            <div class="wrap d-md-flex align-items-xl-end">
                <div class="info">
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="icon"><span class="icon-phone"></span></div>
                            <div class="text">
                                <h3>000 (123) 456 7890</h3>
                                <p>A small river named Duden flows by their place and supplies.</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="icon"><span class="icon-my_location"></span></div>
                            <div class="text">
                                <h3>198 West 21th Street</h3>
                                <p> 203 Fake St. Mountain View, San Francisco, California, USA</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="icon"><span class="icon-clock-o"></span></div>
                            <div class="text">
                                <h3>Open Monday-Friday</h3>
                                <p>8:00am - 9:00pm</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="book p-4">
                    <h3>Book a Table</h3>
                    <form action=" {{ route('book') }}" method="POST" class="appointment-form">
                        @csrf
                        <div class="d-md-flex">
                            <div class="form-group">
                                <input type="text" name="first_name"   class="form-control"  placeholder="First Name">
                                 @if($errors->has("first_name")) <span class="text-danger">{{$errors->get("first_name")[0]}}</span> @endif
                            </div>
                            <div class="form-group ml-md-4">
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                                   @if($errors->has("last_name")) <span class="text-danger">{{$errors->get("last_name")[0]}}</span> @endif
                            </div>
                        </div>
                        <div class="d-md-flex">
                            <div class="form-group">
                                <div class="input-wrap">
                                    <div class="icon"><span class="ion-md-calendar"></span></div>
                                    <input type="text" name="date" class="form-control appointment_date" placeholder="Date">
                                       @if($errors->has("date")) <span class="text-danger">{{$errors->get("date")[0]}}</span> @endif
                                </div>
                            </div>
                            <div class="form-group ml-md-4">
                                <div class="input-wrap">
                                    <div class="icon"><span class="ion-ios-clock"></span></div>
                                    <input type="text" name="time" class="form-control appointment_time" placeholder="Time">
                                       @if($errors->has("time")) <span class="text-danger">{{$errors->get("time")[0]}}</span> @endif
                                </div>
                            </div>
                            <div class="form-group ml-md-4">
                                <input type="text" name="phone" class="form-control" placeholder="Phone">
                                   @if($errors->has("phone")) <span class="text-danger">{{$errors->get("phone")[0]}}</span> @endif
                            </div>
                        </div>
                        <div class="d-md-flex">
                            <div class="form-group">
                                <textarea  name="message" id="" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
                                   @if($errors->has("message")) <span class="text-danger">{{$errors->get("message")[0]}}</span> @endif
                            </div>
                            <div class="form-group ml-md-4">
                                <input type="submit" value="Appointment" class="btn btn-white py-3 px-4">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                @foreach ($categories as $categorie)
                    <div class="col-md-6">
                        <h3 class="mb-5 heading-pricing ftco-animate">{{ $categorie->name }} </h3>
                        @foreach ($categorie->Products as $product)
                            <div class="pricing-entry d-flex ftco-animate">
                                <div class="img"
                                    style="background-image: url({{ asset('assets/images/' . $product->image) }});"></div>
                                <div class="desc pl-3">
                                    <div class="d-flex text align-items-center">
                                        <h3><span>{{ $product->name }} </span></h3>
                                        <span class="price">${{ $product->price }} </span>
                                    </div>
                                    <div class="d-block">
                                        <p>{{ $product->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                @endforeach



            </div>
        </div>
    </section>

    <section class="ftco-menu mb-5 pb-5">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Discover</span>
                    <h2 class="mb-4">Our Products</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                        the blind texts.</p>
                </div>
            </div>
            <div class="row d-md-flex">
                <div class="col-lg-12 ftco-animate p-md-5">
                    <div class="row">
                        <div class="col-md-12 nav-link-wrap mb-5">
                            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                @foreach ($categories as $key => $category)
                                    <a class="nav-link @if ($key == 0) active @endif"
                                        id="v-pills-{{ $category->id }}-tab" data-toggle="pill"
                                        href="#v-pills-{{ $category->id }}" role="tab"
                                        aria-controls="v-pills-{{ $category->id }}"
                                        aria-selected="false">{{ $category->name }}</a>
                                @endforeach


                            </div>
                            <div class="col-md-12 mt-3 d-flex align-items-center">



                                <div class="tab-content ftco-animate" id="v-pills-tabContent">
                                    @foreach ($categories as $key => $category)
                                        <div class="tab-pane fade @if ($key == 0) show  @endif  active" id="v-pills-{{ $category->id }}"
                                            role="tabpanel" aria-labelledby="v-pills-{{ $category->id }}-tab">
                                            <div class="row">
                                                @foreach ($category->Products as $product)
                                                    <div class="col-md-4 text-center">
                                                        <div class="menu-wrap">
                                                            <a href="{{ route('product.single', ['id'=>$product->id]) }}" class="menu-img img mb-4 w-100"
                                                                style="background-image: url({{ asset('assets/images/' . $product->image) }});"></a>
                                                            <div class="text">
                                                                <h3><a href="{{ route('product.single', ['id'=>$product->id]) }}">{{ $product->name }} </a></h3>
                                                                <p>{{ $product->description }}</p>
                                                                <p class="price"><span>${{ $product->price }}</span></p>
                                                                <p><a href="{{ route('product.single', ['id'=>$product->id]) }}"
                                                                        class="btn btn-primary btn-outline-primary">show</a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
