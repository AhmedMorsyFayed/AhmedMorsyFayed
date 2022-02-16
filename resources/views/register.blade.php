
@if (Route::has('login'))

@auth

        <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rsys Register</title>
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


    <style>

        a.dropdown-item:hover {
            background-color: #86cfda;
        }
        a.navbar-brand:hover {

            color: #00002E !important;
        }
        select{
            background-color: #002752;
            color: white;
            border-radius: 5px;
            font-size: 17px;
        }
        .table_data {
            margin-top: 20px;
            font-size: 14pt;
            color: #00529b;
            margin-left: 100px;
            font-weight: bold;
        }
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
        tr {
            display: table-row;
            vertical-align: inherit;
            border-color: inherit;
        }
        .form_1 select {
            background-color: #00529b;
            width: 175px;
            color: #fff;
            height: 25px;
            font-weight: bold;
        }
        .table_data td {
            padding-top: .5em;
            padding-bottom: .5em;
        }
        td {
            display: table-cell;
            vertical-align: inherit;
        }
        input{
            background-color: #00529b;
            color: white;
            border: 3px solid #00002E;
            border-radius: 4px;

        }
        #pre:hover{
            background-color: #17a2b8 !important;
            color: white !important;
        }
        #pre{
            font-size: 20px;
        }

    </style>


</head>
<!-- extend app.css -->
<nav class="navbar navbar-inverse bg-primary navbar-dark">
    <a class="navbar-brand fa fa-home" href="./home">Home</a>
    <a class="navbar-brand" href="./advancedpolicies">Advance Policies</a>
    <a class="navbar-brand" href="./History">Policies</a>
    <a class="navbar-brand" href="./broker">Broker Commission</a>
    <a class="navbar-brand" href="./brokerexport">Broker Report</a>
    <a class="navbar-brand" href="./pending">Pending Requests</a>
    <a class="navbar-brand" href="./Approve">Approve Requests</a>
    <?php
    if (Auth::user()->level == 'Manager') {
    ?>
    <a class="navbar-brand" href="./pending">Pending Requests</a>
    <?php
    }
    ?>

    <?php

    if (Auth::user()->CancelShow == 'Yes') {
    ?>
    <a class="navbar-brand" href="./Cancelploicy"> Cancel Advance Policy</a>
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
<form  id="contact-form"  action="/reg" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <br><br><br><br>
    <center>
        <table class="table_data" cellspacing="5">


            <tr>
                <td> Name : </td>&nbsp;&nbsp;&nbsp; <td> <input type="text" name="name" required="" autocomplete="off"  style="width: 150%" ></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td> Alias Name : </td>&nbsp;&nbsp;&nbsp; <td> <input type="text" name="alis" required="" autocomplete="off"  style="width: 150%" ></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td>UserName :</td> <td> <input type="text" name="username" required="" style="width: 150%" autocomplete="off"></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>

                <td>Email : </td> <td> <input type="email" name="email" required="" style="width: 150%" autocomplete="off"></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td>Level : </td> <td> <select style="width: 60%" name="level" id="level">
                        <option value="Employee">Employee</option>
                        <option value="Admin">Admin</option>
                        <option value="Manager">Manager</option>
                        <option value="Finance">Finance</option>
                        <option value="Treasury">Treasury</option>
                    </select></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>

                <td>Show Cancel ploicy : </td> <td> <select style="width: 60%" name="CancelShow" id="CancelShow">
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>

                    </select></td>

            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td>Password :</td> <td> <input type="password" name="password" required="" style="width: 150%" autocomplete="off"></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>

            <tr>
                <td>Confirmed Password :</td> <td> <input type="password" name="confirmed" required="" style="width: 150%" autocomplete="off"></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>

            <tr>

                <td>


                </td>
            </tr>

            </tbody></table>


                <input  id="pre" type="submit" value="Register" name="save" style="width: 10%;  border-radius: 10px ; background-color: #002752;">

    </center>





</form>


</body>
</html>

@else
    <script>
        //     alert("You are not logged in or Sign-in expired,\n Please login");
        window.location = './';



    </script>



@endauth


@endif
