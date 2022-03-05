<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CustomClass\Post_class;

class HomeController extends Controller
{
    public function home()
    {
      return Post_class::show_home();     
    }
}
