<?php

namespace App\Http\Controllers;
use App\file;
use App\User;

use Illuminate\Http\Request;

class Profile extends Controller
{
    function store(Request $req)
    {
      
      $user = auth()->user();
      $a = $req->get('access');
      if($req->hasFile('file') )
     {  
        $access = $req->get('access');
        $a= '';
        $b = '';
       if ($access != null)
      {
       $filenamewithex = $req->file->getClientOriginalName();
       $filename = pathinfo($filenamewithex, PATHINFO_FILENAME);
       $filetype = $req->file->getClientOriginalExtension();
       $filesize = $req->file->getSize();
       $uploader = $user->name;
       $filter= pathinfo($filename,PATHINFO_FILENAME);
       $source= pathinfo($filter,PATHINFO_FILENAME);
       $hash = md5_file($req->file);
       
       $h = file::where([
         ['hash',$hash],
         ['uploader', $uploader],
       ])->get();
       if($h->count() == 0 ){
       $ver = 0.0;
       $files= file::where([
         ['source',$source],
         ['type',$filetype],
         ['uploader',$uploader],
       ])->get();
       
       if($files != null){
           $ver = $files->max('version');
         
             $ver++;
              
        
            $filename= $source;
           $filename= $filename.".$ver.0";
          $filenamewithex= $filename.".".$filetype;
       }
      
      
    
      
       $req->file->storeAs('public/'.$uploader,$filenamewithex);
        
      
       $file = new file;
       $file->name = $filename;
       $file->type = $filetype;
       $file->size = $filesize/1000000;
       $file->uploader = $uploader;
       $file->access = $access;
       $file->filenamewithex = $filenamewithex;
       $file->hash = $hash;
       $file->version= $ver;
       $file->source= $source;
       $file->save();
      
       $a = "File Uploaded Successfully!";
       return view('home', ['a' => $a]);
      }
      else{
        $d= "this version already exists!!";
        return view('home', ['d' => $d]);
      } 
      }

      else 
      { 
        $b = "Please Provide Access";
       return view('home',['b' =>$b]);
      }
     }
     else
     {
       $c = "Please add a file";
       return view('home',['c' =>$c]);
     }
   } 
   function search(Request $request){
    $c= $request->category; 
    $search= $request->gsearch;
    $s = file::where([
      ['access','public'],
      [$c,$search]
      ])->Orderby('source')->Orderby('version','desc')->get();
      if($s->count() != 0)
      {return view('index',['s' => $s]);}
       else 
       { 
         $msg="files doesnot exits";
         $s = file::where('access','public')->Orderby('source')->Orderby('version','desc')->get();
         return view('index',['s' => $s],['msg'=>$msg]);
        }
      }
     
      function s(Request $request){
        $user = auth()->user();
        $uname = $user->name;
        $c= $request->category; 
        $s= $request->gsearch;
        $data = file::where([
          ['uploader',$uname],
          [$c,$s]
          ])->Orderby('source')->Orderby('version','desc')->get();
          if($data->count() != 0)
          {return view('filelist',['data' => $data]);}
           else 
           { 
             $msg="files doesnot exits";
             $data = file::where('uploader',$uname)->Orderby('source')->Orderby('version','desc')->get();
             return view('filelist',['data' => $data],['msg'=>$msg]);
            }
          }
         

}
