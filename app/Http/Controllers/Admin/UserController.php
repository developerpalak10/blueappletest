<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;
use Redirect;
use Response;
use Auth;

class UserController extends Controller
{
     public function index()
   {
        $users = User::orderBy('id', 'desc')->get();
      
        return view('admin/users/user_list',compact('users'));
   }
}
