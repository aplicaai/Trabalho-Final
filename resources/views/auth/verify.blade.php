@extends('layouts.main')


@section('content')
<div class="container text-center logo-centered mt-5">
    <a href=""><img height="40" src="{{ asset('img/Sem Titulo-1.png') }}" alt="Aplicaai" ></a>
</div>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center" style="font-size: 30px; font-weight:900">{{ __('Pré-Cadastro') }}</div>
                
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success text-center" role="alert">

                            {{ __('Um link de verificação foi enviado para o seu endereço de e-mail.') }}
                        </div>
                    @endif
                    <div class="sign-btn text-center mt-4 mb-4">
                        <!-- {{Auth::user()->name}},<br><br> -->
                        <i class="ik ik-user"></i>{{ __('Seu pré cadastro foi realizado com sucesso.') }}<br><br>
                        {{ __('Para concluir seu cadastro, clique em receber o email.') }}<br><br>
                        {{ __('Acesse sua caixa de correio eletrônico e confirme seu e-mail') }}<br><br><br>
                        <form class="d-inline text-center" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" id="rc" class="btn btn-primary">Receber o Email</button>
                            <script>
                                getElementById('rc').disable = true;
                            </script>
                        </form>
                    </div>
                </div>
                <!-- <div class="sign-btn text-center mt-4 mb-4">
                    <a type="button" href="{{url ('/') }}" class="btn btn-custom" >Entrar</a>
                </div> -->
                <!-- <script>
                    setTimeout(function() {
                    window.location.href = "{{route ('login-send')}}";
                    }, 5000);
                </script> -->
            </div>
            
        </div>
    </div>
</div>
@endsection
