<?php
// example of using model with eloquent
namespace models;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulos';
    protected $fillable = [];
    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
}
