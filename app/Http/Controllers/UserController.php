<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        //Primera forma
        //$user = User::all();

        //Segunda forma
        $user = DB::table('users')->select('email','name','created_at')->get();
        return view('users.index', ['user' => $user]);






        


    }

    public function create()
    {
       
        $ListaRol = DB::table('roles')->select('id','name','slug','descripcion','full-access')->get();
        return view('users.create', ['ListaRol' => $ListaRol]);
       

    }

    public function store(Request $request)
    {
        $usuarios = new User();
        $usuarios->name = request('name');
        $usuarios->email = request('email');
        $usuarios->password = bcrypt(request('password'));
        $usuarios->save();
        return redirect('/user');
    }


    public function destroy(Product $product)
    {
        
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }

}


/*
    public function index()
    {
        //Primera forma
        //$user = User::all();

        //Segunda forma
        $finca = DB::table('finca')->select('identidicacion','nombre_representante','nombre_finca','municipio','vereda','celular')->get();
        return view('finca.index', ['finca' => $finca]);
    }
*/