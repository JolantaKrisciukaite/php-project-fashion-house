@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit new master</div>

               <div class="card-body">
                <form method="POST" action="{{route('master.update',$master)}}">
                    Name: <input type="text" name="master_name" value="{{$master->name}}">
                    Surname: <input type="text" name="master_surname" value="{{$master->surname}}">
                    @csrf
                    <button type="submit">EDIT</button>
                 </form>
                 
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
