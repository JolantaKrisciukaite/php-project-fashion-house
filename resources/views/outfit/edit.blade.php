@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit new outfit</div>

               <div class="card-body">
                <form method="POST" action="{{route('outfit.update',[$outfit])}}">

                    <div class="form-group">
                        <label>Type:</label>
                        <input type="text" name="outfit_type" class="form-control" value="{{old('outfit_type', $outfit->type)}}">
                    </div>

                    <div class="form-group">
                        <label>Color:</label>
                        <input type="text" name="outfit_color" class="form-control" value="{{old('outfit_color', $outfit->color)}}">
                    </div>

                    <div class="form-group">
                        <label>Size:</label>
                        <input type="text" name="outfit_size" class="form-control" value="{{old('outfit_size', $outfit->size)}}">
                    </div>
                      
                    <span class="about">About: </span>
                    <textarea name="outfit_about" id="summernote" value="{{old('outfit_about', $outfit->about)}}"></textarea><br>
                    <select class="index" name="master_id">
                        @foreach ($masters as $master)
                            <option value="{{$master->id}}" @if($master->id == $outfit->master_id) selected @endif>
                                {{$master->name}} {{$master->surname}}
                            </option>
                        @endforeach
                </select>
                    @csrf
                    <button class="editButton" type="submit">Edit</button>
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

