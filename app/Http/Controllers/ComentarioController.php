<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    //

    public function store(Request $request, User $user, Post $post)
    {
        //Validar
        $request->validate([
            'comentario' => 'required'
        ]);
        // almacenar el resultado
        Comentario::create([
            'post_id' => $post->id,
            'user_id' => auth()->user()->id,
            'comentario' => $request->comentario
        ]);
        // redireccionar
        return back()->with('mensaje', 'Comentario Realizado Correctamente');
    }
}
