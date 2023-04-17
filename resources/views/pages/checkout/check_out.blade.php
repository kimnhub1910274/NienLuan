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
                                        <img src="{{ URL::to('public/uploads/product/'.$value->attributes->image) }}"
                                        width="100" height="100" style="margin-bottom: 5px" alt="">

                                    </a></td>
                                    <td>{{  $value->name }}</td>
                                    <td>{{ $value->quantity}} </td>
                                    <td>{{ number_format($value->price * $value->quantity) }}</td>
                                    <td>
                                        <a href="{{ URL::to('/delete-to-checkout/'.$value->id) }}">
                                            <i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
            <div class="col-4 " >
                <div class="card">
                    <div class="card-header">
                        <h6>THÔNG TIN GIAO HÀNG</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ URL::to('/save-checkout') }}" method="POST">
                             {{ csrf_field() }}
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Họ tên</span>
                                <input type="text" class="form-control" placeholder="" aria-label="" name="order_name"
                                aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Số điện thoại</span>
                                <input type="text" class="form-control" placeholder="" aria-label="" name="order_phone"
                                aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Địa chỉ</span>
                                <input type="text" class="form-control" placeholder="" aria-label=""
                                name="order_address"
                                aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Ghi chú</span>
                                <textarea type="text" class="form-control" placeholder="" name="order_note"></textarea>
                            </div>
                            <input type="submit" value="ĐẶT HÀNG" class="btn btn-success"
                            style="float: right" name="order" ></input>
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
