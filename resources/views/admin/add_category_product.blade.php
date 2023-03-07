@extends('admin_dashboard')
@section('admin_content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="row">
    <div class="col-lg-12">
        <?php
            $message = Session::get('message');
            if($message){
                echo $message;
                Session::pull('message', null);
            }
        ?>
        <section class="panel">
            <header class="panel-heading">
                <h3>THÊM DANH MỤC SẢN PHẨM</h3>

            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form action="{{URL::to('/category-product')}}" method="post" enctype='multipart/form-data'>
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label  class="form-label">Tên danh mục</label>
                            <input type="text" class="form-control" name="cate_pro_name" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Mô tả</label>
                            <textarea class="form-control" style="resize:none;" name="cate_pro_decr" rows="3"></textarea>
                        </div>
                       <div class="mb-3">
                            <select class="form-select input-sm" name="cate_pro_status">
                                <option selected value="1">Hiển thị</option>
                                <option value="0">Ẩn</option>
                          </select>
                       </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Default file input example</label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                        <button class="add btn btn-primary" type="submit" name="add-cate-pro">Thêm danh mục</button>
<style>
    .mb-3{
        width: 60%;
    }
    .panel{
        margin-left: 30%;
    }
    {{-- .add{
        width: 100px;
    } --}}
</style>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>


@endsection
