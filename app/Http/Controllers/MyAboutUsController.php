<?php

namespace App\Http\Controllers;

use App\MyAboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;
use DB;
use Session;

class MyAboutUsController extends Controller
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
        return view("admin.our_about");
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = array();
        $data['about_tile'] = $request['about_tile'];
        $data['about_details'] = $request['about_details'];
        $data['about_status'] = $request['about_status'];

        $image_one=$request['about_image'];

        if ($image_one){
            $ran_one=str_random(5);
            $ext_one=strtolower($image_one->getClientOriginalExtension());
            $one_full_name=$ran_one.'AboutImage.'.$ext_one;
            $upload_path_one="allImages/about/";
            $image_url_one=$upload_path_one.$one_full_name;
            $success_one=$image_one->move($upload_path_one,$one_full_name);

            $data['about_image']=$image_url_one;
            $result = DB::table('my_about_uses')->insert($data);
            return json_encode(array(
                "statusCode"=>200,
                "statusMsg"=>"About Added Successfully"
            ));
        }else{
            $data['about_image']="No Image";
            $result = DB::table('my_about_uses')->insert($data);
            return json_encode(array(
                "statusCode"=>200,
                "statusMsg"=>"About Added Successfully!! Without Image"
            ));
        }
    }

    public function show($id)
    {
        $singleEducation = DB::table('my_about_uses')
            ->where('about_id', $id)
            ->get();
        return $singleEducation;
    }

    public function edit(MyAboutUs $workMainMenu)
    {
        //
    }

    public function update(Request $request, MyAboutUs $workMainMenu)
    {
        //
    }

    public function destroy($id)
    {
        DB::table('my_about_uses')
            ->where('about_id', $id)
            ->delete();
        return json_encode(array(
            "statusCode"=>200
        ));
    }

    public function getAllOurAbout()
    {
        $this->AuthCheck();
        $contactInfo = DB::table('my_about_uses')->get();

        return DataTables::of($contactInfo)
            ->addColumn('action', function ($contactInfo){
                $buttton='
                <a onclick="showSlidereData('.$contactInfo->about_id.')"  class="btn btn-success btn-sm" >Show</a>
                <a onclick="deleteSliderData('.$contactInfo->about_id.')" class="btn btn-danger btn-sm"  >Delete</a>';
                return $buttton;})
            ->rawColumns(['action'])
            ->toJson();

      /* print "<pre>";
        print_r($contactInfo);
        print "<pre>";
        exit();*/

    }
}
