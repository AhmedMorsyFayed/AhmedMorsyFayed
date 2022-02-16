
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Rsys</title>


    <style type="text/css">

        .box .text{
            position: absolute;
            z-index: 999;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: 40%; /* Adjust this value to move the positioned div up and down */
            text-align: center;
            width: 60%; /* Set the width of the positioned div */
        }
        body, html {
            height: 100%;
            margin: 0;

        }


        img {
            height: 100%;
            width: 100%;

        }

        #image {
            position: fixed;
            left: 0;
            top: 0;
        }
        #text {
            z-index: 100;
            position: absolute;
            color: #c0ddf6;
            font-size: 50px;
            font-weight: bold;
            left:5px;
            top: 1px;
            text-transform: capitalize;
        }

        a:link, a:visited {
            background-color: #1d68a7;
            color: white;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }
        #loginForm {

            top:16% ;
            left: 32%;

            position: fixed;

        }

        .h33 {
            font-size: 24px;
            color: #ffffff;
            text-transform: capitalize;

        }
        .formm-control{

            width: 100%;
            height: 30px;
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
        .btno{
            padding: 10px 24px;
            font-size: 14px;
            font-weight: 800;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            cursor: pointer;
            border-radius: 30px;
            color: #c0ddf6;
            background-color: #1d68a7;}
        .btno:hover {
            background-color: #0b2e13;
            color: white;
        }

        .invalid-feedbackk{
            font-size: 18px;
            font-weight: 800;
            color: #fff3cd;

        }


        a:link, a:visited {
            background-color: #00002E;
            color: white;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 30px;

        }

        a:hover, a:active {
            background-color: red;
        }


        @-moz-keyframes fa {
            0%   { -moz-transform: translateX(70%); }
            100% { -moz-transform: translateX(0%); }
        }
        @-webkit-keyframes fa{
            0%   { -webkit-transform: translateX(70%); }
            100% { -webkit-transform: translateX(0%); }
        }
        @keyframes fa {
            0%   {
                -moz-transform: translateX(70%); /* Firefox bug fix */
                -webkit-transform: translateX(70%); /* Firefox bug fix */
                transform: translateX(70%);
            }
            100% {
                -moz-transform: translateX(0%); /* Firefox bug fix */
                -webkit-transform: translateX(0%); /* Firefox bug fix */
                transform: translateX(0%);
            }
        }
        #foot{
            position: fixed;
            padding: 20px;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #0d3349;
            color: white;
            text-align: center;
        }

    </style>



</head>
<body>

<div    id="container">
    <center>


    </center>
    <img id="image" src="/svg/1.jpg"  />



</div>
<div id="loginForm"  ><!--  <marquee behavior="slide" direction="left">-->


    @if (Route::has('login'))

        @auth
            <a href="{{ url('/home') }}">Home</a>

        @else
            <form method="POST"  action="{{ route('login') }}">
                @csrf
                <h3 class="h33"> User Name :    </h3>

                <input id="username" type="text" class="formm-control  @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                @error('username')
                <span class="invalid-feedbackk " role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <h3 class="h33"> Password :    </h3>

                <input id="password" type="password" class="formm-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedbackk " role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <br>
                <br><br>



                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btno  bg-primary ">
                            {{ __('Login') }}


                        </button>
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        <!--    <a  href="https://desk.zoho.com/portal/aropeegypt/" class=" " role="button">Helping</a>  -->
                    </div>
                </div>

            </form>


        @endauth

    @endif
    <br>
    <br>




    <!-- </marquee> -->

</div>
<p id="foot" class="footer" style="font-size: 20px">&copy; 2021 Arope Egypt IT Department Group<p>






</body>
</html>

