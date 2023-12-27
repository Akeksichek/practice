<?php

namespace App\Http\Controllers;

use ApiVideo\Client\Model\Video as ModelVideo;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Arr;

class VideoController extends Controller
{
    public function video()
    {
        $videos = DB::table('videos')->join('users', 'user_id', '=', 'users.id')
            ->select('videos.*', 'users.name as username')
            ->where('videos.blocked', '!=', '1')
            ->get();



        return response()->json($videos);
    }
    public function fetch($id_video)
    {
        $data = [Video::latest()->first()->toArray()];

        return view('videos', compact('data'));
    }

    public function fetchid($id_video)
    {
        $data = DB::table('videos')->join('users', 'user_id', '=', 'users.id')
            ->select('videos.*', 'users.name as username')
            ->get();
        $url = URL::full();

        $filtered = Str::afterLast($url, 'http://127.0.0.1:8000/fetchid_video/%7Bid_video%7D?video=');
        $data = [Video::whereId_video($id_video = $filtered)->firstOrFail()->toArray()];









        return view('videos', compact('data'));

    }
    function index()
    {
        return view("index");



    }

    function insert(Request $request)
    {




        $request->validate([
            'video' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm',
            'preview',
            'name',
            'desc'

        ]);






        $path = "data:image/png;base64," . base64_encode(file_get_contents($request->file('preview')));


        $save = new Video();


        $save->preview = $path;



        $file = $request->file('video');

        $file->move('upload', $file->getClientOriginalName());
        $file_name = $file->getClientOriginalName();






        $insert = new Video();

        $insert->user_id = auth()->user()->id;


        $insert->video = $file_name;



        Video::create([
            'name' => $request['name'],
            'preview' => $save['preview'],
            'video' => $insert['video'],
            'user_id' => $insert['user_id'],
            'desc' => $request['desc'],



        ]);


        return redirect('/fetch_video/{id_video}');

    }




}
