
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
        .btno{

            padding:   16px 44px;
            font-size: 14px;
            font-weight: 800;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            border-radius: 30px;
        }/* button css */
       /* word of input css */
        .h33 {
            font-size: 25px;
            color: #761b18;
            text-transform: capitalize;

        }/* input css */
        input[type=text]:focus {
            border: 3px solid #555;
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

    </style>


</head>
<!-- extend app.css -->
<nav class="navbar navbar-inverse bg-primary navbar-dark">

    <div style="left: 85%" class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name}}
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
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
<center> <!-- form for change password -->
    <form  id="contact-form "  action="/ForcePassword" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <br>

        <br><!-- new password -->
        <h3 class="h33"> Enter your New Password</h3>
        <br>
        <input type="password" class="formm-control" autocomplete="off" id="password" name="password" placeholder="New Password" required>
        <br>
        <br><!--Confirmation  password -->
        <h3 class="h33"> Enter your Confirmation Password</h3>
        <br>
        <input type="password" class="formm-control" autocomplete="off" id="password_confirmation" name="password_confirmation" placeholder="Re-enter Password" required>
        <br>
        <br>
        <br><!--submit button -->
        <input class="btno btn-primary f" type="submit" value="Submit" /><br>

    </form>
</center>

</body>
</html>

@else
    <script>
        //     alert("You are not logged in or Sign-in expired,\n Please login");
        window.location = './';



    </script>



@endauth


@endif

