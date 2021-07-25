@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create new outfit</div>

               <div class="card-body">
                <form method="POST" action="{{route('outfit.store')}}">

                    <div class="form-group">
                        <label>Type:</label>
                        <input type="text" name="outfit_type" class="form-control" value="{{old('outfit_type')}}">
                        <span style="createSpan">Enter outfit type</span>
                    </div>

                    <div class="form-group">
                        <label>Color:</label>
                        <input type="text" name="outfit_color" class="form-control" value="{{old('outfit_color')}}">
                        <span style="createSpan">Enter outfit color</span>
                    </div>

                    <div class="form-group">
                        <label>Size:</label>
                        <input type="text" name="outfit_size" class="form-control" value="{{old('outfit_size')}}">
                        <span style="createSpan">Enter outfit size</span>
                    </div>
                    
                    <span class="about">About: </span>
                    <textarea name="outfit_about" id="summernote" value="{{old('outfit_about')}}"></textarea>
                    <select class="index" name="master_id"><br>
                        
                        @foreach ($masters as $master)
                            <option value="{{$master->id}}">{{$master->name}} {{$master->surname}}</option>
                        @endforeach
                        <span style="createSpan">About outfit</span>
                    </select>
                    @csrf
                    <button class="addButtonCreate" type="submit">Add</button><br>
                    <span style="createSpan">Select Master from the list</span>
                 </form>

               </div>
           </div>
       </div>
   </div>
</div>

<script>
    $(document).ready(function() {
       $('#summernote').summernote();
     });
</script>
    
@endsection

 