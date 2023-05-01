<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Participation;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ParticipationsExport implements FromCollection, WithHeadings, WithEvents, ShouldAutoSize
{
    protected $count;

    public function headings(): array
    {
        return [
            '#',
            'Nombre',
            'Email',
            'Farmacia',
            'Fecha',
            'Aprobación/Denegación',
            'Link a imagen',
            'Unidades en caso de reto recomendación',
            'Puntos'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $participations = Participation::with('user:id,email,name', 'pharmacy:id,name', 'challenge:id,challenge_type')->get();
        $participation_array = [];
        $idx = 1;

        foreach ($participations as $value) {
            $recommendation = '';
            if($value->challenge->challenge_type == 'recommendation') {
                $array = json_decode($value->formdata, true);
                $filteredArray = collect($array['products'])->filter(function($item, $key) {
                    return $item['qty'] > 0;
                });

                $formattedArray = $filteredArray->map(function ($value, $key) {
                    return "Producto: {$value['name']}, cant: {$value['qty']}";
                })->all();

                $recommendation = implode(', ', $formattedArray);
            }

            $participation_array[] = [
                'idx' => $idx++,
                'name' => $value->user->name,
                'email' => $value->user->email,
                'pharmacy' => $value->pharmacy->name,
                'date' => Carbon::parse($value->created_at)->format('d/m/Y'),
                'approbed' => $value->approved ? ($value->approved == 1 ? 'Aprobado' : 'No aprobado') : '',
                'Archivo' => $value->file,
                'recommendation' => $recommendation,
                'points' => $value->earned_points ?? '0'
            ];
        }

        $participation = collect($participation_array);
        $this->count = $participation->count();
        return $participation;
    }

    public function registerEvents(): array
    {
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        return [
            AfterSheet::class => function(AfterSheet $event) use ($styleArray)
			{
                $event->sheet->getStyle('A1')->applyFromArray([
                    'alignment' => [
                        'horizontal'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                    ]
                ]);

                $event->sheet->getStyle('A1:I1')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                    ]
                ]);

                $celrange = 'A1:I'.($this->count+1);
                $event->sheet->getStyle($celrange)->applyFromArray($styleArray);
            },
        ];
    }
}
