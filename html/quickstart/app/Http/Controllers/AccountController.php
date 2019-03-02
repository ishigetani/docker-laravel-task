<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 確認画面
     *
     * @return \Illuminate\Http\Response
     */
    public function close_confirm()
    {
        return view('close_account');
    }

    /**
     * アカウント削除
     *
     * @return redirect
     */
    public function close()
    {
        $account = User::find(Auth::user()->id);
        $account->delete();

        return redirect()->route('login');
    }
}
