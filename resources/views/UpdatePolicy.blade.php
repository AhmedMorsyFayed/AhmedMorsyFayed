@if (Route::has('login'))

@auth
    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rsys Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="{{ asset('css/design.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
    <script>
        //function for dropdown that when choose transfer or check the BLOM Bank Non Life and 859977 display

            function check_fun () {
                var selectItem = document.getElementById('oper').value;
                if (selectItem === "check") {
                    document.getElementById('check_on').value = "BLOM Bank Non Life";
                    document.getElementById('bank_acc').value = "859977";
                } else if (selectItem === "transfer") {
                    document.getElementById('check_on').value = "BLOM Bank Non Life";
                    document.getElementById('bank_acc').value = "859977";
                }else {
                    document.getElementById('check_on').value = "";
                    document.getElementById('bank_acc').value = "";
                }
            }


    </script>

    <style>


        /* dropdown of a herf css*/
        a.dropdown-item:hover {
            background-color: #86cfda;
        }
        /* navbar of a herf css*/
        a.navbar-brand:hover {

            color: #00002E !important;
        }
        /* each select of dropdown */
        select{
            background-color: #002752;
            color: white;
            border-radius: 5px;
            font-size: 17px;
        }
        /* the inner of select css0*/
        .form_1 select {
            background-color: #00529b;
            width: 175px;
            color: #fff;
            height: 25px;
            font-weight: bold;
        }
        /* each input of layout css*/
        input{
            background-color: #00529b;
            color: white;
            border: 3px solid #00002E;
            border-radius: 4px;
        }
        /* tabel data css*/

        .table_data {
            margin-top: 20px;
            font-size: 14pt;
            color: #00529b;
            margin-left: 100px;
            font-weight: bold;
        }
        /*css of each tabel in layout */
        table {
            -webkit-border-horizontal-spacing: 5px;
            -webkit-border-vertical-spacing: 5px;
            display: table;
            border-collapse: separate;
            box-sizing: border-box;
            text-indent: initial;
            white-space: normal;
            line-height: normal;
            font-weight: normal;
            font-size: medium;
            font-style: normal;
            text-align: start;
            border-spacing: 2px;
            border-color: grey;
            font-variant: normal;
        }
        /*css of each raw of table in layout */
        tr {
            display: table-row;
            vertical-align: inherit;
            border-color: inherit;
        }
        /* padding colmns of table*/
        .table_data td {
            padding-top: .5em;
            padding-bottom: .5em;
        }
        /* each column css of table*/
        td {
            display: table-cell;
            vertical-align: inherit;
        }

        /* how to look in browser css*/
        input:-webkit-autofill {
            /* Select the text color of the history*/
            -webkit-text-fill-color: white;
            -webkit-transition: background-color 50000s ease-in-out 0s!important;

        }
        /*css of save button and preview button  */
        #pre{
            padding: 3px 12px;
            border-radius: 10px ;
            color: white;
            background-color: #002752;
            border: 1px solid #00002E;
            text-decoration:none;
        }/* css of save button and preview button after put pointer on them  */
        #pre:hover{
            background-color: #17a2b8 !important;
            color: white !important;
        }
        #early::placeholder{
            color: white;
            opacity: 70%;
            font-size: 12px;
        }
        #due_Rate::placeholder{
            color: white;
            opacity: 70%;
            font-size: 12px;
        }
        #taxes::placeholder{
            color: white;
            opacity: 70%;
            font-size: 12px;
        }
    </style>

    <script>
        // function for حساب العمليات الحسابية
        // function for call calculateSum
        $(document).ready(function()
        {
            $("#tab").each(function(){
                $(this).keyup(function(){
                    calculateSum();
                });
            });
        });
        //حساب العمليات الحسابية
        function calculateSum()
        {
            $("#tab").each(function(){
                var sum=0;
                var sumDue=0;
                var Taxes=0;
                var Total=0;
                var netprem =$("#net_prem").val();
                var due =$("#due_Rate").val();
                var early =$("#early").val();
                var Tax =$("#taxes").val();

                if( netprem.length ==0 ) {
                    netprem =0;
                }
                sum=(parseFloat(early)*parseFloat(netprem))/100;
                sumDue=(parseFloat(due)*parseFloat(netprem))/100;
                Taxes=((sum+sumDue)*parseFloat(Tax))/100;
                Total =sum+sumDue-Taxes;
                $("#extra_comm").val(sum.toFixed(2));
                $("#due_Comm").val(sumDue.toFixed(2));
                $("#taxes_amount").val(Taxes.toFixed(2));
                $("#total").val(Total.toFixed(2));

            });
        }

        $(document).ready(function() {
            $('#earl').bind('change', function() {
                var sum=0;
                var sumDue=0;
                var Taxes=0;
                var Total=0;
                var netprem =$("#net_prem").val();
                var due =$("#due_Rate").val();
                var early =$("#early").val();
                var Tax =$("#taxes").val();

                if( netprem.length ==0 ) {
                    netprem =0;
                }
                sum=(parseFloat(early)*parseFloat(netprem))/100;
                sumDue=(parseFloat(due)*parseFloat(netprem))/100;
                Taxes=((sum+sumDue)*parseFloat(Tax))/100;
                Total =sum+sumDue-Taxes;
                $("#extra_comm").val(sum.toFixed(2));
                $("#due_Comm").val(sumDue.toFixed(2));
                $("#taxes_amount").val(Taxes.toFixed(2));
                $("#total").val(Total.toFixed(2));


            }).trigger('change');

        });


    </script>

