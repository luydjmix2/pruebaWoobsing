<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userL = User::get();
        return response($userL)
        ->setStatusCode(201);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'telefono' => 'required|size:10',
            'direcion' => 'required',
        ]);
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make('123'),
            'telefono' => $validatedData['telefono'],
            'dir' => $validatedData['direcion'],
        ]);
        return response($validatedData)
            ->setStatusCode(201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'telefono' => 'required|size:10',
            'direcion' => 'required',
        ]);
        $idUser = Auth::id();
        User::where('id', $id)
            ->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'telefono' => $validatedData['telefono'],
                'dir' => $validatedData['direcion'],
            ]);
        return back();
    }

    public function destroy($iduser)
    {
        User::where('id', $iduser)->delete();
        return back();
    }
}
