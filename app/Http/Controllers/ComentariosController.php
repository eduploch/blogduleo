<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class ComentariosController extends Controller
{

    public function create(Request $request, $post_id, $user_id){
        $comentario = New Comment;
        $comentario->conteudo = $request->conteudo;
        $comentario->post_id = $post_id;
        $comentario->user_id = $user_id;
        $comentario->save();
        return redirect()->back();
    }
}