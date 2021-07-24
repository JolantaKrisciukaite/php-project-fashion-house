@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Masters</div>

               <div class="card-body">
                @foreach ($masters as $master)
                <a href="{{route('master.edit',[$master])}}">{{$master->name}} {{$master->surname}}</a>
                <form method="POST" action="{{route('master.destroy', $master)}}">
                 @csrf
                 <button type="submit">DELETE</button>
                </form>
                <br>
              @endforeach
              
               </div>
           </div>
       </div>
   </div>
</div>
@endsection


