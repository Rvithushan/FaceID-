<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

class chart extends Controller
{
    function index()
    {
     $data = DB::table('tbl_employee')
       ->select(
        DB::raw('gender as gender'),
        DB::raw('count(*) as number'))
       ->groupBy('gender')
       ->get();
     $array[] = ['Gender', 'Number'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->gender, $value->number];
     }
     return view('goole')->with('gender', json_encode($array));
    }
}
