<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TUTORDEE</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        .full-height {
            height: 100vh;
        }
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }
        .position-ref {
            position: relative;
        }
        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }
        .content {
            text-align: center;
        }
        .title {
            font-size: 84px;
        }
        .title small {
            font-size: 60px;
        }
        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom CSS -->
    {{--    <link href="/css/shop-homepage.css" rel="stylesheet">--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        /* Background Gradient for Monochromatic Colors */
        .gradient4
        {
            background-color: #FCFFFC;
            /* For WebKit (Safari, Chrome, etc) */
            background: #FCFFFC -webkit-gradient(linear, left top, left bottom, from(#47B747), to(#FCFFFC)) no-repeat;
            /* Mozilla,Firefox/Gecko */
            background: #FCFFFC -moz-linear-gradient(top, #47B747, #FCFFFC) no-repeat;
            /* IE 5.5 - 7 */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#47B747, endColorstr=#FCFFFC) no-repeat;
            /* IE 8 */
            -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#47B747, endColorstr=#47B747)" no-repeat;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light gradient4">
    <a class="navbar-brand" href="/"><span style="color: darkblue">TUTOR</span><span style="color: red"> DEE</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">About <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
        </ul>
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</nav>
@php
    $cookie_name = "user";
    $cookie_value = "John Doe";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}
@endphp
<style>
    .image {
        background-image: url("images/header2.jpg");
        position: relative;
    }
    .image:before{
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        background: rgba(0,0,0,0.7);
    }
    .text {
        color: #FFF;
        position: relative;
    }
    .plain ol > li
    {
        line-height: .8em;
    }


    /* -------------------------------------- */
    /* underlined list stle                   */

    .underlined ol
    {
        counter-reset:li; /* Initiate a counter */
        margin-left:0; /* Remove the default left margin */
        padding-left:0; /* Remove the default left padding */
    }

    .underlined	ol > li
    {
        position:relative; /* Create a positioning context */
        margin:0 0 6px 2em; /* Give each list item a left margin to make room for the numbers */
        padding:4px 8px; /* Add some spacing around the content */
        list-style:none; /* Disable the normal item numbering */
        border-top:2px solid #666;
        background:#f6f6f6;
    }

    .underlined ol > li:before
    {
        content:counter(li); /* Use the counter as content */
        counter-increment:li; /* Increment the counter by 1 */
        /* Position and style the number */
        position:absolute;
        top:-2px;
        left:-2em;
        -moz-box-sizing:border-box;
        -webkit-box-sizing:border-box;
        box-sizing:border-box;
        width:2em;
        /* Some space between the number and the content in browsers that support
        generated content but not positioning it */
        margin-right:8px;
        padding:4px;
        border-top:2px solid #666;
        color:#fff;
        background:#666;
        font-weight:bold;
        font-family:"Helvetica Neue", Arial, sans-serif;
        text-align:center;
    }

    .underlined li ol,
    .underlined li ul
    {
        margin-top:6px;
    }

    .underlined ol ol li:last-child
    {
        margin-bottom:0;
    }

    /* -------------------------------------- */
    /* rounded  list style                    */

    /* list */
    .rounded-list ol
    {
        counter-reset:li; /* Initiate a counter */
        margin-left:0; /* Remove the default left margin */
        padding-left:0; /* Remove the default left padding */
    }

    /* item  */
    .rounded-list ol > li
    {
        position:relative; /* Create a positioning context */
        list-style:none; /* Disable the normal item numbering */
        background:#f6f6f6; /* Item background color */
        margin:0; /* Give each list item a left margin to make room for the numbers */
        padding-left: 15px; /* Add some spacing around the content */
        padding-bottom:0px;
        padding-top:0px;
    }

    /* number  */
    .rounded-list ol > li p:before
    {
        content: counter(li);
        counter-increment: li;
        position: absolute;
        left: -1.3em;
        top: 50%;

        /* number background */
        background: #87ceeb;
        height: 2em;
        width: 2em;
        margin-top: -1em;
        line-height: 1.5em;
        border: .3em solid #fff;
        text-align: center;
        font-weight: bold;
        border-radius: 2em;
    }

    /* -------------------------------------- */
    /* rectangle  list style                  */

    /* list */
    .rectangle-list ol
    {
        counter-reset:li; /* Initiate a counter */
        margin-left:0; /* Remove the default left margin */
        padding-left:0; /* Remove the default left padding */
    }

    /* item  */
    .rectangle-list ol > li
    {
        position: relative;
        list-style:none; /* Disable the normal item numbering */
    }

    /* item hover */
    .rectangle-list p
    {
        display: block;
        padding: .4em .4em .4em .8em;
        *padding: .4em;
        margin: .5em 0 .5em 2.5em;
        background: #ddd;
        color: #444;
        text-decoration: none;
        -webkit-transition: all .3s ease-out;
        -moz-transition: all .3s ease-out;
        -ms-transition: all .3s ease-out;
        -o-transition: all .3s ease-out;
        transition: all .3s ease-out;
    }

    /* item hover */
    .rectangle-list p:hover
    {
        background: #fa8072;
    }

    /* number  */
    .rectangle-list p:before
    {
        content: counter(li);
        counter-increment: li;

        position: absolute;
        left: -2.5em;
        top: 50%;
        margin-top: -1em;

        background: #fa8072;
        height: 2em;
        width: 2em;
        line-height: 2em;
        text-align: center;
        font-weight: bold;
    }

    /* number hover */
    .rectangle-list p:after
    {
        position: absolute;
        left: -1em;
        top: 50%;
        margin-top: -.5em;

        content: '';
        border: .5em solid transparent;

        -webkit-transition: all .3s ease-out;
        -moz-transition: all .3s ease-out;
        -ms-transition: all .3s ease-out;
        -o-transition: all .3s ease-out;
        transition: all .3s ease-out;
    }

    .rectangle-list p:hover:after
    {
        left: -.5em;
        border-left-color: #fa8072;
    }

    /* -------------------------------------- */

    .circle-list li
    {
        padding: 2.5em;
        border-bottom: 1px dashed #ccc;
    }

    .circle-list h2
    {
        position: relative;
        margin: 0;
    }

    .circle-list p
    {
        margin: 0;
    }

    .circle-list h2:before
    {
        content: counter(li);
        counter-increment: li;
        position: absolute;
        z-index: -1;
        left: -1.3em;
        top: -.8em;
        background: #f5f5f5;
        height: 1.5em;
        width: 1.5em;
        border: .1em solid rgba(0,0,0,.05);
        text-align: center;
        font: italic bold 1em/1.5em Georgia, Serif;
        color: #ccc;
        -moz-border-radius: 1.5em;
        -webkit-border-radius: 1.5em;
        border-radius: 1.5em;
        -webkit-transition: all .2s ease-out;
        -moz-transition: all .2s ease-out;
        -ms-transition: all .2s ease-out;
        -o-transition: all .2s ease-out;
        transition: all .2s ease-out;
    }

    .circle-list li:hover h2:before{
        background-color: #ffd797;
        border-color: rgba(0,0,0,.08);
        border-width: .2em;
        color: #444;
        -webkit-transform: scale(1.5);
        -moz-transform: scale(1.5);
        -ms-transform: scale(1.5);
        -o-transform: scale(1.5);
        transform: scale(1.5);
    }
</style>
{{csrf_field()}}
</body>
</html>
<script type="text/javascript">

    $(document).ready(function() {


        $('#group').change(function () {
            if ($(this).val() !== '') {
                var select = $(this).val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{route('fetch2')}}",
                    method: "POST",
                    data: {select: select, _token: _token},
                    success: function (result) {
                        $('#subject').html(result);
                        // alert(result);
                    }
                });
                // console.log(select);
            }
        });
    });
</script>