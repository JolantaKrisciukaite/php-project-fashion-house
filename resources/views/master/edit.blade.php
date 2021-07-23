<form method="POST" action="{{route('master.update',$master)}}">
    Name: <input type="text" name="master_name" value="{{$master->name}}">
    Surname: <input type="text" name="master_surname" value="{{$master->surname}}">
    @csrf
    <button type="submit">EDIT</button>
 </form>
 