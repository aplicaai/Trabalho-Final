@extends('layouts.main') 
@section('title', 'Listar Carteiras')
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
                            <span>{{ __('Visualizar Carteiras')}}</span>
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
                            <li class="breadcrumb-item active" aria-current="page">Visualizar</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

<!-- ////////////////////////////////////// -->
        <div class="row">
            <div class="col-sm-12">
                <form class="forms-sample" id="carteira-cadastrar" method="post" action="">
                    @csrf
                   
                    <div class="card">
                        <div class="card-header d-block">
                            <h3>{{ __('Lista de Carteiras')}}</h3>
                        </div>
                        <div class="card-body">
                            <div class="dt-responsive">
                                <table id="simpletable"
                                    class="table table-striped table-bordered nowrap">
                                    <thead>
                                    <tr>
                                        <th>Nome da carteira</th>
                                        <th>Valor carteira</th>
                                        <th>Visualizar Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($carteiras as $c)
                                        <tr>
                                            <input type="hidden" name="id_carteira" value="{{$c['id']}}"> 
                                            <td>{{$c['nome']}}</td>
                                            <td>
                                                {{$c['valor']}}
                                            </td>
                                            <td>
                                                <a class="btn btn-success" type="button" href="/alterar-acao/{{$c['id']}}">
                                                    Visualizar
                                                </a>
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
                                <a class="btn btn-light" type="button" href="/dashboard">{{ __('Voltar')}}</a>
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
      
