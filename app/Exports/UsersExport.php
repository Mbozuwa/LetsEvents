<?php

namespace App\Exports;
 
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class UsersExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    public function __construct($id)
    {
        $this->id = $id; 
    }

    public function collection()
    {
        //return User::all();
        $test  = $this->id;
        dd('yeah', $test);
        return User::get(array('id', 'name', 'email', 'address', 'telephone'));
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(16);
            },
        ];
    }

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