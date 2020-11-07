<?php

namespace App\Http\Controllers;

use App\OurServices;
use App\WorkMainMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;
use DB;
use Session;
class OurServicesController extends Controller
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

        return view("admin.our_services");
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = array();
        $data['services_name'] = $request['services_name'];
        $data['services_details'] = $request['services_details'];
        $data['services_icon'] = $request['services_icon'];
        $data['services_status'] = $request['services_status'];

        $result = DB::table('our_services')->insert($data);
        return json_encode(array(
            "statusCode"=>200,
            "statusMsg"=>"Working Menu Added Successfully"
        ));

    }

    public function show($id)
    {
        $singleEducation = DB::table('our_services')
            ->where('services_id', $id)
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
        DB::table('our_services')
            ->where('services_id', $id)
            ->delete();
        return json_encode(array(
            "statusCode"=>200
        ));
    }

    public function getAllOurServices()
    {
        $this->AuthCheck();

        $contactInfo = OurServices::all();

        return DataTables::of($contactInfo)
            ->addColumn('action', function ($contactInfo){
                $buttton='
                <a onclick="showSlidereData('.$contactInfo->services_id.')"  class="btn btn-success btn-sm" >Show</a>
                <a onclick="deleteSliderData('.$contactInfo->services_id.')" class="btn btn-danger btn-sm"  >Delete</a>';
                return $buttton;})
            ->rawColumns(['action'])
            ->toJson();

        /*print "<pre>";
        print_r($contactInfo);
        print "<pre>";
        exit();*/

    }
}
