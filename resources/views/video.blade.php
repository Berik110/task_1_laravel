@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-5">
                <h3>Просмотр фильма "{{$film->name}}"</h3>
                <br>
                <iframe width="650" height="370" src="{{$film->link}}" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
@endsection
