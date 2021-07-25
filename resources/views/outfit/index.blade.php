@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">

                        <h3 class="title">Outfits</h3>
                        <form action="{{ route('outfit.index') }}" method="get" class="sort-form">
                            <fieldset>
                                <legend>Sort by</legend>
                                <div>
                                    <label>Type</label>
                                    <input type="radio" name="sort_by" value="type" @if ('type' == $sort) checked @endif>
                                    <label>Size</label>
                                    <input type="radio" name="sort_by" value="size" @if ('size' == $sort) checked @endif>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>Direction</legend>
                                <div>
                                    <label>Asc</label>
                                    <input type="radio" name="dir" value="asc" @if ('asc' == $dir) checked @endif>
                                    <label>Dsc</label>
                                    <input type="radio" name="dir" value="desc" @if ('desc' == $dir) checked @endif>
                                </div>
                            </fieldset>
                            <button class="addButtonCreate" type="submit">Sort</button>
                            <a href="{{ route('outfit.index') }}" class="aButton">Clear</button></a>
                        </form>

                        <form action="{{ route('outfit.index') }}" method="get" class="sort-form">
                            <fieldset class="fieldset">
                                <legend>Filter by</legend>
                                <select class="index" name="master_id"><br>
                                    @foreach ($masters as $master)
                                        <option value="{{ $master->id }}" @if($defaultMaster == $master->id) selected @endif>
                                            {{ $master->name }} {{ $master->surname }}
                                        </option>
                                    @endforeach
                                </select>
                            </fieldset>
                            <button class="addButtonCreate" type="submit">Filter</button>
                            <a href="{{ route('outfit.index') }}" class="aButton">Clear</button></a>
                        </form>

                        <form action="{{ route('outfit.index') }}" method="get" class="sort-form">
                            <fieldset class="fieldset">
                                <legend>Search by</legend>
                                <input placeholder="Serach by type" type="text" class="index" name="s" value="{{$s}}">
                            </fieldset>
                            <button class="addButtonCreate" type="submit" name="do_search" value="1">Type</button>
                            <a href="{{ route('outfit.index') }}" class="aButton">Clear</button></a>
                        </form>

                    </div>

                <div class="pager-links">
                {{ $outfits->links() }}
                </div>

                    <div class="card-body">

                        @forelse ($outfits as $outfit)
                            <div class="index">Outfit: {{ $outfit->type }}</div>
                            <div class="index">Outfit size: {{ $outfit->size }}</div>
                            <div class="index">Master: {{ $outfit->outfitMaster->name }}
                                {{ $outfit->outfitMaster->surname }}</div>
                            <form method="POST" action="{{ route('outfit.destroy', [$outfit]) }}">
                                <a href="{{ route('outfit.edit', [$outfit]) }}" class="editButton">Edit</a>
                                @csrf
                                <button class="deleteButtonOutfit" type="submit">Delete</button>
                            </form><br>

                            @empty 
                            <h3 class="title">No Results 😛</h3>
                        @endforelse

                    </div>
                <div class="pager-links">
                {{ $outfits->links() }}
            </div>
        </div>
    </div>
@endsection
