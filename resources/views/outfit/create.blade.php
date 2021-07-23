<form method="POST" action="{{route('outfit.store')}}">
    Type: <input type="text" name="outfit_type">
    Color: <input type="text" name="outfit_color">
    Size: <input type="text" name="outfit_size">
    About: <textarea name="outfit_about"></textarea>
    <select name="master_id">
        @foreach ($masters as $master)
            <option value="{{$master->id}}">{{$master->name}} {{$master->surname}}</option>
        @endforeach
 </select>
    @csrf
    <button type="submit">ADD</button>
 </form>
 