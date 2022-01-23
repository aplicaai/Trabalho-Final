@extends('layouts.main') 
@section('title', 'Carteiras Valores')
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
                            <h5>{{ __('Carteira Valores')}}</h5>
                            <span>{{ __('Ajustar o Objetivo dos Ativos')}}</span>
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
                            <li class="breadcrumb-item active" aria-current="page">Carteira Valores</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

<!-- ////////////////////////////////////// -->
        <div class="row">
            <div class="col-sm-12">
                <form class="forms-sample" id="carteira-cadastrar" method="post" action="{{route('carteira-cadastrar')}}">
                    @csrf
                    <input type="hidden" value="{{$valor_carteira}}" name="valor_carteira">
                    <input type="hidden" value="{{$nome}}" name="nome">
                    @foreach($valor as $v)
                        <input type="hidden" name="acao[]" value="{{$v}}">
                    @endforeach

                    <div class="card">
                        <!-- <div class="card-header d-block">
                            <h3>{{ __('Zero Configuration')}}</h3>
                        </div> -->
                        <div class="card-body">
                            <div class="dt-responsive">
                                <table id="scr-vtr-dynamic"
                                    class="table table-striped table-bordered nowrap">
                                    <thead>
                                    <tr>
                                        <th class="nosort">Ativo</th>
                                        <th>Nome</th>
                                        <th>Razão</th>
                                        <th>Preço por ação</th>
                                        
                                        <th>Objetivo</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($acoesEscolhidas as $ae)
                                            
                                        <tr>
                                            <td>{{$ae['symbol']}}</td>
                                            <td>{{$ae['name']}}</td>
                                            <td>{{$ae['company_name']}}</td>
                                            <td>        
                                                {{$ae['price']}}
                                            </td>
                                           
                                            <td>
                                                <input id="{{$ae['symbol']}}" step="0.01" class='porcentagem' name="{{$ae['symbol']}}" value="0" type="number" max='100' min='0'>
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
                                <button onclick='porcentagem()' type="submit" class="btn btn-primary mr-2">{{ __('Confirmar')}}</button>
                                <a class="btn btn-light" type="button" href="/dashboard">{{ __('Cancelar')}}</a>
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
      
