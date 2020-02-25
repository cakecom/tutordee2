<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TUTORDEE</title>

    <!-- Fonts -->
    {{--    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">--}}
    <link href="https://fonts.googleapis.com/css?family=Kanit:300&display=swap" rel="stylesheet">
      <!--js-->


    <!-- Styles -->
    <style>
        html, body, a, h1, h2, h3, h4, p {
            font-family: 'Kanit', sans-serif;
        }

        a {
            font-size: 20px;
        }

        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Kanit', sans-serif;
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom CSS -->
    {{--    <link href="/css/shop-homepage.css" rel="stylesheet">--}}
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}
    {{--    <script--}}
    {{--            src="https://code.jquery.com/jquery-3.4.1.min.js"--}}
    {{--            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="--}}
    {{--            crossorigin="anonymous"></script>--}}
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>--}}
    {{--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>--}}
    <style>
        /* Background Gradient for Monochromatic Colors */
        .gradient4 {
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
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">เกี่ยวกับ <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('service.index')}}">บริการ</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('help.create')}}">ช่วยเหลือ</a>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Terms of service and Policy
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{url('/termsService')}}">Terms of Service</a>
                    <a class="dropdown-item" href="{{url('/privacy')}}">Privacy Policy</a>
                    <a class="dropdown-item" href="{{url('/refund')}}">Refund Policy</a>
                    <a class="dropdown-item" href="{{url('/cancel')}}">Cancelation Policy</a>
{{--                    <a class="dropdown-item" href="{{url('/shippingReturn')}}">Shipping and Return Policy</a>--}}
                </div>
            </li>
        </ul>

        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">หน้าหลัก</a>
                @else
                    <a href="{{ route('login') }}">ลงชื่อเข้าใช้</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">สมัครสมาชิก</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</nav>

