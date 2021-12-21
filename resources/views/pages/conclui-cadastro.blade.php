<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ __('Cadastrar-se | Aplic@ai')}}</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="{{ asset('icone2.png') }}"/>

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/ionicons/dist/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/icon-kit/dist/css/iconkit.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/theme.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/theme-image.css') }}">
        <script src="{{ asset('src/js/vendor/modernizr-2.8.3.min.js') }}"></script>
        <style>
            /* .auth-wrapper .lavalite-bg .lavalite-overlay {
                background: linear-gradient(
                135deg, rgba(46,52,81,0.4) -100%, rgba(52,40,104,0.95) 100%);
            } */
        </style>
    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="auth-wrapper">
            <div class="container-fluid h-100">
                <div class="row flex-row h-100 bg-white">
                    
                    <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                        
                        <div class="lavalite-bg" style="display: flex; justify-content:center; align-items:center;">
                            <div class="lavalite-overlay"></div>
                           
                        </div>
                        
                        
                    </div>
                    
                    <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                        <div class="authentication-form mx-auto">
                            <div class="logo-centered">
                                
                                <a href=""><img width="200" src="{{ asset('img/Sem Titulo-1.png') }}" alt="logo"></a>
                                <p>{{ __('Pré cadastro de Clientes')}}</p>
                            </div>
                            
                            <form action="{{route('create-user2')}}" method="post">
                                @csrf
                                <!-- <div class="form-group">
                                    <input type="name" class="form-control" placeholder="Nome" name="name" value="{{ old('name') }}" required>
                                    <i class="ik ik-user"></i>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email Primário" name="email" value="{{ old('email') }}" required>
                                    <i class="fa fa-envelope"></i>
                                </div>
                                
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Senha" name="password" required>
                                    <i class="ik ik-lock"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Confirmar Senha" name="password_confirmation" required>
                                    <i class="ik ik-eye-off"></i>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-left">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option1">
                                            <span class="custom-control-label">&nbsp;{{ __('Eu aceito os')}} <a href="#">{{ __('Termos e Condições')}}</a></span>
                                        </label>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <input type="name" class="form-control" placeholder="Nome" name="name" value="{{ old('name') }}" required>
                                    <i class="ik ik-user"></i>
                                </div>
                                <div class="form-group">
                                    <input type="name" class="form-control" placeholder="Sobrenome" name="sobrenome" value="{{ old('sobrenome') }}" required>
                                    <i class="ik ik-user"></i>
                                </div>
                                <div class="form-group">
                                    <input type="name" class="form-control" placeholder="Endereço" name="endereco" value="{{ old('endereco') }}" required>
                                    <i class="ik ik-user"></i>
                                </div>
                                <div class="form-group">
                                    <input type="telefone" class="form-control" placeholder="Telefone" name="telefone" value="{{ old('telefone') }}" required>
                                    <i class="ik ik-user"></i>
                                </div>
                                <div class="form-group">
                                    <input type="name" class="form-control" placeholder="RG" name="rg" value="{{ old('rg') }}" required>
                                    <i class="ik ik-user"></i>
                                </div>
                                <div class="form-group">
                                    <input type="name" class="form-control" placeholder="CPF" name="cpf" value="{{ old('cpf') }}" required>
                                    <i class="ik ik-user"></i>
                                </div>

                                <div class="sign-btn text-center">
                                    <button class="btn btn-primary">{{ __('Concluir cadastro')}}</button>
                                </div>
                                <!-- <div class="sign-btn text-center">
                                    <button class="btn btn-primary">{{ __('Pré cadastrar')}}</button>
                                </div> -->
                            </form>
                            <!-- <div class="register">
                                <p>{{ __('Já possui cadastro?')}} <a href="{{url('login')}}"><span style="color: blue;">{{ __('Entrar')}}</span></a></p>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="{{ asset('src/js/vendor/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('plugins/popper.js/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('plugins/screenfull/dist/screenfull.js') }}"></script>
    </body>
</html>
