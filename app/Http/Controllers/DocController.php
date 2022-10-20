<?php

namespace App\Http\Controllers;

use App\Models\Doc;
use App\Models\Student;
use App\Http\Requests\StoreDocRequest;
use App\Http\Requests\UpdateDocRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;

class DocController extends Controller
{

    function __construct()
    {  
 
      $this->middleware('permission:عرض ملف', ['only' => ['index']]);
      $this->middleware('permission:حذف ملف', ['only' => ['destroy']]);
 
     }
     
    
    public function index()
    {

        if (Auth::user()->user_type == 'admin')
        {
            $docs =  Doc::all();
        }
        else{
            $docs =  Doc::where('user_id', Auth::user()->id)->get();
        }

        return view ('docs.index',compact('docs'));

    }

    public function create()
    {
        //
    }

    public function store(StoreDocRequest $request)
    {
        //
    }

    public function show(Doc $doc)
    {
        //
    }

    public function edit(Doc $doc)
    {
        //
    }

    public function update(UpdateDocRequest $request, Doc $doc)
    {
        //
    }

    public function destroy(Request $request)
    {
       

        $doc = Doc::where('id', $request->doc_id)->first();
        $doc->delete();
        $students = Student::where('doc_id', $request->doc_id)->get();
        foreach($students as $student)
                {
                    $student->delete();
                } 
        return redirect('/docs');

    }
    public function get_file($id)
    { 
        $doc = Doc::findOrFail($id);
        $contents= Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($doc->name);
        return response()->download( $contents);
    }



}
