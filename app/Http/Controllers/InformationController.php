<?php

namespace App\Http\Controllers;

use App\Models\Informations;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateInformationRequest;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('AppInfos', ['informations' => Informations::all()->last()]);
    }
}
