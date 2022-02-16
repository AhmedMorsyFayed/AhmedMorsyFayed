@if (Route::has('login'))

@auth
    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!--مكتبات لاستخدام javascript and jquery  -->
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
        /* how to look in browser css*/
        input:-webkit-autofill {
            /* Select the text color of the history*/
            -webkit-text-fill-color: white;
            -webkit-transition: background-color 50000s ease-in-out 0s!important;

        }
        /* css of Approve broker button */
        #pre{
           padding: 3px 12px;
            border-radius: 10px ;
            color: white;
            background-color: #002752;
            border: 3px solid #00002E;
            text-decoration:none;
        }
        /* css of Approve broker button after put pointer on it  */
        #pre:hover{
            background-color: #17a2b8 !important;
            color: white !important;
        }



    </style>

    <script>
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

</head>
<!-- extend app.css -->
<nav class="navbar navbar-inverse bg-primary navbar-dark">
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
    if (Auth::user()->level == 'Finance') {
    ?>

    <a class="navbar-brand" href="./History">Policies</a>

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

<body>
<!--layout for manager to approve aor update broker -->
<div >
    <img id="image" src="/svg/3.jpg"  />
</div>
<br><br>
<h3 class="h33"> Search  :  </h3>
<input style="width: 60%;border: #0d3349 2px solid" id="myInput" class="form-control" type="text" placeholder="Search..">
<center>
    <form  id="contact-form"   method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <br><br>

        <?php

        $pendingBroker =DB::select('select * from broker where status ="Pending" ');

        ?>



        <table class="table table-sm table-primary">
            <tr style="background-color: #17a2b8;color: white;border: 2px solid #00002E;height: 50px!important; "><!--header  -->
                <td style="border: 2px solid #00002E;color: white;position: center">ID</td>
                <td style="border: 2px solid #00002E;color: white;position: center">Serial</td>
                <td style="border: 2px solid #00002E;color: white;position: center">Agent Code</td>
                <td style="border: 2px solid #00002E;color: white;position: center">Agednt Name</td>
                <td style="border: 2px solid #00002E;color: white;position: center">Agednt Pin</td>
                <td style="border: 2px solid #00002E;color: white;position: center">Operation type</td>
                <td style="border: 2px solid #00002E;color: white;position: center">check on</td>
                <td style="border: 2px solid #00002E;color: white;position: center">Bank Account</td>
                <td style="border: 2px solid #00002E;color: white;position: center">Check no</td>
                <td style="border: 2px solid #00002E;color: white;position: center">Currency</td>
                <td style="border: 2px solid #00002E;color: white;position: center">Creation</td>
                <td style="border: 2px solid #00002E;color: white;position: center">Month</td>
                <td style="border: 2px solid #00002E;color: white;position: center">Year</td>
                <td style="border: 2px solid #00002E;color: white;position: center">Medical</td>
                <td style="border: 2px solid #00002E;color: white;position: center">Motor</td>
                <td style="border: 2px solid #00002E;color: white;position: center">Marine</td>
                <td style="border: 2px solid #00002E;color: white;position: center">Travel</td>
                <td style="border: 2px solid #00002E;color: white;position: center">Accident</td>
                <td style="border: 2px solid #00002E;color: white;position: center">Property</td>
                <td style="border: 2px solid #00002E;color: white;position: center">Engineering</td>
                <td style="border: 2px solid #00002E;color: white;position: center">Medical Early</td>
                <td style="border: 2px solid #00002E;color: white;position: center">Motor Early</td>
                <td style="border: 2px solid #00002E;color: white;position: center">Marine Early</td>
                <td style="border: 2px solid #00002E;color: white;position: center">Travel Early</td>
                <td style="border: 2px solid #00002E;color: white;position: center">Accident Early</td>
                <td style="border: 2px solid #00002E;color: white;position: center">Property Early</td>
                <td style="border: 2px solid #00002E;color: white;position: center">Engineering Early</td>
                <td style="border: 2px solid #00002E;color: white;position: center">Total</td>
                <td style="border: 2px solid #00002E;color: white;position: center">Tax</td>
                <td style="border: 2px solid #00002E;color: white;position: center">Net</td>
                <td style="border: 2px solid #00002E;color: white;position: center">UserName</td>
                <td></td>
                <td ></td>


            </tr>
            <tbody  id="myTable">
            @foreach ($pendingBroker as $pending)<!--body -->
            <tr>

                <td style="border: 2px solid #00002E" >{{ $pending->id}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->serial}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->Agentcode}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->Agentname}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->AgentPin}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->Operationtype}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->Checkon}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->BankAccount}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->Checkno}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->Currency}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->DateofPayment}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->Month}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->Year}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->Medical}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->Motor}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->marine}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->travel}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->Accident}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->property}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->Engineering}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->Medicalearly}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->Motorearly}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->marineearly}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->travelearly}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->Accidentearly}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->propertyearly}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->Engineeringearly}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->total}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->tax}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->net}}</td>
                <td style="border: 2px solid #00002E" >{{ $pending->User}}</td>
                <td ><a id="pre" href='Update/{{$pending->id}}' class="btn-primary">Update</a></td>
                <td ><a id="pre" href='approve/{{$pending->id}}' class="btn-primary">Approve</a></td>


            </tr>
            @endforeach




            </tbody>
        </table>


    </form>
</center>

</body>

</html>
<!--script if your time expired session well be closed and refer user to login layout  -->

@else
    <script>
        // alert("You are not logged in or Sign-in expired,\n Please login");
        window.location = './welcome';
    </script>
@endauth


@endif
