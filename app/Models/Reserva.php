<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reserva extends Model
{
    use HasFactory;
    protected $fillable =[
    'fecha',
    'id_cliente',
    'pago'
    ];


    public function usuario():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
