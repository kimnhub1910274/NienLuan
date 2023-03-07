@extends('admin_dashboard')
@section('admin_content')

<div class="container-fluid">
    <h3>DANH SÁCH DANH MỤC SẢN PHẨM</h3>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên danh mục</th>
            <th scope="col">Hiển thị</th>
            {{-- <th scope="col">Ngày thêm</th> --}}
            <th scope="col">Sửa</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $list_category_product as $key => $cate_pro)
                <tr>
                    <th scope="row"></th>
                    <td>{{$cate_pro->cate_name}}</td>
                    <td>
                        <?php
                            if($cate_pro->cate_status == 0){
                        ?>
                        <a href="{{URL::to('/on-cate/'.$cate_pro->cate_id)}}">
                            <span>
                                <i class="fa-regular fa-eye-slash red"></i>
                            </span>
                        </a>
                        <?php
                            }else{
                        ?>
                            <a href="{{URL::to('/off-cate/'.$cate_pro->cate_id)}}">
                                <span>
                                    <i class="fa-regular fa-eye "></i>
                                </span>
                            </a>
                            <?php
                            }

                        ?>
                        <style>
                            .red{
                                color: red
                            }
                        </style>
                    </td>
                    <td>
                        <i class="fa-solid fa-pen-to-square"></i>
                        <i class="fa-solid fa-trash"></i>
                </tr>
            @endforeach

        </tbody>
      </table>
</div>

@endsection
