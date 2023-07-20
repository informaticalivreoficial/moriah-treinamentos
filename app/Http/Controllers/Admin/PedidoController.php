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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use WebMaster\PagHiper\PagHiper;

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
            $valor_fatura = ($request->periodo == 1 ? $plano->valor_mensal : 
                            ($request->periodo == 3 ? $plano->valor_trimestral : 
                            ($request->periodo == 6 ? $plano->valor_semestral : 
                            ($request->periodo == 12 ? $plano->valor_anual : null))));
                            
            $dado = [
                'pedido'     => $criarPedido->id,
                'user'       => $request->user,
                'valor'      => $valor_fatura,
                'vencimento' => date('Y-m-d', $vencimento),
                'status'     => 'pending',
                'created_at' => now()
            ];

            $criarFatura = Fatura::create($dado);
            $criarFatura->save();
            
            foreach(range(2, $request->periodo) as $parcela){
                $vencimento = strtotime('+30 days', $vencimento);
                $dados[] = [
                    'pedido'     => $criarPedido->id,
                    'user'       => $request->user,
                    'valor'      => str_replace(',', '.', str_replace('.', '', $valor_fatura)),
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

    public function edit($id)
    {
        $pedido = Pedido::where('id', $id)->first(); 
        return view('admin.pedidos.edit', [
            'pedido' => $pedido
        ]);
    }

    public function fetchPlan(Request $request)
    {
        $aluno = User::where('id', $request->aluno_id)->first();
        $data['plano'] = Plano::where("id", $aluno->plano)->get(["name", "id"]);
        return response()->json($data);
    }

    public function pagar($fatura)
    {
        $fatura = Fatura::where('id', $fatura)->first();
        $data = [
            'order_id' => $fatura->id,
            'payer_name' => $fatura->userObject->name,
            'payer_email' => $fatura->userObject->email,
            'payer_cpf_cnpj' => $fatura->userObject->cpf,
            'days_due_date' => Carbon::parse($fatura->vencimento)->diffInDays(Carbon::parse(Carbon::now())),
            'type_bank_slip' => 'boletoa4',
            'items' => [
                [
                    'item_id' => 1,
                    'description' => $fatura->pedidoObject->planoObject->name,
                    'quantity' => 1,
                    'price_cents' => str_replace('.', '', $fatura->valor)
                ]
            ]
        ];  
        return $this->gerarBoleto($data);       
    }

    public function gerarBoleto($data)
    {
        $paghiper = new PagHiper(
            env('PAGHIPER_APIKEY'), 
            env('PAGHIPER_TOKEM')
        );
        $transaction = $paghiper->billet()->create($data);
        
        if(!empty($transaction) && $transaction['result'] == 'success'){
            $fatura = Fatura::where('id', $transaction['order_id'])->first();
            $fatura->transaction_id = $transaction['transaction_id'];
            $fatura->status = $transaction['status'];
            $fatura->valor = str_replace(',', '.', str_replace('.', '', $transaction['value_cents']));
            $fatura->url_slip = $transaction['bank_slip']['url_slip'];
            $fatura->digitable_line = $transaction['bank_slip']['digitable_line'];
            $fatura->vencimento = $transaction['due_date'];
            $fatura->save(); 
            return redirect()->away($fatura->url_slip);           
        }  
    }

    // public function getBoleto(Request $request)
    // {
    //     $fatura = Fatura::where('id', $request->id)->first();
    //     $json = $fatura->url_slip;
    //     return response()->json($json);
    // }

    public function getTransaction(Request $request)
    {
        $paghiper = new PagHiper(
            env('PAGHIPER_APIKEY'), 
            env('PAGHIPER_TOKEM')
        );
        $transaction = $paghiper->notification()->response(
            $_POST['notification_id'], 
            $_POST['idTransacao']
        );
    }
}
