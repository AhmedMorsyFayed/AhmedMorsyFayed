
@if (Route::has('login'))

@auth

    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RSYS </title>
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
        html, body {
            background-color: #fff;

            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;


            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        a.dropdown-item {

        }
        a.dropdown-item:hover {
            background-color: #86cfda;
        }
        a.navbar-brand:hover {

            color: #00002E !important;
        }
        input{
            background-color: #00529b;
            color: white;
            border: 3px solid #00002E;
            border-radius: 4px;
            width: 25%;
            font-size: 30px;

        }

        .formm-control{
            display: block;
            width: 50%;

            padding: 0.375rem 0.75rem;
            font-size: 0.9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: .5px solid blue;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;


        }
       h3{
           text-transform: capitalize;
           color: blue;
           font-family: "Times New Roman", Times, serif;
       }
        #Save:hover{
            background-color: #17a2b8 !important;
            color: white !important;
        }
        #Ticket{

            padding: 5px 10px;
            font-size: 16px;
            font-weight: 800;
            letter-spacing: .1rem;
            text-decoration: none;
            border-radius: 30px;
            color: white;
            background-color: #0d3349;
        }
        #Ticket:hover {
            color: white;
            background-color:#17a2b8 ;
        }



    </style>
    <script>
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
<br><br><br>

<body>

<center >
    <div style="display: inline-flex;width: 50%">
        <h3 class="h34"> Search  :  </h3>

        <input style="border: 2px solid black ;width: 70%" id="myInput" autocomplete="off" type="text" class="formm-control fa fa-search"  onkeyup="myFunction()" placeholder="Search..">
    </div>
</center>
<br><br><br>
<center>
    <div style="width: 80%">
        <table class="table table-sm table-primary">
            <?php
            $Files = DB::select('select * from Files ORDER BY id Desc');
            ?>



<thead>
            <tr style="background-color: #17a2b8;color: white;border: 2px solid #00002E;height: 50px!important; "><!--header  -->
                <td style="border: 2px solid #00002E ;color: white;" >id</td>
                <td style="border: 2px solid #00002E ;color: white;" >Serial</td>
                <td style="border: 2px solid #00002E ;color: white;width: 40%" >File Name</td>
                <td style="border: 2px solid #00002E ;color: white;" >User Name</td>
                <td style="border: 2px solid #00002E ;color: white;" >Creation</td>
                <td style="border: 2px solid #00002E;color: white;width: 10px" ></td>

            </tr>

</thead>
            <tbody  id="myTable">

        @foreach ($Files as $file)<!--body -->

        <!--body -->
            <tr>
                <td style="border: 2px solid #00002E;color: black" >{{$file->id}}</td>
                <td style="border: 2px solid #00002E;color: black" >{{$file->serial}}</td>
                <td style="border: 2px solid #00002E;color: black" >{{$file->filesName}}</td>
                <td style="border: 2px solid #00002E;color: black" >{{$file->User}}</td>
                <td style="border: 2px solid #00002E;color: black" >{{$file->creation}}</td>
                <td style="border: 2px solid #00002E;height: 40px;padding: 8px " > <a id='Ticket'  href='./download/{{$file->serial}}'>Download</a></td>

            </tr>
            @endforeach
        </table>

    </div>


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
