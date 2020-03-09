@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm nhà cung cấp
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
                    <form role="form" action="{{route('save-brand-product')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="brand_product_name">Tên nhà cung cấp</label>
                            <input type="text" class="form-control" name="brand_product_name" id="brand_product_name" placeholder="Tên nhà cung cấp">
                        </div>
                        <div class="form-group">
                            <label for="brand_product_description">Mô tả nhà cung cấp</label>
                            <textarea style="resize:none" rows="8" class="form-control" id="brand_product_description" name="brand_product_description" placeholder="Mô tả nhà cung cấp"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="brand_product_image">Hình ảnh</label>
                            <input type="file" class="form-control" name="brand_product_image" id="brand_product_image">
                        </div>
                        <div class="form-group">
                            <label for="brand_product_status">Hiển thị</label>
                            <select name="brand_product_status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info" name="add_brand_product">Thêm nhà cung cấp</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection