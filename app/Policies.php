<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Policies extends Model
{

    public $table = 'policies';

    protected $fillable = [

 'id','SalesChannel','Company','Operationtype','Status',
 'Agentcode',
 'AgentName',
 'AgentPin',
 'productcode',
 'policynumber',
 'EndorsNumber',
 'Checkon',
 'BankAccount',
 'DateofPayment',
 'DueCommission',
 'NetPremium' ,
 'ExtraCommission',
 'Total' ,
 'Reason' ,
 'Currency',
 'Introducercode',
 'user' ,
 'Checkno',
 'creation',
'early',
        'DueRate',
        'TaxAmount',
        'taxes'

    ];


}
