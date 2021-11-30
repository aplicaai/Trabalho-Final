<!-- @extends('layouts.app') -->


@section('content')
<div class="container text-center logo-centered mt-5">
    <a href=""><img height="40" src="{{ asset('img/Sem Titulo-1.png') }}" alt="Aplicaai" ></a>
</div>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center" style="font-size: 30px; font-weight:900">{{ __('Cadastro') }}</div>
                
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">

                            {{ __('Um novo link de verificação foi enviado para o seu endereço de e-mail.') }}
                        </div>
                    @endif
                    {{Auth::user()->name}},<br><br>
                    <i class="ik ik-user"></i>{{ __('Sua conta foi criada com sucesso.') }}<br><br>
                    {{ __('Antes de continuar, por favor, acesse sua caixa de correio eletrônico e confirme seu e-mail.') }}<br><br>
                    {{ __('Se você não recebeu o email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('clique aqui para solicitar outro') }}</button>.
                    </form>
                </div>
                <div class="sign-btn text-center mt-4 mb-4">
                    <a type="button" href="{{url ('/') }}" class="btn btn-custom" >Entrar</a>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
