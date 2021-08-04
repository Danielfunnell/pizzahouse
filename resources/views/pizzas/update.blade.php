
@extends('layouts.app')
         
@section('content')

<h1>Update</h1>



 <ul>
    @foreach($reader as $row)
     <li> {{ $row }} </li>
    @endforeach 
</ul> 


@endsection