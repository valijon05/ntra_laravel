<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Branch;
use App\Models\Status;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use PHPUnit\TextUI\Application;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
        return view('components.create-ad');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function show(string $id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory
    {
        return view('components.single-ad', ['ad'=>Ad::query()->find($id)]);
    }

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
    public function find(Request $request): View|Factory|Application
    {
        $ads = \App\Models\Branch::query()->find($request->branch_id)->ads;

        $branches = \App\Models\Branch::all();
        return view('home', compact('ads', 'branches'));
    }
    public function contact()
    {
        return view('components.contact');
    }


}
