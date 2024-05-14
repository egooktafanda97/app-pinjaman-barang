<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Prefix;

#[Prefix("home")]
class HomeController extends Controller
{
    #[Get("")]
    public function index()
    {
        return view('pages.home.show');
    }
}
