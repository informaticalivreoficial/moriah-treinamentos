<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';

    protected $fillable = [
        'vencimento',
        'user',
        'plano',
        'status',
        'periodo'      
    ];

    /**
     * Scopes
    */
    public function scopeAvailable($query)
    {
        return $query->where('status', 1);
    }

    public function scopeUnavailable($query)
    {
        return $query->where('status', 0);
    }

    /**
     * Relacionamentos
    */
    public function planoObject()
    {
        return $this->hasOne(Plano::class, 'id', 'plano');
    }

    public function userObject()
    {
        return $this->hasOne(User::class, 'id', 'user');
    }

    public function countfaturas()
    {
        return $this->hasMany(Fatura::class, 'pedido', 'id')->count();
    }

    /**
     * Accerssors and Mutators
    */
    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = ($value == '1' ? 1 : 0);
    }
}
