'@extends('layouts.main') 
@section('title', 'Data Tables')
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
                            <span>{{ __('Alterar Carteira')}}</span>
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
                            <li class="breadcrumb-item active" aria-current="page">Alterar Carteira</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

<!-- ////////////////////////////////////// -->
        <div class="row">
            <div class="col-sm-12">
                <form class="forms-sample" id="carteira-alterar" method="post" action="">
                    @csrf
                    <div class="card">
                        <div class="card-header d-block ">
                            @foreach($dadosCarteira as $ac)
                                <h3>{{$ac['nome']}}</h3>
                            @endforeach
                        </div>
                        <div class="card-body">
                            <div class="dt-responsive">
                                <table id="simpletable"
                                    class="table table-striped table-bordered nowrap">
                                    <thead>
                                    <tr>
                                        <th class="nosort">Ativo</th>
                                        <!-- <th>Nome empresa</th> -->
                                        
                                        <th>
                                            <center>Setor</center>
                                        </th>
                                        <th>
                                            <center>Quantidade</center>
                                        </th>
                                        <th>
                                            <center>Cotação atual</center>
                                        </th>
                                        <th>
                                            <center>Patrimônio atualizado (%)</center>
                                        </th>
                                        <th>
                                            <center>Participação atual (%)</center>
                                        </th>
                                        
                                        <!-- <th>Patrimônio Atualizado</th> -->
                                        <th>
                                            <center>Objetivo</center>
                                        </th>
                                        <th>
                                            <center>Distância do objetivo</center>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($acao_carteiras as $a)
                                        <tr>
                                            <!-- <input type="hidden" value=""> -->
                                            <td>
                                                <center>{{$a['ativo']}}</center>
                                            </td>
                                            
                                            <td class="w-50 overflow-auto" style="white-space: inherit">     
                                                <center>{{$a['setor']}}</center>
                                            </td>
                                            <td>
                                                <center>{{$a['quantidade']}}</center>
                                            </td>
                                            <td>
                                                <div>
                                                    <center>R$ {{$a['preco_acao']}}</center>
                                                </div>
                                            </td>
                                            <td>
                                                <center>R$ {{$a['patrimonioAtualizado']}}</center>
                                            </td>
                                            <td>
                                                <center>{{$a['participacaoAtual']}}%</center>
                                            </td>
                                            <td>
                                                <center>{{$a['porcentagem_objetivo']}}%</center>
                                                <!-- <input id="{{$a['symbol']}}" value="{{$a['porcentagem']}}" class='porcentagem' name="{{$a['symbol']}}" value="0" type="number" max='100' min='1'> -->
                                            </td>
                                            <td>
                                                <center>{{$a['porcentagem_objetivo']-$a['participacaoAtual']}}%</center>
                                                <!-- <input type="number" step="1" min="0"> -->
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
    @endpush
@endsection
      
