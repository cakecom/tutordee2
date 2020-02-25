<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@if (trim($__env->yieldContent('template_title')))@yield('template_title') | @endif {{ config('app.name', Lang::get('titles.app')) }}</title>
        <meta name="description" content="">
        <meta name="author" content="Jeremy Kenedy">
        <link rel="shortcut icon" href="/favicon.ico">
        <link href="https://fonts.googleapis.com/css?family=Itim&display=swap" rel="stylesheet">
        {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        {{-- Fonts --}}
        @yield('template_linked_fonts')

        {{-- Styles --}}
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        @yield('template_linked_css')

        <style type="text/css">
            html, body ,a, h1, h2, h3, h4,p{
                font-family: 'Itim', cursive;
            }
            p{
                font-size: 20px;
            }
            .btn-ulearn-cview{
                color: #fff;
                font-size: 13px;
                font-weight: 600;
                background-color: #14bef0;
            }
            .course-rating .checked-vpage {
                color: #14bef0;
            }
            .gradient4 {
                background-color: #FCFFFC;
                background: #FCFFFC -webkit-gradient(linear, left top, left bottom, from(#47B747), to(#FCFFFC)) no-repeat;
                background: #FCFFFC -moz-linear-gradient(top, #47B747, #FCFFFC) no-repeat;
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#47B747, endColorstr=#FCFFFC) no-repeat;
                -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#47B747, endColorstr=#47B747)" no-repeat;
            }

            @yield('template_fastload_css')

            @if (Auth::User() && (Auth::User()->profile) && (Auth::User()->profile->avatar_status == 0))
                .user-avatar-nav {
                    background: url({{ Gravatar::get(Auth::user()->email) }}) 50% 50% no-repeat;
                    background-size: auto 100%;
                }
            @endif

        </style>

        {{-- Scripts --}}
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>

        @if (Auth::User() && (Auth::User()->profile) && $theme->link != null && $theme->link != 'null')
            <link rel="stylesheet" type="text/css" href="{{ $theme->link }}">
        @endif

        @yield('head')

    </head>
    <body>
        <div id="app">

            @include('partials.nav')

            <main class="py-4" style="background-color: #aee0dd" >

                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            @include('partials.form-status')
                        </div>
                    </div>
                </div>

                @yield('content')

            </main>

        </div>

        {{-- Scripts --}}
        <script src="{{ mix('/js/app.js') }}">
            $(document).ready(function(){
                $('#submitBtn').click(function() {
                    /* when the button in the form, display the entered values in the modal */
                    $('#lname').text($('#lastname').val());
                    $('#fname').text($('#firstname').val());
                });

                $('#submit').click(function(){
                    /* when the submit button in the modal is clicked, submit the form */
                    alert('submitting');
                    $('#formfield').submit();
                });
            });
        </script>

        @if(config('settings.googleMapsAPIStatus'))
            {!! HTML::script('//maps.googleapis.com/maps/api/js?key='.config("settings.googleMapsAPIKey").'&libraries=places&dummy=.js', array('type' => 'text/javascript')) !!}
        @endif
{{--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}
        @yield('footer_scripts')

    </body>

</html>
