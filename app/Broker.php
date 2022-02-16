<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Broker extends Model
{

    public $table = 'broker';

    protected $fillable = [

        'serial','status',
        'Agentcode' ,'AgentName' ,'DateofPayment','MonthY','Year','GetReport','Medical',
            'Motor' ,'Accident','Engineering','property' ,'travel','marine',
        'Motorearly' ,'Accidentearly','Engineeringearly','propertyearly' ,'travelearly','marineearly',
            'total' ,'tax' ,'net','User','PaymentManager','Reason','Currency','Checkno','Operationtype','BankAccount','Checkon','AgentPin',

    ];

}
