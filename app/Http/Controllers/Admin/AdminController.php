<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paymentmethod;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }
    public function userList()
    {
        $users = User::where('role_id', 2)->get();
        return view('admin.users.userLists', compact('users'));
    }
}