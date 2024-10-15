<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function toggleBookmark($id)
    {
        $user = auth()->user();

        // User modelidagi bookmarkAds metodini chaqirish
        if ($user->bookmarkAds()->where('ad_id', $id)->exists()) {

            $user->bookmarkAds()->detach($id);
            return back()->with('message', "elon o'chiildi");
        } else {
            // Agar e'lon bookmarklangan bo'lmasa, qo'shish
            $user->bookmarkAds()->attach($id);
            return back()->with('message', "elon yaratildi");
        }
    }

    public function someMethod(): void
    {
        $user = User::withCount('bookmarks')->find(auth()->id());


    }

    public function profile(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory
    {
        $user = auth()->user();
        $ads = Ad::all();
        return view('ads.profile', compact('user', 'ads'));
    }

}
