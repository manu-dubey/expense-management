<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    /**
    * @var array
    */
    protected $guarded = ['id'];

    /**
    * Accessors & Mutators
    */

    public function setValueAttribute($value)
    {
        $this->attributes['value'] = strval($value*100);
    }

    public function getValueAttribute($value)
    {
        return number_format($value/100, 2);
    }
}
