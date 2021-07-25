@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                   <h2>Outfits</h2>
                   <form action="{{route('outfit.index')}}" method="get">
                    <fieldset>
                        <legend>Sort by</legend>
                        <input type="radio" name="sort_by" value="type" checked>
                        <input type="radio" name="sort_by" value="size">
                    </fieldset>
                    
                    <fieldset>
                        <legend>Sort by</legend>
                        <input type="radio" name="sort_by" value="type" checked>
                        <input type="radio" name="sort_by" value="size">
                    </fieldset>
                
                   </form>
                
                
                
                </div>

               <div class="card-body">
                @foreach ($outfits as $outfit)
                <div class="index">Outfit: {{$outfit->type}}</div>
                <div class="index">Outfit size: {{$outfit->size}}</div>
                <div class="index">Master: {{$outfit->outfitMaster->name}} {{$outfit->outfitMaster->surname}}</div>
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




