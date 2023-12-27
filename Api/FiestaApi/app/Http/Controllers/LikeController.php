<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Video;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    public function index(){
        Video::all();
    }


    public function fetch(){
        $posts = Video::with('likes', 'dislikes')->orderBy('created_at', 'desc')->get();
        return view('videos', compact('posts'));
    }
    public function toggleLike(Request $request)
    {
        $user = auth()->user();

        $like = Like::where('user_id', $user->id)
                    ->where('id_video', $request->id_video)
                    ->first();

        if ($like) {
            if ($like->type == 'like') {
                $like->delete();
                $result = 'unliked';
            } else {
                $like->type = 'like';
                $like->save();
                $result = 'liked';
            }
        } else {
            $like = new Like;
            $like->user_id = $user->id;
            $like->id_video = $request->id_video;
            $like->type = 'like';
            $like->save();
            $result = 'liked';
        }
        redirect('/fetch_video/{id_video}');
        return response()->json([
            'result' => $result,
            'count' => Like::where('id_video', $request->id_video)
                          ->where('type', 'like')
                          ->count(),
        ]);
    }
}
