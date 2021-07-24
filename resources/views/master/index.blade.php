@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Masters</div>

               <div class="card-body">
                @foreach ($masters as $master)
                <div class="index">{{$master->name}} {{$master->surname}}</div>
                <form method="POST" action="{{route('master.destroy', $master)}}">
                    <a href="{{route('master.edit',[$master])}}" class="editButton">Edit</a>
                 @csrf
                 <button class="deleteButton" type="submit">Delete</button>
                </form>
                <br>
              @endforeach
              
               </div>
           </div>
       </div>
   </div>
</div>
@endsection


