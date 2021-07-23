<form method="POST" action="{{route('master.store')}}">
    Name: <input type="text" name="master_name">
    Surname: <input type="text" name="master_surname">
    @csrf
    <button type="submit">ADD</button>
 </form>
 