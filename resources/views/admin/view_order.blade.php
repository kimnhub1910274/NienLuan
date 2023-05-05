@extends('admin_dashboard')
@section('admin_content')

<div class="container-fluid card">
    &nbsp;
    <h3 class=" text-center ">CHI TIẾT ĐƠN HÀNG </h3>
    <?php
    $message = Session::get('message');
    if($message){
        echo $message;
        Session::pull('message', null);
    }
    ?>
    <div class="card" >
        <div class="card-header">
            <h6 style="padding: 10px"><b>THÔNG TIN KHÁCH HÀNG</b></h6>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Mã khách hàng</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Địa chỉ</th>

              </tr>
            </thead>
            <tbody>
                <tr>
                    <th>{{ $order_byId->customer_id }}</th>
                    <th>{{ $order_byId->customer_name }}</th>
                    <td>{{ $order_byId->customer_phone }}</td>
                    <td>{{ $order_byId->customer_address }}</td>
                </tr>
            </tbody>
          </table>
    </div>
    <br>
    <div class="card" >
        <div class="card-header">
            <h6 style="padding: 10px"><b>THÔNG TIN VẬN CHUYỂN</b></h6>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Mã vận chuyển</th>
                <th scope="col">Tên người nhận</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Ghi chú</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order_byId->ship_id }}</td>
                    <td>{{ $order_byId->ship_name }}</td>
                    <td>{{ $order_byId->ship_address }}</td>
                    <td>{{ $order_byId->ship_phone }}</td>
                    <td>{{ $order_byId->ship_note }}</td>
                </tr>
            </tbody>
          </table>
    </div>
    <br><br>
    <div class="card" >
        <div class="card-header">
            <h6 style="padding: 10px"><b>ĐƠN HÀNG</b></h6>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Giá</th>
                <th scope="col">Tổng tiền</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order_byId->order_id }}</td>
                    <td>{{ $order_byId->product_name }}</td>
                    <td>{{ $order_byId->product_quantity }}</td>
                    <td>{{ $order_byId->product_price }}</td>
                    <td>{{ $order_byId->order_total }}</td>
                </tr>
            </tbody>
          </table>
    </div>
    <br><br>
</div>

@endsection
