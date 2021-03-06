<?php

namespace BullsEye\Http\Controllers;

use BullsEye\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;


class DatatablesController extends Controller
{
    //
    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('admin.userdt');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return Datatables::of(User::query())->make(true);
    }
}
