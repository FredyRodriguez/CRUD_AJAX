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
    /*public function store(Request $request)
    {   
        $user = new User();
        $user->name = $request['name'];
        $user->documento = $request['documento'];
        $user->telefono = $request['telefono'];
        $user->direccion = $request['direccion'];
        $user->genero = $request['genero'];
        $user->fecha = $request['fecha'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->save();
        return response()->json($user);
    }*/
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
