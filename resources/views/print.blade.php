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


</head>
<!-- extend app.css -->
<nav class="navbar navbar-inverse bg-primary navbar-dark" >
    <button class="navbar-brand fa " style="background: #0d3349;color: white" onclick="window.history.back()">Back</button>

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

<!--layout for manager to approve -->
<center>
    <form  id="contact-form"   method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table class="table_data" cellspacing="5" id="tab">


            <tbody><tr>
                <td>Sales Channel :</td>
                <td style="color: black">
                    <?php echo $policy[0]->SalesChannel; ?></td>
            </tr>
            <tr>
                <td>Agent code :</td> <td style="color: black"> <?php echo $policy[0]->Agentcode; ?></td>
                <td></td>
                <td>Agent Name :</td> <td style="color: black"> <?php echo $policy[0]->AgentName; ?></td>
            </tr>
            <tr>
                <td>Agent Pin :</td> <td style="color: black"> <?php echo $policy[0]->AgentPin; ?></td>
                <td></td>
                <td>Introducer code :</td> <td style="color: black"> <?php echo $policy[0]->Introducercode; ?></td>
            </tr>
            <tr>
                <td>product code :</td> <td style="color: black"> <?php echo $policy[0]->productcode; ?></td>
                <td></td>
                <td>policy number :</td> <td style="color: black"> <?php echo $policy[0]->policynumber; ?></td>
            </tr>
            <tr>
                <td>Endors Number :</td> <td style="color: black"> <?php echo $policy[0]->EndorsNumber; ?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Operation type  :</td><td style="color: black"><?php echo $policy[0]->Operationtype; ?></td>
                <td></td>
                <td>Check no   :</td><td style="color: black"><?php echo $policy[0]->Checkno; ?> </td>
            </tr>
            <tr>
                <td>Please draw check on :</td> <td style="color: black"> <?php echo $policy[0]->Checkon; ?></td>
            </tr>

            <tr>
                <td>Bank Account :</td><td style="color: black"><?php echo $policy[0]->BankAccount; ?></td>
                <td></td>
                <td>Company :</td><td style="color: black"><?php echo $policy[0]->Company; ?></td>
            </tr>
            <tr>
                <td>Status :</td><td style="color: black"><?php echo $policy[0]->Status; ?></td>
                <td></td>
                <td>Currency :</td><td style="color: black"><?php echo $policy[0]->Currency; ?></td>
            </tr>



            <tr>
                <td>Date of Payment :</td> <td style="color: black"> <?php echo $policy[0]->DateofPayment; ?></td>
                <td></td>
                <td>Net Premium :</td> <td style="color: black"> <?php echo $policy[0]->NetPremium; ?></td>
            </tr>
            <tr>
                <td>Due Rate :</td> <td style="color: black"> <?php echo $policy[0]->DueRate; ?></td>
                <td></td>
                <td>Early Commission :</td><td style="color: black"><?php echo $policy[0]->early; ?></td>


            </tr>

            <tr>
                <td>Due Commission :</td> <td style="color: black"> <?php echo $policy[0]->DueCommission; ?></td>
                <td></td>
                <td>Extra Commission :</td><td style="color: black"><?php echo $policy[0]->ExtraCommission; ?></td>


            </tr>
            <tr>

                <td>Taxes :</td> <td style="color: black"> <?php echo $policy[0]->taxes; ?></td>
                <td></td>
                <td>Taxes Amount :</td> <td style="color: black"> <?php echo $policy[0]->TaxAmount; ?></td>

            </tr>
            <tr>
                <td>Reason :</td><td style="color: black"><?php echo $policy[0]->Reason; ?></td>
                <td></td>
                <td>Total :</td> <td style="color: black"> <?php echo $policy[0]->Total;?></td>


            </tr>
            <tr>
                <td>Requested by :</td><td style="color: black"><?php echo $policy[0]->user; ?></td>
                <td></td>



            </tr>

            <tr>
                <td></td><td></td>
                <td>
                    <button id="pre" type="submit" formaction="/financeapprove/{{$policy[0]->id }}" style="width:100px;  border-radius: 10px ;color: white; background-color: #002752; border: 1px solid #00002E;">Approve</button>
                </td>
            </tr>

            </tbody></table>
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
