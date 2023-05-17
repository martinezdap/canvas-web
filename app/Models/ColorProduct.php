<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Command\DumpCompletionCommand;

class ColorProduct extends Model
{
    use HasFactory;

    // Como no estamos unsando las convenciones aqui debemos ser explicitos con que tabla esta administrando este modelo
    protected $table = "color_product";

    // Relacion uno a mucho inversa
    public function color(){
        return $this->belongsTo(Color::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
