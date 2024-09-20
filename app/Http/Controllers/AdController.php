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
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {

        $ads= Ad::all();
        $branches=Branch::all();
        return view('home' ,compact('ads','branches'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
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
