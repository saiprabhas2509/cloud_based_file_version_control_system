@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">File Sharing and Version Control System</div>

                <div class="card-body bg-secondary text-white">
                  <form action="profile" method="post" enctype="multipart/form-data">
                        <input type="file" name="file">
                        @csrf
                      </br>
                      @if($c ?? '' == "Please add a file")
                       <div class="alert alert-danger" role="alert">
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                         </button>
                       {{$c}}
                       </div>
                       @endif
                      <b>Access specification:</b>
                       <input type="radio" name="access" value="public"><b><i>Public</i></b>
                       <input type="radio" name="access" value="private"><b><i>Private</i></b>
                      </br>
                       @if($b ?? '' == "Please Provide Access")
                       <div class="alert alert-danger" role="alert">
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                         </button>
                       {{$b}}
                       </div>
                       @endif
                     <button type="submit" class="btn btn-info" >Upload File</button>
                     </form>
                     </br>
                     @if($a ?? '' == "File Uploaded Successfully!")
                      <div class="alert alert-success" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                         </button>
                       {{$a}}
                     </strong>
                     </div>
                     @endif
                     @if($d ?? '' == "this version already exists!!")
                      <div class="alert alert-danger" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                         </button>
                       {{$d}}
                     </strong>
                     </div>
                     @endif
                  </div>
                    <div class="card-footer">
                    <a href="/file" style="font-size:20px; ">Click here to go to your uploads</a>
                         </br>
                    <a href="/" style="font-size:20px; ">Click here to checkout all files</a> 
                   </div>
            </div>
        </div>
    </div>
</div>
@endsection






