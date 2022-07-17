<?php
namespace App\Imports;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class RecommendationsExport  implements FromView, ShouldAutoSize, WithEvents
{

    protected $items;

    public function __construct($items = null)
    {
        $this->items = $items;
    }

    public function view(): View
    {

        return view('account.recommendations.export', [
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


    public function collection(){
        return $this->the_collection;
    }
}
