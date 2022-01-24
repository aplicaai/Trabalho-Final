@extends('layouts.main') 
@section('title', 'Aporte')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
    @endpush

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-inbox bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Carteira')}}</h5>
                            <span>{{ __('Aporte de valores')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Carteira</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Aporte de valores</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <form class="forms-sample" id="carteira-alterar" method="post" action="">
                    @csrf
                    @foreach($arr_id_carteira as $a)
                        <input type="hidden" name="id_carteira" value="{{$a}}">
                    @endforeach
                    <div class="card">
                        <div class="card-header d-block text-secondary">
                            @foreach($dadosCarteira as $ac)
                                <h3>{{$ac['nome']}}</h3>
                            @endforeach
                        </div>

                        
                        <div class="card-header d-block">
                            <p>
                                <h3 class="text-secondary">
                                    <b>Adicionar valor à carteira</b>
                                </h3>
                            </p>
                            <div class="row">
                                <input type="number" id="btnAporte-valor" name="aporte-valor" step="0.01">
                                <a class="btn btn-success" style="margin-left: 10px;" onclick="aporte()" id="adicionar_valor">Adicionar</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="dt-responsive">
                                <table id="simpletable"
                                    class="table table-striped table-bordered nowrap">
                                    <thead>
                                    <tr>
                                        <th class="nosort">
                                            <center>Ativo</center>
                                        </th>
                                        <!-- <th>Nome empresa</th> -->
                                        
                                        <th>
                                            <center>Setor</center>
                                        </th>
                                        <th>
                                            <center>Quantidade</center>
                                        </th>
                                        <th>
                                            <center>Cotação<br> atual</center>
                                        </th>
                                        <th>
                                            <center>Patrimônio<br> atualizado (%)</center>
                                        </th>
                                        <th>
                                            <center>Participação<br> atual (%)</center>
                                        </th>
                                        
                                        <!-- <th>Patrimônio Atualizado</th> -->
                                        <th>
                                            <center>Objetivo (%)</center>
                                        </th>
                                        <th>
                                            <center>Distância do <br>objetivo (%)</center>
                                        </th>
                                        <th>
                                            <center>Quantas ações <br>comprar?</center>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="valores">
                                        @foreach($acao_carteiras as $a)
                                        <tr>
                                            <!-- <input type="hidden" value=""> -->
                                            <td>
                                                <center>
                                                    <input type="hidden" name="ativos[]" value="{{$a['ativo']}}">
                                                    <div class="ativo"  value="{{$a['ativo']}}">{{$a['ativo']}}</div>
                                                </center>
                                            </td>
                                            
                                            <td class="w-50 overflow-auto" style="white-space: inherit">     
                                                <center>{{$a['setor']}}</center>
                                            </td>
                                            <td>
                                                <center>
                                                    <div >
                                                        <!-- <input class="quantidade" style="width:70%" name="quantidade[]" type="number" step="0.01" max='100' min="{{$a['quantidade']}}" value="{{$a['quantidade']}}"> -->
                                                        <div class="quantidade" value="{{$a['quantiade']}}">{{$a['quantidade']}}</div>
                                                    </div>
                                                </center>
                                            </td>
                                            <td>
                                                <div>
                                                    <center>
                                                        <div>
                                                            R$ <span class="preco_acao">{{$a['preco_acao']}}</span>
                                                        </div>
                                                    </center>
                                                </div>
                                            </td>
                                            <td>
                                                <center>R$ {{$a['patrimonioAtualizado']}}</center>
                                            </td>
                                            <td>
                                                <center>{{$a['participacaoAtual']}} %</center>
                                            </td>
                                            <td>
                                                <center>
                                                    <div class="porcen_obj" >{{$a['porcentagem_objetivo']}} %</div>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <div class="porcen_distancia">{{number_format(($a['porcentagem_objetivo']-$a['participacaoAtual']),2)}} %</div>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <div id="{{$a['ativo']}}">
                                                        
                                                    </div>
                                                </center>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- <div class="card">
                                <button  type="submit" class="btn btn-blue" >Adicionar</button>
                            </div> -->
                            <div class="card">
                                <a class="btn btn-light" type="button" href="/listar-carteiras">{{ __('Voltar')}}</a>
                            </div>
                        </div>    
                    </div>
                </form>
            </div>

    <!-- ////////////////////////////////////// -->
    
    </div>
    
    <!-- push external js -->
    @push('script')
        <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('js/datatables.js') }}"></script>
        <script src="{{ asset('js/porcentagem.js')}}"></script>
        <script src="{{ asset('js/carteira_aporte.js')}}"></script>
    @endpush
@endsection
      
