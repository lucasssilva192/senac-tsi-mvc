<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Clientes;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function listar()
    {
    	$clientes = Clientes::all();

    	return view('clientes.listar', ['clientes' => $clientes]);
    }

    public function index(Request $request)
    {
        $qtd_por_pagina = 5;

        $data = Clientes::orderBy('id', 'DESC')->paginate($qtd_por_pagina);

        return view('clientes.index',
                compact('data'))->
                with('i', ($request->input('page', 1) -1 ) * $qtd_por_pagina );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('clientes.create', compact($roles));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validade($request,
                        ['nome' => 'required',
                         'endereco' => 'required',
                         'email' => 'required|email|unique:clientes,email',
                         'nascimento' => 'required']);
        $input = $request->all();
        $user = Clientes::create($input);
        $user->assignRole( $request->input('roles'));
        return redirect()->route('clientes.index')->with('success', 'Usuário criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Clientes::find($id);
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Clientes::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $clienteRole = $cliente->roles->pluck('name', 'name')->all();
        return view('clientes.edit', compact('cliente', 'roles', 'clienteRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validade($request,
                        ['name' => 'required',
                        'email' => 'required|email|unique:users,email',
                        'roles' => 'required']);
        $input = $request->all();
        $cliente = Clientes::find($id);
        $cliente->update($input);
        DB::table('model_has_roles')->where('model id', $id)->delete();
        $cliente->assignRole($request->input('roles'));
        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Clientes::find($id)->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente removido com sucesso');
    }
}
