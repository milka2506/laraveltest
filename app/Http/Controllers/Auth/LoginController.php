<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class LoginController extends Controller
{
    public function login()
    {
      return view('auth.login');
    }

    public function showLoginForm()
    {
      return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('home');
        }

        return redirect('login')->with('error', 'Oppes! You have entered invalid credentials');
    }

    public function logout() {
      Auth::logout();
      return redirect('login');
    }

    public function home()
    {
      //dd(Auth::user());
      $tasks = Task::where('user_id', '=', Auth::user()->id)->orderBy("iscompleted", "asc")->get();
      return view('auth.home', [
        'tasks' => $tasks
    ]);
    }

    public function done()
    {
      $tasks = Task::where('user_id', '=', Auth::user()->id)->where('iscompleted',1)->get();
      return view('auth.done', [
        'tasks' => $tasks
    ]);
    }

    public function pending()
    {
      $tasks = Task::where('user_id', '=', Auth::user()->id)->orderBy("iscompleted", "asc")->get();
      return view('auth.pending', [
        'tasks' => $tasks
    ]);
    }
}
