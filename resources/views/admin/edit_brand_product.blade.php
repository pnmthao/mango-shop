@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">Cập nhật nhà cung cấp</header>
            <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
            ?>
            <div class="panel-body">
                @foreach($edit_brand_product as $key => $edit_value)
                    <div class="position-center">
                        <form role="form" action="{{route('update-brand-product',$edit_value->id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="brand_product_name">Tên nhà cung cấp</label>
                                <input type="text" class="form-control" value="{{$edit_value->name}}" name="brand_product_name" id="brand_product_name" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="brand_product_image">Hình ảnh</label>
                                <input type="file" class="form-control" name="brand_product_image" id="brand_product_image">
                                <img src="{{asset('public/uploads/brand/'.$edit_value->image)}}" height="100" width="100"></<img>
                            </div>
                            <div class="form-group">
                                <label for="brand_product_description">Mô tả nhà cung cấp</label>
                                <textarea style="resize:none" rows="8" class="form-control" id="brand_product_description" name="brand_product_description">{{$edit_value->description}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-info" name="edit_brand_product">Cập nhật nhà cung cấp</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection