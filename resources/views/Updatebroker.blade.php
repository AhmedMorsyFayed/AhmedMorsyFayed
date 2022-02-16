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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>

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
                var net =0;
                var reset =0;
                var trarvel =$("#travel").val();
                trarvel=trarvel.split(' ').join('');
                var accident =$("#accident").val();
                accident =accident.split(' ').join('');
                var property =$("#property").val();
                property=property.split(' ').join('');
                var motor =$("#motor").val();
                motor=motor.split(' ').join('');
                var medical =$("#medical").val();
                medical=medical.split(' ').join('');
                var marine =$("#marine").val();
                marine=marine.split(' ').join('');
                var eng =$("#engineering").val();
                eng=eng.split(' ').join('');
                var trarvelearly =$("#travelearly").val();
                trarvelearly=trarvelearly.split(' ').join('');
                var accidentearly =$("#accidentearly").val();
                accidentearly=accidentearly.split(' ').join('');
                var propertyearly =$("#propertyearly").val();
                propertyearly=propertyearly.split(' ').join('');
                var motorearly =$("#motorearly").val();
                motorearly=motorearly.split(' ').join('');
                var medicalearly =$("#medicalearly").val();
                medicalearly=medicalearly.split(' ').join('');
                var marineearly =$("#marineearly").val();
                marineearly=marineearly.split(' ').join('');
                var engearly =$("#engineeringearly").val();
                engearly=engearly.split(' ').join('');
                var Tax =$("#tax").val();
                console.log(Tax);

                if( trarvel.length ==0  ) {
                    trarvel =0;
                }
                if( accident.length ==0  ) {
                    accident =0;
                }
                if( property.length ==0  ) {
                    property =0;
                }
                if( motor.length ==0  ) {
                    motor =0;
                }
                if( medical.length ==0  ) {
                    medical =0;
                }
                if( marine.length ==0  ) {
                    marine =0;
                }
                if( eng.length ==0  ) {
                    eng =0;
                }
                if( engearly.length ==0  ) {
                    engearly =0;
                }
                if( marineearly.length ==0  ) {
                    marineearly=0;
                }
                if( motorearly.length ==0  ) {
                    motorearly =0;
                }
                if( accidentearly.length ==0  ) {
                    accidentearly=0;
                }
                if( trarvelearly.length ==0  ) {
                    trarvelearly =0;
                }

                if( medicalearly.length ==0  ) {
                    medicalearly =0;
                }
                if( propertyearly.length ==0  ) {
                    propertyearly =0;
                }

                sum=parseFloat(trarvel)+parseFloat(accident)+parseFloat(property)+parseFloat(motor)
                    +parseFloat(medical)+parseFloat(marine)+parseFloat(eng)+parseFloat(engearly)+parseFloat(marineearly)
                    +parseFloat(propertyearly)+parseFloat(trarvelearly)+parseFloat(accidentearly)+parseFloat(medicalearly)+parseFloat(motorearly);

                if(Tax == 5){
                    net =sum *.05;
                    reset=sum -net;
                }else if (Tax == 25) {
                    net =sum *.25;
                    reset=sum -net;
                }else if (Tax == 20){
                    net =sum *.2;
                    reset=sum -net;
                }else if (Tax == 0){
                    net=0;
                    reset=sum -net;
                }

                $("#totaltax").val(reset.toFixed(2));
                $("#taxes_amount").val(net.toFixed(2));

                $("#total").val(sum.toFixed(2));

            });
        }

        $(document).ready(function() {
            $('#tax').bind('change', function() {
                var total =$("#total").val();
                var Tax =$("#tax").val();
                var net=0;
                var reset =0;


                if(Tax == 5){
                    net =total *.05;
                    reset=total -net;
                }else if (Tax == 25) {
                    net =total *.25;
                    reset=total -net;
                }else if (Tax == 20){
                    net =total *.2;
                    reset=total -net;
                }else if(Tax == 0){
                    net=0;
                    reset=total;
                }

                $("#taxes_amount").val(net.toFixed(2));
                $("#totaltax").val(reset.toFixed(2));


            }).trigger('change');

        });

    </script>

</head>
<!-- extend app.css -->
<nav class="navbar navbar-inverse bg-primary navbar-dark">
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
            <a class="dropdown-item" href="../../changepassword">Change Password</a>
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
<!--layout for update broker -->

