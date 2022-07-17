<?php
namespace App\Imports;
use App\Account;
use App\Citizen;
use App\Form;

use App\Form_status;
use App\Form_type;
use App\Sent_type;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;

use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CitizenFormExport   implements ShouldAutoSize,WithEvents,FromView
{

    use Exportable;

    protected $items;

    public function __construct($items = null)
    {
        $this->items = $items;
    }

    public function view(): View
    {
        return view('account.citizen.export2', [
            'items' => $this->items
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->setRightToLeft(true);
            },
        ];
    }

}
