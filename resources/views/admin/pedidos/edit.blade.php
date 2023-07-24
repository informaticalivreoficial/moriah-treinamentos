@extends('adminlte::page')

@section('title', 'Editar Pedido')

@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1><i class="fas fa-search mr-2"></i>Editar Pedido</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Painel de Controle</a></li>
            <li class="breadcrumb-item"><a href="{{route('pedidos.index')}}">Pedidos</a></li>
            <li class="breadcrumb-item active">Editar Pedido</li>
        </ol>
    </div>
</div> 
@stop

@section('content')
<div class="row">
    <div class="col-12">
        @if($errors->all())
            @foreach($errors->all() as $error)
                @message(['color' => 'danger'])
                {{ $error }}
                @endmessage
            @endforeach
        @endif 
        
        @if(session()->exists('message'))
            @message(['color' => session()->get('color')])
            {{ session()->get('message') }}
            @endmessage
        @endif         
    </div>            
</div>   
                    
            
<form action="{{ route('pedidos.update', ['id' => $pedido->id]) }}" method="post">
    @csrf  
    @method('PUT')           
    <div class="row">            
        <div class="col-12">
            <div class="card card-teal card-outline card-outline-tabs">                            
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Informações</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-faturas-tab" data-toggle="pill" href="#custom-tabs-four-faturas" role="tab" aria-controls="custom-tabs-four-faturas">Faturas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-contrato-tab" data-toggle="pill" href="#custom-tabs-four-contrato" role="tab" aria-controls="custom-tabs-four-contrato">Contrato</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                        
                            <div class="row mb-2"> 
                                <div class="col-12 col-md-6 col-lg-5"> 
                                    <div class="form-group">
                                        <label class="labelforms text-muted"><b>*Aluno</b> </label>
                                        <select class="form-control" name="user" {{(auth()->user()->superadmin == null ? 'disabled' : '')}}>
                                            @foreach($alunos as $aluno)
                                                <option value="{{ $aluno->id }}" {{ (old('user') == $aluno->id ? 'selected' : ($aluno->id == $pedido->aluno ? 'selected' : '')) }}>{{ $aluno->name }}</option>
                                            @endforeach
                                        </select>                                       
                                    </div>
                                </div> 
                                <div class="col-12 col-md-6 col-lg-5"> 
                                    <div class="form-group">
                                        <label class="labelforms text-muted"><b>*Plano</b> </label>
                                        <select class="form-control" name="plano">                                            
                                            @foreach($planos as $plano)
                                                <option value="{{ $plano->id }}" {{ (old('plano') == $plano->id ? 'selected' : ($plano->id == $pedido->plano ? 'selected' : '')) }}>{{ $plano->name }}</option>
                                            @endforeach
                                        </select>                                        
                                    </div>
                                </div> 
                                <div class="col-12 col-sm-4 col-md-4 col-lg-2">
                                    <div class="form-group">
                                        <label class="labelforms text-muted"><b>Período:</b></label>
                                        <select name="periodo" class="form-control">
                                            <option value="1" {{ (old('periodo') == '1' ? 'selected' : ($pedido->periodo == 1 ? 'selected' : '')) }}>Mensal</option>
                                            <option value="3" {{ (old('periodo') == '3' ? 'selected' : ($pedido->periodo == 3 ? 'selected' : '')) }}>Trimestral</option>
                                            <option value="6" {{ (old('periodo') == '6' ? 'selected' : ($pedido->periodo == 6 ? 'selected' : '')) }}>Semestral</option>
                                            <option value="12" {{ (old('periodo') == '12' ? 'selected' : ($pedido->periodo == 12 ? 'selected' : '')) }}>Anual</option>
                                        </select>
                                    </div>
                                </div>                 
                            </div>

                            <div class="row mb-2">
                                <div class="col-12 col-md-6 col-lg-3"> 
                                    <div class="form-group">
                                        <label class="labelforms text-muted"><b>*Primeiro Vencimento</b></label>
                                        <input type="text" class="form-control datepicker-here" data-language='pt-BR' name="vencimento" value="{{ old('vencimento') ?? $pedido->vencimento}}">
                                    </div>                                                    
                                </div>   
                                @if (!$pedido->countfaturas() > 0)
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">                                        
                                        <div class="form-group p-3 mb-1">
                                            <label class="labelforms text-muted"><b> </b></label>
                                            <div class="form-check mb-2">
                                                <input id="gerarfatura" class="form-check-input" type="checkbox" name="gerarfatura" {{ (old('gerarfatura') == 'on' || old('gerarfatura') == true ? 'checked' : '') }}>
                                                <label for="gerarfatura" class="form-check-label text-muted">Gerar Fatura?</label>
                                            </div>                                            
                                        </div>
                                    </div>
                                @endif                                                             
                                <div class="col-12 col-sm-6 col-md-4 col-lg-2">                                        
                                    <div class="form-group p-3 mb-1">
                                        <label class="labelforms text-muted"><b> </b></label>
                                        <div class="form-check mb-2">
                                            <input id="gerarcontrato" class="form-check-input" type="checkbox" name="gerarcontrato" {{ (old('gerarcontrato') == 'on' || old('gerarcontrato') == true ? 'checked' : '') }}>
                                            <label for="gerarcontrato" class="form-check-label text-muted">Gerar Contrato?</label>
                                        </div>                                            
                                    </div>
                                </div>                             
                            </div> 
                            <div class="row text-right">
                                <div class="col-12 my-3">
                                    <button type="submit" class="btn btn-lg btn-success"><i class="nav-icon fas fa-check mr-2"></i> Atualizar Agora</button>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade show" id="custom-tabs-four-faturas" role="tabpanel" aria-labelledby="custom-tabs-four-faturas-tab">
                            @if(!empty($pedido->faturas()->get()))                                
                                <table class="table table-bordered table-striped projects">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Valor</th>                        
                                            <th class="text-center">Vencimento</th> 
                                            <th class="text-center">Envio</th>                       
                                            <th class="text-center">Status</th>                        
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pedido->faturas()->get() as $fatura)                    
                                        <tr>
                                            <td class="text-center">{{$fatura->id}}</td>                        
                                            <td class="text-center">R$ {{ preg_replace("/^([0-9]+)*?([0-9]{2})$/", "$1,$2", $fatura->valor) }}</td>                        
                                            <td class="text-center">{{\Carbon\Carbon::parse($fatura->vencimento)->format('d/m/Y')}}</td>
                                            <td class="text-center">
                                                @if ($fatura->valor && $fatura->vencimento)
                                                    @if ($fatura->form_sendat == null)
                                                        <a href="javascript:void(0)" class="btn btn-xs btn-success text-white j_enviaform cli{{ $fatura->id }}" data-id="{{ $fatura->id }}">Enviar Fatura <i class="fas fa-envelope"></i></a>
                                                    @else
                                                        <a href="javascript:void(0)" class="btn btn-xs btn-secondary text-white j_enviaform cli{{ $fatura->id }}" data-id="{{ $fatura->id }}">Reenviar Fatura <i class="fas fa-envelope"></i></a>
                                                    @endif
                                                @else
                                                    ------------
                                                @endif                                                            
                                            </td>
                                            <td class="text-center">{!!$fatura->getStatus()!!}</td>                       
                                            <td>
                                                <a title="Visualizar Boleto" target="_blank" class="btn btn-success setBoleto" href="{{$fatura->url_slip ?? route('web.pagar',['fatura' => $fatura->id])}}">
                                                    <i class="far fa-file-alt"></i>
                                                </a>                                                                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>                
                                </table>                                
                            @endif
                        </div>

                        <div class="tab-pane fade show" id="custom-tabs-four-contrato" role="tabpanel" aria-labelledby="custom-tabs-four-contrato-tab">

                        </div>

                    </div>
                     
                </div>  
            </div> 
        </div> 
    </div>                    
