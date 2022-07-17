<?php

namespace App\Imports;

use App\Account;
use App\Citizen;
use App\CitizenProjects;
use App\Project;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CitizenNotbenfitExport implements ShouldAutoSize,WithEvents,FromView
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    protected $items;

    public function __construct($items = null)
    {
        $this->items = $items;
    }


    public function view(): View
    {
        return view('account.citizen.exportnotbenfit', [
            'items' => $this->items
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getDelegate()->setRightToLeft(true);
            },
        ];
    }
}
