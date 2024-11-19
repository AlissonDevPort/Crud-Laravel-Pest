<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DevUsers; 

class DevUsersController  extends Controller
{
    public function index()
    {
        $users = DevUsers::all();
        return view('users.index')->with('users', $users);
    }

    public function create()
    {
        return view('users.create');
    }


    public function store(Request $request)
{

    $validated = $request->validate([
        'nome' => 'required|max:128',
        'funcao' => 'required|max:128', 
    ]);

    DevUsers::create($request->all());


    return to_route('dev-users.index')->with('success', 'Usuário criado com sucesso!');
}

   
    public function destroy(Request $request, $id)
{
    $user = DevUsers::find($id);

    if ($user) {
        $user->delete();
        session()->flash('success', 'Usuário deletado com sucesso!');
    } else {
        session()->flash('error', 'Usuário não encontrado.');
    }

    return to_route('dev-users.index');
}
public function edit($id)
{
    $user = DevUsers::find($id);

    if (!$user) {
        session()->flash('error', 'Usuário não encontrado.');
        return to_route('dev-users.index');
    }

    return view('users.edit', compact('user'));
}

public function update(Request $request, $id)
{

    $validated = $request->validate([
        'nome' => 'required|max:128',
        'funcao' => 'required|max:128',
    ]);


    $user = DevUsers::findOrFail($id);


    $user->update($request->all());

    return to_route('dev-users.index')->with('success', 'Usuário atualizado com sucesso!');
}
}
