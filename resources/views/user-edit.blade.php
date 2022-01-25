@extends('layouts.main') 
@section('title', $user->name)
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
    @endpush

    
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Editar Usuário')}}</h5>
                            <span>{{ __('Editar atribuições de usuários')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('/')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('Usuários')}}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <!-- clean unescaped data is to avoid potential XSS risk -->
                                {{ clean($user->name, 'titles')}}
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
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{ url('user/update') }}" >
                        @csrf
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <div class="row">
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="name">{{ __('Nome usuário')}}</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ clean($user->name, 'titles')}}" >
                                        <div class="help-block with-errors"></div>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="sobrenome">{{ __('Sobrenome')}}</label>
                                        <input id="sobrenome" type="text" class="form-control @error('sobrenome') is-invalid @enderror" name="sobrenome" value="{{ clean($user->sobrenome, 'titles')}}" >
                                        <div class="help-block with-errors"></div>

                                        @error('sobrenome')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ __('Email')}}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ clean($user->email, 'titles')}}" >
                                        <div class="help-block with-errors"></div>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="email_recup">{{ __('Email Recuperação')}}</label>
                                        <input id="email_recup" type="email" class="form-control @error('email_recuperacao') is-invalid @enderror" name="email_recup" value="{{ clean($user->email_recuperacao, 'titles')}}" >
                                        <div class="help-block with-errors"></div>

                                        @error('email_recuperacao')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                   
                                    <div class="form-group">
                                        <label for="password">{{ __('Senha')}}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  >
                                        <div class="help-block with-errors"></div>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password-confirm">{{ __('Confirmar senha')}}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    
                                    
                                    
                                    
                                
                                </div>
                                <div class="col-md-6">
                                    <!-- Assign role & view role permisions -->
                                    <div class="form-group">
                                        <label for="endereco">{{ __('Endereço')}}</label>
                                        <input id="endereco" type="text" class="form-control @error('endereco') is-invalid @enderror" name="endereco" value="{{ clean($user->endereco, 'titles')}}" >
                                        <div class="help-block with-errors"></div>

                                        @error('endereco')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="telefone">{{ __('Telefone')}}</label>
                                        <input id="telefone" type="telefone" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ clean($user->telefone, 'titles')}}" >
                                        <div class="help-block with-errors"></div>

                                        @error('telefone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="rg">{{ __('RG')}}</label>
                                        <input id="rg" type="text" class="form-control @error('rg') is-invalid @enderror" name="rg" value="{{ clean($user->rg, 'titles')}}" >
                                        <div class="help-block with-errors"></div>

                                        @error('rg')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="cpf">{{ __('CPF')}}</label>
                                        <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ clean($user->cpf, 'titles')}}">
                                        <div class="help-block with-errors"></div>

                                        @error('cpf')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="role">{{ __('Mudar regra')}}</label>
                                        {!! Form::select('role', $roles, $user_role->id??'' ,[ 'class'=>'form-control select2', 'placeholder' => 'Select Role','id'=> 'role']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="role">{{ __('Permissões')}}</label>
                                        <div id="permission" class="form-group">
                                            @foreach($user->getAllPermissions() as $key => $permission) 
                                            <span class="badge badge-dark m-1">
                                                <!-- clean unescaped data is to avoid potential XSS risk -->
                                                {{ clean($permission->name, 'titles')}}
                                            </span>
                                            @endforeach
                                        </div>
                                        <input type="hidden" id="token" name="token" value="{{ csrf_token() }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary form-control-right">{{ __('Atualizar')}}</button>
                                    </div>
                                </div>
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- push external js -->
    @push('script') 
        <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
        <!--get role wise permissiom ajax script-->
        <script src="{{ asset('js/get-role.js') }}"></script>
        <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

        <script>
            $(document).ready(function(){
                $('#telefone').mask('(00) 0 0000-0000');
                $('#rg').mask('0000000000');
                $('#cpf').mask('000.000.000-00');
            });
        </script>
    @endpush
@endsection
