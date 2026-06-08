<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Models\UserData;

class UserController extends Controller
{
    
    public function dispaly()
    {

        $users = UserData::with('department')
                    ->orderBy('id', 'desc')
                    ->paginate(5);

        $totalcount = UserData::count();

        return view('users', compact('users','totalcount'));
    }


    public function delete($id)
    {
        
        UserData::find($id)->delete();

        return redirect('/users')
                ->with('success', 'User deleted successfully!');
    }

    public function edit($id)
    {
        
        $user = UserData :: FindOrFail($id);

        return view('edit', compact('user'));
    }

    public function update(Request $request,$id)
    {
        
        $user = UserData :: FindOrFail($id);
        $user -> update([
                'name' => $request->name,
                'age' => $request->age,
                'email' => $request->email,
                'city' => $request->city,
                'gender' => $request->gender,
                'department_id' => $request->department_id

            ]);
            // dd($user->fresh()->department_id);

        return redirect('/users')
                ->with('success', 'User updated successfully!');
    }

public function getUsers()
{
    // logger('app route hit');

    $users = UserData::with('department')
                    ->orderBy('id', 'desc')
                    ->paginate(5);

    $totalcount = UserData::count();

    return response()->json([
        'status' => true,
        'total_records' => $totalcount,
        'data' => $users
    ]);
}

}