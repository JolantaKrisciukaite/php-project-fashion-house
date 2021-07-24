@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit new master</div>

               <div class="card-body">
                <form method="POST" action="{{route('master.update',$master)}}">

                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="master_name" class="form-control" value="{{old('master_name', $master->name)}}">
                    </div>

                    <div class="form-group">
                        <label>Surname:</label>
                        <input type="text" name="master_surname" class="form-control" value="{{old('master_surname', $master->surname)}}">
                    </div>

                    @csrf
                    <button type="submit">EDIT</button>
                 </form>
                 
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
