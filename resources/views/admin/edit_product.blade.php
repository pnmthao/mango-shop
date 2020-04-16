@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"> Cập nhật sản phẩm </header>
            <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
            ?>
            <div class="panel-body">
                <div class="position-center">
                    @foreach($edit_product as $key => $edit_value)
                        <form role="form" action="{{route('update-product',$edit_value->id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="product_name">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="product_name" id="product_name" value="{{$edit_value->name}}">
                            </div>
                            <div class="form-group">
                                <label for="product_name_en">Tên sản phẩm (English)</label>
                                <input type="text" class="form-control" name="product_name_en" id="product_name_en" value="{{$edit_value->name_en}}">
                            </div>
                            <div class="form-group">
                                <label for="product_unit_price">Giá gốc</label>
                                <input type="text" class="form-control" name="product_unit_price" id="product_unit_price" value="{{$edit_value->unit_price}}">
                            </div>
                            <div class="form-group">
                                <label for="product_promotion_price">Giá khuyến mãi</label>
                                <input type="text" class="form-control" name="product_promotion_price" id="product_promotion_price" value="{{$edit_value->promotion_price}}">
                            </div>
                            <div class="form-group">
                                <label for="product_quantity">Số lượng</label>
                                <input type="text" class="form-control" name="product_quantity" id="product_quantity" value="{{$edit_value->quantity}}">
                            </div>
                            <div class="form-group">
                                <label for="product_unit">Đơn vị tính</label>
                                <select name="product_unit" class="form-control input-sm m-bot15">
                                    @foreach ($unit_product as $key => $unit)
                                        @if($unit->unit_id==$edit_value->id_unit)
                                            <option selected value="{{$unit->unit_id}}">{{$unit->unit_name}}</option>
                                        @else
                                            <option value="{{$unit->unit_id}}">{{$unit->unit_name}}</option>
                                        @endif
                                    @endforeach                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product_cate">Danh mục sản phẩm</label>
                                <select name="product_cate" class="form-control input-sm m-bot15">
                                    @foreach ($cate_product as $key => $cate)
                                        @if($cate->id==$edit_value->id_type)
                                            <option selected value="{{$cate->id}}">{{$cate->name}}</option>
                                        @else
                                            <option value="{{$cate->id}}">{{$cate->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product_brand">Nhà cung cấp</label>
                                <select name="product_brand" class="form-control input-sm m-bot15">
                                    @foreach ($brand_product as $key => $brand)
                                        @if($brand->id==$edit_value->id_brand)
                                            <option selected value="{{$brand->id}}">{{$brand->name}}</option>
                                        @else
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product_image">Hình ảnh</label>
                                <input type="file" class="form-control" name="product_image" id="product_image">
                                <img src="{{asset('uploads/product/'.$edit_value->image)}}" height="100" width="100"></<img>
                            </div>
                            <div class="form-group">
                                <label for="product_description">Mô tả sản phẩm</label>
                                <textarea style="resize:none" rows="8" class="form-control" id="product_description" name="product_description">{{$edit_value->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="product_description_en">Mô tả sản phẩm (English)</label>
                                <textarea style="resize:none" rows="8" class="form-control" id="product_description_en" name="product_description_en">{{$edit_value->description_en}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-info" name="edit_product">Cập nhật sản phẩm</button>
                        </form>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>
@endsection