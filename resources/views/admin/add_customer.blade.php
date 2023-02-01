@extends('admin-layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm khách hàng
                        </header>
                        <?php
                            $message=Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">
                            
                            <div class="position-center">
                                <form role="form" action="save-customer" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên khách hàng</label>
                                    <input type="text" name="customer_name" class="form-control" id="exampleInputEmail1" placeholder="Tên khách hàng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" name="customer_email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="text" name="customer_password" class="form-control" id="exampleInputEmail1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" name="customer_phone" class="form-control" id="exampleInputEmail1" placeholder="Số điện thoại">
                                </div>
                                
                                
                                <button type="submit" name="add_customer" class="btn btn-info">Thêm khách hàng</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
            
        </div>

@stop