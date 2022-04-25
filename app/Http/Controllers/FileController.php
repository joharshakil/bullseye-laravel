<?php

namespace BullsEye\Http\Controllers;

use BullsEye\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        return view('file.add');
    }

    public function view()
{
    if( Auth::id()==2)
    {
        $docs = DB::table('uploads')
            ->Join('files', 'uploads.file_id', '=', 'files.id')
            ->Join('users', 'uploads.user_id', '=', 'users.id')
            ->select('files.*', 'uploads.filename','users.name','users.email')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }else
        $docs = DB::table('uploads')
            ->Join('files', 'uploads.file_id', '=', 'files.id')
            ->where('uploads.user_id',Auth::id())
            ->select('files.*', 'uploads.filename')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
//        print_r(DB::getQueryLog());die;
//        print_r($docs);die;
    return view('file.view', compact('docs'));

}


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required:max:255',
            'overview' => 'required',
//            'price' => 'required|numeric'
        ]);

        $input = [
            'title' => $request->get('title'),
            'overview' => $request->get('overview')
        ];
        if(($request->get('type')))
        {
            $input['type']=$request->get('type');
        }
        if(($request->get('em_project')))
        {
            $input['em_project']=$request->get('em_project');
        }
        if(($request->get('gpr_project')))
        {
            $input['gpr_project']=$request->get('gpr_project');
        }
        if(($request->get('cement_project')))
        {
            $input['cement_project']=$request->get('cement_project');
        }
        if(($request->get('pel_project')))
        {
            $input['pel_project'] = $request->get('pel_project');
        }
        //dd($input);
        $data = auth()->user()->files()->create($input);

        Upload::where('id', $request->get('upload_id'))->update(['file_id' => $data->id]);
        return back()->with('success', 'Your file is submitted Successfully');
    }

    public function upload(Request $request)
    {
     /*   dd($request->all());*/
        $uploadedFile = $request->file('file');
        $filename = time().$uploadedFile->getClientOriginalName();

        Storage::disk('local')->putFileAs(
            'public',
            $uploadedFile,
            $filename
        );

        $upload = new Upload();
        $upload->filename = $filename;

      /// $upload->user()->associate(Auth);
        $upload->user_id = Auth::id();
        $upload->save();

        return response()->json([
            'id' => $upload->id
        ]);
    }
}
