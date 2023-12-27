<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
    <title>Document</title>
</head>
<body style="margin: 0; padding: 0; background-color: #333C64;">
<div class="container">
<div class="logo" style="background-image: url({{ asset('img/logo.svg') }})">

<div class="login"><a href="http://127.0.0.1:8000/login" >{{ Auth::user()->name }}</a> </div>
<form method="post" action="{{ route('logout') }}" x-data>

<div class="reg"><a href="{{ route('logout') }}"@click.prevent="$root.submit();" >Выход</a> </div>
</form>

</div>
    <div class="ff">
    <form method="post" action="{{Route('insert.file')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form">

        <input type="text" name="name" class="name"><br>
        <input type="file" name="preview" id="preview" class="preview"><br>
        <input type="file" name="video" class="video">
        <p class="fail">

            @if($errors->has('video'))
                {{ $errors->first('video') }}
            @endif

        </p><br>
        <textarea type="text" name="desc" class="desc"></textarea><br>

        <input type="submit" name="click" class="click">
    </div>
    </form>
    </div>
</div>
</body>
</html>
