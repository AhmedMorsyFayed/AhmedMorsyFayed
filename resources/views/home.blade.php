@if (Route::has('login'))

@auth
    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rsys Home</title>
    <!--مكتبات لاستخدام javascript and jquery  -->
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
        }
        /* css of save button and preview button after put pointer on them  */
        #pre:hover{
            background-color: #17a2b8 !important;
            color: white !important;
        }
#pree{
    padding: 3px 12px;
    border-radius: 10px ;
    color: white;
    background-color: #002752;
    border: 1px solid #00002E;
    text-decoration:none;
}
/* css of save button and preview button after put pointer on them  */
#pree:hover{
    background-color: #17a2b8 !important;
    color: white !important;
}
#preee{
    padding: 3px 12px;
    border-radius: 10px ;
    color: white;
    background-color: #002752;
    border: 1px solid #00002E;
    text-decoration:none;
}
/* css of save button and preview button after put pointer on them  */
#preee:hover{
    background-color: #17a2b8 !important;
    color: white !important;
}
        /* css of placeholder of early input*/
        #early::placeholder{
            color: white;
            opacity: 70%;
            font-size: 12px;
        }
/* css of placeholder of Due rate input*/
        #due_Rate::placeholder{
            color: white;
            opacity: 70%;
            font-size: 12px;
        }
/* css of placeholder of taxes input*/
        #taxes::placeholder{
            color: white;
            opacity: 70%;
            font-size: 12px;
        }
.dropbtn {
    background-color: #17a2b8;
    color: white;
    padding: 2px;
    border-radius: 3px ;
    font-size: .8vw;
    border: none;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 10%;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content button {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}

#confirm {
    display: none;
    background-color: #9fcdff;
    border: 3px solid #0d3349;
    border-radius: 10px;
    position: fixed;
    width: 25%;
    height: 210px;
    top: 40%;
    left: 40%;
    margin-left: -100px;
    padding: 6px 8px 8px;
    box-sizing: border-box;
    text-align: center;
}
#confirmm {

    background-color: #9fcdff;
    border: 3px solid #0d3349;
    border-radius: 10px;
    position: fixed;
    width: 25%;
    height: 210px;
    top: 40%;
    left: 40%;
    margin-left: -100px;
    padding: 6px 8px 8px;
    box-sizing: border-box;
    text-align: center;
}
#note {
    background-color: #0d3349;
    display: inline-block;
    border-radius: 5px;
    border: 1px solid #aaa;
    color: whitesmoke;
    font-size: 15px;
    padding: 5px;
    text-align: center;
    width: 80px;
    cursor: pointer;
}
#notee {
    background-color: #002752;
    display: inline-block;
    border-radius: 5px;
    border: 1px solid #aaa;
    color: whitesmoke;
    font-size: 15px;
    padding: 5px;
    text-align: center;
    width: 80px;
    cursor: pointer;
}
#note:hover{
    background-color: #1d68a7;
}
#notee:hover{
    background-color: #761b18;
}


#confirm .message {
    background-color: #0d3349;
    text-align: center;
    font-size: 20px;
    color: whitesmoke;

}

#confirmm {
    display: none;
    background-color: #9fcdff;
    border: 3px solid #0d3349;
    border-radius: 10px;
    position: fixed;
    width: 25%;
    height: 210px;
    top: 40%;
    left: 40%;
    margin-left: -100px;
    padding: 6px 8px 8px;
    box-sizing: border-box;
    text-align: center;
}
#confirmm {

    background-color: #9fcdff;
    border: 3px solid #0d3349;
    border-radius: 10px;
    position: fixed;
    width: 25%;
    height: 210px;
    top: 40%;
    left: 40%;
    margin-left: -100px;
    padding: 6px 8px 8px;
    box-sizing: border-box;
    text-align: center;
}
#notem {
    background-color: #0d3349;
    display: inline-block;
    border-radius: 5px;
    border: 1px solid #aaa;
    color: whitesmoke;
    font-size: 15px;
    padding: 5px;
    text-align: center;
    width: 80px;
    cursor: pointer;
}
#noteem {
    background-color: #002752;
    display: inline-block;
    border-radius: 5px;
    border: 1px solid #aaa;
    color: whitesmoke;
    font-size: 15px;
    padding: 5px;
    text-align: center;
    width: 80px;
    cursor: pointer;
}
#notem:hover{
    background-color: #1d68a7;
}
#noteem:hover{
    background-color: #761b18;
}


