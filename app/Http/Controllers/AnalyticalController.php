<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserPcHash;
use App\Models\PcHashTrial;
use Illuminate\Support\Facades\Auth;

class AnalyticalController extends Controller
{
    public function index()
    {
        abort_if(Auth::id() !== 1, 403);

        $data = [
            'users' => User::count(),
            'userPcHashes' => UserPcHash::count(),
            'pcHashTrials' => PcHashTrial::count(),
        ];

        return view('analytical.index', compact('data'));
    }
}
