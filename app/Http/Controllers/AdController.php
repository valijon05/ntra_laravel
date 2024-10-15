<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Branch;
use App\Models\Images;
use App\Models\Status;
use Faker\Factory;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use JetBrains\PhpStorm\NoReturn;
use PHPUnit\TextUI\Application;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

            $branches=Branch::all();
            $userId = auth()->id();
            $ads = Ad::query()->withCount([
               'bookmarkedByUsers as bookmarked' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
               }
            ])->get();
            return view('ads.index' ,compact('branches','ads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory
    {

        $action = route('ads.store');
        $branches = Branch::all();
        $ads=Ad::all();
        $ad=new Ad();
        return view('ads.create', compact('action','ads','branches','ad'));

    }

    /**
     * Store a newly created resource in storage.
     */
    #[NoReturn] public function store(Request $request)
    {

        $request->validate([
            'title' => 'required | min:5',
            'description' => 'required',
            'image'=>'mimes:jpg,jpeg,png,gif,svg|max:2048',
        ],[
            'title'=>['required' => 'Titlini kiritish majburiy'],
            'description' => ['required' => 'Izoh kiritish majburiy'],
        ]);

        $ad = Ad::query()->create([
            'title' => $request->input("title"),
            'description' => $request->input("description"),
            'users_id'=> auth()->id(),
            'statuses_id' => Status::ACTIVE,
            'address' => $request->input("address"),
            'branches_id' => $request->input("branch_id"),
            'price' => $request->input("price"),
            'rooms' => $request->input("rooms"),
             'gender'=>$request->input("gender")

        ]);

        if ($request->hasFile('image')) {
            $file = Storage::disk('public')->put('/', $request->image);

            Images::query()->create([
                'ad_id' => $ad->id,
                'name'  => $file,
            ]);
        }

        return redirect(route('home'))->with('message', "E'lon yaratildi");
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory
    {
        $ad = Ad::with('branch')->find($id);
        return view('components.single-ad', ['ad'=>$ad]);
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



    public function find(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $searchPhrase = $request->input('search_phrase');
        $branchId = $request->input('branches_id');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $ads = Ad::query();
        if ($searchPhrase) {
            $ads->where('title', 'like', '%' . $searchPhrase . '%');
        }
        if ($branchId) {
            $ads->where('branches_id', $branchId);
        }
        if ($minPrice) {
            $ads->where('price', '>=', $minPrice);
        }
        if ($maxPrice) {
            $ads->where('price', '<=', $maxPrice);
        }
        $ads = $ads->with('branch')->get();
        $branches = Branch::all();
        return view('ads.index', compact('ads', 'branches'));
    }


  public function contact()
  {
      return view("components.contact");
  }

}
