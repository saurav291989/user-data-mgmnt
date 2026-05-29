<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('user_data')
                    ->orderBy('id', 'desc')
                    ->paginate(5);
        $totalcount= DB::table('user_data') -> count();

        return view('users', compact('users','totalcount'));
    }
}