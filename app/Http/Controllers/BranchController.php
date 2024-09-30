<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {

        $branches = Branch::all();

        return view('components.branch', ['branches' => $branches]);

    }
    public function branch()
    {
       $ads=Ad::all();
       return view('components.branchS', ['ads'=>$ads]);
    }
}
