<?php

namespace App\Http\Controllers\Frontend;

use App\Admin;
use App\Models\BloodRequest;
use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use App\Models\BloodGroup;
use App\Models\City;
use App\Models\Division;
use App\Models\PostCode;
use App\Models\QuickPage;
use App\Models\SiteInfo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use NabilAnam\SimpleUpload\SimpleUpload;
use Symfony\Polyfill\Intl\Idn\Info;
use Whoops\Run;

class HomeController extends Controller
{
    public function index()
    {
        $bloodGroups = BloodGroup::get(['id', 'name']);
        $postCodes = PostCode::orderBy('name')->get(['id', 'name']);
        return view('frontend.home',compact('bloodGroups', 'postCodes'));
    }

    public function sendEmail(Request $request)
    {
        $info = SiteInfo::first();
        Mail::to($request->userEmail??'blood@test.com')->send(new \App\Mail\MyTestMail($request->all()));
        return  back();
    }

    public function ourTeam()
    {
        $teams = Admin::all();
        return view('frontend.ourTeam', compact('teams'));
    }
    public function login()
    {
        return view('frontend.login');
    }
    public function  profile($id)
    {
        $user = User::find($id);
        return view('frontend.profile', compact('user'));
    }

    public function aboutUs()
    {
        $aboutus= Aboutus::first();
        return view('frontend.aboutuse', compact('aboutus'));
    }
    public function quickPage($slug)
    {
        $page= QuickPage::whereSlug($slug)->first();
        return view('frontend.quickPage', compact('page'));
    }
    public function registration()
    {
        return view('frontend.registration');
    }

    public function division()
    {
        return Division::orderby('id')->get(['id', 'name']);
    }
    public function city(Request $request)
    {
        return City::where('division_id', $request->id)->get(['id', 'name']);
    }
    public function getPostCode(Request $request)
    {
        return PostCode::where('city_id', $request->id)->get(['id', 'name']);
    }

    public function becomeDonor()
    {
        $divisions = Division::get(['id', 'name']);
        $bloodGroups =BloodGroup::get(['id', 'name']);
        return view('frontend.becomeDonor',compact('divisions', 'bloodGroups'));
    }
    public function bloodRequest()
    {
        $divisions = Division::orderBy('id')->get(['id', 'name']);
        $bloodGroups =BloodGroup::get(['id', 'name']);
        return view('frontend.bloodRequest',compact('divisions', 'bloodGroups'));
    }


    function sendBloodRequest(Request $request)
    {
        // dd($request->all());
        $data=  $request->all();
        $data['user_id']=  auth()->id()??1;
        BloodRequest::create( $data);
        return back()->with('message', 'Send Successfully');
    }

    public function profileSave(Request $request)
    {
        $user = User::whereId(auth()->id())->first();
        $data = $request->except(['_token', 'make_payment']);
        $time = strtotime($request->donatedate);
        $data['nextDate'] = date("Y-m-d", strtotime("+3 month", $time));
        $allUser = User::get(['email']);
        $user->update($data);
        foreach ($allUser as $key => $userData) {
            $sendData = $user;
            $sendData['blood_group'] = BloodGroup::whereId($request->blood_id)->first()->name;
            Mail::to($userData->email??'blood@test.com')->send(new \App\Mail\NotifyMail($sendData));
        }
        return back();
    }


    public function donnerSearch(Request $request)
    {
        $bloodGroups = BloodGroup::get(['id', 'name']);
        $postCodes = PostCode::orderBy('name')->get(['id', 'name']);
        $users= User::query();
        if( $request->postcode_id){
            $users = $users->where('postcode_id', $request->postcode_id);
        }
        if($request->blood_id){
            $users = $users->where('blood_id', $request->blood_id);
        }
        if($request->type ){
            if($request->type != 'All'){
                $users =  $users->where('nextDate', '<=', $request->donate_date);
            }
        }
        $users = $users->paginate(20);

        return view('frontend.search', compact('bloodGroups', 'postCodes', 'users'));
    }
    public function protected()
    {
        return view('frontend.protected');
    }
}
