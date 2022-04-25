<?php

namespace BullsEye\Http\Controllers;

use BullsEye\Comment;
use BullsEye\Em_service;
use BullsEye\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use BullsEye\Invoice;
use BullsEye\Cement_service;
use BullsEye\Gpr_service;
use BullsEye\Upload;
use BullsEye\Pel;





class HomeController extends Controller
{




    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::id() == 2) {
            $invoiceCount = Invoice::count();
            $userCount = User::count();
            $gprServiceCount = Gpr_service::count();
            $emServiceCount = Em_service::count();
            $cementServiceCount = Cement_service::count();
            $pelServiceCount = Pel::count();
            $documentServiceCount = Upload::count();
            $allServiceCount =  $gprServiceCount + $emServiceCount + $cementServiceCount;
            $em = Em_service::orderBy('created_at', 'desc')->get();
            $cement = Cement_service::orderBy('created_at', 'desc')->get();
            $gpr = Gpr_service::orderBy('created_at', 'desc')->get();
            $pel = Pel::orderBy('created_at', 'desc')->get();
            $comments = Comment::latest()->limit(10)->get();

            return view('home', compact('invoiceCount','userCount','emServiceCount','cementServiceCount', 'gprServiceCount' ,'documentServiceCount','em','cement','gpr', 'comments','pelServiceCount','pel'));


        } else{


            $userId = Auth::id();
//            DB::table('users')->where('name', 'John')
            $totalServices = 0;
            $emServiceCount = Em_service::where('user_id', $userId)->count();
            $totalServices += $emServiceCount;
            $gprServiceCount = Gpr_service::where('user_id', $userId)->count();
            $totalServices += $gprServiceCount;
            $pelServiceCount = Pel::where('user_id', $userId)->count();
            $totalServices += $pelServiceCount;
            $cementServiceCount = Cement_service::where('user_id', $userId)->count();
            $totalServices += $cementServiceCount;
            $totalDocument = 0;
            $totalDocument = Upload::where('user_id', $userId)->count();

            /*$total = Upload::count();*/
            /*$service = Em_service::find($userId->user_id);*/

            /*       dd($totalServices);*/




            // $invoiceCount = Invoice::count($userId);

            /*
              $userCount = User::count();
              $gprServiceCount = Gpr_service::count();
              $emServiceCount = Em_service::count();
              $cementServiceCount = Cement_service::count();
              $documentServiceCount = Upload::count();*/
            return view('home', compact('totalServices', 'totalDocument'));

        }


    }

    public function users()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(100);

        return view('admin.users', compact('users'));
    }


    public function getInvoice($id)
    {
        $invoice = Invoice::findOrFail($id);
//        dd($invoice);
//        if(Auth::id() != 2 ) {
        if ($invoice->service_title == 'em_service') {
//            dd('here');
            $service = Em_service::findOrFail($invoice->service_id);
            $user = User::findOrFail($service->user_id);
//                dd($service);
        } elseif ($invoice->service_title == 'gpr_service') {
            $service = Gpr_service::findOrFail($invoice->service_id);
            $user = User::findOrFail($service->user_id);
        } elseif ($invoice->service_title == 'cement_service') {
            $service = Cement_service::findOrFail($invoice->service_id);
            $user = User::findOrFail($service->user_id);
        }elseif ($invoice->service_title == 'pel_service') {
            $service = Pel::findOrFail($invoice->service_id);
            $user = User::findOrFail($service->user_id);
        } else {
            $service = "";
            $user = "";
        }

        return view('admin.invoice', compact('invoice', 'service','user'));
//        }
    }


    public function invoice()
    {



        $invoiceData = Invoice::all();
        $invoices = [];

        foreach($invoiceData as $invoice){

            $inv= [];

            $inv['id'] = $invoice->id;
            $inv['price'] = $invoice->price;
            $inv['service_title'] = $invoice->service_title;
            $inv['payment_status'] = $invoice->payment_status;

            if ($invoice->service_title == 'em_service') {

                $service = Em_service::all()->where('id', $invoice->service_id)->first();
                $serviceid = Em_service::find($invoice->service_id);

            } elseif ($invoice->service_title == 'gpr_service') {

                /* $service = Gpr_service::select('country')->where('id', $invoice->service_id)->first();*/
                $service = Gpr_service::all()->where('id', $invoice->service_id)->first();
                $serviceid = Gpr_service::find($invoice->service_id);

            } elseif ($invoice->service_title == 'cement_service') {

                $service = Cement_service::all()->where('id', $invoice->service_id)->first();
                $serviceid = Cement_service::find($invoice->service_id);

            } elseif ($invoice->service_title == 'pel_service') {

                $service = Pel::all()->where('id', $invoice->service_id)->first();
                $serviceid = Pel::find($invoice->service_id);

            }

            else {
                $service = "";
            }

            $inv['location'] = "";
            if($service) {
                $inv['location'] = $service->location;
                $inv['company_name'] = $service->company_name;
            }

            if( $serviceid && Auth::id() == $serviceid->user_id || Auth::id() == 2 ){
                $invoices[]= $inv;

            }
        }
        //dd($invoices);
        return view('member.invoice', compact('invoices'));
        //return view('member.invoice',compact('invoices'));
    }


}