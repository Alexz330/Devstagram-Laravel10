<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select(['name', 'username', 'id']);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class)->select(['id', 'post_id', 'user_id', 'comentario', 'created_at']);
    }
}
