<?php

namespace App\Http\Controllers;
use App\file;
use App\User;
use Illuminate\Http\Request;

class FileController extends Controller
{
    function getData()
    {   //return file::all(); }
        $user = auth()->user();
        $uname = $user->name;
        $data [] = file::where('uploader',$uname)->get();
        return view('filelist', ['data'=> $data]);
       // return view('filelist', compact('data'));
      // return $data;
}
function getpublicData()
{
   
  
   $s[] = file::where('access','public')->get();
   return view('index',['s'=> $s]);
   //return $s;
   
}


}
