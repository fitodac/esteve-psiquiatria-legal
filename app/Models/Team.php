<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	use HasFactory;
	use \Sushi\Sushi;

	protected $rows = [
		[
			'name' => 'Dr. Julio Guija',
			'thumb' => 'julio-guija.webp',
			'picture' => 'pic-1.webp',
			'position' => '<strong>Departamento<br>
											de psiquiatría Forense</strong><br>
											Instituto de Medicina<br>
											Legal de Sevilla',
			'description' => 'Jefe del Servicio de Psiquiatría 
											Forense del Instituto de Medicina 
											Legal de Sevilla y Profesor asociado 
											del Departamento de Psiquiatría de 
											la Facultad de Medicina de la 
											Universidad de Sevilla.',
			'ref' => 'julio-guija'
		],
		[
			'name' => 'Dr. Lucas Giner',
			'thumb' => 'lucas-giner.webp',
			'picture' => 'pic-2.webp',
			'position' => '<strong>Servicio de Psiquiatría</strong><br>
											Universidad de Sevilla',
			'description' => 'Licenciado en Medicina y Cirugía en 
												la Universidad de Sevilla y Doctor 
												por la Universidad Autónoma de Madrid. 
												Especializado en Psiquiatría por el 
												Hospital Universitario Puerta de Hierro 
												y en Psiquiatría Forense por la UNED. 
												Actualmente, Profesor Titular de la 
												Universidad de Sevilla.',
			'ref' => 'lucas-giner'
		],
		[
			'name' => 'Mgda. María Núñez',
			'thumb' => 'maria-nunez.webp',
			'picture' => 'pic-3.webp',
			'position' => '<strong>Magistrada</strong><br>
											Juzgados de instrucción<br>
											nº6 de Sevilla',
			'description' => 'Jefe del Servicio de Psiquiatría 
												Forense del Instituto de Medicina 
												Legal de Sevilla y Profesor asociado 
												del Departamento de Psiquiatría de 
												la Facultad de Medicina de la 
												Universidad de Sevilla.',
			'ref' => 'maria-nunez'
		]
	];

}