</head>
<!-- extend app.css -->
<nav class="navbar navbar-inverse bg-primary navbar-dark" >
    <!--if statment بتوضح الصفحات اللى بتظهر لناس على حسب level -->
    <a class="navbar-brand fa fa-home" href="../../home">Daily Commission</a>
    <?php
    if ((Auth::user()->level == 'Employee') or (Auth::user()->level == 'Manager') )  {
    ?>

    <a class="navbar-brand" href="../../advancedpolicies">Policies Report</a>
    <a class="navbar-brand" href="../../broker">Broker Commission</a>
    <a class="navbar-brand" href="../../brokerexport">Broker Report</a>


    <?php
    }
    ?>
    <?php
    if (Auth::user()->level == 'Manager') {
    ?>
    <a class="navbar-brand" href="../../pending">Brokers Requests</a>
    <a class="navbar-brand" href="../../History">Policies Requests</a>
    <a class="navbar-brand" href="../../AllPolicies">All Policies </a>

    <?php
    }
    ?>
    <?php
    if (Auth::user()->level == 'Finance') {
    ?>

    <a class="navbar-brand" href="../../History">Policies</a>

    <?php
    }
    ?>
    <?php
    if ((Auth::user()->level == 'Employee') or (Auth::user()->level == 'Treasury') )  {
    ?>

    <a class="navbar-brand" href="../../HistoryPrint">All Policies </a>

    <?php
    }
    ?>

    <?php
    if (Auth::user()->level == 'Employee') {
    ?>
    <a class="navbar-brand" href="../../pendingUser">Pending Brokers</a>
    <a class="navbar-brand" href="../../Approve">Approve Brokers</a>

    <?php
    }
    ?>



    <?php

    if (Auth::user()->CancelShow == 'Yes') {
    ?>
    <a class="navbar-brand" href="../../Cancelploicy"> Cancel Advance Commission</a>
    <?php
    }
    ?>

    <?php

    if (Auth::user()->username == 'Admin.Admin') {
    ?>
    <a class="navbar-brand" href="../../register"> Create User</a>
    <a class="navbar-brand" href="../../resetpassword"> Reset Password</a>
    <?php
    }
    ?>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name}}
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="./changepassword">Change Password</a>
            <a class="dropdown-item"  href="{{ route('logout') }}"
               onclick="event.preventDefault();      document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>




</nav>

    <body>



<div >
    <img id="image" src="/svg/3.jpg"  />
</div>

