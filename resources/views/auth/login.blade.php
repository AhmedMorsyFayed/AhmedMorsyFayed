@if (Route::has('login'))

@auth

@else
    <html>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </html>
    <script>
        // alert("You are not logged in or Sign-in expired,\n Please login");

        window.location = './';
    </script>

@endauth


@endif
