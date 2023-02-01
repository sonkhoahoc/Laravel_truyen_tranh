@extends('admin-layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê tác giả
    </div>
    <div class="row w3-res-tb">
      
      <div class="col-sm-3">
        <div class="input-group">
        <form action="{{URL::to('/tim-kiem-au')}}" method="POST">
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
            <th>Tên tác giả</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Ngày sinh</th>
            <th>Mô tả</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_author_product as $key => $author_pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $author_pro->author_name }}</td>
            <td><span class="text-ellipsis">
            {{ $author_pro->author_adress }}
            </span></td>
            <td><span class="text-ellipsis">
            {{ $author_pro->author_sdt }}
            </span></td>
            <td><span class="text-ellipsis">
            {{ $author_pro->author_birthday }}
            </span></td>
            <td><span class="text-ellipsis">
            {{ $author_pro->author_desc }}
            </span></td>
            <td>
              <a href="{{URL::to('/edit-author-product/'.$author_pro->author_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('bạn chắc chắn muốn xoá tác giả này ko?')" href="{{URL::to('/delete-author-product/'.$author_pro->author_id)}}" class="active styling-edit" ui-toggle-class="">
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