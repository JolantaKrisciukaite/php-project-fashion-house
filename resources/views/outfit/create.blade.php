<form method="POST" action="{{route('outfit.store')}}">
    Title: <input type="text" name="outfit_title">
    ISBN: <input type="text" name="outfit_isbn">
    Pages: <input type="text" name="outfit_pages">
    About: <textarea name="outfit_about"></textarea>
    <select name="master_id">
        @foreach ($masters as $master)
            <option value="{{$master->id}}">{{$master->name}} {{$master->surname}}</option>
        @endforeach
 </select>
    @csrf
    <button type="submit">ADD</button>
 </form>
 