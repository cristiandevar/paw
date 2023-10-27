<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    // Nombre de la tabla que se conecta a este Modelo
    protected $table = 'products';
    
    // Nombres de las columnas que son modificables
    protected $fillable = [
        'name',
        'description',
        'price', 
        'image', 
        'category_id'
    ];
    
    // INNER JOIN con la tabla Categoria por medio de la FK categoria_id
    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    // INNER JOIN con la tabla Users por medio de la FK vendedor_id
    public function seller() {
        return $this->belongsTo(User::class, 'seller_id');
    }
}
