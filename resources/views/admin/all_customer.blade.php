@extends('admin-layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê tài khoản khách hàng
    </div>
    <div class="row w3-res-tb">
      
      <div class="col-sm-3">
        <div class="input-group">
        <form action="{{URL::to('/tim-kiem-cus')}}" method="POST">
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
            <th>Tên Tài khoản </th>
            <th>Tài khoản </th>
            <th>SĐT</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_customer as $key => $cus)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $cus->customer_name }}</td>
            <td>{{ $cus->customer_email }}</td>
            <td>{{ $cus->customer_phone }}</td>
            
            <td>
              
              <a onclick="return confirm('bạn chắc chắn muốn xoá danh mục này ko?')" href="{{URL::to('/delete-customer/'.$cus->customer_id)}}" class="active styling-edit" ui-toggle-class="">
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