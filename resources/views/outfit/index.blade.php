@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Outfits</div>

               <div class="card-body">
                @foreach ($outfits as $outfit)
                <div class="index">{{$outfit->type}}</div>
                <div class="index">{{$outfit->outfitMaster->name}} {{$outfit->outfitMaster->surname}}</div>
                <form method="POST" action="{{route('outfit.destroy', [$outfit])}}">
                    <a href="{{route('outfit.edit',[$outfit])}}" class="editButton">Edit</a>
                 @csrf
                 <button class="deleteButtonOutfit" type="submit">Delete</button>
                </form>
                <br>
              @endforeach
              
               </div>
           </div>
       </div>
   </div>
</div>
@endsection




