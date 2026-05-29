<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function dispaly()
    {
        $users = DB::table('user_data')
                    ->orderBy('id', 'desc')
                    ->paginate(5);
        $totalcount= DB::table('user_data') -> count();

        return view('users', compact('users','totalcount'));
    }

    public function delete($id)
    {
        DB::table('user_data')
            ->where('id', $id)
            ->delete();

        return redirect('/users')
                ->with('success', 'User deleted successfully!');
    }

    public function edit($id)
    {
        $user = DB::table('user_data')
            ->where('id', $id)
            ->first();

        return view('edit', compact('user'));
    }

    public function update(Request $request,$id)
    {
        DB::table('user_data')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'age' => $request->age,
                'email' => $request->email,
                'city' => $request->city,
                'gender' => $request->gender

            ]);

        return redirect('/users')
                ->with('success', 'User updated successfully!');
    }
}