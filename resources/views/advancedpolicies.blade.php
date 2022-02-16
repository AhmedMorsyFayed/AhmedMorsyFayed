@if (Route::has('login'))

@auth

        <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!--مكتبات لاستخدام javascript and jquery  -->
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

<script>
    // function for display company and broker type
    $(document).ready(function() {
        $('#company').bind('change', function() {
            var elements = $('div.container').children().hide(); // hide all the elements
            var value = $(this).val();

            if (value.length) { // if somethings' selected
                elements.filter('.' + value).show(); // show the ones we want
            }
        }).trigger('change');

    });


</script>

    <style>

        /* dropdown of a herf css*/
        a.dropdown-item {

        }/* dropdown of a herf css after put pointer on it*/
        a.dropdown-item:hover {
            background-color: #86cfda;
        }/* navbar of a herf css*/
        a.navbar-brand:hover {

            color: #00002E !important;
        }  /* each select of dropdown */
        select{
            background-color: #002752;
            color: white;
            border-radius: 5px;
            font-size:22px;
            width: 15%;
        }/* padding colmns of table*/
        .table_data td {
            padding-top: .5em;
            padding-bottom: .5em;
        }
        /* each column css of table*/
        td {
            display: table-cell;
            vertical-align: inherit;
        }/* tabel data css*/
        .table_data {
            margin-top: 20px;
            font-size: 14pt;
            color: #002752;
            margin-left: 100px;
            font-weight: bold;
        } /*css of each tabel in layout */
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
        }/*css of each raw of table in layout */
        tr {
            display: table-row;
            vertical-align: inherit;
            border-color: inherit;
        }/* each input of layout css*/
        input{
            background-color: #00529b;
            color: white;
            border: 3px solid #00002E;
            border-radius: 4px;
        }/* css of save button and preview button after put pointer on them  */
        #pre:hover{
            background-color: #17a2b8 !important;
            color: white !important;
        }

    </style>

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
    <a class="navbar-brand" href="./advancedpolicies">Policies Report</a>
    <a class="navbar-brand" href="./download">Files</a>
    <a class="navbar-brand" href="./Flag">Pending</a>

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
<br>
<br>
<br>
<body>
<br><br><br><br><br>
<br>

<!--layout for export report about daily commission ploicies -->
<center>
    <form  id="contact-form "  action="/advacedform" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <select name="company" id="company">
        <option value="pick">Please Select </option>
        <option value="life">Life</option>
        <option value="nonlife">Non Life</option>

    </select>
    <br><br>
    <div class="container">
        <div class="life">
            <select name="life" id="life" style=" width: 25% !important;">
                <option value="">Please Select</option>
                <option value="CSO">CSO</option>
                <option value="DSF">DSF</option>
                <option value="Broker">Broker</option>
                <option value="Arope_staff">Arope staff</option>
            </select>
        </div>
        <div class="nonlife">
            <select name="nonlife" id="nonlife" style=" width: 20% !important;">
                <option value="">Please Select</option>
                <option value="CSO">CSO</option>
                <option value="Blom_corpret">Blom corpret</option>
                <option value="Blom_retal">blom retal</option>
                <option value="Broker">Broker</option>
                <option value="Arope_staff">arope staff</option>
            </select>
        </div>
    </div>

    <br><br>
    <table  class="table_data" cellspacing="5">
        <tbody>
        <tr>
            <td>From : </td> <td> <input type="date" autocomplete="off" name="from" required=""></td>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            <td>To :</td> <td> <input type="date" name="to" required="" autocomplete="off" ></td>
        </tr>

        </tbody>

    </table>
    <br><br>
    <input id="pre"  type="submit" value="Get Report" name="save" style="width:10%;font-size: 20px; border-radius: 20px; background-color: #002752">

    </form>
</center>






</body>

</html>





<!--script if your time expired session well be closed and refer user to login layout  -->
@else
    <script>
        // alert("You are not logged in or Sign-in expired,\n Please login");
        window.location = './';
    </script>




@endauth


@endif
