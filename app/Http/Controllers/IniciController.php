<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Element;

class IniciController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function llista()
    {

        $elements =  Element::all();
        return view('inici', ['elements'=>$elements]);
    }
}