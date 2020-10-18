<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Exports\CityExport;
use App\Imports\ArticaleImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CityImport;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //to add country
    public function addcity(Request $request)
    {

        if($request->isMethod('post'))
        {
            $this->validate($request,[
                'name_en'=>'required',
                'name_ar'=>'required',
                'country_id'=>'required',
            ]);
            $newcity=new City();
            $newcity->name_ar = $request->input('name_ar');
            $newcity->name_en = $request->input('name_en');
            $newcity->country_id = $request->input('country_id');
            $newcity->save();
            return redirect('/city/show')->with('message', 'Add city Is Done!');
        }
        else
        {
            $country = DB::table("countries")->pluck("name_en","id");
            return view('city_view.add_city',compact('country'));
        }
    }
    //to show city
    public function showcity()
    {
        $city = City::with('country')->get();
        return view('city_view.show_city',compact('city'));
    }
    //to edit city
    public function editcity(Request $request,$id)
    {
        if ($request->isMethod('post'))
        {
            $this->validate($request, [
                'name_ar' => 'required',
                'name_en' => 'required',
                'country_id'=>'required',
            ]);
            $newcity = City::find($id);
            $newcity->name_en = $request->input('name_en');
            $newcity->name_ar = $request->input('name_ar');
            $newcity->country_id = $request->input('country_id');
            $newcity->save();
            return redirect()->back()->with('message', 'Edit city Is Done!');
        }
        else
        {
            $city = City::find($id);
            $country = DB::table("countries")->pluck("name_en","id");
            return view('city_view.edit_city',compact('country','city'));
        }
    }
    //to delete city
    public function deletecity($id)
    {
        $city=City::find($id);
        $city->delete();
        return redirect()->back()->with('message', 'Delete city Is Done!');
    }
    public function importExportView()
    {
        return view('/city/import');
    }
    public function export()
    {
        return Excel::download(new CityExport, time().' '.'city.xlsx');
    }
    public function import(Request $request)
    {

        if($request->isMethod('post'))
        {
            $this->validate($request, [
                'file' => 'required|mimes:xlsx',
            ]);
            Excel::import(new CityImport, request()->file('file'));
            return redirect('/city/show')->with('message', 'Add city Is Done!');
        }
        else
        {
            return view('city_view.import_city');
        }
    }
}