<div style="background-image:url('images/header3.jpg');-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover;background-size: cover;">
    <div class="container">
        <div class="row " style="padding: 30px">

            <div class="col-md-6 offset-md-6" style="background-color: white;"><h1>เราจะช่วยคุณหาครูสอนพิเศษ</h1>
                <h3 class="bordered">ไม่จำเป็นต้องค้นหาในอินเตอร์เน็ต ไม่จำเป็นต้องโทร เพียงแค่กรอกแบบฟอร์ม
                    แล้วเราจะติดต่อครูสอนพิเศษที่พร้อมจะสอนคุณได้ทันที</h3>
                <h3 class="highlighted">ไม่ต้องเสียเวลาค้นหาในกูเกิ้ลหรือเสียเวลาโทรอีกต่อไป
                    ใช้บริการฟรีของเราได้เลย</h3>
                <div class="ctabuttons">
                    <button class="btn btn-warning btn-lg start">เริ่ม!</button>
                </div>
            </div>
        </div>
        <div class="row" style="padding: 30px">
            <div class="col-md-4">
                <div class="elementor-column-wrap  elementor-element-populated">
                    <div class="elementor-widget-wrap">
                        <div class="elementor-element elementor-element-f48cdbb elementor-widget elementor-widget-image"
                             data-id="f48cdbb" data-element_type="widget" data-widget_type="image.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-image">
                                    <img src="http://jahangirseven.com/genoabase/wp-content/uploads/sites/11/2019/07/refresh-2.png"
                                         title="" alt=""></div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-4006995 elementor-widget elementor-widget-heading"
                             data-id="4006995" data-element_type="widget" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                                <h2 class="elementor-heading-title elementor-size-default">ข้อมูลอัพเดททุกวัน</h2></div>
                        </div>
                        <div class="elementor-element elementor-element-7378658 elementor-widget elementor-widget-text-editor"
                             data-id="7378658" data-element_type="widget" data-widget_type="text-editor.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-text-editor elementor-clearfix"><p>อัพเดทข้อมูล
                                        ลูกค้า/นักเรียน</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="elementor-element elementor-element-9c06095 elementor-column elementor-col-25 elementor-inner-column animated fadeInUp"
                     data-id="9c06095" data-element_type="column"
                     data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;animation_delay&quot;:100,&quot;background_background&quot;:&quot;classic&quot;}">
                    <div class="elementor-column-wrap  elementor-element-populated">
                        <div class="elementor-widget-wrap">
                            <div class="elementor-element elementor-element-76e1993 elementor-widget elementor-widget-image"
                                 data-id="76e1993" data-element_type="widget" data-widget_type="image.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-image">
                                        <img src="http://jahangirseven.com/genoabase/wp-content/uploads/sites/11/2019/07/idea.png"
                                             title="" alt=""></div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-a211f89 elementor-widget elementor-widget-heading"
                                 data-id="a211f89" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default">หน้าเว็ปทันสมัย</h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-1ab7979 elementor-widget elementor-widget-text-editor"
                                 data-id="1ab7979" data-element_type="widget" data-widget_type="text-editor.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-text-editor elementor-clearfix"><p>หน้าเว็ปทันสมัย ใช่ง่าย
                                            รองรับโหมดมือถือ</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="elementor-element elementor-element-cceb7ef elementor-column elementor-col-25 elementor-inner-column animated fadeInUp"
                     data-id="cceb7ef" data-element_type="column"
                     data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;animation_delay&quot;:300,&quot;background_background&quot;:&quot;classic&quot;}">
                    <div class="elementor-column-wrap  elementor-element-populated">
                        <div class="elementor-widget-wrap">
                            <div class="elementor-element elementor-element-09e26d3 elementor-widget elementor-widget-image"
                                 data-id="09e26d3" data-element_type="widget" data-widget_type="image.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-image">
                                        <img src="http://jahangirseven.com/genoabase/wp-content/uploads/sites/11/2019/07/drag-1.png"
                                             title="" alt=""></div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-3c7bfdf elementor-widget elementor-widget-heading"
                                 data-id="3c7bfdf" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default">สมัครง่ายๆ
                                        เพียงไม่กี่ขั้นตอน</h2></div>
                            </div>
                            <div class="elementor-element elementor-element-595cb4d elementor-widget elementor-widget-text-editor"
                                 data-id="595cb4d" data-element_type="widget" data-widget_type="text-editor.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-text-editor elementor-clearfix"><p>สมัครง่ายๆ
                                            เพียงไม่กี่ขั้นตอน</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="block_regis gradient4" style="padding: 30px">
    <div style="text-align: center">
        <h1 style="color: #0d6aad">ทดลองใช้บริการง่ายๆได้แบบฟรีๆ</h1>
    </div>
    <div class="row">
        <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">

            <table border=0 class="rectangle-list">
                <tr>
                    <td>

                        <ol>
                            <h2>กรอกแบบฟอร์ม</h2>
                            <li><p>ตอบคำถามเกี่ยวกับวิชาที่คุณต้องการครูสอนพิเศษ
                                    และเราจะหาครูที่ตรงกับความต้องการของคุณ</p></li>
                            <h2>เลือกครูสอนพิเศษ</h2>
                            <li><p>เลือกคุณครู ทำการชำระเงินค่าเรียนและเริ่มเรียนได้เลย</p></li>
                        </ol>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="image">
    <div class="text" style="text-align: center;padding: 30px">
        <h1>พบกับคุณครูที่คุณต้องการในราคาที่ดีที่สุดได้แล้ววันนี้</h1>
        <div class="start_traget" style="margin: auto;">
            <div class="row">
                <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <form action="{{route('survey')}}">
                        <div id="app">
                            <select-form></select-form>
                        </div>
                        <button type="submit" style="background-color: #77dd91" class="btn ">ยืนยัน</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="card">
    <div class="card-footer" style="text-align: center;margin: auto">
        <div class="row">
            <div class="col-md-6">
                <div class="row">

                    <div class="col-md-4">
                        <a href="{{url('/termsService')}}">Terms of service</a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{url('/privacy')}}">Privacy Policy</a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{url('/termsService')}}">Refund Policy</a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{url('/termsService')}}">Cancelation Policy</a>
                    </div>
{{--                    <div class="col-md-4">--}}
{{--                        <a href="{{url('/termsService')}}">Shipping and Return Policy</a>--}}
{{--                    </div>--}}

                </div>
            </div>
            <div class="col-md-6">
                <h2>ข้อมูลการติดต่อ</h2>
                <P>
                    12/2
                    ถนน หมื่นด้ามพร้าคต ซอย5
                    <br>
                    ตำบลช้างเผือก อำเภอเมือง
                    จังหวัดเชียงใหม่
                    <br>
                    50300
                    โทร
                    0848108251
                </P>
            </div>
        </div>

    </div>
