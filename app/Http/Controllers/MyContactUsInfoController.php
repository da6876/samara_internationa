<?php

namespace App\Http\Controllers;

use App\MyContactUsInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;
use DB;
use Session;
class MyContactUsInfoController extends Controller
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
        $data['contact_name'] = $request['contact_name'];
        $data['contact_email'] = $request['contact_email'];
        $data['contact_phone'] = $request['contact_phone'];
        $data['contact_subject'] = md5($request['contact_subject']);
        $data['contact_msg'] = $request['contact_msg'];
        $data['admin_status'] = "A";

        $result = DB::table('my_contact_us_infos')->insert($data);
        return json_encode(array(
            "statusCode"=>200,
            "statusMsg"=>"Working Menu Added Successfully"
        ));

    }

    public function show($id)
    {
        $singleEducation = DB::table('my_contact_us_infos')
            ->where('contact_id', $id)
            ->get();
        return $singleEducation;
    }

    public function edit(MyContactUsInfo $workMainMenu)
    {
        //
    }

    public function update(Request $request, MyContactUsInfo $workMainMenu)
    {
        //
    }

    public function destroy($id)
    {
        DB::table('my_contact_us_infos')
            ->where('contact_id', $id)
            ->delete();
        return json_encode(array(
            "statusCode"=>200
        ));
    }

    public function getAllMyContact()
    {
        $this->AuthCheck();

        $contactInfo = MyContactUsInfo::all();

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
}
