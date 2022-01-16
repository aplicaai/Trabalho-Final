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
                <form action="{{route('conf-com-ven')}}" id="conf-com-ven" class="forms-sample" method="post">
                    @csrf    
                    <div class="card">
                        <div class="card-body">
                            <div class="dt-responsive">
                                <table id="simpletable"
                                    class="table table-striped table-bordered nowrap">
                                    <thead>
                                    <tr>
                                        <th class="nosort">
                                            <center>Ativo</center>
                                        </th>
                                        <th>
                                            <center>Setor</center>
                                        </th>
                                        <th>
                                            <center>Quantidade atual</center>
                                        </th>
                                        <th>
                                            <center>Cotação<br> atual</center>
                                        </th>
                                        <th>
                                            <center>Patrimônio<br> atual</center>
                                        </th>
                                        <th>
                                           <center>Comprar / Vender</center>
                                       </th>
                                        <th>
                                            <center>Quantidade<br> vender / adicionar</center>
                                       </th>
                                       <th>
                                           Patrimônio adicionado
                                       </th>
                                    </tr>
                                    </thead>
                                    <tbody class="valores">
                                        @foreach($acao_carteiras as $a)
                                       
                                        <tr>
                                            <td>
                                                <center>
                                                    <input type="hidden" name="qualquernome[]" value="{{$a->id}}">
                                                    <input type="hidden" name="ativos[]" value="{{$a['ativo']}}">
                                                    <div class="ativo"  value="{{$a['ativo']}}">{{$a['ativo']}}</div>
                                                </center>
                                            </td>
                                            
                                            <td class="w-50 overflow-auto" style="white-space: inherit">     
                                                <center>{{$a['setor']}}</center>
                                            </td>
                                            <td>
                                                <center>
                                                    <input type="hidden" name="quantidade_atual[]" value="{{$a['quantidade']}}">    
                                                    <div class="quantidade">{{$a['quantidade']}}</div>
                                                </center>
                                            </td>
                                            <td>
                                                <div>
                                                    <center>
                                                        <div>
                                                            R$ <span class="preco_acao" id="cota{{$a->id}}">{{$a['preco_acao']}}</span>
                                                            <input type="hidden" name="preco_acao[]" value="{{$a['preco_acao']}}">
                                                        </div>
                                                    </center>
                                                </div>
                                            </td>
                                            <td>
                                                <center>R$ {{$a['preco_acao']*$a['quantidade']}}</center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a onclick="vender_comprar('vender', {{$a->id}})" class="btn btn-danger" type="button" >-</a> <a onclick="vender_comprar('comprar', {{$a->id}})" class="btn btn-success" type="button" >+</a>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <input type="text" id="campo{{$a->id}}" onchange="vender_comprar('linha', {{$a->id}})" value="0" name="quantidade_add[]">
                                                </center>
                                                <!-- <input name="quantidade_adicionar" id="campo{{$a->id}}" type="text"> -->
                                            </td>
                                            <td>
                                                <center>
                                                    <div id="patri{{$a->id}}">
                                                        R$ 0
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
                            <div class="card">
                                <button class="btn btn-success" type="submit">{{ __('Confirmar')}}</button>
                            </div>
                            <div class="card">
                                <a class="btn btn-danger" type="button" href="/listar-carteiras">{{ __('Cancelar')}}</a>
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
      
