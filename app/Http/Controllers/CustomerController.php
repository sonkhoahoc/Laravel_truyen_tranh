<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CustomerController extends Controller
{
    public function authlogin(){
        $admin_id=session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('Admin')->send();
        }
    }
    public function search(Request $request){
        $keywords = $request->keywords_submit;
        $this->authlogin();
        $search_customer=DB::table('tbl_customer')
        ->where('customer_name','like','%'.$keywords.'%')->get();
        
        $manager_customer=view('admin.search_customer')->with('search_customer',$search_customer);

        return view('admin-layout')->with('admin.search_customer',$manager_customer);
    }
    public function add_customer(){
        $this->authlogin();
        return view('admin.add_customer');
    }
    public function all_customer(){
        $this->authlogin();
        $all_customer=DB::table('tbl_customer')->get();
        $manager_customer=view('admin.all_customer')->with('all_customer',$all_customer);
        return view('admin-layout')->with('admin.all_customer',$manager_customer);
    }
    public function save_customer(Request $request){
        $data=array();
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;
        $data['customer_password']=md5($request->customer_password);
        $data['customer_phone']=$request->customer_phone;

        DB::table('tbl_customer')->insert($data);
        session::put('message','thêm tài khoản khách hàng thành công!');
        return Redirect::to('add-customer');
    }
    public function delete_customer($customer_id){
        DB::table('tbl_customer')->where('customer_id',$customer_id)->delete();
        session::put('message','xoá khách hàng thành công!');
        return Redirect::to('all-customer');
    }

    //end function admin page

}
