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
                        <label>Type</label>
                        <input type="text" name="outfit_type" class="form-control" value="{{$outfit->type}}">
                    </div>

                    <div class="form-group">
                        <label>Color</label>
                        <input type="text" name="outfit_color" class="form-control" value="{{$outfit->color}}">
                    </div>

                    <div class="form-group">
                        <label>Size</label>
                        <input type="text" name="outfit_size" class="form-control" value="{{$outfit->size}}">
                    </div>
                      
                    About: <textarea name="outfit_about" id="summernote">{{$outfit->about}}</textarea>
                    <select name="master_id">
                        @foreach ($masters as $master)
                            <option value="{{$master->id}}" @if($master->id == $outfit->master_id) selected @endif>
                                {{$master->name}} {{$master->surname}}
                            </option>
                        @endforeach
                </select>
                    @csrf
                    <button type="submit">EDIT</button>
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

