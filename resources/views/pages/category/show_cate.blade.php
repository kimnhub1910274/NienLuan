@extends('welcome')
@section('home')

<title>Sản phẩm theo danh mục</title>
  <div class="container text-center">
    @foreach ($cate_name as $key => $name)
        <h4 class="text-center title">{{ $name->cate_name }}</h4>
    @endforeach
    <div class="row">
        @foreach ($cate_by_id as $key => $product )
        <div class="col">
            <a href="{{ URL::to('/product-detail/'.$product->product_id) }}" >
                <img src="{{ URL::to('public/uploads/product/'.$product->product_image) }}"
                 width="200" height="200" style="margin-bottom: 5px" alt="">
                <p>{{ $product->product_name }}</p>
                <span><i class="fa-regular fa-heart"></i></span>
                <br>
                <span class="price"><b>Giá: {{ number_format($product->product_price).' '.'VND' }}</b></span>
                <span><i class="fa-solid fa-cart-plus"></i></span>
            </a>
        </div>
        <style>
            .fa-cart-plus{
                color: rgb(15, 162, 170);
                margin-bottom: 20px;

              }
              .price{
                color: #af2b1f;
              }
              a{
                text-decoration-line: none;
                color: #000;

              }
        </style>






    @endforeach
    </div>



  </div>

@endsection

