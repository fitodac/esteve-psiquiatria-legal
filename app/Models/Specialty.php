<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
	use HasFactory;
	use \Sushi\Sushi;

	protected $rows = [
		[ 'label' => "-- No introducido --", 'value' => "0" ],
        [ 'label' => "Geriatría", 'value' => "19" ],
        [ 'label' => "Medicina familiar", 'value' => "22" ],
        [ 'label' => "Medicina general", 'value' => "23" ],
        [ 'label' => "Neurología", 'value' => "27" ],
        [ 'label' => "Psiquiatría", 'value' => "33" ],
	];

    protected $schema = [
        'value' => 'string',
    ];
}
