@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm sản phẩm
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
                    <form role="form" action="{{route('save-product')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="product_name">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="product_name_en">Tên sản phẩm (English)</label>
                            <input type="text" class="form-control" name="product_name_en" id="product_name_en" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="product_unit_price">Giá gốc</label>
                            <input type="text" class="form-control" name="product_unit_price" id="product_unit_price" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="product_promotion_price">Giá khuyến mãi</label>
                            <input type="text" class="form-control" name="product_promotion_price" id="product_promotion_price" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="product_quantity">Số lượng</label>
                            <input type="text" class="form-control" name="product_quantity" id="product_quantity" placeholder="Nhập số lượng">
                        </div>
                        <div class="form-group">
                            <label for="product_image">Hình ảnh</label>
                            <input type="file" class="form-control" name="product_image" id="product_image">
                        </div>                        
                        <div class="form-group">
                            <label for="product_unit">Đơn vị tính</label>
                            <select name="product_unit" class="form-control input-sm m-bot15">
                                @foreach ($unit_product as $key => $unit)
                                    <option value="{{$unit->unit_id}}">{{$unit->unit_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_cate">Danh mục sản phẩm</label>
                            <select name="product_cate" class="form-control input-sm m-bot15">
                                @foreach ($cate_product as $key => $cate)
                                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_brand">Nhà cung cấp</label>
                            <select name="product_brand" class="form-control input-sm m-bot15">
                                @foreach ($brand_product as $key => $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_description">Mô tả sản phẩm</label>
                            <textarea style="resize:none" rows="8" class="form-control" id="product_description" name="product_description" placeholder="Mô tả"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="product_description_en">Mô tả sản phẩm (English)</label>
                            <textarea style="resize:none" rows="8" class="form-control" id="product_description_en" name="product_description_en" placeholder="Mô tả"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="product_status">Hiển thị</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="1">Hiển thị</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>   
                        <button type="submit" class="btn btn-info" name="add_product">Thêm sản phẩm</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection