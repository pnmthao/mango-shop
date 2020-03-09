@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm danh mục sản phẩm
            </header>
            <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
            ?>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{route('save-category-product')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="category_product_name">Tên danh mục sản phẩm</label>
                            <input type="text" class="form-control" name="category_product_name" id="category_product_name" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="category_product_description">Mô tả danh mục</label>
                            <textarea style="resize:none" rows="8" class="form-control" id="category_product_description" name="category_product_description" placeholder="Mô tả danh mục"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category_product_image">Hình ảnh</label>
                            <input type="file" class="form-control" name="category_product_image" id="category_product_image">
                        </div>
                        <div class="form-group">
                            <label for="category_product_status">Hiển thị</label>
                            <select name="category_product_status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info" name="add_category_product">Thêm danh mục</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection