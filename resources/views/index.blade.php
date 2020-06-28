@extends('layouts.app2')

@section('content')
<div class="container-fluid" >
<div class="row">
 <div class="col-md-12">
    </br>
    <h3 align="center">ALL Files</h3>
    </br>

<form action="s" method="get" >
    <label for="category">Choose a category:</label>
    <select name="category" id="category">
    <option value="source">FILE</option>
    <option value="name">FILE NAME</option>
    <option value="type">FILE TYPE</option>
    <option value="uploader">UPLOADER</option>
    </select>
    <input type="search" id="gsearch" name="gsearch">
    <input type="submit" value="Search">
</form>
@if($msg ?? ''?? '' == "")
                       <div class="alert alert-danger" role="alert">
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                         </button>
                       {{$msg ?? ''}}
                       </div>
                       @endif
<br> 

<table class="table table-bordered">
<tr>
<th>main file</th>
<th>file name</th>
<th>version</th>
<th>type</th>
<th>size(in mb)</th>
<th>uploader</th>
<th>upload date&time</th>
<th>hash value</th>

</tr>
@foreach($s as $key => $data)
<tr>
<th>{{$data->source}} </th>
<?php $lname = $data->name.".".$data->type; ?>
<th><a href="{{asset('storage/'.$data->uploader.'/'.$lname)}}" download="{{$lname}}" >{{$data ->name}}</a></th>
<th>{{$data->version}}</th>
<th>{{$data ->type}}</th>
<th>{{$data ->size}}</th>
<th>{{$data ->uploader}}</th>
<th>{{$data ->updated_at}}</th>
<th>{{$data ->hash}}</th>

@endforeach
</table>

 </div>
</div>
</div>
@endsection
