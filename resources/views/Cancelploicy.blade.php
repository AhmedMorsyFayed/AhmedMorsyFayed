@if (Route::has('login'))

@auth

        <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"><!--مكتبات لاستخدام javascript and jquery  -->
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

/*css of cancel policy button */
        .btn2{

            padding: 7px 15px;
            font-family: "proxima-nova", sans-serif;
            font-weight: 400;
            font-size: 15px;
            color: #fff;
            cursor: hand;
            border: 1px solid #fff;
            border-radius:10px;
            -webkit-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            -o-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out;
            background-color: #00002E;
        }
        /* css of cancel policy button after put pointer on it  */
        .btn2:hover{
            background-color: #86cfda;
            color: #00002E;
        }/* css of cancel broker button  */
        #pre{
            padding: 3px 12px;
            border-radius: 10px ;
            color: white;
            background-color: #002752;
            border: 1px solid #00002E;
            text-decoration:none;
        }/* css of cancel broker button after put pointer on it  */
        #pre:hover{
            background-color: #17a2b8 !important;
            color: white !important;
        }

    </style>
    <script>
        //function for tab bar buttons which display on click it

        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
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
<br>

<body>
<br>
<!--tab bar contain two buttons each one display layout  -->
<center class="tab">
    <button style="padding: 8px 20px ;font-size: 17px" class="btn2 tablinks" id="but" onclick="openCity(event, 'Daily')">Daily</button>
    <button style="padding: 8px 20px ;font-size: 17px" class="btn2 tablinks" id="but" onclick="openCity(event, 'Monthly')">Monthly</button>

</center>
<br>

<!-- layout display cancel policy with serial number  -->
<center>
    <div id="Daily" class="tabcontent" >
        <form  id="contact-form "  action="/cancelform" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" name="serialnum" required="" placeholder="Enter Serial Num" autocomplete="off" onkeypress="return isNumber(event)">
            <br>
            <br>
            <br><!--submit button -->
            <input id="pre"  type="submit" value="Cancel" name="Cancel" style="width:10%;border-radius: 20px; background-color: #002752">
        </form>
    </div></center>
<!-- layout display cancel broker with id that has been approved  -->
    <div id="Monthly" class="tabcontent" style="display: none">

        <br>
        <br>
        <br><br>
        <h3 class="h33"> Search  :  </h3>

        <input style="width: 60%;border: black 2px solid" id="myInput" autocomplete="off" type="text" class="form-control fa fa-search"  onkeyup="myFunction()" placeholder="Search..">
        <br>
        <table class="table table-sm table-primary">

            <?php

            $policies = DB::select('select * from broker where status ="Approve" ORDER BY id DESC');

            ?>

            <thead>
            <tr style="background-color: #17a2b8;color: white;border: 2px solid #00002E;height: 50px!important; "><!--header  -->
                <td style="border: 2px solid #00002E;color: white;" >id</td>
                <td style="border: 2px solid #00002E;color: white;" >Serial Number</td>
                <td style="border: 2px solid #00002E;color: white;" >Agent Code</td>
                <td style="border: 2px solid #00002E;color: white;" >Agent Name</td>
                <td style="border: 2px solid #00002E;color: white;">Agent Pin</td>
                <td style="border: 2px solid #00002E;color: white;width: 150px">Date Of Payment</td>
                <td style="width: 120px"></td>




            </tr>
            </thead>
            <tbody  id="myTable">



            @foreach ($policies as $policy)<!--body -->
            <tr>
                <td style="border: 2px solid #00002E">{{ $policy->id }}</td>
                <td style="border: 2px solid #00002E;">{{ $policy->	serial }}</td>
                <td style="border: 2px solid #00002E">{{ $policy->Agentcode }}</td>
                <td style="border: 2px solid #00002E">{{ $policy->Agentname }}</td>
                <td style="border: 2px solid #00002E">{{ $policy->AgentPin }}</td>
                <td style="border: 2px solid #00002E;width: 100px">{{ $policy->DateofPayment }}</td>
                <td ><a id="pre" href='Canacel/{{$policy->id }}' class="btn-primary">Cancel</a></td>




            </tr>
            @endforeach


            </tbody>
        </table>

    </div>







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
