<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ParticipantsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    public $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get all registrations which are a part of the provided event $id,
     * collects specific columns from users which are found at this registration.
     */
    public function collection()
    {
        $users = DB::table('registration')
            ->leftJoin('users', 'registration.user_id', '=', 'users.id')
            ->where(['status' => "Ik ga", 'event_id' => $this->id])
            ->select('users.id','users.name','users.email','users.address','users.telephone')
            ->get();

            return $users;
    }

    /**
     * Changes the look of the excel file.
     * Gets cell in $cellRange and changes the fontsize.
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $cellRange = 'A1:E1';
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }

    /**
     * Header names of the $cellRange.
     */
    public function headings(): array
    {
        return [
            '#',
            'Naam',
            'E-mailadres',
            'Adres',
            'Telefoonnummer'
        ];
    }
}
