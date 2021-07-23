@foreach ($masters as $master)
  <a href="{{route('master.edit',[$master])}}">{{$master->name}} {{$master->surname}}</a>
  <form method="POST" action="{{route('master.destroy', $master)}}">
   @csrf
   <button type="submit">DELETE</button>
  </form>
  <br>
@endforeach


