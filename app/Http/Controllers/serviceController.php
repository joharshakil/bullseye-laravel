<?php

namespace BullsEye\Http\Controllers;

use BullsEye\Em_service;
use BullsEye\Gpr_service;
use BullsEye\Cement_service;
use BullsEye\Mail\NewUserbyForm;
use BullsEye\Role;
use BullsEye\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use BullsEye\Invoice;
use BullsEye\Employee;
use BullsEye\Pel;
use BullsEye\Mail\approvalNotification;
use Carbon\Carbon;

class serviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('es');
    }

    public function adminProjects(){}

    public function projects()
    {
        if (Auth::id() == 2) //admin
        {
            $projects = Em_service::orderBy('created_at', 'desc')->paginate(10);
            return view('admin.projects', compact('projects'));
        } else
        {
            $em = Em_service::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10);
            $cement = Cement_service::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10);
            $gpr = Gpr_service::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10);
            $pel = Pel::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10);
            return view('member.projects', compact('em','cement','gpr','pel'));
        }
    }

    public function projectCement()
    {
        if (Auth::id() == 2) //admin
        {
            $projects = Cement_service::orderBy('created_at', 'desc')->paginate(10);
        } else
            $projects = Cement_service::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10);
        return view('member.projects-cement', compact('projects'));
    }

    public function projectGpr()
    {
        if (Auth::id() == 2) //admin
        {
            $projects = Gpr_service::orderBy('created_at', 'desc')->paginate(10);
        } else
            $projects = Gpr_service::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10);
        return view('member.projects-gpr', compact('projects'));
    }

    public function projectPel()
    {
        if (Auth::id() == 2) //admin
        {
            $projects = Pel::orderBy('created_at', 'desc')->paginate(10);
        } else
            $projects = Pel::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10);
        return view('member.project-pel', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    { //  dd($request);
    }

    public function checkuserlogin(){
        if (Auth::check()) {
            return response()->json(array('msg' => Auth::user()->name), 200);
        }
    }

    public function save_service(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $user->id = Auth::id();
        } else {
            $rules = array(
                'email' => 'required|string|email|max:255|unique:users',
            );
            $user = array('email' => $request->input('email'), 'name' => $request->input('name'));
            $validator = Validator::make($user, $rules);
            if ($validator->fails()) {
                $message = 'That email address is already registered. You sure you don\'t have an account?';
                $code = 204;
                return response()->json($message, $code);

            } else {
                $new_user = [
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => bcrypt($request->input('password')),
                ];
                $user = User::create($new_user);
                $new_user['pass'] = $request->input('password');
                $user->roles()->attach(Role::where('name', 'member')->first());
            }
        }
        $service = new Em_service();
        $service->email = $user->email;
        $service->price = $request->input('price');
        $filename =  $this->emservice($user->id,$user->name);
        $service->filename = $filename;
        $service->status = "Unschedule";
        $service->date = date('Y-m-d', strtotime($request->input('date')));
        $service->utility =  base64_encode(serialize($request->input('utility')));
        $service->location = $request->input('location');
        /*     $service->billing_street = $request->input('billing_street');*/
        $service->province = $request->input('province');
        $service->zipcode = $request->input('zipcode');
        $service->city = $request->input('city');
        $service->country = $request->input('country');
        $service->markings = $request->input('markings');
        $service->needReport = $request->input('needReport');
        $service->job_street = $request->input('job_street');
        $service->job_city = $request->input('job_city');
        $service->job_province = $request->input('job_province');
        $service->job_zipcode = $request->input('job_zipcode');
        $service->description = $request->input('description');
        $service->distance = $request->input('distance');
        $service->promocode = $request->input('promocode');
        $service->promocodechecker = $request->input('promocodechecker');
        $service->user_name = $request->input('name');
        $service->newsletter = $request->input('newsletter');
        $service->company_name = $request->input('Companyname');
        $service->office_phone = $request->input('officePhone');
        $service->mobile_phone = $request->input('mobilePhone');
        $service->billing_location = $request->input('billinglocation');
        $service->city = $request->input('city');
        $service->province = $request->input('province');
        //  $service->scan_type = $request->input(' scan_type');
        $service->additional_information = $request->input('additionalinformation');
        $service->cross_Street = $request->input('crossStreet');
        $service->job_site_Contact_Name = $request->input('jobsiteContactNaame');
        $service->jobsite_Contact_Number = $request->input('jobsiteContactNumber');
        $service->user_id = $user->id;
        $path='';
        if($request->hasFile('image')) {
            foreach ($request->file('image') as $key => $image) {
                $validator = Validator::make(['image' => [$key => $image]], [
                    'image.0' => 'required|max:2048|image|mimes:jpg,jpeg,bmp,png|mimetypes:image/jpeg,image/bmp,image/png',
                ]);
                $extension = $image->getClientOriginalExtension();
                $new_filename = uniqid('img_') . uniqid('', true) . time() . '.' . $extension  ;
                $path_tmp =  $image->storeAs('public/emfiles', $new_filename);
                $path .= $path_tmp."||";
            }
            $path = rtrim($path, '||');
            $service->image = $path;
        }


        $service->save();
        //Email to client user
        Mail::to($user->email)->cc('info@bullseyelocting.com')->send(new NewUserbyForm($user));
        $code = 200;
        return response()->json($service, $code);
    }

    public function newUploading()
    {
        if (Auth::id() == 2) //admin
        {
            $em = Em_service::orderBy('created_at', 'desc')->paginate(10);
            $cement = Cement_service::orderBy('created_at', 'desc')->paginate(10);
            $gpr = Gpr_service::orderBy('created_at', 'desc')->paginate(10);
            $pel = Pel::orderBy('created_at','desc')->paginate(10);
            return view('file.view', compact('em','cement','gpr','pel'));
        } else
        {
            $em = Em_service::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10);
            $cement = Cement_service::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10);
            $gpr = Gpr_service::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10);
            $pel = Pel::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10);
            return view('file.view', compact('em','cement','gpr','pel'));
        }
    }
    public function gprform()
    {
        return view('gpr');
    }
    public function pelform()
    {
        return view('pel');
    }
    public function cementform()
    {
        return view('cement');
    }


    public function save_pel_service(Request $request){
        /*  dd($request);*/
        if (Auth::check()) {
            $user = Auth::user();
            $user->id = Auth::id();
        } else {
            $rules = array(
                'email' => 'required|string|email|max:255|unique:users',
            );
            $user = array('email' => $request->input('email'), 'name' => $request->input('name'));

            $validator = Validator::make($user, $rules);
            if ($validator->fails()) {
                $message = 'That email address is already registered. You sure you don\'t have an account?';
                $code = 204;
                return response()->json($message, $code);

            } else {
                $new_user = [
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => bcrypt($request->input('password')),
                ];
                $user = User::create($new_user);
                $new_user['pass'] = $request->input('password');
                $user->roles()
                    ->attach(Role::where('name', 'member')->first());
            }
        }
        $service = new Pel();
        $service->email = $user->email;
        $service->price = $request->input('price');
        $filename =  $this->pelservice($user->id,$user->name);
        $service->filename = $filename;
        $service->status = "Unschedule";
        $service->date = date('Y-m-d', strtotime($request->input('date')));
        $service->utility =  base64_encode(serialize($request->input('utility')));
        $service->locate =  base64_encode(serialize($request->input('located')));
        $service->house =  base64_encode(serialize($request->input('house')));
        $service->location = $request->input('location');
        $service->province = $request->input('province');
        $service->zipcode = $request->input('zipcode');
        $service->city = $request->input('city');
        $service->country = $request->input('country');
        $service->markings = $request->input('markings');
        $service->needReport = $request->input('needReport');
        $service->job_street = $request->input('job_street');
        $service->job_city = $request->input('job_city');
        $service->job_province = $request->input('job_province');
        $service->job_zipcode = $request->input('job_zipcode');
        $service->description = $request->input('description');
        $service->distance = $request->input('distance');
        $service->user_name = $request->input('name');
        /*$service->promocode = $request->input('promocode');*/
        $service->promocodechecker = $request->input('promocodechecker');
        $service->newsletter = $request->input('newsletter');
        $service->company_name = $request->input('Companyname');
        $service->office_phone = $request->input('officePhone');
        $service->mobile_phone = $request->input('mobilePhone');
        $service->billing_location = $request->input('billinglocation');
        $service->city = $request->input('city');
        $service->province = $request->input('province');
        $service->additional_information = $request->input('additionalinformation');
        $service->cross_Street = $request->input('crossStreet');
        $service->job_site_Contact_Name = $request->input('jobsiteContactNaame');
        $service->jobsite_Contact_Number = $request->input('jobsiteContactNumber');
        $service->user_id = $user->id;
        $path='';
        if($request->hasFile('image')) {
            foreach ($request->file('image') as $key => $image) {
                $validator = Validator::make(['image' => [$key => $image]], [
                    'image.0' => 'required|max:2048|image|mimes:jpg,jpeg,bmp,png|mimetypes:image/jpeg,image/bmp,image/png',
                ]);
                $extension = $image->getClientOriginalExtension();
                $new_filename = uniqid('img_') . uniqid('', true) . time() . '.' . $extension  ;
                $path_tmp =  $image->storeAs('public/pelfiles', $new_filename);
                $path .= $path_tmp."||";
            }
            $path = rtrim($path, '||');
            $service->image = $path;
        }


        $service->save();
        //Email to client user
        Mail::to($user->email)->cc('info@bullseyelocting.com')->send(new NewUserbyForm($user));
        $code = 200;
        return response()->json($service, $code);

    }
    public function save_gpr_service(Request $request)
    {

//
        if (Auth::check()) {
            $user = Auth::user();
            $user->id = Auth::id();
        } else {
            $rules = array(
                'email' => 'required|string|email|max:255|unique:users',
            );
            $user = array('email' => $request->input('email'), 'name' => $request->input('name'));
            $validator = Validator::make($user, $rules);
            if ($validator->fails()) {
                $message = 'That email address is already registered. You sure you don\'t have an account?';
                $code = 204;
                return response()->json($message, $code);

            } else {
                $new_user = [
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => bcrypt($request->input('password')),
                ];
                $user = User::create($new_user);
                $new_user['pass'] = $request->input('password');
                $user->roles()
                    ->attach(Role::where('name', 'member')->first());
            }
        }
        $service = new Gpr_service();
        $filename =  $this->gprservice($user->id,$user->name);
        $service->filename = $filename;
        $service->user_id = $user->id;
        $service->email = $user->email;
        $service->status = "Unschedule";
        $service->price = $request->input('price');
        $service->country = $request->input('country');
        $service->marking = $request->input('marking');
        $service->utility_name = $request->input('utility_name');
        $service->location = $request->input('location');
        $service->information  =  base64_encode(serialize($request->input('information')));
        $service->utility  =  base64_encode(serialize($request->input('utility')));
        $service->terrain  =  base64_encode(serialize($request->input('terrain')));
        $service->report  =  base64_encode(serialize($request->input('report')));
        $service->company_name = $request->input('companyname');
        $service->dimension = $request->input('dimension');
        $service->clean = $request->input('clean');
        $service->billing_street = $request->input('billing_street');
        $service->province = $request->input('province');
        $service->zipcode = $request->input('zipcode');
        $service->city = $request->input('city');
        $service->office_phone = $request->input('officePhone');
        $service->mobile_phone = $request->input('mobilePhone');
        $service->job_street = $request->input('job_street');
        /*$service->promocode = $request->input('promocode');*/
        $service->promocodechecker = $request->input('promocodechecker');
        $service->job_province = $request->input('job_province');
        $service->job_zipcode = $request->input('job_zipcode');
        $service->job_city = $request->input('job_city');
        $service->marking = $request->input('markings');
        $service->newsletter = $request->input('newsletter');
        $service->concrete = $request->input('concrete');
        $service->condition = $request->input('condition');
        $service->surface = $request->input('surface');
        $service->drawings = $request->input('drawings');
        $service->about_property = $request->input('about_property');
        $service->scan = $request->input('scan');
        $service->deep = $request->input('deep');
        $service->line_scan = $request->input('line_scan');
        $service->delivery_date = date('Y-m-d', strtotime($request->input('delivery_date')));
        $path='';
        if($request->hasFile('image')) {
            foreach ($request->file('image') as $key => $image) {
                $validator = Validator::make(['image' => [$key => $image]], [
                    'image.0' => 'required|max:2048|image|mimes:jpg,jpeg,bmp,png|mimetypes:image/jpeg,image/bmp,image/png',
                ]);
                // if (!$validator->fails()) {
                $extension = $image->getClientOriginalExtension();
                $new_filename = uniqid('img_') . uniqid('', true) . time() . '.' . $extension  ;
                $path_tmp =  $image->storeAs('public/grpfiles', $new_filename);
                $path .= $path_tmp."||";

                // }
            }
            $path = rtrim($path, '||');
            $service->image = $path;
        }
        $service->save();

        Mail::to($user->email)->cc('info@bullseyelocting.com')->send(new NewUserbyForm($user));
        $code = 200;
        return response()->json($service, $code);
    }

    public function save_cement_service(Request $request)
    {

        if (Auth::check()) {
            $user = Auth::user();
            $user->id = Auth::id();
        } else {
            // $pass = str_random(8);
            $rules = array(
                'email' => 'required|string|email|max:255|unique:users',
            );
            $user = array('email' => $request->input('email'), 'name' => $request->input('name'));

            $validator = Validator::make($user, $rules);
            if ($validator->fails()) {

                $message = 'That email address is already registered. You sure you don\'t have an account?';
                $code = 204;
                return response()->json($message, $code);

            } else {
                $new_user = [
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => bcrypt($request->input('password')),
                ];
                $user = User::create($new_user);
                $new_user['pass'] = $request->input('password');
                $user->roles()
                    ->attach(Role::where('name', 'member')->first());
            }
        }

        $service = new Cement_service();
        $filename =  $this->cementservice($user->id,$user->name);
        $service->filename = $filename;
        $service->user_id = $user->id;
        $service->email = $user->email;
        $service->status = "Unschedule";
        $service->price = $request->input('price');
        $service->country = $request->input('country');
        $service->marking = $request->input('marking');
        $service->item  =  base64_encode(serialize($request->input('item')));
        $service->located  =  base64_encode(serialize($request->input('located')));
        $service->terrain  =  base64_encode(serialize($request->input('terrain')));
        /*$service->item = serialize($request->input('item'));*/
        $service->utility_name = $request->input('utility_name');
        $service->company_name = $request->input('companyname');
        $service->location = $request->input('location');
        $service->scan = $request->input('scan');
        $service->slab = $request->input('slab');
        $service->distance = $request->input('distance');
        $service->billing_street = $request->input('billing_street');
        $service->province = $request->input('province');
        $service->zipcode = $request->input('zipcode');
        $service->city = $request->input('city');
        $service->office_phone = $request->input('officePhone');
        $service->mobile_phone = $request->input('mobilePhone');
        $service->job_street = $request->input('job_street');
        $service->job_province = $request->input('job_province');
        $service->job_zipcode = $request->input('job_zipcode');
        $service->job_city = $request->input('job_city');
        /*$service->promocode = $request->input('promocode');*/
        $service->promocodechecker = $request->input('promocodechecker');
        $service->report  =  base64_encode(serialize($request->input('report')));
        /*  $service->report = serialize($request->input('report'));*/
        $service->fiber = $request->input('fiber');
        $service->condition = $request->input('condition');
        $service->clean = $request->input('clean');
        $service->newsletter = $request->input('newsletter');
        $service->surface = $request->input('surface');
        $service->message = $request->input('message');
        $service->drawings = $request->input('drawings');
        $service->delivery_date = date('Y-m-d', strtotime($request->input('delivery_date')));
        /*       $service->delivery_date = $request->input('delivery_date');*/
        $service->about_property = $request->input('about_property');
        $path='';
        if($request->hasFile('image')) {
            foreach ($request->file('image') as $key => $image) {
                $validator = Validator::make(['image' => [$key => $image]], [
                    'image.0' => 'required|max:2048|image|mimes:jpg,jpeg,bmp,png|mimetypes:image/jpeg,image/bmp,image/png',
                ]);
                // if (!$validator->fails()) {
                $extension = $image->getClientOriginalExtension();
                $new_filename = uniqid('img_') . uniqid('', true) . time() . '.' . $extension  ;
                $path_tmp =  $image->storeAs('public/cementfiles', $new_filename);
                $path .= $path_tmp."||";

                // }
            }
            $path = rtrim($path, '||');

            $service->image = $path;


        }
        $service->save();
        Mail::to($user->email)->cc('info@bullseyelocting.com')->send(new NewUserbyForm($user));
        $code = 200;
        return response()->json($service, $code);

    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $em = Em_service::findOrFail($id);
        $utility = unserialize(base64_decode($em->utility));
        $data = Em_service::where('id', $id)->first();
        $datavalue  = explode("||",$data->image);
        $invoices = Invoice::where('service_id',$id)->where('service_title','em_service')->first();
        if (isset($invoices)) {
            $data->status = $invoices->payment_status;
        }
        $docs = DB::table('uploads')
            ->Join('files', 'uploads.file_id', '=', 'files.id')
            ->where('files.em_project', $id)
            ->select('files.*', 'uploads.filename')
            ->orderBy('created_at', 'desc')
            ->paginate(1000);
        return view('member.es_view', compact('data', 'docs', 'em','invoices','datavalue','utility'));
    }

    public function showCementFormDetail($id)
    {
        //
        $em = Cement_service::findOrFail($id);
        $item = unserialize(base64_decode($em->item));
        $report = unserialize(base64_decode($em->report));
        $utility = unserialize(base64_decode($em->terrain));
        $located = unserialize(base64_decode($em->located));
        $data = Cement_service::where('id', $id)->first();
        $datavalue  = explode("||",$data->image);
        $data = Cement_service::where('id', $id)->first();
        $invoice = Invoice::where('service_id',$id)->where('service_title','cement_service')->first();
        if (isset($invoice)) {
            $data->status = $invoice->payment_status;
        }
        $docs = DB::table('uploads')
            ->Join('files', 'uploads.file_id', '=', 'files.id')
            ->where('files.cement_project', $id)
            ->select('files.*', 'uploads.filename')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('member.cement_view', compact('data', 'docs', 'em','invoice','datavalue','item','report','utility','located'));
    }

    public function showPelForm($id)
    {

        $pel = Pel::findOrFail($id);
        $report = unserialize(base64_decode($pel->house));
        $utility = unserialize(base64_decode($pel->utility));
        $located = unserialize(base64_decode($pel->locate));
        $data = Pel::where('id', $id)->first();
        $datavalue  = explode("||",$data->image);
        $invoice = Invoice::where('service_id',$id)->where('service_title','pel_service')->first();
        if (isset($invoice)) {
            $data->status = $invoice->payment_status;
        }
        $docs = DB::table('uploads')
            ->Join('files', 'uploads.file_id', '=', 'files.id')
            ->where('files.pel_project', $id)
            ->select('files.*', 'uploads.filename')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('member.pel_view', compact('data', 'docs', 'pel','invoice','datavalue','item','report','utility','located'));
    }

    public function emCancel($id)
    {
        $data = Em_service::where('id', $id)->first();
        $invoice = Invoice::where('service_id',$id)->where('service_title','em_service')->first();

        if(isset($invoice)) {
            if ($invoice->payment_status == 'Completed') {
                return redirect()->route('services.es.show',[$data->id])->with('success', 'Your Invoice Is Completed It Can not be cancelled');

            } elseif ($invoice->payment_status == 'pending') {
                $invoice->payment_status = 'cancel';
                $invoice->save();
                return redirect()->route('services.es.show',[$data->id])->with('success', 'Your Invoice Is Successfully  cancelled');

            }else{
                return redirect()->route('services.es.show',[$data->id])->with('success', 'Your Invoice Is already cancelled');

            }
        }else{

            return redirect()->route('services.es.show',[$data->id])->with('success', 'No Invoice Found');
        }
    }

    public function pelCancel($id)
    {

        $data = Pel::where('id', $id)->first();
        $invoice = Invoice::where('service_id',$id)->where('service_title','pel_service')->first();
        if(isset($invoice)) {
            if ($invoice->payment_status == 'Completed') {
                return redirect()->route('services.pel.show',[$data->id])->with('success', 'Your Invoice Is Completed It Can not be cancelled');

            } elseif ($invoice->payment_status == 'pending') {
                $invoice->payment_status = 'cancel';
                $invoice->save();
                return redirect()->route('services.pel.show',[$data->id])->with('success', 'Your Invoice Is Successfully  cancelled');

            }else{
                return redirect()->route('services.pel.show',[$data->id])->with('success', 'Your Invoice Is already cancelled');

            }
        }else{

            return redirect()->route('services.es.show',[$data->id])->with('success', 'No Invoice Found');
        }
    }

    public function cementCancel($id)
    {
        $data = Cement_service::where('id', $id)->first();
        $invoice = Invoice::where('service_id',$id)->where('service_title','cement_service')->first();
        if(isset($invoice)) {
            if ($invoice->payment_status == 'Completed') {
                return redirect()->route('services.cement.show',[$data->id])->with('success', 'Your Invoice Is Completed It Can not be cancelled');

            } elseif ($invoice->payment_status == 'pending') {
                $invoice->payment_status = 'cancel';
                $invoice->save();
                return redirect()->route('services.cement.show',[$data->id])->with('success', 'Your Invoice Is Successfully  cancelled');

            }else{
                return redirect()->route('services.cement.show',[$data->id])->with('success', 'Your Invoice Is already cancelled');

            }
        }else{
            return redirect()->route('services.cement.show',[$data->id])->with('success', 'No Invoice Found');
        }
    }

    public function gprCancel($id)
    {
        $data = Gpr_service::where('id', $id)->first();
        $invoice = Invoice::where('service_id',$id)->where('service_title','gpr_service')->first();
        if(isset($invoice)) {
            if ($invoice->payment_status == 'Completed') {
                return redirect()->route('services.gpr.show',[$data->id])->with('success', 'Your Invoice Is Completed It Can not be cancelled');

            } elseif ($invoice->payment_status == 'pending') {
                $invoice->payment_status = 'cancel';
                $invoice->save();
                return redirect()->route('services.gpr.show',[$data->id])->with('success', 'Your Invoice Is Successfully  cancelled');

            }else{
                return redirect()->route('services.gpr.show',[$data->id])->with('success', 'Your Invoice Is already cancelled');

            }
        }
        else{

            return redirect()->route('services.es.show',[$data->id])->with('success', 'No Invoice Found');
        }
    }
    public function gprservice($userid,$username)
    {
        $filename = "terms-and-condition-".$userid."-".time().".pdf";
        $pdf = \PDF::loadView('admin.gpr_service',['name'=>$username,"date"=>date('m/d/Y')]);
        $pdf->save(storage_path('app/public/'.$filename));
        return $filename;
    }
    public function emservice($userid,$username)
    {
        $filename = "terms-and-condition-".$userid."-".time().".pdf";
        $pdf = \PDF::loadView('admin.em_service',['name'=>$username,"date"=>date('m/d/Y')]);
        $pdf->save(storage_path('app/public/'.$filename));
        return $filename;
    }
    public function cementservice($userid,$username)
    {
        $filename = "terms-and-condition-".$userid."-".time().".pdf";
        //$data = Gpr_service::all();
        $pdf = \PDF::loadView('admin.cement_service',['name'=>$username,"date"=>date('m/d/Y')]);
        $pdf->save(storage_path('app/public/'.$filename));
        return $filename;
        // return view('admin.gpr_service', compact('data'));
    }
    public function pelservice($userid,$username)
    {
        $filename = "terms-and-condition-".$userid."-".time().".pdf";
        $pdf = \PDF::loadView('admin.cement_service',['name'=>$username,"date"=>date('m/d/Y')]);
        $pdf->save(storage_path('app/public/'.$filename));
        return $filename;
    }

    public function showGprFormDetail($id)
    {
        $em = Gpr_service::findOrFail($id);
        $data = Gpr_service::where('id', $id)->first();

        $information = unserialize(base64_decode($em->information));
        $report = unserialize(base64_decode($em->report));
        $terrain = unserialize(base64_decode($em->terrain));
        $utility = unserialize(base64_decode($em->utility));
        $datavalue  = explode("||",$data->image);
        $data = Gpr_service::where('id', $id)->first();
        $invoice = Invoice::where('service_id',$id)->where('service_title','gpr_service')->first();
        if (isset($invoice)) {
            $data->status = $invoice->payment_status;
        }

        $docs = DB::table('uploads')
            ->Join('files', 'uploads.file_id', '=', 'files.id')
            ->where('files.gpr_project', $id)
            ->select('files.*', 'uploads.filename')
            ->orderBy('created_at', 'desc')
            ->paginate(10);


        return view('member.gpr_view', compact('data', 'docs', 'em','invoice','datavalue','information','terrain','report','utility'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function redirection($id)
    {
        $invoice = Invoice::find($id);
        if($invoice->service_title == 'em_service') {
            $service = Em_service::find($invoice->service_id);
        }if($invoice->service_title == 'gpr_service') {
        $service = Gpr_service::find($invoice->service_id);
    }if($invoice->service_title == 'cement_service') {
        $service = Cement_service::find($invoice->service_id);
    }
        $user = User::find($service->user_id);
        $user->delete();

        return redirect('/')->with('status', 'Request cancel');

    }

    public function emDelete($id)
    {
        $user = Em_service::find($id);
        if(isset($user)){
            $user->delete();

        }
        $invoice = Invoice::where('service_id', $id)->where('service_title', 'em_service')->first();
        if(isset($invoice)){
            $invoice->delete();

        }
        return redirect('appointment')->with('status', 'Request Has been Deleted');

    }
    public function pelDelete($id)
    {
        $user = Pel::find($id);
        if(isset($user)){
            $user->delete();

        }
        $invoice = Invoice::where('service_id', $id)->where('service_title', 'pel_service')->first();
        if(isset($invoice)){
            $invoice->delete();

        }
        return redirect('appointment')->with('status', 'Request Has been Deleted');

    }

    public function cementDelete($id)
    {
        $user = Cement_service::find($id);
        if(isset($user)){
            $user->delete();

        }
        $invoice = Invoice::where('service_id', $id)->where('service_title', 'cement_service')->first();
        if(isset($invoice)){
            $invoice->delete();
        }
        return redirect('appointment')->with('status', 'Request Has been Deleted');

    }
    public function gprDelete($id)
    {
        $user = Gpr_service::find($id);
        if(isset($user)){
            $user->delete();

        }
        $invoice = Invoice::where('service_id', $id)->where('service_title', 'gpr_service')->first();
        if(isset($invoice)){
            $invoice->delete();
        }
        return redirect('appointment')->with('status', 'Request Has been Deleted');
    }

    public function get_employee()
    {
        $employee =  Employee::all();
        return view('admin.appointments.employeeview', compact('employee'));
    }
    public function delete_employe(Employee $employee )
    {
        $employee->delete();
        return redirect('view_employee');
    }

    public function editShow($id)
    {
        $data = Em_service::find($id);
        $employee =  Employee::all();

        return view('member.es_edit', compact('data','employee'));
    }

    public function show_employee(Employee $employee)
    {
        return view('admin.appointments.employee_edit',compact('employee'));
    }


    public function editUpdate(Request $request, $id)
    {
        $service = Em_service::findOrFail($id);
        $invoice = Invoice::where('service_id',$id)->where('service_title','em_service')->first();
        if(isset($invoice)) {
            if ($invoice->payment_status == 'cancel') {
                $invoice->payment_status = 'pending';
                $invoice->save();
            }
        }
        if(Auth::id() == 2) {
            $service->status = $request->status;
            $service->employee_id = $request->employee;
            $service->starttime = $request->starttime;
            $service->endtime = $request->endtime;
        }
        $user = array('name' => $service->name , 'email' => $service->email);

        $service->country = $request->country;
        $service->date = $request->date;
        $service->description = $request->description;
        $service->newsletter = $request->newsletter;
        $service->office_phone = $request->office_phone;
        $service->mobile_phone = $request->mobile_phone;
        /* $service->utility = $request->utility;*/
        $service->markings = $request->markings;
        $service->save();

        if (Auth::id() == 2){
            Mail::to($user['email'])->cc('info@bullseyelocting.com')->send(new approvalNotification($user));
            return redirect('appointment');
        }else {
            return redirect('user_projects');
        }
    }

    public function editgprShow($id)
    {
        $data = Gpr_service::find($id);
        $employee =  Employee::all();
        return view('member.gpr_edit', compact('data','employee'));
    }
    public function editpelShow($id)
    {
        $data = Pel::find($id);
        $employee =  Employee::all();
        return view('member.pel_edit', compact('data','employee'));
    }

    public function editpelUpdate(Request $request, $id)
    {
        $service = Pel::findOrFail($id);
        $invoice = Invoice::where('service_id',$id)->where('service_title','pel_service')->first();

        if(isset($invoice)) {
            if ($invoice->payment_status == 'cancel') {
                $invoice->payment_status = 'pending';
                $invoice->save();
            }
        }
        if(Auth::id() == 2) {
            $service->status = $request->status;
            $service->employee_id = $request->employee;
            $service->starttime = $request->starttime;
            $service->endtime = $request->endtime;
        }
        $user = array('name' => $service->name , 'email' => $service->email);
        $service->country = $request->country;
        $service->date = $request->date;
        $service->newsletter = $request->newsletter;
        $service->office_phone = $request->office_phone;
        $service->mobile_phone = $request->mobile_phone;
        /* $service->utility = $request->utility;*/
        /*  $service->markings = $request->markings;*/
        $service->save();
        if (Auth::id() == 2){
            Mail::to($user['email'])->cc('info@bullseyelocting.com')->send(new approvalNotification($user));
            return redirect('appointment');
        }else {
            return redirect('user_projects');
        }
    }
    public function editgprUpdate(Request $request, $id)
    {
        $service = Gpr_service::findOrFail($id);
        $invoice = Invoice::where('service_id',$id)->where('service_title','gpr_service')->first();

        if(isset($invoice)) {
            if ($invoice->payment_status == 'cancel') {
                $invoice->payment_status = 'pending';
                $invoice->save();
            }
        }
        if(Auth::id() == 2) {
            $service->status = $request->status;
            $service->employee_id = $request->employee;
            $service->starttime = $request->starttime;
            $service->endtime = $request->endtime;
        }
        $user = array('name' => $service->name , 'email' => $service->email);

        $service->country = $request->country;
        $service->delivery_date = $request->delivery_date;
        $service->newsletter = $request->newsletter;
        $service->office_phone = $request->office_phone;
        $service->mobile_phone = $request->mobile_phone;
        /*$service->terrain = $request->terrain;*/
        $service->marking = $request->markings;
        $service->save();

        if (Auth::id() == 2){
            Mail::to($user['email'])->cc('info@bullseyelocting.com')->send(new approvalNotification($user));
            return redirect('appointments');
        }else {
            return redirect('user_projects');
        }
    }

    public function editcementShow($id)
    {
        $data = Cement_service::find($id);
        $employee =  Employee::all();
        return view('member.cement_edit', compact('data','employee'));
    }

    public function editcementUpdate(Request $request, $id)
    {
        $service = Cement_service::findOrFail($id);
        $invoice = Invoice::where('service_id',$id)->where('service_title','cement_service')->first();
        if(Auth::id() == 2) {
            $service->status = $request->status;
            $service->employee_id = $request->employee;
            $service->starttime = $request->starttime;
            $service->endtime = $request->endtime;
        }
        if(isset($invoice)) {
            if ($invoice->payment_status == 'cancel') {
                $invoice->payment_status = 'pending';
                $invoice->save();
            }
        }
        $user = array('name' => $service->name , 'email' => $service->email);

        $service->country = $request->country;
        $service->delivery_date = $request->delivery_date;
        $service->newsletter = $request->newsletter;
        $service->office_phone = $request->office_phone;
        $service->mobile_phone = $request->mobile_phone;
        $service->marking = $request->markings;
        $service->save();

        if (Auth::id() == 2){
            return redirect('appointment');
            Mail::to($user['email'])->cc('info@bullseyelocting.com')->send(new approvalNotification($user));
        }else {
            return redirect('user_projects');
        }
    }

    public function employee_update(Request $request , Employee $employee)
    {
        $employee->employee_Name = $request->employee_name;
        $employee->job_type = $request->employee_type;
        $employee->phone_number  =  $request->phone_number;
        $employee->save();
        return redirect('view_employee');
    }
    public function createEmloyee(Request $request)
    {
        $employee = new Employee();
        $employee->employee_Name = $request->employee_name;
        $employee->job_type = $request->employee_type;
        $employee->phone_number  =  $request->phone_number;
        $employee->save();
        return redirect('view_employee');
    }
}