#confirmm .message {
    background-color: #0d3349;
    text-align: center;
    font-size: 20px;
    color: whitesmoke;

}
.check{
    width: 100%;
    height: 20px;
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
                sum=(parseFloat(early)*parseFloat(netprem))/100;//حساب extra commission
                sumDue=(parseFloat(due)*parseFloat(netprem))/100;//حساب due commission
                Taxes=((sum+sumDue)*parseFloat(Tax))/100;//حساب taxes amount
                Total =sum+sumDue-Taxes;//حساب total
                $("#extra_comm").val(sum.toFixed(2));
                $("#due_Comm").val(sumDue.toFixed(2));
                $("#taxes_amount").val(Taxes.toFixed(2));
                $("#total").val(Total.toFixed(2));

            });
        }


// function for search in table data with anything
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });


    </script>
    <script>
        function showDiv() {
            document.getElementById('confirm').style.display = "block";
        }

        function dosomethingg(element){
            document.getElementById('TaskID').value =element.value;
            //you can print any value like id,class,value,innerHTML etc.
        }

        function setcheck() {
            $("#confirm").hide();
            document.getElementById('textinput').value = "";
        }

        $(document).ready(function()
        {
            $('#MakeNote').on("submit", function() {
                $("#confirm").hide();
                return true;
            });
        });


        function showNote() {
            document.getElementById('confirm').style.display = "block";
            $("#confirmm").hide();
        }
        function setcheckk() {
            $("#confirmm").hide();
            document.getElementById('textinputt').value = "";
        }
    </script>
    <script>
        function showDivv() {
            document.getElementById('confirmm').style.display = "block";
        }

        function setcheckk() {
            $("#confirmm").hide();
            document.getElementById('textinput').value = "";
        }

        $(document).ready(function()
        {
            $('#MakeNotem').on("submit", function() {
                $("#confirmm").hide();
                return true;
            });
        });

        function dosomething(element){
            document.getElementById('TaskIDd').value =element.value;
            //you can print any value like id,class,value,innerHTML etc.
        }

        function showNote() {
            document.getElementById('confirm').style.display = "block";
            $("#confirmm").hide();
        }


    </script>
</head>
<!-- extend app.css -->

