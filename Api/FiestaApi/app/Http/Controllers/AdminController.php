<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Symfony\Component\HttpKernel\Attribute\Cache;

class AdminController extends Controller
{
    public function index()
{
    $videos = Video::all();
    return view('admin.videos.index', compact('videos'));
}

public function blockVideo($id)
{
    $video = Video::find($id);
    if (!$video) {
        abort(404);
    }
    $video->blocked = true;


    $video->blocked = true;
    $video->save();

    return redirect()->route('admin.videos.index');
}

public function unblockVideo($id)
{
    $video = Video::find($id);
    if (!$video) {
        abort(404);
    }
    $video->blocked = false;



    $video->save();

    return redirect()->route('admin.videos.index');
}


}
