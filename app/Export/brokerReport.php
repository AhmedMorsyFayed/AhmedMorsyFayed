<?php


namespace App\Export;
use App\Broker;
use App\Policies;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;


class brokerReport implements FromQuery,WithHeadings,ShouldAutoSize ,WithEvents
{
    use Exportable;

    /**
     * @return Builder
     */
    private $agentcode;
    private $agentname;
    private $From;
    private $To;


    public function __construct($agentcode,$agentname,$From,$To)

    {
        $this->agentcode = $agentcode;
        $this->agentname = $agentname;
        $this->From = $From;
        $this->To = $To;

    }


    public function query()
    {
        return Broker::query()->select( 'id','serial','Agentcode' ,'AgentName' ,'AgentPin','Operationtype','BankAccount','Checkon',
            'Checkno','Currency',
            'DateofPayment','Month','Year','Medical',
            'Motor' ,'Accident','Engineering','property' ,'travel','marine',
            'Motorearly' ,'Accidentearly','Engineeringearly','propertyearly' ,'travelearly','marineearly',
            'total' ,'tax' ,'net','Reason','User','PaymentManager'
        )->where('Agentcode', $this->agentcode)
            ->where('AgentName', $this->agentname)
            ->where('status','=','Approve')
            ->whereDate('GetReport','>=',$this->From)
            ->whereDate('GetReport','<=',$this->To);


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
            'id','Serial Number',
            'Agent Code ','Agent Name','AgentPin','Operationtype','BankAccount','Checkon','Checkno','Currency',
            'Date of Payment','Month','Year' ,'Medical',
            'Motor' ,'Accident','Engineering','Property' ,'Travel','Marine',
            'Motor Early' ,'Accident Early','Engineering Early','Property Early' ,'Travel Early','Marine Early',
            'Total' ,'Tax' ,'Net','Reason','User Name','Manager Name'
        ];
    }
}
