<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table ='questions';
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'status',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'created_by'
    ];

    public  function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'question_id', 'id')->orderBy('id', 'ASC');
    }
}
