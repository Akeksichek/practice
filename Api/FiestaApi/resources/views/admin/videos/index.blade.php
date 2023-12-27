



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiesta</title>
    <link rel="stylesheet" href="{{ asset('css/styleadmin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
</head>

<body style="margin: 0; padding: 0; background-color: #333C64;">

    <header>

        <div class="container">




            <div class="logo" style="background-image: url({{ asset('img/logo.svg') }})">

                <div class="login"><a href="http://127.0.0.1:8000/login" >{{ Auth::user()->name }}</a> </div>
                <form method="post" action="{{ route('logout') }}" x-data>

                <div class="reg"><a href="{{ route('logout') }}"@click.prevent="$root.submit();" >Выход</a> </div>
            </form>

            </div>


        </div>
    </header>

    <table>
  <thead>

  </thead>
  <tbody>
    @foreach ($videos as $video)
      <div class="block">
        <div class="name_1"><p class="name_2">Название</p> {{ $video->name }}</div>
        <div class="desc_1"><p class="desc_2">Описание</p>{{ $video->desc}}</div>
        <video class="video_block"  autoplay muted controls>
                        <source class="video" src="{{ asset('upload') }}/{{ $video['video'] }}" type="video/mp4">
                    </video>

        <div>
        @if (!$video->blocked)
 <form method="POST" action="{{ route('admin.videos.block', ['id_video' => $video->id_video]) }}">
              @csrf
              <button class="ass" type="submit">Заблокировать</button>
            </form>
@else
   <form method="POST" action="{{ route('admin.videos.unblock', ['id_video' => $video->id_video]) }}">
              @csrf
              <button class="ass" type="submit">Разблокировать</button>
            </form>
@endif
</div>
</div>
    @endforeach
  </tbody>
</table>



    <section class="BlockVideo">

        <div class="container">
            <div class="preview">

            </div>

        </div>

    </section>
    <script src="{{ asset('js/video.js') }}"></script>
</body>

</html>