<center>
    <form action ="/doingUpdate/<?php echo $broker[0]->id; ?>" method = "post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input value="<?php echo $broker[0]->id; ?>" id="id" style="display: none">

    <table class="table_data" cellspacing="5" id="tab">


        <tbody>
        <tr>
            <td>Agent code</td> <td> <input type="text" name="agent_code" id="agent_code" value="<?php echo $broker[0]->Agentcode?> " required="" ></td>
            <td></td>
            <td>Agent Name</td> <td> <input type="text" name="agent_name" id="agent_name" value="<?php echo $broker[0]->Agentname?> " required="" style="width:300px; height:25px;"></td>
        </tr>

        <tr>
            <td>Commission  :</td> <td style="display: inline-flex;width: 100%"><select style="width: 100%" required name="Month" id="Month" >
                    <option value="<?php echo $broker[0]->Month?> "><?php echo $broker[0]->Month?> </option>
                    <option value="">Month ??</option>
                    <option value='01'>January</option>
                    <option value='02'>February</option>
                    <option value='03'>March</option>
                    <option value='04'>April</option>
                    <option value='05'>May</option>
                    <option value='06'>June</option>
                    <option value='07'>July</option>
                    <option value='08'>August</option>
                    <option value='09'>September</option>
                    <option value='10'>October</option>
                    <option value='11'>November</option>
                    <option value='12'>December</option>

                </select>
                <select style="width: 100%" name="year" required id="year" >
                    <option value="<?php echo $broker[0]->Year?> "><?php echo $broker[0]->Year?> </option>
                    <option value="Year">Year ??</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>

                </select>

            </td>
            <td></td>
            <td>Agent Pin</td> <td> <input type="text" name="agent_pin" id="agent_pin" value="<?php echo $broker[0]->AgentPin?> "  ></td>

        </tr>
        <tr>
            <td>Operation type  :</td><td><select name="operation_type" id="oper" onchange="check_fun();">
                    <option value="<?php echo $broker[0]->Operationtype?> "><?php echo $broker[0]->Operationtype?> </option>
                    <option value="cash">cash</option>
                    <option value="check">check</option>
                    <option value="transfer">transfer</option>
                </select></td>
            <td></td>
            <td>Check no   :</td><td><input type="text" name="check_no" id="check_no" value="<?php echo $broker[0]->Checkno?> "> </td>

        </tr>
        <tr>
            <td>Please draw check on :</td> <td> <input type="text" name="check_on" id="check_on" value="<?php echo $broker[0]->Checkon ?> " ></td>
            <td></td>
            <td>Bank Account</td><td><input  type="text" name="bank_acc" id="bank_acc" value="<?php echo $broker[0]->BankAccount ?> "></td>
        </tr>
        <tr>
            <td>Currency</td><td><select name="Currency" id="status">
                    <option value="<?php echo $broker[0]->Currency?> "><?php echo $broker[0]->Currency?> </option>
                    <option value="Egyptian pound">Egyptian pound</option>
                    <option value="Euro">Euro</option>
                    <option value="US Dollar">US Dollar</option>
                </select></td>
        </tr>

        <tr>
            <td>Motor Amount :</td> <td> <input type="text" name="motor" value="<?php echo $broker[0]->Motor ?> " id="motor"  ></td>
            <td></td>
            <td>Motor Early Amount :</td> <td> <input type="text" name="motorearly" id="motorearly" value="<?php echo $broker[0]->Motorearly?> " ></td>
        </tr>

        <tr>
            <td>Medical Amount :</td><td><input  type="text" name="medical" value="<?php echo $broker[0]->Medical?> " id="medical"></td>
            <td></td>
            <td>Medical Early Amount :</td><td><input  type="text" name="medicalearly" id="medicalearly" value="<?php echo $broker[0]->Medicalearly?> "></td>
        </tr>
        <tr>
            <td>Accident Amount :</td><td><input  type="text" value="<?php echo $broker[0]->Accident?> " name="accident" id="accident">
            </td>
            <td></td>
            <td>Accident Early Amount :</td><td><input  type="text" name="accidentearly" id="accidentearly" value="<?php echo $broker[0]->Accidentearly?> "></td>

        </tr>
        <tr>
            <td>Marine Amount :</td><td><input  type="text" value="<?php echo $broker[0]->marine?> " name="marine" id="marine">
            </td>
            <td></td>
            <td>Marine Early Amount :</td><td><input  type="text" name="marineearly" id="marineearly" value="<?php echo $broker[0]->marineearly?> " ></td>

        </tr>
        <tr>
            <td>Property Amount :</td> <td> <input  type="text" name="property" id="property" value="<?php echo $broker[0]->property?> "></td>
            <td></td>
            <td>Property Early Amount :</td> <td> <input type="text"  name="propertyearly"  id="propertyearly" value="<?php echo $broker[0]->propertyearly?> "  ></td>

        </tr>
        <tr>
            <td>Engineering Amount :</td> <td> <input type="text"  name="engineering" id="engineering" value="<?php echo $broker[0]->Engineering?>"></td>
            <td></td>
            <td>Engineering Early Amount :</td> <td> <input type="text" value="<?php echo $broker[0]->Engineeringearly?>" name="engineeringearly" id="engineeringearly" ></td>
        </tr>

        <tr>
            <td>Travel Amount :</td> <td> <input type="text"  name="travel" id="travel" value="<?php echo $broker[0]->travel?> "></td>
            <td></td>
            <td>Travel Early Amount: </td><td><input type="text" name="travelearly" id="travelearly" value="<?php echo $broker[0]->travelearly?> "></td>
        </tr>
        <tr>
            <td>Total :</td> <td> <input type="text"  name="total" value="<?php echo $broker[0]->total?>"  required id="total"   ></td>
            <td></td>
            <td>Tax :</td> <td>  <select style="width: 70%" name="tax" required id="tax" >
                    <option value="<?php echo $broker[0]->tax?>"><?php echo $broker[0]->tax?>%</option>
                    <option value="0">0%</option>
                    <option value="5">5%</option>
                    <option value="20">20%</option>
                    <option value="25">25%</option>
                </select></td>

        </tr>
        <tr>
            <td>Taxes Amount</td> <td> <input type="text" readonly name="taxes_amount" id="taxes_amount" value="<?php echo $broker[0]->TaxAmount?> " required=""></td>
        </tr>
        <tr>
            <td>Reason</td><td><input type="text" name="reason" id="reason" value="<?php echo $broker[0]->Reason?> "></td>
            <td></td>
            <td>Total After Tax : </td><td><input type="text" name="totaltax" required value="<?php echo $broker[0]->net?> " id="totaltax" ></td>
        </tr>



        <tr>
            <td></td><td></td>
<td>
    <button id="pre" type="submit"  style="width:100px;  border-radius: 10px ;color: white; background-color: #002752; border: 3px solid #00002E;">Update</button>
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
