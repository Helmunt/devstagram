<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
            return view('dashboard', [
            'user' => $user
        ]);
    }
    public function create(User $user){
        $user = auth()->user();
        return view('posts.create', [
            'user' => $user
        ]);
    }
}
