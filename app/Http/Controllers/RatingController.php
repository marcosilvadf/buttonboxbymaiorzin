<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function rating(Request $request)
    {
        return response()->json('sucesso', 200);
    }
}
