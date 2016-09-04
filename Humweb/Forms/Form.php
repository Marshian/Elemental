<?php

namespace Humweb\Forms;

use Illuminate\Database\Eloquent\Model;

/**
 * Fields
 *
 * @package Humweb\Forms
 */
class Form extends Model
{

    protected $table = 'forms';
    protected $fillable = ['name', 'description', 'type', 'url', 'attributes'];


    public function fields()
    {
        return $this->hasMany(Field::class, 'form_id');
    }
}