@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Outfits</div>

               <div class="card-body">
                @foreach ($outfits as $outfit)
                <a href="{{route('outfit.edit',[$outfit])}}">{{$outfit->type}}</a>
                <span>{{$outfit->outfitMaster->name}} {{$outfit->outfitMaster->surname}}</span>
                <form method="POST" action="{{route('outfit.destroy', [$outfit])}}">
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




