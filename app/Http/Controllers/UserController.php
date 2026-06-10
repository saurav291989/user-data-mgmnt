<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Models\UserData;

class UserController extends Controller
{

    public function create()
    {
        $departments = Department::all();

        return view('create', compact('departments'));
    }

    public function store(StoreUserRequest $request)
    {
        UserData::create($request->validated());
            // 'name' => $request->name,
            // 'email' => $request->email,
            // 'city' => $request->city,
            // 'age' => $request->age,
            // 'gender' => $request->gender,
            // 'department_id' => $request->department_id
        // ]);

        return redirect()
                ->route('users.index')
                ->with('success', 'User added successfully!');
    }

    public function index(Request $request)
    {
        $search = $request->search;

        $users = UserData::with('department')
                    ->when($search, function ($query) use ($search) {
                        $query->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%")
                            ->orWhere('city', 'like', "%{$search}%");
                    })
                    ->orderBy('id', 'desc')
                    ->paginate(5);

        $totalcount = UserData::count();

        return view('users', compact('users', 'totalcount'));
    }


    public function destroy($id)
    {
        
        UserData::find($id)->delete();

        return redirect()
                ->route('users.index')
                ->with('success', 'User deleted successfully!');
    }

    public function edit($id)
    {
        $user = UserData::findOrFail($id);

        $departments = Department::all();

        return view('edit', compact('user', 'departments'));
    }

    public function update(UpdateUserRequest $request, UserData $user)
    {
        
        // $user = UserData :: FindOrFail($id);
        $user -> update($request->validated());
                // 'name' => $request->name,
                // 'age' => $request->age,
                // 'email' => $request->email,
                // 'city' => $request->city,
                // 'gender' => $request->gender,
                // 'department_id' => $request->department_id

            // ]);
            // dd($user->fresh()->department_id);

        return redirect()
                ->route ('users.index')
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