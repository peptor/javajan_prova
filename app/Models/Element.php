<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    protected $table      = 'mst_element';
    protected $primaryKey = 'id_mst_element';

    protected $visible    = [
        'id_mst_element',
        'titol_element',
        'desc_element',
        'html_element',
        'date_element',
        'path_imatge_element'
    ];

    public $fillable = [
        'titol_element',
        'desc_element',
        'html_element',
        'date_element'
    ];

}
