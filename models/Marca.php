<?php
// example of using model with eloquent
namespace models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marcas';
    protected $fillable = [];

    public function articulos()
    {
        return $this->hasMany(Articulo::class);    
    }
}