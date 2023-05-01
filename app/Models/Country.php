<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	use HasFactory;
	use \Sushi\Sushi;

	protected $rows = [
		[
			'value' => '042',
			'label' => 'España'
		]
	];


    protected $schema = [
        'country' => 'string',
    ];

}
