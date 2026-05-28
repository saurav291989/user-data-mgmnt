<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UserDataImport;
use Maatwebsite\Excel\Facades\Excel;

class UserDataController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xlsx,xls'
        ]);

        Excel::import(
            new UserDataImport,
            $request->file('file')
        );

        return redirect('/')
            ->with('success',
            'File uploaded successfully!');
    }
}