<!--layout for update policy -->
<center>
    <form  id="contact-form"   method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">



    <table class="table_data" cellspacing="5" id="tab">


        <tbody><tr>
            <td>Sales Channel</td>
            <td>
                <select name="sales_channel" id="sales_channel">
                    <option value=" <?php echo $policy[0]->SalesChannel; ?>"> <?php echo $policy[0]->SalesChannel; ?></option>
                    <option value="DSF">DSF</option>
                    <option value="Broker">Broker</option>
                    <option value="CSO">CSO</option>
                    <option value="Arope Staff">Arope Staff</option>
                </select></td>
        </tr>
        <tr>
            <td>Agent code</td> <td> <input type="text" name="agent_code" id="agent_code" required="" value="<?php echo $policy[0]->Agentcode; ?>" ></td>
            <td></td>
            <td>Agent Name</td> <td> <input type="text" name="agent_name" id="agent_name" value="<?php echo $policy[0]->AgentName; ?>"  required="" style="width:300px; height:25px;"></td>
        </tr>
        <tr>
            <td>Agent Pin</td> <td> <input type="text" name="agent_pin" id="agent_pin" value="<?php echo $policy[0]->AgentPin; ?>"  onkeypress="return isNumber(event)"></td>
            <td></td>
            <td>Introducer code</td> <td> <input  type="text" id="introducer_code" name="introducer_code" value="<?php echo $policy[0]->Introducercode; ?>"></td>
        </tr>
        <tr>
            <td>product code</td> <td> <input type="text" name="product_code" id="product_code"  required="" value="<?php echo $policy[0]->productcode; ?>"></td>
            <td></td>
            <td>policy number</td> <td> <input type="text" id="policy_no" name="policy_no" required="" value="<?php echo $policy[0]->policynumber; ?>"  onkeypress="return isNumber(event)"></td>
        </tr>
        <tr>
            <td>Endors Number</td> <td> <input type="text" id="Endros_no" name="Endors_no" required="" value="<?php echo $policy[0]->EndorsNumber; ?>" ></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Operation type  :</td><td><select name="operation_type" id="oper" onchange="check_fun();">
                    <option value="<?php echo $policy[0]->Operationtype; ?>"><?php echo $policy[0]->Operationtype; ?></option>
                    <option value="cash">cash</option>
                    <option value="check">check</option>
                    <option value="transfer">transfer</option>
                </select></td>
            <td></td>
            <td>Check no   :</td><td><input type="text" name="check_no" id="check_no" value="<?php echo $policy[0]->Checkno; ?> " onkeypress="return isNumber(event)"> </td>
        </tr>
        <tr>
            <td>Please draw check on :</td> <td> <input type="text" name="check_on" id="check_on" value="<?php echo $policy[0]->Checkon; ?>" ></td>
        </tr>

        <tr>
            <td>Bank Account</td><td><input  type="text" name="bank_acc" id="bank_acc" value="<?php echo $policy[0]->BankAccount; ?>"></td>
            <td></td>
            <td>Company</td><td><select name="company" id="company">
                    <option value="<?php echo $policy[0]->Company; ?>"><?php echo $policy[0]->Company; ?></option>
                    <option value="non life">non life</option>
                    <option value="life">life</option>
                </select></td>
        </tr>
        <tr>
            <td>Status</td><td><select name="status" id="status">
                    <option value="<?php echo $policy[0]->Status; ?>"><?php echo $policy[0]->Status; ?></option>
                    <option value="paid">paid</option>
                    <option value="unpaid">unpaid</option>
                </select></td>
            <td></td>
            <td>Currency</td><td><select name="Currency" id="status">
                    <option value="<?php echo $policy[0]->Currency; ?>"><?php echo $policy[0]->Currency; ?></option>
                    <option value="Egyptian pound">Egyptian pound</option>
                    <option value="Euro">Euro</option>
                    <option value="US Dollar">US Dollar</option>
                </select></td>
        </tr>



        <tr>
            <td>Date of Payment</td> <td> <input type="date"  name="paid_Date" id="from" required="" class="hasDatepicker" value="<?php echo $policy[0]->DateofPayment; ?>"></td>
            <td></td>
            <td>Net Premium</td> <td> <input  type="text" name="net_prem" id="net_prem" required="" value="<?php echo $policy[0]->NetPremium; ?>"></td>
        </tr>

        <tr>
            <td>Due Rate</td> <td> <input type="text" step="any" name="due_Rate" id="due_Rate" required="" value="<?php echo $policy[0]->DueRate; ?>" placeholder="Enter Integer Number not percentage"></td>
            <td></td>
            <td>Early Commission</td><td> <input value="<?php echo $policy[0]->early; ?>" type="text" step="any" name="early" id="early" required="" placeholder="Enter Integer Number not percentage" ></td>

        </tr>

        <tr>
            <td>Due Commission</td> <td> <input type="text" readonly name="due_Comm" id="due_Comm" value="<?php echo $policy[0]->DueCommission; ?>" required=""></td>
            <td></td>
            <td>Extra Commission</td> <td> <input type="text" readonly name="extra_comm" id="extra_comm" value="<?php echo $policy[0]->ExtraCommission; ?>" required=""></td>

        </tr>
        <tr>

            <td>Taxes</td> <td> <input type="text" step="any" name="taxes" id="taxes" value="<?php echo $policy[0]->taxes; ?>" required="" placeholder="Enter Integer Number not percentage"></td>
            <td></td>
            <td>Taxes Amount</td> <td> <input type="text" readonly name="taxes_amount" value="<?php echo $policy[0]->TaxAmount; ?>" id="taxes_amount"  required=""></td>


        </tr>

        <tr>
            <td>Reason</td><td><input type="text" name="reason" id="reason" value="<?php echo $policy[0]->Reason; ?>"></td>
            <td></td>
            <td>Total</td> <td> <input type="text" name="total" id="total" required="" value="<?php echo $policy[0]->Total; ?>" readonly></td>


        </tr>
        <tr>
            <td></td><td></td>
<td>
    <button id="pre" type="submit" formaction="/doingUpdatePolicy/{{$policy[0]->id }}" style="width:100px;  border-radius: 10px ;color: white; background-color: #002752; border: 3px solid #00002E;">Update</button>
</td>

        </tr>

        </tbody></table>
    </form>
</center>


    </body>

    </html>

@else
    <script>
        // alert("You are not logged in or Sign-in expired,\n Please login");
        window.location = './welcome';
    </script>
@endauth


@endif
