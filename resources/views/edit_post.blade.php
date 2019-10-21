@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> Projeto Blog - Eduardo e Leonardo</h1>
        <h3><a href="{{ route('/') }}">Retornar para página inicial</a></h3>
       
        <br><br>
        <h1>Editando post {{ $postagem->titulo }} </h1>

        <form action="/update/postagem/{{ $postagem->id }}" style="width:70%; margin: 0 auto;">
            {{ csrf_field() }}
            <div class="form-row">         
                <div class="form-group col-md-6">
                    <label for="nome">Titulo da postagem: </label>
                    <input type="text" class="form-control" name="titulo" placeholder="{{ $postagem->titulo }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nome">Conteudo: </label><br>
                    <textarea name="conteudo" placeholder="{{ $postagem->conteudo }}" rows="5" cols="50"></textarea>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Enviar">
        </form>
@endsection
