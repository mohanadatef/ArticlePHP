<?php

namespace App\Http\Controllers;

use App\City;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class MemberController extends Controller
{
    //to middleware
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('auth');
    }
    //to edit member
    public function editmember(Request $request,$id)
    {
        if(Auth::user()->id != $id)
        {
            if ($request->isMethod('post'))
            {
                if ($request->image == null)
                {
                    $this->validate($request, [
                        'name' => 'required|string|max:255',
                        'code' => 'required|string',
                        'email' => 'required|string|email|max:255',
                        'country_id' => 'required',
                        'city_id' => 'required',
                    ]);
                }
                else
                {
                    $this->validate($request, [
                        'name' => 'required|string|max:255',
                        'code' => 'required|string',
                        'email' => 'required|string|email|max:255',
                        'image' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
                        'country_id' => 'required',
                        'city_id' => 'required',
                    ]);
                }
                $newmember = User::find($id);
                $newmember->name = $request->input('name');
                $newmember->code = $request->input('code');
                $newmember->email = $request->input('email');
                $newmember->country_id = $request->input('country_id');
                $newmember->city_id = $request->input('city_id');
                if ($request->image != null)
                {
                    $imageName = time().'.'.Request()->image->getClientOriginalExtension();
                    Request()->image->move(public_path('profiles'), $imageName);
                    $newmember-> image =($imageName);
                    $newmember->save();
                    return redirect()->back()->with('message', 'Edit member Is Done!');
                }
                else
                {
                    $newmember->save();
                    return redirect()->back()->with('message', 'Edit member Is Done!');
                }
            }
            else
            {
                $member = User::find($id);
                $country = DB::table("countries")->pluck("name_en","id");
                return view('member_view.edit',compact('country','member'));
            }
        }
        else
        {
            return redirect()->action('MemberController@showmember');
        }
    }
    //to get city
    public function getStateList(Request $request)
    {
        $cities = DB::table("cities")
            ->where("country_id",$request->country_id)
            ->pluck("name_en","id");
        return response()->json($cities);
    }
    //to delete member
    public function deletemember($id)
    {
        if(Auth::user()->id != $id)
        {
            $member=User::find($id);
            $member->delete();
            return redirect()->back()->with('message', 'Delete member Is Done!');
        }
        else
        {
            return redirect()->action('MemberController@showmember');
        }
    }
    //to add member
    public function addmember(Request $request)
    {
        if($request->isMethod('post'))
        {
            if ($request->image == null)
            {
                $this->validate($request, [
                    'name' => 'required|string|max:255',
                    'code' => 'required|string',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:6|confirmed',
                    'image' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
                    'country_id' => 'required',
                    'city_id' => 'required',
                ]);
            }
            else
                {
                    $this->validate($request, [
                        'name' => 'required|string|max:255',
                        'code' => 'required|string',
                        'email' => 'required|string|email|max:255|unique:users',
                        'password' => 'required|string|min:6|confirmed',
                        'country_id' => 'required',
                        'city_id' => 'required',
                    ]);
                }
            $newmember = new User();
            $newmember->name = $request->input('name');
            $newmember->code = $request->input('code');
            $newmember->email = $request->input('email');
            $newmember->password = Hash::make($request->input('password'));
            $newmember->country_id = $request->input('country_id');
            $newmember->city_id = $request->input('city_id');
            if ($request->image != null)
            {
                $imageName = time() . '.' . Request()->image->getClientOriginalExtension();
                Request()->image->move(public_path('profiles'), $imageName);
                $newmember->image = ($imageName);
                $newmember->save();
                return redirect('/member/add')->with('message', 'Add member Is Done!');
            }
            else
            {
                $newmember->save();
                return redirect('/member/add')->with('message', 'Add member Is Done!');
            }
        }
        else
        {
            $country = DB::table("countries")->pluck("name_en","id");
            return view('member_view.add',compact('country'));
        }
    }
    //to show member
    public function showmember()
    {
        $member=User::with('country')->get();
        return view('member_view.show',compact('member'));
    }
    //to import Export View member
    public function importExportView()
    {
        return view('/member/import');
    }
    //to  Export member
    public function export()
    {
        return Excel::download(new UsersExport, time().' '.'users.xlsx');
    }
    //to import  member
    public function import(Request $request)
    {
        if($request->isMethod('post'))
        {
            $this->validate($request, [
                'file' => 'required|mimes:xlsx,',
            ]);
            Excel::import(new UsersImport, request()->file('file'));
            return redirect('/member/show')->with('message', 'Add member Is Done!');
        }
        else
        {
            return view('member_view.import_member');
        }
    }
    //to reset password member
    public function resetpasswordmember(Request $request,$id)
    {
        if(Auth::user()->id != $id)
        {
            if ($request->isMethod('post'))
            {
                    $this->validate($request, [
                        'password' => 'required|string|min:6|confirmed',
                    ]);
                $newmember = User::find($id);
                $newmember->password = Hash::make($request->input('password'));
                $newmember->save();
                return redirect('/member/show')->with('message', 'reset password member Is Done!');
            }
            else
            {
                $member = User::find($id);
                return view('member_view.reset_password',compact('member'));
            }
        }
        else
        {
            return redirect()->action('MemberController@showmember');
        }
    }
}
