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
                    <span>#{{ $order_byId->order_id}}</span>
                    <span class="me-3">{{ $order_byId->created_at}}</span>
                    <span class="badge rounded-pill bg-info">{{ $order_byId->order_status}}</span>
                </div>

              </div>
              <table class="table table-borderless" >
                <th></th>
                <tbody>
                  <tr>
                    <td>
                      <div class="d-flex mb-2">
                        <div class="flex-shrink-0">
                          <img src="https://www.bootdey.com/image/280x280/87CEFA/000000"
                          alt="" width="35" class="img-fluid">
                        </div>
                        <div class="flex-lg-grow-1 ms-3">
                          <h6 class="small mb-0"><a href="#" class="text-reset">
                            {{ $order_byId->product_name }}</a></h6>
                        </div>
                      </div>
                    </td>
                    <td>{{ $order_byId->product_quantity }}</td>
                    <td class="text-end">{{ $order_byId->product_price }}</td>
                  </tr>

                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="2">Thành tiền</td>
                    <td class="text-end">{{ number_format($order_byId->order_total )}}</td>
                  </tr>
                  <tr>
                    <td colspan="2">Phí vận chuyển</td>
                    <td class="text-end">0</td>
                  </tr>
                  <tr class="fw-bold">
                    <td colspan="2">Tổng tiền</td>
                    <td class="text-end">{{ number_format($order_byId->order_total )}}</td>
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
                    <strong>{{ $order_byId->customer_name}}</strong><br>
                    {{ $order_byId->customer_address}}<br>
                    <abbr title="Phone">P:</abbr> {{ $order_byId->customer_phone}}
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
              <p>{{ $order_byId->ship_note}}</p>
            </div>
          </div>
          <div class="card mb-4">
            <!-- Shipping information -->
            <div class="card-body">
              <h3 class="h6">Thông tin vận chuyển</h3>
              <address>
                <strong>{{ $order_byId->ship_name}}</strong><br>
                {{ $order_byId->ship_address}}<br>
                <abbr title="Phone">P:</abbr> {{ $order_byId->ship_phone}}
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
