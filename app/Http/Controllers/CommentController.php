<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function create(House $house) {
        return view('comment.create');
    }

    public function store(Request $request) {
    $data=request()->validate(['text'=>'required',
        'houses_id'=>'required',
        'user_id'=>'required',
    ]);


     Comment::create($data);
        return redirect('/');
    }

    protected function validateData(Request $request): array
    {
        $data = $request->validate([
            'text' => 'required',
        ]);
        $data['house_id'] = intval($request['release_id']);
        $data['user_id'] = intval($request['user_id']);
        return $data;
    }
}
