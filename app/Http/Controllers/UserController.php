<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class UserController extends Controller
{
    public function index()
    {
        $not_followed = User::where('id', '!=', Auth::user()->id);
        if (Auth::user()->followed->count()) {
            $not_followed->whereNotIn('id', Auth::user()->followed->modelKeys());
        }
        $not_followed = $not_followed->get();
        return view('user.index', compact('not_followed'));
    }

    public function show(User $user)
    {
        $followed_releases = new Collection();;
        foreach($user->followed as $f) {
            $followed_releases = $followed_releases->concat(House::whereIn('id', $f->releases->modelKeys())->get());
        }
        $followed_releases = $followed_releases->sortBy([['release_date', 'desc']]);
        $releases = House::where('user_id', '=', $user->id)->orderBy('release_date')->get();
        $deleted_releases = House::onlyTrashed()->where('user_id', '=', $user->id)->orderBy('release_date')->get();
        return view('user.show', compact('user', 'releases', 'deleted_releases', 'followed_releases'));
    }

    public function follow(User $user)
    {
        Auth::user()->addFollower($user);
        return Redirect::back();
    }

    public function followMutually(User $user)
    {
        Auth::user()->addFollower($user);
        $user->addFollower(Auth::user());
        return Redirect::back();
    }

    public function unfollow(User $user)
    {
        Auth::user()->removeFollower($user);
        return Redirect::back();
    }
}
