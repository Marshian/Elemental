<?php

namespace Humweb\Forms;

use Illuminate\Database\Eloquent\Model;

/**
 * Fields
 *
 * @package Humweb\Forms
 */
class Field extends Model
{

    protected $table = 'form_fields';
    protected $fillable = ['name', 'description', 'type', 'attributes'];


    public function form()
    {
        return $this->belongsTo(Form::class, 'form_id');
    }

}