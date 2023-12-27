<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiesta</title>
    <link rel="stylesheet" href="{{ asset('css/style.head.css') }}">
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




            </div>
        </div>

    </section>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
