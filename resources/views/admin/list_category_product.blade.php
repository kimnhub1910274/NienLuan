@extends('admin_dashboard')
@section('admin_content')

<div class="container-fluid card">
    &nbsp;
    <h3>DANH SÁCH DANH MỤC </h3>
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
            <th scope="col">Tên danh mục</th>
            <th>Mô tả</th>
            <th scope="col">Hiển thị</th>
            {{-- <th scope="col">Ngày thêm</th> --}}
            <th scope="col">Sửa</th>
          </tr>
        </thead>
        <tbody>

            @foreach ( $list_category_product as $key => $cate_pro)
                <tr>
                    <th scope="" ><?php echo $key+1;?></th>
                    <td>{{$cate_pro->cate_name}}</td>
                    <td>{{$cate_pro->cate_decr}}</td>
                    <td>
                        <?php
                            if($cate_pro->cate_status == 0){
                        ?>
                        <a href="{{URL::to('/off-cate/'.$cate_pro->cate_id)}}">
                            <span>
                                <i class="fa-regular fa-eye-slash red"></i>
                            </span>
                        </a>
                        <?php
                            }else{
                        ?>
                            <a href="{{URL::to('/on-cate/'.$cate_pro->cate_id)}}">
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
                            a{
                                text-decoration: none
                            }
                        </style>
                    </td>
                    <td>
                        <a href="{{URL::to('/edit-category-product/'.$cate_pro->cate_id)}}">
                            <i class="fa-solid fa-pen-to-square"></i>

                        </a>
                        <a onclick="return confirm
                        ('Bạn có chắc chắn muốn xóa danh mục {{$cate_pro->cate_name}} ?')
                        "href="{{URL::to('/delete-category-product/'.$cate_pro->cate_id)}}">
                            <i class="fa-solid fa-trash red"></i>

                        </a>
                    </td>
                </tr>
            @endforeach

        </tbody>
      </table>
</div>

@endsection
