<?php

namespace App\Http\Controllers;

use App\AdminUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;
use DB;
use Session;

class AdminUsersController extends Controller
{
    public function AuthCheck(){
        $admin_id=Session::get('admin_email');
        if ($admin_id){
            return;
        }else{
            Session::put('error_msg','Session Has Expired !');
            return Redirect::to('/AdminLogin')->send();
        }
    }

    public function index()
    {
        $this->AuthCheck();

        return view("admin.admin_user_page");
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = array();
        $data['admin_name'] = $request['admin_name'];
        $data['admin_phone'] = $request['admin_phone'];
        $data['admin_email'] = $request['admin_email'];
        $data['admin_password'] = md5($request['admin_password']);
        $data['admin_address'] = $request['admin_address'];
        $data['admin_status'] = $request['admin_status'];

        $result = DB::table('admin_users')->insert($data);
        return json_encode(array(
            "statusCode"=>200,
            "statusMsg"=>"Working Menu Added Successfully"
        ));

    }

    public function show($id)
    {
        $singleEducation = DB::table('admin_users')
            ->where('id', $id)
            ->get();
        return $singleEducation;
    }

    public function edit(AdminUsers $workMainMenu)
    {
        //
    }

    public function update(Request $request, AdminUsers $workMainMenu)
    {
        //
    }

    public function destroy($id)
    {
        DB::table('admin_users')
            ->where('id', $id)
            ->delete();
        return json_encode(array(
            "statusCode"=>200
        ));
    }

    public function getAllAdminUsers()
    {
        $this->AuthCheck();

        $contactInfo = AdminUsers::all();

        return DataTables::of($contactInfo)
            ->addColumn('action', function ($contactInfo){
                $buttton='
                <a onclick="showSlidereData('.$contactInfo->id.')"  class="btn btn-success btn-sm" >Show</a>
                <a onclick="deleteSliderData('.$contactInfo->id.')" class="btn btn-danger btn-sm"  >Delete</a>';
                return $buttton;})
            ->rawColumns(['action'])
            ->toJson();

        /*print "<pre>";
        print_r($contactInfo);
        print "<pre>";
        exit();*/

    }


    public function useLogin(Request $request){
        $admin_email=$request->userName;
        $admin_password=md5($request->userPassword);
        $result=DB::table('admin_users')
            ->where('admin_email',$admin_email)
            ->where('admin_password',$admin_password)
            ->first();

        if ($result){
            Session::put('admin_email',$result->admin_name);
            Session::put('id',$result->id);
            return Redirect::to('/AdminHome');
        }else{
            Session::put('error_msg','User Name Password Is Invalid !');
            return Redirect::to('/AdminLogin');
        }
    }



    public function userLogOut(){
        Session::flush();
        return Redirect::to('/AdminLogin');
    }

}
