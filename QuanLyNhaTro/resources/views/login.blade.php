<?php

use Illuminate\Support\Facades\Session; ?>
<?php $error = Session::get('message'); ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <script src="js/custom.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>

<body>
    <div class="login-page">
        @yield('content')
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $('.message a').click(function() {
            $('form').animate({
                height: "toggle",
                opacity: "toggle"
            }, "slow");
        });
    });
</script>

</html>