<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    use HasFactory;

    protected $table = 'planos';

    protected $fillable = [
        'name',
        'content',
        'vagas',
        'status',        
        'segunda',        
        'terca',        
        'quarta',        
        'quinta',        
        'sexta',        
        'sabado',        
        'horario',        
        'valor_mensal',        
        'valor_trimestral',        
        'valor_semestral',        
        'valor_anual'      
    ];

    /**
     * Scopes
    */

    /**
     * Relacionamentos
    */

    /**
     * Accerssors and Mutators
    */

    /**
     * Mutator Segunda
     *
     * @param $value
    */
    public function setSegundaAttribute($value)
    {
        $this->attributes['segunda'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Terça
     *
     * @param $value
    */
    public function setTercaAttribute($value)
    {
        $this->attributes['terca'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Quarta
     *
     * @param $value
    */

    public function setQuartaAttribute($value)
    {
        $this->attributes['quarta'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Quinta
     *
     * @param $value
    */

    public function setQuintaAttribute($value)
    {
        $this->attributes['quinta'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Sexta
     *
     * @param $value
    */

    public function setSextaAttribute($value)
    {
        $this->attributes['sexta'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Sábado
     *
     * @param $value
    */
    public function setSabadoAttribute($value)
    {
        $this->attributes['sabado'] = (($value === true || $value === 'on') ? 1 : 0);
    }
}
