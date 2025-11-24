<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CustomerMessage;

class AdminController extends Controller
{

    public function dashboard()
    {
        $totalUsers = User::count();
        $totalTentor = User::where('role','tentor')->count();
        $totalSiswa = User::where('role','siswa')->count();
        $unreadMessages = CustomerMessage::where('status','Belum')->count();
        return view('admin.dashboard', compact('totalUsers','totalTentor','totalSiswa','unreadMessages'));
    }
}
