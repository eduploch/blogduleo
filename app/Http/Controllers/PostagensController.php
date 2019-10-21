<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;

class PostagensController extends Controller
{
    public function index(){
        $usuarios = User::all();
        $postagens = Post::latest()->get();
        //News::latest()->get();

        return view('postagens')->with('postagens', $postagens)->with('usuarios', $usuarios);
    }
    public function create(Request $request, $id){
        $postagem = New Post;
        $postagem->titulo = $request->titulo;
        $postagem->conteudo = $request->conteudo;
        $postagem->user_id = $id;
        $postagem->save();
        return redirect()->back();
    }

    public function showPostsFromUser($id){
        $postagens = Post::where('user_id', $id)->latest()->get();
        return view('postagens')->with('postagens', $postagens);
    }

    public function delete($id){
        $postagem = Post::find($id);
        $postagem->delete();
       
        
        return redirect()->route('/');
    }

    public function edit($id){
        $postagem = Post::find($id);

        return view('edit_post')->with('postagem', $postagem);
    }

    public function update(Request $request, $id){
        $postagem = Post::find($id);
        $postagem->titulo = $request->titulo;
        $postagem->conteudo = $request->conteudo;
        $postagem->save();
        return redirect()->route('/');
    }

    public function show($id){
        $postagem = Post::find($id);
        $comentarios = Comment::where('post_id', $id)->latest()->get();
        return view('post')->with('postagem', $postagem)->with('comentarios', $comentarios);
    }
}