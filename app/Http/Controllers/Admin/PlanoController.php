<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PlanoRequest;
use App\Models\Plano;
use Illuminate\Http\Request;

class PlanoController extends Controller
{
    public function index()
    {
        $planos = Plano::orderBy('created_at', 'DESC')->orderBy('status', 'ASC')->paginate(25);
        return view('admin.planos.index', [
            'planos' => $planos,
        ]);
    }

    public function create()
    {        
        return view('admin.planos.create');
    }
    
    public function store(PlanoRequest $request)
    {
        dd($request->all());
        $criarPlano = Plano::create($request->all());
        $criarPlano->fill($request->all());

        dd($request->all());
        if(!empty($request->file('logomarca'))){
            $criarEmpresa->logomarca = $request->file('logomarca')->storeAs('empresas', Str::slug($request->alias_name)  . '-' . str_replace('.', '', microtime(true)) . '.' . $request->file('logomarca')->extension());
            $criarEmpresa->save();
        }
        
        return Redirect::route('empresas.edit', [
            'id' => $criarEmpresa->id,
        ])->with(['color' => 'success', 'message' => 'Empresa cadastrada com sucesso!']);
    }
}
