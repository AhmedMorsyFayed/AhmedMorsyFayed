@if (Route::has('login'))

@auth

    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!--مكتبات لاستخدام javascript and jquery  -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rsys Request </title>
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



    <style>
        /* dropdown of a herf css*/
        a.dropdown-item {

        }/* dropdown of a herf css after put pointer on it*/
        a.dropdown-item:hover {
            background-color: #86cfda;
        }/* navbar of a herf css*/
        a.navbar-brand:hover {

            color: #00002E !important;
        }/* each input of layout css*/
        input{
            background-color: #00529b;
            color: white;
            border: 3px solid #00002E;
            border-radius: 4px;
            width: 25%;
            font-size: 30px;

        }



        /*word of input css */
        .h33 {
            font-size: 30px;
            color: #761b18;
            text-transform: capitalize;

        }/* input css */
        .formm-control{
            display: block;
            width: 50%;
            height: calc(1.6em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 0.9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;


        }
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 150%;
            vertical-align: top;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
            vertical-align: top;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
            vertical-align: top;
        }

        /* css of Approve policy button or update  */

        #pre{
            padding: 3px 12px;
            border-radius: 10px ;
            color: white;
            background-color: #002752;
            border: 1px solid #00002E;
            text-decoration:none;
        }/* css of Approve policy button or update after put pointer on it  */
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
<!--layout for manager to see all pending policies and approve it or update  -->
<br>
<br>
<?php
if (Auth::user()->level == 'Manager') {
?>
<br><br>
<h3 class="h33"> Search  :  </h3>

<input style="width: 60%;border: black 2px solid" id="myInput" autocomplete="off" type="text" class="form-control fa fa-search"  onkeyup="myFunction()" placeholder="Search..">
<br>
<table class="table table-sm table-primary">

    <?php

    $policies = DB::select('select * from policies where (Manager is null or Manager ="pending") ORDER BY id DESC');

    ?>

    <thead>
    <tr style="background-color: #17a2b8;color: white;border: 2px solid #00002E;height: 50px!important; "><!--header  -->
        <td style="border: 2px solid #00002E;color: white;" >id</td>
        <td style="border: 2px solid #00002E;color: white;" >Policy Number</td>
        <td style="border: 2px solid #00002E;color: white;" >Agent Code</td>
        <td style="border: 2px solid #00002E;color: white;" >Agent Name</td>
        <td style="border: 2px solid #00002E;color: white;">Agent Pin</td>
        <td style="border: 2px solid #00002E;color: white;width: 150px">Date Of Payment</td>
        <td style="width: 120px"></td>
        <td style="width: 120px"></td>
        <td style="width: 120px"></td>


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

        <td ><a id="pre" href='approv/{{$policy->id }}' class="btn-primary">Approve</a></td>
        <td ><a id="pre" href='Canace/{{$policy->id }}' class="btn-primary">Cancel</a></td>
        <td ><a id="pre" href='UpdatePolicy/{{$policy->id }}' class="btn-primary">Update</a></td>




    </tr>
    @endforeach


    </tbody>
</table>
<?php
}
?>

    <!--layout for finance to see all reviewd policies and cancel them if they want to cancel -->
<?php
if (Auth::user()->level == 'Finance') {
?>
<br><br>
<h3 class="h33"> Search  :  </h3>

<input style="width: 60%;border: black 2px solid" id="myInput" autocomplete="off" type="text" class="form-control fa fa-search"  onkeyup="myFunction()" placeholder="Search..">
<br>
<table class="table table-sm table-primary">

    <?php

    $policies = DB::select('select * from policies where FinanceStatus="Review" and Manager="Approve" ORDER BY id DESC');

    ?>

    <thead>
    <tr style="background-color: #17a2b8;color: white;border: 2px solid #00002E;height: 50px!important; "><!--header  -->
        <td style="border: 2px solid #00002E;color: white;" >id</td>
        <td style="border: 2px solid #00002E;color: white;" >Policy Number</td>
        <td style="border: 2px solid #00002E;color: white;" >Agent Code</td>
        <td style="border: 2px solid #00002E;color: white;" >Agent Name</td>
        <td style="border: 2px solid #00002E;color: white;">Agent Pin</td>
        <td style="border: 2px solid #00002E;color: white;width: 150px">Date Of Payment</td>
        <td style="width: 120px"></td>
        <td style="width: 120px"></td>



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
        <td ><a id="pre" href='UpdatePolicy/{{$policy->id }}' class="btn-primary">Update</a></td>
        <td ><a id="pre" href='CancelReview/{{$policy->id }}' class="btn-primary">Cancel</a></td>





    </tr>
    @endforeach


    </tbody>
</table>
<?php
}
?>


<body>



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
