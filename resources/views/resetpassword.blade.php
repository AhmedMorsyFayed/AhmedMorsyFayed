@if (Route::has('login'))

@auth

        <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rsys </title>
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
        table tr:not(:first-child){
            cursor: pointer;transition: all .25s ease-in-out;
        }
        table tr:not(:first-child):hover{background-color: #ddd;}
        table, th, td {
            border: 1px solid black;
        }


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
        .h33 {
            font-size: 25px;
            color: #761b18;
            text-transform: capitalize;

        }

        input[type=text]:focus {
            border: 3px solid #555;
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


<?php
$users = DB::select('select * from users ');
?>
<br><br><br>
<br><br>
<h3 class="h33"> Search  :  </h3>
<input id="myInput" class="formm-control" type="text" placeholder="Search..">
<br><br>

<table id="table_format" class="table table-bordered table-striped table-hover table-list-search">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>UserName</th>
        <th>Email</th>


    </tr>
    </thead>
    <tbody  id="myTable">
    @foreach ($users as $user)
        <tr class="content">
            <td  >{{ $user->id }}</td>
            <td >{{ $user->name }}</td>
            <td >{{ $user->username }}</td>
            <td >{{ $user->email}}</td>

            <td><a href = 'res/{{ $user->id }}'>Reset Password</a></td>
            <td><a href = 'del/{{ $user->id }}'>Delete</a></td>


        </tr>
    @endforeach
    </tbody>
</table>
<script>
    /*script for search in tabel */
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });




</script>









</body>

</html>






@else
    <script>
        // alert("You are not logged in or Sign-in expired,\n Please login");
        window.location = './';



    </script>




@endauth


@endif
