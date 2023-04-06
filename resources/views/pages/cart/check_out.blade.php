@extends('test')
@section('test')
<title>Thanh toán</title>
<div class="container" style="margin-bottom: 30px; margin-top:120px;">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Danh sách sản phẩm</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        $content = Cart::getContent();
                        ?>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Mã sản phẩm</th>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    {{-- <th>Đơn giá</th> --}}
                                    <th>Thành tiền</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($content as $key => $value )
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td><a href="{{ URL::to('/product-detail/'.$value->id) }}" >
                                        <img src="{{ URL::to('public/uploads/product/'.$value->attributes->image) }}" width="100" height="100" style="margin-bottom: 5px" alt="">

                                    </a></td>
                                    <td>{{ $value->name }}</td>
                                    <td>
                                        <form action="">
                                            <input type="hidden" name="action" value="update">
                                            <input type="hidden" name="id" value="">
                                            <input style="width:50px;" type="text" name="quantity" value="{{ $value->quantity }}">
                                            {{-- <button type="submit" class="btt">Cập nhật</button> --}}
                                        </form>
                                    </td>
                                    {{-- <td>{{ number_format($value->price) }}</td> --}}
                                    <td>{{ number_format($value->price * $value->quantity) }}</td>
                                    <td><i class="fa-solid fa-trash"></i></td>
                                </tr>



                            <!-- <button class="btn btn-success" name="sb" type="submit">Đặt hàng</button> -->
                                @endforeach
                                {{-- <tr>
                                    <td><b>TỔNG TIỀN:</b></td>
                                    <td colspan="6" class="text-center "><b>{{ number_format(Cart::getSubTotal()) }} VNĐ</b></td>
                                </tr> --}}


                            </tbody>
                        </table>
                        <h5 ><a href="{{ URL::to('/check-out') }}" class="btn btn-success" style="float:right ;"><b>ĐẶT HÀNG</b></a></h5>
                    </div>
                </div>

            </div>
            <div class="col-4 " >
                <div class="card">
                    <div class="card-header">
                        <h6>ĐỊA CHỈ GIAO HÀNG</h6>
                    </div>
                    <div class="card-body">
                        <style>
                            input{
                                width: 355px;
                            }
                        </style>
                        <form>

                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h6>TÓM TẮT ĐƠN HÀNG</h6>
                    </div>
                    <div class="card-body">
                        <p>Giá trị đơn hàng: {{ number_format(Cart::getSubTotal()) }} VNĐ</p>
                        <p>Phí giao hàng: Miễn phí</p>
                    </div>
                </div>
            </div>
            </div>
        </div>
 </div>
 <style>
    .btt{
        bottom: 20px;
        right: 30px;
        z-index: 99;
        font-size: 18px;
        border: none;
        background-color: wheat;
        color: #581a14;
        padding: 5px;
        border-radius: 4px;
    }
</style>


@endsection