<!-- navbar design -->
<nav class="navbar navbar-inverse bg-primary navbar-dark" >
    <!--if statment بتوضح الصفحات اللى بتظهر لناس على حسب level -->
    <a class="navbar-brand fa fa-home" href="./home">Daily Commission</a>
    <?php
    if ((Auth::user()->level == 'Employee') or (Auth::user()->level == 'Manager') )  {
    ?>

    <a class="navbar-brand" href="./advancedpolicies">Policies Report</a>
    <a class="navbar-brand" href="./broker">Broker Commission</a>
    <a class="navbar-brand" href="./brokerexport">Broker Report</a>
    <a class="navbar-brand" href="./Approve">Approve Brokers</a>


    <?php
    }
    ?>
    <?php
    if (Auth::user()->level == 'Manager') {
    ?>
    <a class="navbar-brand" href="./pending">Brokers Requests</a>
    <a class="navbar-brand" href="./History">Policies Requests</a>
    <a class="navbar-brand" href="./AllPolicies">All Policies </a>
    <a class="navbar-brand" href="./download">Files</a>


    <?php
    }
    ?>

    <?php
    if (Auth::user()->level == 'Treasury') {
    ?>

    <a class="navbar-brand" href="./download">Files</a>

    <?php
    }
    ?>
    <?php
    if ((Auth::user()->level == 'Finance') or (Auth::user()->name == 'Merna Adham') ){
    ?>

    <a class="navbar-brand" href="./History">Policies</a>
    <a class="navbar-brand" href="./download">Files</a>
    <a class="navbar-brand" href="./Flag">Pending</a>
    <a class="navbar-brand" href="./advancedpolicies">Policies Report</a>

    <?php
    }
    ?>
    <?php
    if ((Auth::user()->level == 'Employee') or (Auth::user()->level == 'Treasury') )  {
    ?>

    <a class="navbar-brand" href="./HistoryPrint">All Policies </a>

    <?php
    }
    ?>

    <?php
    if (Auth::user()->level == 'Employee') {
    ?>
    <a class="navbar-brand" href="./pendingUser">Pending Brokers</a>


    <?php
    }
    ?>



    <?php

    if (Auth::user()->CancelShow == 'Yes') {
    ?>
    <a class="navbar-brand" href="./Cancelploicy"> Cancel Advance Commission</a>
    <?php
    }
    ?>

    <?php

    if (Auth::user()->username == 'Admin.Admin') {
        ?>
    <a class="navbar-brand" href="./register"> Create User</a>
    <a class="navbar-brand" href="./resetpassword"> Reset Password</a>
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
<!-- the layout for insert daily commission data -->
    <body>

    <?php
    if ((Auth::user()->level == 'Employee') or (Auth::user()->level == 'Manager') or (Auth::user()->level == 'Admin')  ) {
        ?>

    <div style="float: right ;display: inline-flex">
        <form action="/Upload" method = "post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input id="upload" name="upload[]" type="file" multiple />
            <input  name="Done" type="submit"  />
        </form>
    </div>

<div >
    <img id="image" src="/svg/3.jpg"  />
</div>


<center>
    <form  id="contact-form"   method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <table class="table_data" cellspacing="5" id="tab">


        <tbody><tr>
            <td>Sales Channel</td>
            <td>
                <select name="sales_channel" id="sales_channel">
                    <option value="DSF">DSF</option>
                    <option value="Broker">Broker</option>
                    <option value="CSO">CSO</option>
                    <option value="Arope Staff">Arope Staff</option>
                </select></td>
        </tr>
        <tr>
            <td>Agent code</td> <td> <input type="text" name="agent_code" id="agent_code" required="" ></td>
            <td></td>
            <td>Agent Name</td> <td> <input type="text" name="agent_name" id="agent_name"  required="" style="width:300px; height:25px;"></td>
        </tr>
        <tr>
            <td>Agent Pin</td> <td> <input type="text" name="agent_pin" id="agent_pin"   onkeypress="return isNumber(event)"></td>
            <td></td>
            <td>Introducer code</td> <td> <input  type="text" id="introducer_code" name="introducer_code"></td>
        </tr>
        <tr>
            <td>product code</td> <td> <input type="text" name="product_code" id="product_code"  required=""></td>
            <td></td>
            <td>policy number</td> <td> <input type="text" id="policy_no" name="policy_no" required=""  onkeypress="return isNumber(event)"></td>
        </tr>
        <tr>
            <td>Endors Number</td> <td> <input type="text" id="Endros_no" name="Endors_no" required="" ></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Operation type  :</td><td><select name="operation_type" id="oper" onchange="check_fun();">
                    <option value="cash">cash</option>
                    <option value="check">check</option>
                    <option value="transfer">transfer</option>
                </select></td>
            <td></td>
            <td>Check no   :</td><td><input type="text" name="check_no" id="check_no" onkeypress="return isNumber(event)"> </td>
        </tr>
        <tr>
            <td>Please draw check on :</td> <td> <input type="text" name="check_on" id="check_on"  ></td>
        </tr>

        <tr>
            <td>Bank Account</td><td><input  type="text" name="bank_acc" id="bank_acc"></td>
            <td></td>
            <td>Company</td><td><select name="company" id="company">
                    <option value="non life">non life</option>
                    <option value="life">life</option>
                </select></td>
        </tr>
        <tr>
            <td>Status</td><td><select name="status" id="status">
                    <option value="paid">paid</option>
                    <option value="unpaid">unpaid</option>
                </select></td>
            <td></td>
            <td>Currency</td><td><select name="Currency" id="status">
                    <option value="Egyptian pound">Egyptian pound</option>
                    <option value="Euro">Euro</option>
                    <option value="US Dollar">US Dollar</option>
                </select></td>
        </tr>



        <tr>
            <td>Date of Payment</td> <td> <input type="date"  name="paid_Date" id="from" required="" class="hasDatepicker"></td>
            <td></td>
            <td>Net Premium</td> <td> <input  type="text" name="net_prem" id="net_prem" required=""></td>
        </tr>
        <tr>
            <td>Due Rate</td> <td> <input type="text" step="any" name="due_Rate" id="due_Rate" required="" placeholder="Enter Integer Number not percentage"></td>
            <td></td>
            <td>Early Rate</td><td> <input type="text" step="any" name="early" id="early" required="" placeholder="Enter Integer Number not percentage" ></td>
        </tr>

        <tr>
            <td>Due Commission</td> <td> <input type="text"  name="due_Comm" id="due_Comm" required=""></td>
            <td></td>
            <td>Extra Commission</td> <td> <input type="text"  name="extra_comm" id="extra_comm"  required=""></td>

        </tr>
        <tr>

            <td>Taxes Rate</td> <td> <input type="text" step="any" name="taxes" id="taxes" required="" placeholder="Enter Integer Number not percentage"></td>
            <td></td>
            <td>Taxes Amount</td> <td> <input type="text"  name="taxes_amount" id="taxes_amount"  required=""></td>


        </tr>

        <tr>
            <td>Reason</td><td><input type="text" name="reason" id="reason" ></td>
            <td></td>
            <td>Total</td> <td> <input type="text" name="total" id="total" required="" ></td>

        </tr>
        <tr>
            <td></td><td></td>
<td>
    <button id="pre" type="submit" formaction="/preview" style="width:100px;  border-radius: 10px ;color: white; background-color: #002752; border: 3px solid #00002E;">Preview</button>
</td>
            <td>
                <button id="pre" type="submit" formaction="/savedaily" style="width:100px;  border-radius: 10px ;color: white; background-color: #002752; border: 3px solid #00002E;">Save</button>

            </td>
        </tr>

        </tbody></table>
    </form>
</center>

    <?php
    }
    ?>
<!--layout for finance for review or update-->
    <?php
    if (Auth::user()->level == 'Finance') {
        ?>


    <br><br>
    <h3 class="h33"> Search  :  </h3>

    <input style="width: 60%;border: black 2px solid" id="myInput" autocomplete="off" type="text" class="form-control fa fa-search"  onkeyup="myFunction()" placeholder="Search..">
    <br>
    <table class="table table-sm table-primary">

        <?php

        $policies = DB::select('select * from policies where Manager = "Approve" and(FinanceStatus is null or FinanceStatus ="pending") and Flag=0 ORDER BY id DESC');

        ?>

        <thead>
        <tr style="background-color: #17a2b8;color: white;border: 2px solid #00002E;width: 10px "><!--header  -->
            <td style="width: 50px"></td>
            <td style="border: 2px solid #00002E;color: white;" >id</td>
            <td style="border: 2px solid #00002E;color: white;" >Policy Number</td>
            <td style="border: 2px solid #00002E;color: white;" >Agent Code</td>
            <td style="border: 2px solid #00002E;color: white;" >Agent Name</td>
            <td style="border: 2px solid #00002E;color: white;">Agent Pin</td>
            <td style="border: 2px solid #00002E;color: white;width: 150px">Date Of Payment</td>
            <td style="border: 2px solid #00002E;color: white;width: 150px">Creation</td>
            <td style="width: 120px"></td>




        </tr>
        </thead>
        <tbody  id="myTable">



        @foreach ($policies as $policy)<!--body -->
        <tr><td style="border: 2px solid #00002E">
                <form action="/checkbox" method = "post" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="checkbox" class="check" name="checkid" value="{{ $policy->id }}" onChange='submit();' >
                </form>
            </td>
            <td style="border: 2px solid #00002E">{{ $policy->id }}</td>
            <td style="border: 2px solid #00002E;">{{ $policy->policynumber }}</td>
            <td style="border: 2px solid #00002E">{{ $policy->Agentcode }}</td>
            <td style="border: 2px solid #00002E">{{ $policy->AgentName }}</td>
            <td style="border: 2px solid #00002E">{{ $policy->AgentPin }}</td>
            <td style="border: 2px solid #00002E;width: 100px">{{ $policy->DateofPayment }}</td>
            <td style="border: 2px solid #00002E;width: 100px">{{ $policy->creation }}</td>
            <td >
                <div class="dropdown">
                    <button class="dropbtn">Options</button>
                    <div class="dropdown-content">
                        <a id="pre" href='review/{{$policy->id }}' class="btn-primary">Review</a>
                        <a id="pre" href='UpdatePolicy/{{$policy->id }}' class="btn-primary">Update</a>
                        <button id="pree" value="{{$policy->id }}" onclick="showDiv();dosomethingg(this)" style="width: 100%" class="btn-primary">Note   </button>
                        <button id="preee" value="{{$policy->id }}" onclick="showDivv();dosomething(this)" class="btn-primary">Problem</button>
                    </div>
                </div>


            </td>




        </tr>
        @endforeach


        </tbody>
    </table>
    <div id="confirm" >
        <form action="/insertnote" method = "post" id="MakeNote">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" id="TaskID" name="TaskID" style="display: none">
            <h4 style="background-color: #17a2b8;color: white;border: 2px solid #00002E;border-radius: 7px">Note</h4>
            <textarea id="textinput" name="note" required style="width: 100%;height: 115px"></textarea>
            <div style="display: inline-block">
                <input type="submit" id="note" value="Save"  >
                <button id="notee" onclick="setcheck()" value="Canacel" >Cancel</button>

            </div>

        </form>
    </div>

    <div id="confirmm" >
        <form action="/insertproblem" method = "post" id="Makeprblem">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" id="TaskIDd" name="TaskIDd" style="display: none">
            <h4 style="background-color: #4c110f;color: white;border: 2px solid #00002E;border-radius: 7px">Problem</h4>
            <textarea id="textinput" name="Problem" required style="width: 100%;height: 115px"></textarea>
            <div style="display: inline-block">
                <input type="submit" id="notem" value="Save"  >
                <button id="noteem" onclick="setcheckk()" value="Canacel" >Cancel</button>

            </div>

        </form>
    </div>





    <?php
    }
    ?>
    <!--layout for Treasury for print-->

    <?php
    if (Auth::user()->level == 'Treasury') {
    ?>



    <br><br>
    <h3 class="h33"> Search  :  </h3>

    <input style="width: 60%;border: black 2px solid" id="myInput" autocomplete="off" type="text" class="form-control fa fa-search"  onkeyup="myFunction()" placeholder="Search..">
    <br>
    <table class="table table-sm table-primary">

        <?php

        $policies = DB::select('select * from policies where FinanceStatus = "Review" and Cashier is null ORDER BY id DESC');

        ?>

        <thead>
        <tr style="background-color: #17a2b8;color: white;border: 2px solid #00002E;height: 50px!important; "><!--header  -->
            <td style="border: 2px solid #00002E;color: white;" >id</td>
            <td style="border: 2px solid #00002E;color: white;" >Policy Number</td>
            <td style="border: 2px solid #00002E;color: white;" >Agent Code</td>
            <td style="border: 2px solid #00002E;color: white;" >Agent Name</td>
            <td style="border: 2px solid #00002E;color: white;">Agent Pin</td>
            <td style="border: 2px solid #00002E;color: white;width: 150px">Date Of Payment</td>
            <td style="border: 2px solid #00002E;color: white;width: 150px">Creation</td>
            <td style="width: 150px"></td>



        </tr>
        </thead>
        <tbody  id="myTable">



        @foreach ($policies as $policy)<!--body -->
        <tr>
            <td style="border: 2px solid #00002E">{{ $policy->id }}</td>
            <td style="border: 2px solid #00002E;">{{ $policy->policynumber }}</td>
            <td style="border: 2px solid #00002E">{{ $policy->Agentcode }}</td>
            <td style="border: 2px solid #00002E">{{ $policy->AgentName }}</td>
            <td style="border: 2px solid #00002E">{{ $policy->AgentPin }}</td>
            <td style="border: 2px solid #00002E;width: 100px">{{ $policy->DateofPayment }}</td>
            <td style="border: 2px solid #00002E;width: 100px">{{ $policy->creation }}</td>
            <td ><a id="pre" href='printpolicy/{{$policy->id }}' class="btn-primary">Print</a></td>


        </tr>
        @endforeach


        </tbody>
    </table>




    <?php
    }
    ?>

    </body>

    </html>

@else
    <!--script if your time expired session well be closed and refer user to login layout  -->
    <script>
        // alert("You are not logged in or Sign-in expired,\n Please login");
        window.location = './welcome';
    </script>
@endauth


@endif
