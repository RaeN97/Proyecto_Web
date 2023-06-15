<?php
// example of using model with eloquent
namespace models;

use Illuminate\Database\Eloquent\Model;

class articulo extends Model
{
    protected $table = 'articulos';
    protected $fillable = ['nombre'];
}
