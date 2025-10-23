<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
		$data['dataUser'] = User::all();
		return view('admin.user.index',$data);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
		return view('admin.user.create');
        $data['password'] = Hash::make($request->password);
}

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request){

		// dd($request->all())

		$data['name'] = $request->name;
		$data['email'] = $request->email;
		$data['password'] = $request->password;

		user::create($data);

		return redirect()->route('user.index')->with('success','Penambahan Data Berhasil!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $data['dataUser'] = User::findOrFail($id);
    return view('admin.user.edit', $data);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $user_id =$id;
    $user = User::findOrFail($id);

    $user->name = $request->name;
    $user->email      = $request->email;
    $user->password      = $request->password;

    $user->save();

    return redirect()->route('user.index')->with('success', 'Perubahan Data Berhasil!');
}

    public function destroy(string $id)
{
    $user = User::findOrFail($id);

    $user->delete();
    return redirect()->route('user.index')->with('success', 'Data berhasil dihapus!');
}

}
