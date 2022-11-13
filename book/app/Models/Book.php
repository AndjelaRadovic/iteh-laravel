<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'number_of_pages', 'year_of_release', 'author_id', 'genre_id', 'user_id'];

    public function author(){
        return $this->belongsTo(Author::class);
    } 

    public function genre(){
        return $this->belongsTo(Genre::class);
    } 

    public function user(){
        return $this->belongsTo(User::class);
    } 


}
