@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> Projeto Blog - Eduardo e Leonardo</h1>
        
        @if ($usuarios ?? '')
            <h3>Lista de Posts</h3>
        @else
        <h3><a href="{{ route('/') }}">Lista de Posts</a> > Postagens de {{$postagens[0]->user->name}}</h3>
        @endif
        <br><br>
        @if (count($postagens)>0)
            @foreach($postagens as $postagem)
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="post-preview">
                            <a href="{{route('show.postagem', ['id' => $postagem->id])}}">
                                <h2 class="post-title">
                                {{ $postagem->titulo }}
                                </h2>
                            </a>
                            @if ($usuarios ?? '')
                            <p class="post-meta">Postado por                        
                                <a href="{{route('show.postsFromUser', ['id' => $postagem->user_id])}}">{{ $postagem->user->name }}</a>
                                em {{ $postagem->created_at }}
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach 
        @else
            <h2>Não há nenhuma postagem para ser exibida</h2>
        @endif

        @if ($usuarios ?? '')
            @if (Auth::id())
            <br><br>
                <div class="content-posts">
                    <h3>Oi, {{ Auth::user()->name }}. Que tal postar algo?</h3>
                        <form action="/create/postagem/{{ Auth::id() }}" style="width:70%; margin: 0 auto;">
                            {{ csrf_field() }}
                            <div class="form-row">         
                                <div class="form-group col-md-6">
                                    <label for="nome">Titulo da postagem: </label>
                                    <input type="text" class="form-control" name="titulo" placeholder="Informe o titulo">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nome">Conteudo: </label><br>
                                    <textarea name="conteudo" placeholder="Informe o conteudo" rows="5" cols="50"></textarea>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" name="submit" value="Enviar">
                        </form>
                </div>
            @endif
        @endif
        
        
    </div>        
        @endsection
