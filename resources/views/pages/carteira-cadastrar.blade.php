@extends('layouts.main') 
@section('title', 'Form Components')
@section('content')

<pre>

</pre>
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-edit bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Carteira')}}</h5>
                            <span>{{ __('Cadastro de carteira')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <!-- <li class="breadcrumb-item"><a href="#">{{ __('Forms')}}</a></li> -->
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Carteira')}}</li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Cadastro de Carteira')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <form class="forms-sample" method="post" action="{{route('carteira-valores')}}">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><h3>{{ __('Carteira')}}</h3></div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nome_carteira">{{ __('Nome da carteira')}}</label>
                                <input type="text" class="form-control" required id="nome_carteira" name="nome_carteira" placeholder="Nome da carteira">
                            </div>
                            <div class="form-group">
                                <label for="valor_carteira">{{ __('Valor da carteira')}}</label>
                                <input type="text" class="form-control" required id="valor_carteira" name="valor_carteira" placeholder="Valor">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>{{ __('Empresas e ações')}}</h3>
                        </div>
                        {{-- <div  class="card-header">
                           
                            <div class="col col-sm-6">

                                <div class="card-search with-adv-search dropdown">
                                    <form action="">
                                        <input type="text" class="form-control global_filter" id="global_filter" placeholder="Search..">
                                        <button type="submit" class="btn btn-icon"><i class="ik ik-search"></i></button>
                                        <button type="button" id="adv_wrap_toggler" class="adv-btn ik ik-chevron-down dropdown-toggle" data-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                        <div class="adv-search-wrap dropdown-menu dropdown-menu-right" aria-labelledby="adv_wrap_toggler">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control column_filter" id="col0_filter" placeholder="Name" data-column="0">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control column_filter" id="col1_filter" placeholder="Position" data-column="1">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control column_filter" id="col2_filter" placeholder="Office" data-column="2">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control column_filter" id="col3_filter" placeholder="Age" data-column="3">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control column_filter" id="col4_filter" placeholder="Start date" data-column="4">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control column_filter" id="col5_filter" placeholder="Salary" data-column="5">
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-theme">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        
                            <div class="col col-sm-3">
                                <div class="card-options text-right">
                                    <span class="mr-5" id="top">1 - 50 of 2,500</span>
                                    <a href="#"><i class="ik ik-chevron-left"></i></a>
                                    <a href="#"><i class="ik ik-chevron-right"></i></a>
                                </div>
                            </div>
                        </div> --}}
                        
                        <div class="card-body">
                            <table id="scr-vtr-dynamic" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th class="nosort" width="10">
                                            <label class="custom-control custom-checkbox m-0">
                                                <input type="checkbox" class="custom-control-input" id="selectall" name="checkbox[]" value="selecionarTodos">
                                                <span class="custom-control-label">&nbsp;</span>
                                            </label>
                                        </th>
                                        <th class="nosort">Ativo</th>
                                        <th>Nome</th>
                                        <th>Razão Social</th>
                                        <th>Preço por ação</th>
                                        {{-- <th>% participação</th> --}}
                                        {{-- <th>Empresa VS R$</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($dados as $dado)
                                    
                                    
                                    <tr>
                                        <td>
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input select_all_child" id="" name="checkbox[]" value="{{$dado->symbol}}">
                                                <span class="custom-control-label">&nbsp;</span>
                                            </label>
                                        </td>

                                        <td>{{$dado['symbol']}}</td>
                                        <td>{{$dado['name']}}</td>
                                        <td>{{ $dado['company_name']}}</td>
                                        <td>R$ {{$dado['price']}}</td>
                                        {{-- <td>2011/04/25</td> --}}
                                        {{-- <td>$320,800</td> --}}
                                    </tr>
                                    
                                    
                                @endforeach
                                </tbody>
                            </table>
                            @push('script') 
                                <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
                                <script src="{{ asset('js/datatables.js') }}"></script>
                                <script src="{{ asset('plugins/jvectormap/jquery-jvectormap.min.js') }}"></script>
                                <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
                                <script src="{{ asset('plugins/moment/moment.js') }}"></script>
                                <script src="{{ asset('plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js') }}"></script>
                                <script src="{{ asset('plugins/d3/dist/d3.min.js') }}"></script>
                                <script src="{{ asset('plugins/c3/c3.min.js') }}"></script>
                                <script src="{{ asset('js/tables.js') }}"></script>
                                <script src="{{ asset('js/widgets.js') }}"></script>
                                <script src="{{ asset('js/charts.js') }}"></script>
                            @endpush
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('Próximo passo')}}</button>
                                </form>   
                                <a type="button" href="/dashboard" class="btn btn-light">{{ __('Cancelar')}}</a>
                            </div>
                        </div>    
                    </div>
                 
            </div>
            
        </div>

    <!-- push external js -->
    @push('script')
        <script src="{{ asset('js/form-components.js') }}"></script>
    @endpush
@endsection