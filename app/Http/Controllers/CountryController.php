<?php
namespace App\Http\Controllers;
use App\Country;
use App\Imports\CountryImport;
use Illuminate\Http\Request;
use App\Exports\CountryExport;

use Maatwebsite\Excel\Facades\Excel;
use PHPUnit\Framework\Constraint\Count;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //to add country
    public function addcountry(Request $request)
    {
        if($request->isMethod('post'))
        {
            $this->validate($request,[
                'name_en'=>'required|unique:countries',
                'name_ar'=>'required|unique:countries',
            ]);
            $newcountry=new Country();
            $newcountry->name_ar = $request->input('name_ar');
            $newcountry->name_en = $request->input('name_en');
            $newcountry->save();
            return redirect('/country/show')->with('message', 'Add country Is Done!');
        }
        else
        {
            return view('country_view.add_country');
        }
    }
    //to show country
    public function showcountry()
    {
            $country=Country::all();
            return view('country_view.show_country',compact('country'));
    }
    //to edit country
    public function editcountry(Request $request,$id)
    {
        if ($request->isMethod('post'))
        {
            $this->validate($request, [
                'name_ar' => 'required',
                'name_en' => 'required',
                ]);
            $newcountry = Country::find($id);
            $newcountry->name_en = $request->input('name_en');
            $newcountry->name_ar = $request->input('name_ar');
            $newcountry->save();
            return redirect()->back()->with('message', 'Edit country Is Done!');
        }
        else
        {
            $country = Country::find($id);
            return view('country_view.edit_country', compact('country'));
        }
    }
    //to delete country
    public function deletecountry($id)
    {
        $country=Country::find($id);
        $country->delete();
        return redirect()->back()->with('message', 'Delete country Is Done!');
    }
    public function importExportView()
    {
        return view('/country/import');
    }
    public function export()
    {
        return Excel::download(new CountryExport, time().' '.'country.xlsx');
    }
    public function import(Request $request)
    {
        if($request->isMethod('post'))
        {
            $this->validate($request,['file' => 'required|mimes:xlsx']);
            Excel::import(new CountryImport, request()->file('file'));
            return redirect('/country/show')->with('message','Add country Is Done!');
        }
        else
        {
            return view('country_view.import_country');
        }
    }
}