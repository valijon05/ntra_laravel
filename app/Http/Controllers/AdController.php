<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Branch;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use PHPUnit\TextUI\Application;

class AdController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {

        $ads= Ad::all();
        $branches=Branch::all();
        return view('home' ,compact('ads','branches'));


    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $ads= Ad::find($id);
        return view('components.single-ad',compact('ads'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
    public function find(Illuminate\Http\Client\Request $request): View|Factory|Application {

        $ads=\App\Models\Branch::query()->find($request->branch_id)->ads();

        $branches=\App\Models\Branch::all();
        return view('home', compact('ads','branches'));

    }
}
