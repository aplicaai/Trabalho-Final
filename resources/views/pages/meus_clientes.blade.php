@extends('layouts.main') 
@section('title', 'Meus Clientes')
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
                        <i class="ik ik-users bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Meus Clientes')}}</h5>
                            <span>{{ __('Mostra clientes com carteira ativas')}}</span>
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
                                <a href="#">{{ __('Meus Clientes')}}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- start message area-->
            @include('include.message')
            <!-- end message area-->
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="card-header"><h3>{{ __('Meus Clientes')}}</h3></div>
                    <div class="card-body">
                        <table id="user_table" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Nome')}}</th>
                                    <th>{{ __('Sobrenome')}}</th>
                                    <th>{{ __('Email')}}</th>
                                    <th>{{ __('Email_Recup')}}</th>
                                    <th>{{ __('End')}}</th>
                                    <th>{{ __('Tel')}}</th>
                                    <th>{{ __('Rg')}}</th>
                                    <th>{{ __('Cpf')}}</th>
                                    <!-- <th>{{ __('Permissions')}}</th> -->
                                    <th>{{ __('Carteiras')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($clientes as $cliente)                                            
                                <tr>
                                    <td>{{$cliente->name}}</td>
                                    <td>{{$cliente->sobrenome}}</td>
                                    <td>{{$cliente->email}}</td>
                                    <td>{{$cliente->email_recuperacao}}</td>
                                    <td>{{$cliente->endereco}}</td>
                                    <td>{{$cliente->telefone}}</td>
                                    <td>{{$cliente->rg}}</td>
                                    <td>{{$cliente->cpf}}</td>
                                    <td><a href="{{url('meus_clientes/ver_carteiras')}}" type="button" class="btn btn-success">Ver Carteiras</a></td>
                                </tr>                
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- push external js -->
    @push('script')
    <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
    <!--server side users table script-->
    <!-- <script src="{{ asset('js/custom.js') }}"></script> -->
    @endpush
@endsection
