@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Confirmação</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>Bem-vindo(a), {{ Auth::user()->name }}!</p>
                    <p>Login efetuado com sucesso!</p>
                    <p><a href="{{ route('/') }}">Clique aqui</a> para acessar a página principal.</p>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
