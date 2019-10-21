@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> Projeto Blog - Eduardo e Leonardo</h1>
        <h3><a href="{{ route('/') }}">Retornar para página inicial</a></h3>
       
        <br><br>
        <h1 class="text-center"> {{ $postagem->titulo }}</h1>
        <br>
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto text-center">
                <div class="post-preview">
                        <h4>{{ $postagem->conteudo }}</h4>
                    <p class="post-meta">Postado por                        
                        <a href="{{route('show.postsFromUser', ['id' => $postagem->user_id])}}">{{ $postagem->user->name }}</a>
                        em {{ $postagem->created_at }}
                    </p>
                </div>
                @if (Auth::id() == $postagem->user_id)
                    <p class="post-meta">                      
                        <a href="{{route('edit.postagem', ['id' => $postagem->id])}}">Editar </a>|   
                        <a href="{{route('delete.postagem', ['id' => $postagem->id])}}">Deletar</a>
                    </p>
                @endif
            </div>
        </div>

        <br>
        <h3>Comentários:</h3>
        <br>
        @if (count($comentarios)>0)
            @foreach($comentarios as $comentario)
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="post-preview">
                                <p>
                                {{ $comentario->conteudo }}
                                </p>
                            <p class="post-meta">Comentado por                        
                                {{ $comentario->user->name }}
                                em {{ $comentario->created_at }}
                            </p>
                            
                        </div>
                    </div>
                </div>
            @endforeach 
        @else
            <h2>Não há nenhum comentario para ser exibido</h2>
        @endif


            @if (Auth::id())
            <br><br>
                <div class="content-comments">
                    <h3>Oi, {{ Auth::user()->name }}. Que tal comentar o post?</h3>
                        <form action="/create/comentario/{{ $postagem->id }}/{{ Auth::id() }}" style="width:70%; margin: 0 auto;">
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nome">Comentario: </label><br>
                                    <textarea name="conteudo" placeholder="Informe o conteudo" rows="5" cols="50"></textarea>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" name="submit" value="Enviar">
                        </form>
                </div>
            @endif
    </div>        
@endsection
