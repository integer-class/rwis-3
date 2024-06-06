<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\UmkmModel;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function facility()
    {
        $data = Facility::all();
        return view('user-layout.facility', compact('data'));
    }

    public function umkm()
    {
        $dataumkm = UmkmModel::class::all();
        return view('user-layout.umkm', compact('dataumkm'));
    }

    public function issue()
    {
        $dataissue = Issue::class::all();
        return view('user-layout.issue', compact('dataissue'));
    }
}
