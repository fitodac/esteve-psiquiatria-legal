<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
	use HasFactory;
	use \Sushi\Sushi;

	protected $rows = [
        ['country' => '042', 'value' => '01', 'label' => 'Álava'],
        ['country' => '042', 'value' => '02', 'label' => 'Albacete'],
        ['country' => '042', 'value' => '03', 'label' => 'Alicante'],
        ['country' => '042', 'value' => '04', 'label' => 'Almería'],
        ['country' => '042', 'value' => '05', 'label' => 'Avila'],
        ['country' => '042', 'value' => '06', 'label' => 'Badajoz'],
        ['country' => '042', 'value' => '07', 'label' => 'Baleares'],
        ['country' => '042', 'value' => '08', 'label' => 'Barcelona'],
        ['country' => '042', 'value' => '09', 'label' => 'Burgos'],
        ['country' => '042', 'value' => '10', 'label' => 'Cáceres'],
        ['country' => '042', 'value' => '11', 'label' => 'Cádiz'],
        ['country' => '042', 'value' => '12', 'label' => 'Castellón'],
        ['country' => '042', 'value' => '13', 'label' => 'Ciudad Real'],
        ['country' => '042', 'value' => '14', 'label' => 'Cordoba'],
        ['country' => '042', 'value' => '15', 'label' => 'A Coruña'],
        ['country' => '042', 'value' => '16', 'label' => 'Cuenca'],
        ['country' => '042', 'value' => '17', 'label' => 'Girona'],
        ['country' => '042', 'value' => '18', 'label' => 'Granada'],
        ['country' => '042', 'value' => '19', 'label' => 'Guadalajara'],
        ['country' => '042', 'value' => '20', 'label' => 'Guipúzcoa'],
        ['country' => '042', 'value' => '21', 'label' => 'Huelva'],
        ['country' => '042', 'value' => '22', 'label' => 'Huesca'],
        ['country' => '042', 'value' => '23', 'label' => 'Jaén'],
        ['country' => '042', 'value' => '24', 'label' => 'León'],
        ['country' => '042', 'value' => '25', 'label' => 'Lleida'],
        ['country' => '042', 'value' => '26', 'label' => 'La Rioja'],
        ['country' => '042', 'value' => '27', 'label' => 'Lugo'],
        ['country' => '042', 'value' => '28', 'label' => 'Madrid'],
        ['country' => '042', 'value' => '29', 'label' => 'Málaga'],
        ['country' => '042', 'value' => '30', 'label' => 'Murcia'],
        ['country' => '042', 'value' => '31', 'label' => 'Navarra'],
        ['country' => '042', 'value' => '32', 'label' => 'Ourense'],
        ['country' => '042', 'value' => '33', 'label' => 'Asturias'],
        ['country' => '042', 'value' => '34', 'label' => 'Palencia'],
        ['country' => '042', 'value' => '35', 'label' => 'Las Palmas'],
        ['country' => '042', 'value' => '36', 'label' => 'Pontevedra'],
        ['country' => '042', 'value' => '37', 'label' => 'Salamanca'],
        ['country' => '042', 'value' => '38', 'label' => 'Santa Cruz de Tenerife'],
        ['country' => '042', 'value' => '39', 'label' => 'Cantabria'],
        ['country' => '042', 'value' => '40', 'label' => 'Segovia'],
        ['country' => '042', 'value' => '41', 'label' => 'Sevilla'],
        ['country' => '042', 'value' => '42', 'label' => 'Soria'],
        ['country' => '042', 'value' => '43', 'label' => 'Tarragona'],
        ['country' => '042', 'value' => '44', 'label' => 'Teruel'],
        ['country' => '042', 'value' => '45', 'label' => 'Toledo'],
        ['country' => '042', 'value' => '46', 'label' => 'Valencia'],
        ['country' => '042', 'value' => '47', 'label' => 'Valladolid'],
        ['country' => '042', 'value' => '48', 'label' => 'Vizcaya'],
        ['country' => '042', 'value' => '49', 'label' => 'Zamora'],
        ['country' => '042', 'value' => '50', 'label' => 'Zaragoza'],
        ['country' => '042', 'value' => '51', 'label' => 'Ceuta'],
        ['country' => '042', 'value' => '52', 'label' => 'Melilla'],
	];

    protected $schema = [
        'country' => 'string',
        'value' => 'string',
    ];
}
