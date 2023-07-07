<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PedidoRequest;
use App\Models\Fatura;
use App\Models\Pedido;
use App\Models\Plano;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::orderBy('created_at', 'DESC')->paginate(25);
        return view('admin.pedidos.index', [
            'pedidos' => $pedidos
        ]);
    }

    public function create()
    {
        $planos = Plano::orderBy('created_at', 'DESC')->available()->get();
        $alunos = User::orderBy('created_at', 'DESC')->available()->where('client', '=', '1')->get();
        return view('admin.pedidos.create', [
            'alunos' => $alunos,
            'planos' => $planos
        ]);
    }

    public function store(PedidoRequest $request)
    {
        //Cria Pedido
        $data = [
            'plano' => $request->plano,
            'user' =>  $request->user,
            'periodo' => $request->periodo,
            'vencimento' => $request->vencimento,
            'status' => 1
        ];

        $criarPedido = Pedido::create($data);
        $criarPedido->save();

        //Cria Fatura
        if($request->gerarfatura === 'on'){
            $plano = Plano::where('id', $request->plano)->first();
            $vencimento = strtotime(Carbon::createFromFormat('d/m/Y',  $request->vencimento));

            $dado = [
                'pedido'     => $criarPedido->id,
                'user'       => $request->user,
                'valor'      => ($request->periodo == 1 ? $plano->valor_mensal : null),
                'vencimento' => date('Y-m-d', $vencimento),
                'status'     => 'pending'
            ];

            $criarFatura = Fatura::create($dado);
            $criarFatura->save();
            
            foreach(range(2, $request->periodo) as $parcela){
                $vencimento = strtotime('+30 days', $vencimento);
                $dados[] = [
                    'pedido'     => $criarPedido->id,
                    'user'       => $request->user,
                    'valor'      => ($request->periodo == 1 ? $plano->valor_mensal : null),
                    'vencimento' => date('Y-m-d', $vencimento),
                    'status'     => 'pending',
                    'created_at' => now()
                ]; 
                
            }     
            $criarFaturas = Fatura::insert($dados);
        }
                      
        return Redirect::route('pedidos.edit', [
            'id' => $criarPedido->id,
        ])->with(['color' => 'success', 'message' => 'Pedido cadastrado com sucesso!']);
    }

    // private function criarFaturas($num_faturas = 6, $pedido = null, $user = null, $valor)
    // {
    //     $faturas = [];

    //     for ( $x = 1; $num_faturas <= 6; $x++) {
    //         $dataFatura = [
    //             'pedido' => $pedido,
    //             'vencimento' => date('Y-m-d', strtotime("+30 days")),
    //             'user' => $user,
    //             'valor' => $valor,
    //             'status' => 'pending'
    //         ];

    //         array_push($faturas, [$dataFatura]);
    //     }
    //     dd($faturas);
    // }

    public function edit($id)
    {
        $alunos = User::orderBy('created_at', 'DESC')->available()->where('client', '=', '1')->get();
        $pedido = Pedido::where('id', $id)->first();        
        return view('admin.pedidos.edit', [
            'pedido' => $pedido,
            'alunos' => $alunos
        ]);
    }

    public function fetchPlan(Request $request)
    {
        $aluno = User::where('id', $request->aluno_id)->first();
        $data['plano'] = Plano::where("id", $aluno->plano)->get(["name", "id"]);
        return response()->json($data);
    }
}
