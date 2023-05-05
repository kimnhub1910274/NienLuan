@extends('admin_dashboard')
@section('admin_content')
<div class="container-fluid">

    <div class="container">
      <!-- Title -->
      <div class="d-flex justify-content-between align-items-center py-3">
        <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> CHI TIẾT ĐƠN HÀNG </h2>
      </div>

      <!-- Main content -->
      <div class="row">
            <div class="col-lg-8">
            <!-- Details -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between">
                            <div>
                                @foreach ($order_details as $key => $details)
                                <span class="me-3">#{{ $details->order_id}}</span>
                                <span class="me-3">{{ $details->order_status}}</span>
                                <span class="badge rounded-pill bg-info"></span>
                                @endforeach
                            </div>

                        </div>
                        <table class="table table-borderless">
                            <th></th>
                            <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($order_details as $key => $details)
                                @php
                                    $subtotal = $details->product_price * $details->product_quantity;
                                    $total = $subtotal + $total ;
                                @endphp
                                <tr>
                                    <td>
                                        <div class="d-flex mb-2">
                                            <div class="flex-shrink-0">
                                            <img src="https://www.bootdey.com/image/280x280/87CEFA/000000"
                                            alt="" width="35" class="img-fluid">
                                            </div>
                                            <div class="flex-lg-grow-1 ms-3">
                                            <h5 class="small mb-0"><a href="#" class="text-reset">
                                                </a>{{ $details->product_name}}</h5>
                                            </div>
                                        </div>
                                        </td>
                                        <td><input type="number" min="1" name="product_quantityy" style="width:40px"
                                            value="{{ $details->product_quantity}}">
                                            <button class="btn btn-success" name="update_quantity"
                                            >Cập nhật</button>
                                        </td>
                                        <td class="text">
                                            {{number_format($details->product_price)}}
                                        </td>
                                        <td class="text-end">
                                            {{number_format($subtotal)}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="" >Phí vận chuyển</th>
                                    <td></td>
                                    <td></td>
                                    <td class="text-end">0</td>
                                </tr>
                                <tr class="fw-bold">
                                    <td colspan="2">Tổng tiền</td>
                                    <td></td>
                                    <td class="text-end">
                                        {{ number_format($total)}}</td>
                                </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>
            <!-- Payment -->
            <div class="card mb-4">
                <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                    <h3 class="h6">Phương thức thanh toán</h3>
                    <p>Thanh toán khi nhận hàng<br>
                    </div>
                    <div class="col-lg-6">
                    <h3 class="h6">Người đặt đơn</h3>
                    <address>
                        <strong>{{ $customer->customer_name}}</strong><br>
                        {{ $customer->customer_address}}
                       <br>
                       {{ $customer->customer_email}} <br>
                        <abbr title="Phone">{{ $customer->customer_phone}}</abbr>
                    </address>
                    </div>
                </div>
                </div>
            </div>
            </div>
        <div class="col-lg-4">
          <!-- Customer Notes -->
          <div class="card mb-4">
            <div class="card-body">
              <h3 class="h6">Ghi chú của khách hàng</h3>
              <p>{{ $ship->ship_note}}</p>
            </div>
          </div>
          <div class="card mb-4">
            <!-- Shipping information -->
            <div class="card-body">
              <h3 class="h6">Thông tin vận chuyển</h3>
              <address>
                <strong>{{ $ship->ship_name}}</strong><br>
                {{ $ship->ship_address}}<br>
                <abbr title="Phone">P:</abbr> {{ $ship->ship_phone}}
              </address>
            </div>
          </div>
        </div>
      </div>
    </div>
      </div>
      <style>
        body{
            background:#eee;
        }
        .card {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0,0,0,.125);
            border-radius: 1rem;
        }
        .text-reset {
            --bs-text-opacity: 1;
            color: inherit!important;
        }
        a {
            color: #5465ff;
            text-decoration: none;
        }
      </style>
@endsection
