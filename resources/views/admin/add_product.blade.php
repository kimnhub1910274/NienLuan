@extends('admin_dashboard')
@section('admin_content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="">
    <div class="">
        <?php
            $message = Session::get('message');
            if($message){
                echo $message;
                Session::pull('message', null);
            }
        ?>
        <section class="panel">
            <header class="text-center panel-heading">
                <h3>THÊM SẢN PHẨM</h3>
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form action="{{URL::to('/save-product')}}" method="post" enctype='multipart/form-data'>
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label  class="form-label"><b>Tên sản phẩm</b></label>
                            <input type="text" class="form-control" name="product_name" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label  class="form-label"><b>Hình ảnh sản phẩm</b></label>
                            <input type="file" class="form-control" name="product_image" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label  class="form-label"><b>Giá sản phẩm</b></label>
                            <input type="text" class="form-control" name="product_price" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label  class="form-label"><b>Mô tả</b></label>
                            <textarea class="form-control" style="resize:none;" name="product_desc" rows="3"></textarea>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label  class="form-label"><b>Danh mục sản phẩm</b></label>
                                <select class="form-select input-sm" name="product_cate">
                                    @foreach ($cate_product as $key => $cate)
                                        <option selected value="{{ $cate->cate_id }}">{{ $cate->cate_name }}</option>

                                    @endforeach
                            </select>
                            </div>
                            <div class="col mb">
                                <label for=""><b>Hiển thị</b></label>
                                <select class="form-select input-sm" name="product_status">
                                    <option selected value="1">Hiển thị</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <button class="add btn btn-primary" type="submit" name="add-pro">Thêm sản phẩm</button>
<style>
    .mb-3{
        width: 60%;
    }
    .panel-body{
        margin-left: 30%;
    }
    .form-select{
        width: 150px;
    }
    .mb{
        margin-left: -150px;
    }
    .add{
        margin-bottom: 10px

    }

</style>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>


@endsection
