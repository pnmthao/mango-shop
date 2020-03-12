@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">Cập nhật danh mục sản phẩm</header>
            <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
            ?>
            <div class="panel-body">
                @foreach($edit_category_product as $key => $edit_value)
                    <div class="position-center">
                        <form role="form" action="{{route('update-category-product',$edit_value->id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="category_product_name">Tên danh mục sản phẩm</label>
                                <input type="text" class="form-control" value="{{$edit_value->name}}" name="category_product_name" id="category_product_name" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="category_product_name_en">Tên danh mục sản phẩm (English)</label>
                                <input type="text" class="form-control" value="{{$edit_value->name_en}}" name="category_product_name_en" id="category_product_name_en" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="category_product_image">Hình ảnh</label>
                                <input type="file" class="form-control" name="category_product_image" id="category_product_image">
                                <img src="{{asset('public/uploads/category_product/'.$edit_value->image)}}" height="100" width="100"></<img>
                            </div>
                            <div class="form-group">
                                <label for="category_product_description">Mô tả danh mục</label>
                                <textarea style="resize:none" rows="8" class="form-control" id="category_product_description" name="category_product_description">{{$edit_value->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="category_product_description_en">Mô tả danh mục (English)</label>
                                <textarea style="resize:none" rows="8" class="form-control" id="category_product_description_en" name="category_product_description_en">{{$edit_value->description_en}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-info" name="edit_category_product">Cập nhật danh mục</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection