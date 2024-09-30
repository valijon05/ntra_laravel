<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdForm extends Component
{
    public $ad;
    public array|null $ads =null;
    public  array|null  $status = null;
    public  $action = "/ads";
    public   $branches = [];


    public function __construct()
    {
        $this->branches = \App\Models\Branch::all();
    }


    public function render(): View|Closure|string
    {
        return view('components.ad-form');
    }
}
