@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create new master</div>

               <div class="card-body">
                <form method="POST" action="{{route('master.store')}}">
                    Name: <input type="text" name="master_name">
                    Surname: <input type="text" name="master_surname">
                    @csrf
                    <button type="submit">ADD</button>
                 </form>
                
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

 