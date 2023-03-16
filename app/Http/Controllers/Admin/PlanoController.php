<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PlanoRequest;
use App\Models\Plano;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $criarPlano = Plano::create($request->all());
        $criarPlano->fill($request->all());              
        return Redirect::route('planos.edit', [
            'id' => $criarPlano->id,
        ])->with(['color' => 'success', 'message' => 'Plano cadastrado com sucesso!']);
    }

    public function edit($id)
    {
        $plano = Plano::where('id', $id)->first();        
        return view('admin.planos.edit', [
            'plano' => $plano
        ]);
    }

    public function update(PlanoRequest $request, $id)
    {
        //dd($request->all());
        $planoEdit = Plano::where('id', $id)->first();
        $planoEdit->fill($request->all());

        $planoEdit->setSegundaAttribute($request->segunda);
        $planoEdit->setTercaAttribute($request->terca);
        $planoEdit->setQuartaAttribute($request->quarta);
        $planoEdit->setQuintaAttribute($request->quinta);
        $planoEdit->setSextaAttribute($request->sexta);
        $planoEdit->setSabadoAttribute($request->sabado);

        $planoEdit->save();
        return Redirect::route('planos.edit', [
            'id' => $planoEdit->id,
        ])->with(['color' => 'success', 'message' => 'Plano atualizado com sucesso!']);
    }

    public function planosetStatus(Request $request)
    {        
        $plano = Plano::find($request->id);
        $plano->status = $request->status;
        $plano->save();
        return response()->json(['success' => true]);
    }

    public function delete(Request $request)
    {
        $plano = Plano::where('id', $request->id)->first();
        $nome = \App\Helpers\Renato::getPrimeiroNome(Auth::user()->name);

        if(!empty($plano)){
            $json = "<b>$nome</b> você tem certeza que deseja excluir este plano?";                      
            return response()->json(['error' => $json,'id' => $request->id]);
        }else{
            return response()->json(['error' => 'Erro ao excluir']);
        }     
    }

    public function deleteon(Request $request)
    {
        $plano = Plano::where('id', $request->plano_id)->first();
        if(!empty($plano)){
            $plano->delete();
        }
        return Redirect::route('planos.index')->with([
            'color' => 'success', 
            'message' => 'Plano removido com sucesso!'
        ]);
    }
}
