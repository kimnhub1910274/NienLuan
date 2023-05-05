@extends('admin_dashboard')
@section('admin_content')

<div class="container-fluid card">
    &nbsp;
    <h3>DANH SÁCH ĐƠN HÀNG </h3>
    <?php
    $message = Session::get('message');
    if($message){
        echo $message;
        Session::pull('message', null);
    }
    ?>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th>Mã đơn hàng</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Ngày đặt</th>
            <th scope="col">Hiển Thị</th>

          </tr>
        </thead>
        <tbody>

            @foreach ( $list_order as $key => $order)
                <tr>
                    <th scope="" ><?php echo $key+1;?></th>
                    <td>{{$order->order_id}}</td>
                    <td>{{number_format($order->order_total)}}</td>
                    <td>{{$order->order_status}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>
                        <a href="{{URL::to('/view-order/'.$order->order_id)}}" style="text-decoration: none">
                            <i class="fa fa-seedling" style="color: black;  "></i>

                        </a>
                        &nbsp;
                        <a onclick="return confirm
                        ('Bạn có chắc chắn muốn xóa đơn hàng của {{$order->customer_name}} ?')
                        "href="{{URL::to('/delete-order/'.$order->order_id)}}">
                            <i class="fa-solid fa-trash" style="color: black;"></i>

                        </a>
                    </td>



                </tr>
            @endforeach

        </tbody>
      </table>
</div>

@endsection
