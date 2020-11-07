<?php

namespace App\Http\Controllers;

use App\Admin;
use App\WebSiteSlider;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;

class WebSiteSliderController extends Controller
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

        return view("admin.my_slider");
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = array();
        $data['slider_title'] = $request['slider_title'];
        $data['slider_details'] = $request['slider_details'];
        $data['slider_status'] = $request['slider_status'];

        $image_one=$request['slider_image'];

        if ($image_one){
            $ran_one=str_random(5);
            $ext_one=strtolower($image_one->getClientOriginalExtension());
            $one_full_name=$ran_one.'slider.'.$ext_one;
            $upload_path_one="allImages/slider/";
            $image_url_one=$upload_path_one.$one_full_name;
            $success_one=$image_one->move($upload_path_one,$one_full_name);

            $data['slider_image']=$image_url_one;
            $result = DB::table('web_site_sliders')->insert($data);
            return json_encode(array(
                "statusCode"=>200,
                "statusMsg"=>"Slider Image Added Successfully"
            ));
        }else{
            $data['slider_image']="No Image";
            $result = DB::table('my_portfolios')->insert($data);
            return json_encode(array(
                "statusCode"=>200,
                "statusMsg"=>"Slider Image Successfully!! Without Image"
            ));
        }
    }

    public function show($id)
    {
        $singleEducation = DB::table('web_site_sliders')
            ->where('slider_id', $id)
            ->get();
        return $singleEducation;
    }

    public function edit(WebSiteSlider $webSiteSlider)
    {
        //
    }


    public function update(Request $request, WebSiteSlider $webSiteSlider)
    {
        //
    }

    public function destroy($id)
    {
        DB::table('web_site_sliders')
            ->where('slider_id', $id)
            ->delete();
        return json_encode(array(
            "statusCode"=>200
        ));
    }

    public function getAllMYSlider()
    {
        $this->AuthCheck();

        $contactInfo = WebSiteSlider::all();

        return DataTables::of($contactInfo)
            ->addColumn('action', function ($contactInfo){
                $buttton='
                <a onclick="showSlidereData('.$contactInfo->slider_id.')"  class="btn btn-success btn-sm" >Show</a>
                <a onclick="deleteSliderData('.$contactInfo->slider_id.')" class="btn btn-danger btn-sm"  >Delete</a>';
                return $buttton;})
            ->rawColumns(['action'])
            ->toJson();

        /*print "<pre>";
        print_r($contactInfo);
        print "<pre>";
        exit();*/

    }
}
