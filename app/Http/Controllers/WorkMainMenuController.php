<?php

namespace App\Http\Controllers;

use App\WebSiteSlider;
use App\WorkMainMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;
use DB;
use Session;
class WorkMainMenuController extends Controller
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

        return view("admin.my_working_menu");
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = array();
        $data['work_main_menu_name'] = $request['work_main_menu_name'];
        $data['work_main_menu_details'] = $request['work_main_menu_details'];
        $data['work_main_menu_type'] = $request['work_main_menu_type'];
        $data['work_main_menu_status'] = $request['work_main_menu_status'];

        $image_one=$request['work_main_menu_image'];

        if ($image_one){
            $ran_one=str_random(5);
            $ext_one=strtolower($image_one->getClientOriginalExtension());
            $one_full_name=$ran_one.'WorkingImage.'.$ext_one;
            $upload_path_one="allImages/work/";
            $image_url_one=$upload_path_one.$one_full_name;
            $success_one=$image_one->move($upload_path_one,$one_full_name);

            $data['work_main_menu_image']=$image_url_one;
            $result = DB::table('work_main_menus')->insert($data);
            return json_encode(array(
                "statusCode"=>200,
                "statusMsg"=>"Working Menu Added Successfully"
            ));
        }else{
            $data['work_main_menu_image']="No Image";
            $result = DB::table('work_main_menus')->insert($data);
            return json_encode(array(
                "statusCode"=>200,
                "statusMsg"=>"Working Menu Added Successfully!! Without Image"
            ));
        }
    }

    public function show($id)
    {
        $singleEducation = DB::table('work_main_menus')
            ->where('work_main_menu_id', $id)
            ->get();
        return $singleEducation;
    }

    public function edit(WorkMainMenu $workMainMenu)
    {
        //
    }

    public function update(Request $request, WorkMainMenu $workMainMenu)
    {
        //
    }

    public function destroy($id)
    {
        DB::table('work_main_menus')
            ->where('work_main_menu_id', $id)
            ->delete();
        return json_encode(array(
            "statusCode"=>200
        ));
    }

    public function getAllMYSlider()
    {
        $this->AuthCheck();

        $contactInfo = WorkMainMenu::all();

        return DataTables::of($contactInfo)
            ->addColumn('action', function ($contactInfo){
                $buttton='
                <a onclick="showSlidereData('.$contactInfo->work_main_menu_id.')"  class="btn btn-success btn-sm" >Show</a>
                <a onclick="deleteSliderData('.$contactInfo->work_main_menu_id.')" class="btn btn-danger btn-sm"  >Delete</a>';
                return $buttton;})
            ->rawColumns(['action'])
            ->toJson();

        /*print "<pre>";
        print_r($contactInfo);
        print "<pre>";
        exit();*/

    }
}
