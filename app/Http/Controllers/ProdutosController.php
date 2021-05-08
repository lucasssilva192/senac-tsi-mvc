<?php

namespace App\Http\Controllers;
use App\Models\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProdutosController extends Controller
{
    use HasFactory;
    use HasRoles;

    /*
    public function __construct()
	{
		$this->middleware('permission:produto-list',['only' => ['index','show']]);
		$this->middleware('permission:produto-create',['only' => ['create','store']]);
		$this->middleware('permission:produto-edit',['only' => ['edit','update']]);
		$this->middleware('permission:produto-delete',['only' => ['destroy']]);
	}
    */

    public function listar(){
        $produtos = Produtos::all();
    	return view('produtos.listar', ['produtos' => $produtos]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $qtd_por_pagina = 5;

        $data = Produtos::orderBy('id', 'DESC')->paginate($qtd_por_pagina);

        return view('produtos.index',
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
        return view('produtos.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        ['nome' => 'required',
         'preco' => 'required',
         'descricao' => 'required']);

        $input = $request->all();

        Produtos::create($input);

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produtos::find($id);
        return view('produtos.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produtos::find($id);

        return view('produtos.edit', compact('produto'));
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
        $this->validate($request,
                        ['nome' => 'required',
                         'preco' => 'required',
                         'descricao' => 'required']);
        $input = $request->all();
        $produto = Produtos::find($id);
        $produto->update($input);
        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produtos::find($id)->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto removido com sucesso');
 
    }
}
