';@extends('layouts.main') 
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
                            <h5>{{ __('Data Table')}}</h5>
                            <span>{{ __('lorem ipsum dolor sit amet, consectetur adipisicing elit')}}</span>
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
                                <a href="#">Tables</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

<!-- ////////////////////////////////////// -->
        <div class="row">
            <div class="col-sm-12">
                <form class="forms-sample" id="carteira-alterar" method="post" action="{{route('carteira-alterar')}}">
                    @csrf
                    <div class="card">
                        <div class="card-header d-block">
                            <h3>{{ __('Zero Configuration')}}</h3>
                        </div>
                        <div class="card-body">
                            <div class="dt-responsive">
                                <table id="simpletable"
                                    class="table table-striped table-bordered nowrap">
                                    <thead>
                                    <tr>
                                        <th class="nosort">Ação</th>
                                        <!-- <th>Nome empresa</th> -->
                                        <th>Preço por ação</th>
                                        <th>Objetivo</th>
                                        <th>Quantidade</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($acao_carteiras as $a)
                                        <tr>
                                            <!-- <input type="hidden" value=""> -->
                                            <td>{{$a['acao']}}</td>
                                            <td>
                                                {{$a['preco_acao']}}
                                            </td>
                                            <td>
                                                <input id="{{$a['symbol']}}" value="{{$a['porcentagem']}}" class='porcentagem' name="{{$a['symbol']}}" value="0" type="number" max='100' min='1'>
                                            </td>
                                            <td><input type="number" step="1" min="0"></td>
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
      
