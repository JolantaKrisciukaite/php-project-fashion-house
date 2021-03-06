@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create new master</div>

               <div class="card-body">
                <form method="POST" action="{{route('master.store')}}">

                    <div class="form-group">
                        <label>Name:</label>
                        <input placeholder="Enter Master name" type="text" name="master_name" class="form-control" value="{{old('master_name')}}">
                    </div>

                    <div class="form-group">
                        <label>Surname:</label>
                        <input placeholder="Enter Master surname" type="text" name="master_surname" class="form-control" value="{{old('master_surname')}}">
                    </div>

                    @csrf
                    <button class="addButton" type="submit">Add</button>
                 </form>
                
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

 