</div>
<style>
    .image {
        background-image: url("images/header4.jpg");
        position: relative;
    -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .image:before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.7);
    }

    .text {
        color: #FFF;
        position: relative;
    }

    .plain ol > li {
        line-height: .8em;
    }


    /* -------------------------------------- */
    /* underlined list stle                   */

    .underlined ol {
        counter-reset: li; /* Initiate a counter */
        margin-left: 0; /* Remove the default left margin */
        padding-left: 0; /* Remove the default left padding */
    }

    .underlined ol > li {
        position: relative; /* Create a positioning context */
        margin: 0 0 6px 2em; /* Give each list item a left margin to make room for the numbers */
        padding: 4px 8px; /* Add some spacing around the content */
        list-style: none; /* Disable the normal item numbering */
        border-top: 2px solid #666;
        background: #f6f6f6;
    }

    .underlined ol > li:before {
        content: counter(li); /* Use the counter as content */
        counter-increment: li; /* Increment the counter by 1 */
        /* Position and style the number */
        position: absolute;
        top: -2px;
        left: -2em;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        width: 2em;
        /* Some space between the number and the content in browsers that support
        generated content but not positioning it */
        margin-right: 8px;
        padding: 4px;
        border-top: 2px solid #666;
        color: #fff;
        background: #666;
        font-weight: bold;
        font-family: "Helvetica Neue", Arial, sans-serif;
        text-align: center;
    }

    .underlined li ol,
    .underlined li ul {
        margin-top: 6px;
    }

    .underlined ol ol li:last-child {
        margin-bottom: 0;
    }

    /* -------------------------------------- */
    /* rounded  list style                    */

    /* list */
    .rounded-list ol {
        counter-reset: li; /* Initiate a counter */
        margin-left: 0; /* Remove the default left margin */
        padding-left: 0; /* Remove the default left padding */
    }

    /* item  */
    .rounded-list ol > li {
        position: relative; /* Create a positioning context */
        list-style: none; /* Disable the normal item numbering */
        background: #f6f6f6; /* Item background color */
        margin: 0; /* Give each list item a left margin to make room for the numbers */
        padding-left: 15px; /* Add some spacing around the content */
        padding-bottom: 0px;
        padding-top: 0px;
    }

    /* number  */
    .rounded-list ol > li p:before {
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
    .rectangle-list ol {
        counter-reset: li; /* Initiate a counter */
        margin-left: 0; /* Remove the default left margin */
        padding-left: 0; /* Remove the default left padding */
    }

    /* item  */
    .rectangle-list ol > li {
        position: relative;
        list-style: none; /* Disable the normal item numbering */
    }

    /* item hover */
    .rectangle-list p {
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
    .rectangle-list p:hover {
        background: #fa8072;
    }

    /* number  */
    .rectangle-list p:before {
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
    .rectangle-list p:after {
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

    .rectangle-list p:hover:after {
        left: -.5em;
        border-left-color: #fa8072;
    }

    /* -------------------------------------- */

    .circle-list li {
        padding: 2.5em;
        border-bottom: 1px dashed #ccc;
    }

    .circle-list h2 {
        position: relative;
        margin: 0;
    }

    .circle-list p {
        margin: 0;
    }

    .circle-list h2:before {
        content: counter(li);
        counter-increment: li;
        position: absolute;
        z-index: -1;
        left: -1.3em;
        top: -.8em;
        background: #f5f5f5;
        height: 1.5em;
        width: 1.5em;
        border: .1em solid rgba(0, 0, 0, .05);
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

    .circle-list li:hover h2:before {
        background-color: #ffd797;
        border-color: rgba(0, 0, 0, .08);
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
<script src="{{ ('/js/app.js') }}"></script>
</html>
<script type="text/javascript">

    $(document).ready(function () {
        $(".start").click(function () {
            $('html,body').animate({
                    scrollTop: $(".start_traget").offset().top
                },
                'fast');
        });
    });
</script>