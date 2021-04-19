@extends("layout.app")
@section("content")
    <div class="container">
        <div class="row mt-5">
            <div class="col-10 mx-auto text-center mt-5">
                <p class="text-center font-weight-bold">Удаление фильма {{$film->name}}</p>
                <form action="{{url('/delete/film/')}}" method="post">
                    @csrf
                    {{method_field('delete')}}
                    <input type="hidden" name="film_id" value="{{$film->id}}">
                    <button class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
    </div>
@endsection

