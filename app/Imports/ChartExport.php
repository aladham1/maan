<?php
namespace App\Imports;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ChartExport implements FromView, ShouldAutoSize, WithEvents

{
    protected $items;
    protected $ids;

    public function __construct($items = null , $ids = null)
    {
        $this->items = $items;
        $this->ids = $ids;
    }

    public function view(): View
    {
        return view('account.charts.export', [
            'items' => $this->items,
            'ids' => $this->ids
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
