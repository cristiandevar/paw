<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Nombre de la tabla que se conecta a este Modelo
    protected $table = 'categories';
    // Nombres de las columnas que son modificables
    protected $fillable = [
    'name'
    ];
    // INNER JOIN con la tabla Productos
    // por medio de la FK categoria_id
    public function products() {
    return $this->hasMany(Product::class, 'category_id');
    }
}