</form>                 
            
@stop

@section('css')
<link href="{{url(asset('backend/plugins/airdatepicker/css/datepicker.min.css'))}}" rel="stylesheet" type="text/css">
@stop

@section('js')
<script src="{{url(asset('backend/plugins/airdatepicker/js/datepicker.min.js'))}}"></script>
<script src="{{url(asset('backend/plugins/airdatepicker/js/i18n/datepicker.pt-BR.js'))}}"></script>
    <script src="{{url(asset('backend/assets/js/jquery.mask.js'))}}"></script>
    <script>
        $(document).ready(function () { 
        var $money = $(".mask-money");
        $money.mask('R$ 000.000.000.000.000,00', {reverse: true, placeholder: "R$ 0,00"});
        });
    </script>

    <script>
        $(function () {    
            
            $.ajaxSetup({
                headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }); 

            $('#setPlan').on('change', function () {
                var idFaura = this.value;
                $.ajax({
                    url: "{{route('pedidos.fetchPlan')}}",
                    type: "POST",
                    data: {
                        aluno_id: idAluno,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        if(res.plano[0].name){
                            $("#getPlanId").val(res.plano[0].id);
                            $("#getPlan").val(res.plano[0].name);
                        }else{
                            $("#getPlan").val('Selecione primeiro um plano para o Aluno');
                        }
                    }
                });
            });

            $('.setBoleto').click(function() {
                setTimeout(function() {
                    location.reload();
                }, 3000);
            });
        });
    </script>
@stop