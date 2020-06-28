
@extends('layouts.app')
@section('content')

<div class="container-fluid">
<div class="row">
<div class="col-md-12">
</br>
<h3 align="center">Your Files</h3>
</br>

<form action="search" method="get" >
    <label for="category">Choose a category:</label>
    <select name="category" id="category">
    <option value="source">FILE</option>
    <option value="name">FILE NAME</option>
    <option value="type">FILE TYPE</option>
   
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
<th>main file </th>
<th>file name</th>
<th>version</th>
<th>type</th>
<th>size(in mb)</th>
<th>access specifcation</th>
<th>upload date&time</th>
<th>hash value</th>
</tr>
@foreach($data as $key => $row)  
<tr>
<th> {{ $row->source}}</th>
<?php $fname = $row->name.".".$row->type; ?> 
<th><a href="{{asset('storage/'.$row->uploader.'/'.$fname)}}" download="{{$fname}}" >{{ $row->name }}</a></th>
<th> {{ $row->version}}</th>
<th> {{ $row->type }}</th>
<th> {{ $row->size }}</th>
<th> {{ $row->access }}</th>
<th> {{ $row->updated_at }}</th>
<th> {{ $row->hash}}</th>

</tr>
@endforeach
</table>
</br> 
</br>
<a href="/home" style="font-size:20px; ">Click here to go upload page</a>
</div>
</div>
</div>
@endsection
