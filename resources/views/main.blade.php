@extends("layout.app")
@section("content")
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <h5><a href="/" style="text-decoration: none">Список фильмов</a></h5>
                </div>
            </div>
            <div class="col-sm-2">
            </div>
            <div class="col-sm-3">
                <form action="{{url('/search/film')}}" method="get">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="key" class="form-control" placeholder="Поиск фильма"
                               value="<?php if (isset($_GET['key'])) { echo $_GET['key']; } ?>">
                    </div>
                </form>
            </div>
            <div class="col-sm-1">
            </div>
        </div>
        <div class="row mt-5" style="min-height: 380px">
            <div class="col-sm-10 mx-auto">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название фильма</th>
                        <th>Жанр</th>
                        <th>Ссылка</th>
                        <th class="text-center">Удаление</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($films as $film)
                        <tr>
                            <td>{{$film->id}}</td>
                            <td><strong>{{$film->name}}</strong></td>
                            <td class="text-muted">Жанр:
                                @foreach($film->relatedGenres as $genre)
                                    {{$genre->name}}
                                @endforeach
                            </td>
                            <td>
                                <a href="{{url('/video_page/'.$film->id)}}" class="btn btn-success">Смотреть</a>
                            </td>
                            <td class="text-center">
                                <a href="{{url('/delete_page/film/'.$film->id)}}" class="btn btn-outline-danger">
                                    Удаление
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-10 mx-auto">
                {{$films->links('vendor.pagination.bootstrap-4')}}
{{--                {{$films->appends(['key'=>request()->key])->links()}}--}}
            </div>
        </div>
    </div>

<?php
        include_once('simple_html_dom.php');
        $html = \App\Http\Controllers\FilmController::curl_get('https://gidonline.io/new/');
        $dom  = str_get_html($html);

        $movies = $dom->find('#posts');
        /* file_put_contents('1', $html); */

//        foreach ($movies as $movie){
//            foreach($movie->find('a') as $element){
//                echo $element->href . '<br>';
//                echo $element->plaintext . '<br>';
//
//            $name = $element->plaintext;
//            $one = \App\Http\Controllers\FilmController::curl_get($element->href);
//            /* file_put_contents('1', $one); */
//            $one_dom = str_get_html($one);
//
//            $path = $one_dom->find('.ifram', 0);
//            $link = $path->src;
//
//            foreach($one_dom->find('.t-row') as $el){
//                 $a = $el->find('a',3);
//                 $genre_name = $a->plaintext;
//                }
//
//            \Illuminate\Support\Facades\DB::insert('insert into genres(name) values (?)',
//                [$genre_name]);
//
//            \Illuminate\Support\Facades\DB::insert('insert into films (name, link) values (?, ?)',
//            [$name, $link]);
//            }
//        }
?>

@endsection
