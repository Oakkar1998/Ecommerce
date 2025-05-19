@extends('customer.master')

@section('content')

<section class="slider_section">
    <div class="slider_container">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      Welcome To  <br>
                      Myanmar Online Zone
                    </h1>
                    <p>
                      Sequi perspiciatis nulla reiciendis, rem, tenetur impedit, eveniet non necessitatibus error distinctio mollitia suscipit. Nostrum fugit doloribus consequatur distinctio esse, possimus maiores aliquid repellat beatae cum, perspiciatis enim, accusantium perferendis.
                    </p>
                    <a href="">
                      Contact Us
                    </a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="{{ asset('CustomerCss/images/image3.jpeg') }}" alt="" class=w-100 />
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </section>

<!-- end slider section -->
</div>
<!-- end hero area -->

<!-- shop section -->



<section class="shop_section layout_padding">
<div class="container">
    <div class="heading_container heading_center">

        <div class="container bg-info text-white rounded">
            <h2 class="mt-3 p-2">
                Latest Products
            </h2>
        </div>

        {{-- Search start --}}
        <div class="mt-5 w-50">
            <form action="{{ route('customer.productSearch') }}" method="GET">
                @csrf
                <div class="input-group mb-3 container w-auto">
                    <input type="text" class="form-control" value="{{ request()->search }}"
                        placeholder="Search..." name="search">
                    <button class="btn btn-outline-danger px-5" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
        </div>
        {{-- Search end --}}

     {{-- Search by Category start --}}

     <div class="container">
        <div class="d-flex justify-content-between">
            <div class="">
                <a class="btn btn-outline-danger" href="">Phone</a>
            </div>
            <div class="">
                <a class="btn btn-outline-danger">Smart Watch</a>
            </div>
            <div class="">
                <a class="btn btn-outline-danger">PC</a>
            </div>
            <div class="">
                <a class="btn btn-outline-danger">Laptop</a>
            </div>
            <div class="">
                <a class="btn btn-outline-danger">Speaker</a>
            </div>
        </div>
     </div>

     {{-- Search by Category end --}}

    </div>
    <div class="row">



            @if($Products->count() > 0 )

                @foreach ($Products as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="box">
                            <a href="{{ route('customer.productDetails', $item->id) }}">
                                <div class="img-box mt-3">
                                    <img src="{{ asset('images/' . $item->Product_Image) }}" alt=""
                                        width="120" height="150" class=" img-fluid">
                                </div>
                                <div class=" mb-3">
                                    <h4>
                                        {{ $item->Product_name }}
                                    </h4>
                                </div>
                                <div class="detail-box">

                                    <h6>
                                        Price
                                        <span>
                                            {{ $item->Price }} MMK
                                        </span>
                                    </h6>
                                </div>
                                <div class="new">
                                    <span>
                                        New
                                    </span>
                                </div>
                                <div class="my-3">
                                    <a href="{{ route('customer.productDetails', $item->id) }}">
                                        <button class="btn btn-sm btn-outline-success my-3">
                                            View Details
                                        </button>
                                    </a>
                                    <a href="{{ route('customer.cart',$item->id) }}">
                                        <button class="btn btn-sm btn-outline-primary">
                                            Add to Cart
                                        </button>
                                    </a>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach

            
                @else
            <div class="bg-dark text-center p-5 text-white h3">
                No Product Found!
            </div>

            @endif




    </div>

</div>
</section>

<!-- end shop section -->







<!-- contact section -->

<section class="contact_section ">
<div class="container px-0">
    <div class="heading_container ">
        <h2 class="">
            Contact Us
        </h2>
    </div>
</div>
<div class="container container-bg">
    <div class="row">
        <div class="col-lg-7 col-md-6 px-0">
            <div class="map_container">
                <div class="map-responsive">
                    <iframe
                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France"
                        width="600" height="300" frameborder="0"
                        style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-5 px-0">
            <form action="#">
                <div>
                    <input type="text" placeholder="Name" />
                </div>
                <div>
                    <input type="email" placeholder="Email" />
                </div>
                <div>
                    <input type="text" placeholder="Phone" />
                </div>
                <div>
                    <input type="text" class="message-box" placeholder="Message" />
                </div>
                <div class="d-flex ">
                    <button>
                        SEND
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</section>

<br><br><br>

@endsection
