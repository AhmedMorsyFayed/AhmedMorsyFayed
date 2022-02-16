<?php


namespace App\Export;
use App\Policies;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;


class Report implements FromQuery,WithHeadings,ShouldAutoSize ,WithEvents
{
    use Exportable;

    /**
     * @return Builder
     */
    private $company;
    private $chosen;
    private $from;
    private $to;
    public function __construct($company,$chosen,$from,$to)
    {

        $this->company = $company;
        $this->chosen = $chosen;
        $this->from = $from;
        $this->to = $to;
    }





    public function query()
    {
        return Policies::query()->select('id','SalesChannel','Company','Operationtype','Status', 'Agentcode', 'AgentName',
            'AgentPin', 'productcode', 'policynumber', 'EndorsNumber', 'Checkon', 'BankAccount', 'DateofPayment','DueRate',
            'DueCommission', 'NetPremium' ,'early', 'ExtraCommission','taxes',
            'TaxAmount', 'Total' , 'Reason' , 'Currency', 'Introducercode', 'user' ,
            'Checkno','creation'
        )->where('Company', $this->company)
            ->where('SalesChannel', $this->chosen)
            ->whereDate('DateofPayment','>=',$this->from)
        ->whereDate('DateofPayment','<=',$this->to);




           // ->whereDate('DateofPayment','>=',$this->from)
         //   ->whereDate('DateofPayment','<=',$this->to);


    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);

            },
        ];

    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'id',
            'Sales Channel',
            'Company',
            'Opeartion Type','Status','Agent Code ','Agent Name','Agent Pin','Product Code','Policy Number'
            ,'Endors Number','Check On','Bank Account','Date Of Payment','Due Rate','Due Commission','Net Premium',
            'Early Commission','Extra Commission','Taxes','Tax Amount',
            'Total','Reason','Currency','Introducer code','User','Check No','Creation'
        ];
    }
}
