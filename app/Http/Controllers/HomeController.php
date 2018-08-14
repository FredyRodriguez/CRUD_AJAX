<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);
        return view('home',compact('users'));
    }
    public function destroy(Request $request, $id){
        if($request->ajax()){
            $users = User::find($id);
            $users->delete();
            $user_total = User::all()->count();
            return response()->json([
                'total' => $user_total,
                'message' => $users->name . 'Fue eliminado Correctamente',
            ]);
        }
    }
}
