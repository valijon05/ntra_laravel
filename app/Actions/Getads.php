<?php

namespace App\Actions;
use App\Models\Ad;
use App\Models\Branch;

class Getads
{
    public function __invoke(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $ads = Ad::all();
        $branches = Branch::all();
        return view('home',['ads'=>$ads,'branches'=>$branches]);
    }

}
