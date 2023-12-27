<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiesta</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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





    <section class="BlockVideo">

        <div class="container">
            <div class="preview">
                @foreach ($data as $row)
                    <video class="video_block"  autoplay muted controls>
                        <source class="video" src="{{ asset('upload') }}/{{ $row['video'] }}" type="video/mp4">
                    </video>
                    <p class="name">{{ $row['name'] }}</p>
                    <div class="likes">
                    <div class="like"><img  src="{{asset('img/like.png')}}" alt=""><p class="Llike">0</p></div>
                        <div class="dislike"><img  src="{{asset('img/dislike.png')}}" alt=""><p class="Ldislike">0</p></div>
                    </div>
                    <p class="desc">{{ $row['desc'] }}</p>



                    <form>
<div class="commblock">
  <textarea id="comment-input" placeholder="Ваш комментарий" required></textarea>
  <button type="button" class="button" onclick="addComment('{{Auth::user()->name}}')">Отправить</button>
</form>
<div id="comments-list">
  <div class="comment">

    <div class="comment-author"></div>
    <div class="currentTime"></div>

    <div class="comment-text"></div>
  </div>

</div>
</div>

                @endforeach
            </div>

        </div>

    </section>
    <script src="{{ asset('js/video.js') }}"></script>
</body>

</html>
