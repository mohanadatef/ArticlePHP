<?php

namespace App\Http\Controllers;

use App\Articale;
use App\User;
use FontLib\Table\Type\name;
use WebPConvert\WebPConvert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\ArticaleExport;
use App\Imports\ArticaleImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;


class ArticaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //to add articale
    public function addarticale(Request $request)
    {
        if($request->isMethod('post'))
        {
            $this->validate($request,[
                'tittle'=>'required',
                'body'=>'required',
                'image'=> 'required|image',
            ]);
            $newarticale=new Articale();
            $newarticale->tittle = $request->input('tittle');
            $newarticale->body = $request->input('body');
            $imageName = time();
            Request()->image->move(public_path('images'), $imageName);
            WebPConvert::convert(public_path('images/').$imageName, public_path('images/').$imageName.'.webp', []);
            $newarticale->image=$imageName.'.webp';
            unlink(public_path('images/').$imageName);



            $file_src=$request->file('upload_file');
            $is_file_uploaded = Storage::disk('dropbox')->putFileAs('public/'.$request->tittle,$file_src,$file_src->getClientOriginalname());

            $newarticale->test_file =Storage::disk('dropbox')->url($is_file_uploaded);



            $newarticale->user_id =Auth::user()->id;
            $newarticale->save();
            return redirect('/articale/show')->with('message', 'Add articale Is Done!');
        }
        else
        {
            return view('articale_view.add');
        }
    }
    //to show articale
    public function showarticale()
    {
        if(Auth::user()->code==1)
        {
            $articale = Articale::with('User')->get();
            return view('articale_view.show',compact('articale'));
        }
        else if(Auth::user()->code==0)
        {
            $articale=Articale::where('user_id',Auth::user()->id)->get();
            return view('articale_view.show_user',compact('articale'));
        }
    }
    //to edit articale
    public function editarticale(Request $request,$id)
    {
        if ($request->isMethod('post'))
        {
            if ($request->image == null)
            {
                $this->validate($request, [
                    'tittle' => 'required',
                    'body' => 'required',
                ]);
            }
            else
            {
                $this->validate($request, [
                    'tittle' => 'required',
                    'body' => 'required',
                    'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
                ]);
            }
            $newarticale = Articale::find($id);
            $newarticale->tittle = $request->input('tittle');
            $newarticale->body = $request->input('body');
            if ($request->image != null)
            {
                $imageName = time() . '.' . Request()->image->getClientOriginalExtension();
                Request()->image->move(public_path('images'), $imageName);
                $newarticale->image = ($imageName);
                $newarticale->save();
                return redirect()->back()->with('message', 'Edit articale Is Done!');
            }
            else
            {
                $newarticale->save();
                return redirect()->back()->with('message', 'Edit articale Is Done!');
            }
        }
        else
        {
            $articale = Articale::find($id);
            return view('articale_view.edit',compact('articale'));
        }
    }
    //to delete articale
    public function deletearticale($id)
    {
        $articale=Articale::find($id);
        $articale->delete();
        return redirect()->back()->with('message', 'Delete articale Is Done!');
    }
    public function importExportView()
    {
        return view('/articale/import');
    }
    public function export()
    {
        return Excel::download(new ArticaleExport, time().' '.'Articales.xlsx');
    }
    public function import(Request $request)
    {

        if($request->isMethod('post'))
        {
            $this->validate($request, [
                'file' => 'required|mimes:xlsx',
            ]);
            Excel::import(new ArticaleImport, request()->file('file'));
            return redirect('/articale/show')->with('message', 'Add articale Is Done!');
        }
        else
        {
            return view('articale_view.import_articale');
        }
    }

}
