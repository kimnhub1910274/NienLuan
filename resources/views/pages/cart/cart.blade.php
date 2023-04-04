@extends('test')
@section('test')
<title>Giỏ hàng</title>
<div class="container" style="margin-bottom: 30px;">
        <div class="card">
            <div class="card-header">
                <h4>Danh sách sản phẩm</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>STT</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>

                            <tr>
                                <td><img src="" alt="" width="200px"></td>
                                <td></td>
                                <td>
                                    <form action="">
                                        <input type="hidden" name="action" value="update">
                                        <input type="hidden" name="id" value="">
                                        <input style="width:50px;" type="text" name="quantity" value="">
                                        <button type="submit" class="btt">Cập nhật</button>
                                    </form>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                        <tr>
                            <td><b>TỔNG TIỀN:</b></td>
                            <td colspan="6" class="text-center "><b> VNĐ</b></td>
                        </tr>
                        <!-- <button class="btn btn-success" name="sb" type="submit">Đặt hàng</button> -->
                    </tbody>
                </table>
                <h5 ><a href="" class="btn btn-success" style="float:right ;"><b>ĐẶT HÀNG</b></a></h5>
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
