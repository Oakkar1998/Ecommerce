<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap demo</title>

  </head>
  <body>

    <section class="">
        <div class="container">
            <div class="card">
                <div class="card-body mx-4">
                  <div class="container">
                    <p class="my-5 mx-5" style="font-size: 30px;">Thank for your purchase</p>
                    <div class="row">
                      <ul class="list-unstyled">

                        <li class="text-muted mt-1"><span class="text-black">Invoice Number: </span> {{ $data->invoice_number}}</li>
                        <li class="text-black">Name: {{ $data->name }}</li>
                        <li class="text-black">Phone: {{ $data->phone_number }}</li>
                        <li class="text-black mt-1">Address: {{ $data->address }}</li>
                        <li class="text-black mt-1">Date: {{ $data->updated_at->format('d-m-Y') }}</li>
                        <li class="text-black mt-1">Date: {{ now()->format('g:i A') }}</li>



                      </ul>
                      <hr>
                      <div class="col-xl-10">
                        <p>Product Detail</p>
                        <div class="">
                            <p>Product Name: {{  $data->product->Product_name }}</p>
                            <p>Price: {{ $data->product->Price }} MMK</p>
                            <p>Category Name: {{ $data->product->Category_name }}</p>

                            <hr>

                            <img src="{{ 'images/'.$data->product->Product_Image }}" alt="Product_image" width="150" height="150">

                            <hr>
                        </div>
                      </div>

                    <div class="row text-black">

                      <div class="col-xl-12">
                        <?php
                            $price = $data->product->Price;
                            $tax = $price * 0.05;
                            $delivery_charges = 5000;
                        ?>
                        <p class="float-end fw-bold text-success">Net Price: {{ $price }} MMK
                        </p>
                        <p class="float-end fw-bold">Tax (5%): {{  $tax }} MMK
                        </p>
                        <p class="float-end fw-bold">Delivery Charges: {{ $delivery_charges }} MMK
                        </p>
                        <p class="float-end fw-bold">Total: {{ $price + $tax + $delivery_charges }} MMK
                        </p>
                      </div>
                      <hr style="border: 2px solid black;">
                    </div>
                    <div class="text-center" style="margin-top: 90px;">
                      <p>Myanmar Shopping Zone</p>
                      <p>myanmarshop@gmail.com</p>
                      <p>09 962546404</p>
                      <p>1186, Thida Road, 140 Ward, South Dagon, Yangon</p>
                    </div>

                  </div>
                </div>
            </div>
        </div>

    </section>

  </body>

</html>
