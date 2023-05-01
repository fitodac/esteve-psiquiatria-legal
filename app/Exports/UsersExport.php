<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExport implements FromCollection, WithHeadings, WithEvents, ShouldAutoSize
{
    protected $count;

    public function headings(): array
    {
        return [
            '#',
            'Nombre',
            'Email',
            'Rol',
            'Farmacia',
            'Puntos Ganados',
            'Puntos Gastados',
            'Usuario antiguo'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $users = User::with('roles', 'pharmacy:id,name', 'score:id,score,accumulated')->get();
        $idx = 1;

        foreach ($users as $user) {
            $user_array[] = [
                'idx'           => $idx++,
                'name'          => $user->name,
                'email'         => $user->email,
                'rol'           => $user->roles[0]->readable_name,
                'pharmacy'      => $user->pharmacy->name ?? '',
                'score'         => $user->score ? (intval($user->score->accumulated) - intval($user->score->score)) : 0,
                'accumulated'   => $user->score ? $user->score->accumulated : 0,
                'old'           => $user->old ? 'Usuario Antiguo' : 'Usuario Nuevo'
            ];
        }

        $user = collect($user_array);
        $this->count = $user->count();

        return $user;
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
                $event->sheet->getStyle('A1:H1')->applyFromArray([
                    'font'  => [
                        'bold'  => true,
                    ]
                ]);

                $celrange = 'A1:H'.($this->count+1);
                $event->sheet->getStyle($celrange)->applyFromArray($styleArray);
            },
        ];
    }
}
