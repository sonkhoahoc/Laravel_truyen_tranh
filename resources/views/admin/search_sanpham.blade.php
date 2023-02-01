@extends('admin-layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê truyện
    </div>
    <div class="row w3-res-tb">
      
      <div class="col-sm-3">
        <div class="input-group">
        <form action="{{URL::to('/tim-kiem')}}" method="POST">
			{{ csrf_field() }}
          <input type="text" name="keywords_submit" class="input-sm form-control" placeholder="Search">
          <input type="submit" class="input-sm" style="background: #6666" value="Tìm kiếm">
          
        </form>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <?php
      $message=Session::get('message');
      if($message){
          echo '<span class="text-alert">'.$message.'</span>';
          Session::put('message',null);
      }
      ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên truyện</th>
            <th>giá</th>
            <th>hình ảnh truyện</th>
            <th>Loại</th>
            <th>tác giả</th>
            <th>NXB</th>
            
            <th>năm xuất bản</th>
            <th>Hiển thị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($search_product as $key => $pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $pro->sanpham_name }}</td>
            <td>{{ $pro->sanpham_price }}</td>
            <td><img src="public/upload/product/{{ $pro->sanpham_image }}" height="100" width="100" alt=""></td>
            <td>{{ $pro->category_name }}</td>
            <td>{{ $pro->author_name }}</td>
            <td>{{ $pro->pbcompany_name }}</td>
            <td>{{ $pro->sanpham_pbyear }}</td>
            <td><span class="text-ellipsis">
                <?php
                if($pro->sanpham_status==0){
                ?>
                <a href="{{URL::to('/unactive-product/'.$pro->sanpham_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                <?php
                }else{
                ?>
                <a href="{{URL::to('/active-product/'.$pro->sanpham_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                <?php
                }
                ?>
            </span></td>
            <td>
              <a href="{{URL::to('/edit-product/'.$pro->sanpham_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('bạn chắc chắn muốn xoá sản phẩm này ko?')" href="{{URL::to('/delete-product/'.$pro->sanpham_id)}}" class="active styling-edit" ui-toggle-class="">
              <i class="fa fa-times text-danger text"></i>
            </td>
          </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@stop