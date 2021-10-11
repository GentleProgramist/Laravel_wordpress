<?php

// Start the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


// Generate apply now link
$query_params = http_build_query($_GET);
if ($query_params !== '') {
    $query_params = '?' . $query_params;
}
$apply_link = 'apply' . $query_params;

?>
<?php
@include($_SERVER['DOCUMENT_ROOT'] . '/my-loans/countrycode/locale.php');
@include($_SERVER['DOCUMENT_ROOT'] . '/my-loans/countrycode/translate.php');
?>

    <!DOCTYPE html>
<html lang="en">
<head>
    <title>LoanAnyDay | Short Term Loans 100 - 5000</title>
    <meta charset="utf-8">
    <meta name="author" content="LoanAnyDay">
    <meta name="description" content="LoanAnyDay |Short Term Loans 500 - 10000">
    <meta name="keywords" content="LoanAnyDay |Short Term Loans 500 - 10000">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Fav icon-->
    <link rel="shortcut icon" href="../assets/images/favicon.png">
    <!-- Font Family-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <!-- Animation CSS-->
    <link rel="stylesheet" href="../assets/css/animate.min.css">
    <!-- Owl carousel css-->
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/owl.theme.default.min.css">
    <!-- Form validation css-->
    <link rel="stylesheet" href="../assets/css/validation.css">
    <!-- Style css-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- Responsive css-->
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>

    <style type="text/css">
        html {
            font-family: sans-serif;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        header, main, section {
            display: block
        }

        a {
            background-color: transparent
        }

        strong {
            font-weight: 700
        }

        small {
            font-size: 80%
        }

        img {
            border: 0
        }

        hr {
            height: 0;
            -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box;
            box-sizing: content-box
        }

        button {
            margin: 0;
            font: inherit;
            color: inherit
        }

        button {
            overflow: visible
        }

        button {
            text-transform: none
        }

        button {
            -webkit-appearance: button
        }

        button::-moz-focus-inner {
            padding: 0;
            border: 0
        }

        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box
        }

        :after, :before {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box
        }

        html {
            font-size: 10px
        }

        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 14px;
            line-height: 1.42857143;
            color: #333;
        }

        button {
            font-family: inherit;
            font-size: inherit;
            line-height: inherit
        }

        a {
            color: #337ab7;
            text-decoration: none
        }

        img {
            vertical-align: middle
        }

        hr {
            margin-top: 20px;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #eee
        }

        h2, h3, h4 {
            font-family: inherit;
            font-weight: 500;
            line-height: 1.1;
            color: inherit
        }

        h3 small {
            font-weight: 400;
            line-height: 1;
            color: #777
        }

        h2, h3 {
            margin-top: 20px;
            margin-bottom: 10px
        }

        h3 small {
            font-size: 65%
        }

        h4 {
            margin-top: 10px;
            margin-bottom: 10px
        }

        h2 {
            font-size: 30px
        }

        h3 {
            font-size: 24px
        }

        h4 {
            font-size: 18px
        }

        p {
            margin: 0 0 10px
        }

        small {
            font-size: 85%
        }

        ul {
            margin-top: 0;
            margin-bottom: 10px
        }

        .list-inline {
            padding-left: 0;
            margin-left: -5px;
            list-style: none;
            right: 200px
        }

        .list-inline > li {
            display: inline-block;
            padding-right: 5px;
            padding-left: 5px
        }

        .container {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto
        }

        @media (min-width: 768px) {
            .container {
                width: 750px
            }
        }

        @media (min-width: 992px) {
            .container {
                width: 970px
            }
        }

        @media (min-width: 1200px) {
            .container {
                width: 1170px
            }
        }

        .btn {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px
        }

        .btn-primary {
            color: #fff;
            background-color: #337ab7;
            border-color: #2e6da4
        }

        .collapse {
            display: none
        }

        .nav {
            padding-left: 0;
            margin-bottom: 0;
            list-style: none
        }

        .nav > li {
            position: relative;
            display: block
        }

        .panel-body {
            padding: 15px
        }

        .panel-group .panel-heading + .panel-collapse > .panel-body {
            border-top: 1px solid #ddd
        }

        .panel-default > .panel-heading + .panel-collapse > .panel-body {
            border-top-color: #ddd
        }

        .container:after, .container:before, .nav:after, .nav:before, .panel-body:after, .panel-body:before {
            display: table;
            content: " "
        }

        .container:after, .nav:after, .panel-body:after {
            clear: both
        }

        .pull-left {
            float: left !important
        }

        @-ms-viewport {
            width: device-width
        }

        .visible-xs {
            display: none !important
        }

        @media (max-width: 767px) {
            .visible-xs {
                display: block !important
            }
        }

        @media (min-width: 768px) and (max-width: 991px) {
            .hidden-sm {
                display: none !important
            }
        }

        .owl-carousel {
            display: none;
            width: 100%;
            position: relative;
            z-index: 1
        }

        @charset "UTF-8";
        @-webkit-keyframes fadeInUp {
            from {
                opacity: 0;
                -webkit-transform: translate3d(0, 100%, 0);
                transform: translate3d(0, 100%, 0)
            }
            to {
                opacity: 1;
                -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0)
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                -webkit-transform: translate3d(0, 100%, 0);
                transform: translate3d(0, 100%, 0)
            }
            to {
                opacity: 1;
                -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0)
            }
        }

        .fadeInUp {
            -webkit-animation-name: fadeInUp;
            animation-name: fadeInUp
        }

        @font-face {
            font-family: 'FontAwesome';
            src: url('/fonts/fontawesome-webfont3e6e.eot?v=4.7.0');
            src: url('/fonts/fontawesome-webfontd41d.eot?#iefix&v=4.7.0') format('embedded-opentype'), url('/fonts/fontawesome-webfont3e6e.woff2?v=4.7.0') format('woff2'), url('fonts/fontawesome-webfont3e6e.woff?v=4.7.0') format('woff'), url('/fonts/fontawesome-webfont3e6e.ttf?v=4.7.0') format('truetype'), url('/fonts/fontawesome-webfont3e6e.svg?v=4.7.0#fontawesomeregular') format('svg');
            font-weight: normal;
            font-style: normal
        }

        .fa {
            display: inline-block;
            font: normal normal normal 14px/1 FontAwesome;
            font-size: inherit;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .pull-left {
            float: left
        }

        .fa-star:before {
            content: "\f005"
        }

        .fa-chevron-up:before {
            content: "\f077"
        }

        .alert-bar {
            background: var(--secondary-color);
            font-family: Roboto, var(--sp-font);
            font-size: 12px;
            text-align: center;
            font-weight: 600;
            color: var(--light);
            padding: 2px 13px;
            line-height: 24px;
            letter-spacing: 0.5px
        }

        .alert-bar a {
            color: var(--light)
        }

        header {
            background: transparent;
            position: absolute;
            top: 50px;
            left: 0;
            right: 0;
            margin: 0 auto;
            font-family: Roboto, var(--sp-font);
            z-index: 150
        }

        .header-wrapper {
            padding: 8px 0
        }

        .header-wrapper, .header-menus {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center
        }

        .header-menus .header-lef ul > li {
            padding: 0 20px
        }

        .header-menus .header-lef ul > li:first-child {
            padding-left: 0
        }

        .header-menus .header-lef ul > li > a {
            font-weight: 600;
            font-size: 16px;
            line-height: 24px;
            letter-spacing: 0.5px;
            position: relative
        }

        .header-menus .header-lef ul > li > a:after, .header-menus .header-lef ul > li.active a:after {
            content: "";
            width: 0;
            height: 2px;
            left: 0;
            position: absolute;
            top: -4px;
            background-image: -webkit-gradient(linear, left top, right top, from(var(--grad-color-1)), to(var(--grad-color-2)));
            background-image: linear-gradient(to right, var(--grad-color-1), var(--grad-color-2))
        }

        .header-menus .header-lef ul > li.active a:after {
            width: 100%
        }

        .header-menus .header-right ul li {
            padding-left: 20px
        }

        .header-menus .header-right ul li:last-child {
            padding-right: 0
        }

        .btn-secure {
            font-size: 14px;
            line-height: 28px;
            letter-spacing: 0.5px;
            text-transform: capitalize;
            padding: 12px 21px;
            background-image: -webkit-gradient(linear, left bottom, left top, from(var(--grad-color-1)), to(var(--grad-color-2)));
            background-image: linear-gradient(to top, var(--grad-color-1), var(--grad-color-2));
            border-radius: 50px;
            color: var(--light)
        }

        .sec.sec-hero {
            background-image: linear-gradient(to bottom, transparent, transparent);
            position: relative;
            min-height: auto;
            padding-bottom: 100px;
            padding-top: 100px
        }

        /*.sec.sec-hero:after {*/
        /*    background-image: linear-gradient(to bottom, transparent, rgba(255, 255, 255, 1)), url(/images/Silver_Image_Test4.jpg);*/
        /*    content: "";*/
        /*    position: absolute;*/
        /*    top: 0;*/
        /*    height: 100%;*/
        /*    width: 100%;*/
        /*    opacity: 0.5*/
        /*}*/

        .sec.sec-hero .container, .sec-eligliblity .container {
            position: relative;
            z-index: 9
        }

        .hero-header {
            padding-top: 30px;
            text-align: center
        }

        .hero-header h2 {
            font-size: 40px;
            font-weight: 900;
            letter-spacing: 2px;
            color: #666
        }

        .hero-header h4 {
            font-size: 24px;
            font-weight: 600;
            font-style: italic;
            letter-spacing: 2px;
            background: -webkit-gradient(linear, right top, right bottom, from(var(--grad-color-1)), to(var(--grad-color-2)));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-align: center;
            margin: 10px 0 40px 0
        }

        .hero-lists ul li {
            font-size: 18px;
            letter-spacing: 0.5px;
            line-height: 24px;
            position: relative;
            padding-left: 45px;
            padding-right: 0
        }

        .hero-lists ul li:before {
            content: "";
            position: absolute;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            left: 0;
            width: 35px;
            height: 35px;
            background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6RjgwRTMwNjg0QzI4MTFFOUE4MkZGQzk5RERFMzBEOUEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6RjgwRTMwNjk0QzI4MTFFOUE4MkZGQzk5RERFMzBEOUEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpGODBFMzA2NjRDMjgxMUU5QTgyRkZDOTlEREUzMEQ5QSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpGODBFMzA2NzRDMjgxMUU5QTgyRkZDOTlEREUzMEQ5QSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pl1PWokAAAaeSURBVHjavJhZbFRVGMf/d5Z2pp2ZbjPdgEJr2WlBJRTZLEoUQSgYkEKMGyii8cH44oNEE6O+GHnxwUQCCQk7goIoi9Diwo6GJZRdaCvaFmhn3+f6P6d3YChdplD5mv9D7z1zz+9833e+syiTd6xCL62EmkZVUIOpAVQWpVBtVCN1iTpC7aPOJ/44pqpoDvqw4tFKzBw4HG6f+/Y7le8MvQCZQy2lpnfTxkYVUROol7VnAuobamMyneiSaPMUdYza1gNMV/Y0tYE6Sc14UKAvtBGOxYNbObWTcf1ahC2ixsSzlGSBRMP91PvoQxNJpjLsraHADp2KxVCUegHZE5BRC9HUvoYRds59CwuLhj4/tbBkZTDgy9PCuLM7oBrNvX0Oc9Z1C7MKivFVxXOwGIwIRELxJjMURfmJumeWfUlN7GsYhX9nXTfxbH4RVk+YJZ87A17olHZ/6PV6BAKB6eFwuCbRQ+Oo99DHJkZd576JSkd/rJk4mzHRwel33wUTDAbh9/kQi0YrEz20rq9h9AKGYZqQU4C1k2aTRQ+nz3UXjNfvhyESRT9rZgsbVMeBnqEe6e7jYprq6HrRiZoUjA7nGKbHs3KxflIVjMYUOD1O9nkHxuP3IVsxwBkL4+MzBz8P6JT9caDlXX3YwA83sdSrsShiBMpJNcHIkYpa0t1vxGwqy7Bjw+Q5MKWaCdN2D0yOYkSU/79zaBe++/vyHIfdvkK0KKAmdeVy8eER1myseXIulg0ejSscpTcSlu+6grngbsUwaxY2Ta6C1ZTeDpMQJo+vHSZCXy+q3YZd9ZcwJsM+pTg9Y4TwUFV38a/IzsPqJ2bCYrFgrL2fDNsnZ4+gKM0qp26ipwTMJU8ritOthJmDzHQbXIQTMCK5hYckjM6IMGEW1mxFTcMVjLDnwZBhg2LQzzV0Ns0FTD1X4XH2Amxk/E3GVDjbbiItxYR3R0+U75ef/h3FlkxYCRUVqzQ7vUxPFJoshJkLO9+56F3lLhgv7PoUBGMxCVNLmJH5/QhjlbNPjUYrBFBpR6DmoB9lthysGzMNJp2B8fbIGeILh5DmA94umyCT9qMzB9HPbEE2QS8SxsFc2TylCgUZ2XC57oVx6FPhi0VQve9b/Hr9GkYNGAi9JV3sOwSM6LpYAPW/d0apHHkK0vR0rbMNQaMO5pRUgD+SUHy/tGy89NSH9FQj60qh2SJzZkCmgzCtLEB3YNyEydVgXty7GQebG1E+qAQ6s0nUHgmkmUNkWkZHoAJTGg63NuGt0wfkBy1hFX4WL5GQOnbiY1KHvB4sGVmBD4aPg40hXTt+BkqYb+0wimwnYbxe5BHGEw1j3u6NOHTjH5SXlLbDRCKJMMLSFO4YxZbN0smqjDomaFX+IKwsq0SII3EbFJhTU+moqExmE/MnhR3fYIgdTHJ3gOVBgxHeEQmcZzTBFQ5i/p5NOOG+gVEDueHUKYSJdjaX3MJDro5PVQ1qmCULPzRdw5v0lJ6jtUZU+IKB254KCE8xQR3mdLgIdTeMV8K08fk8wvzhb0N5cSnboCsYYX4B1NDZG1XbCgxOz8T3/17FktO1EspGL/sCd6BCLJjuUFAOIA4jw2Q0o5XFb96+LTgZ9qKsqBhRwqvRWHcFvkX0ebmrt3GooZzCPzbVS08ZBBQH6NWgEhfROEx+ihk3fR7Mq92KM7EARhb2R5TeVGOxnlaca6K/Q921iIdPQO1svoZXT9XKjjMllF9CdYRpYQ2b/9t21CkhjMgtQCQchqomtR4fFUDbe2oVhxrC8O1qrsdibfZlxhQJFZ9N+cyZZq8bCw7u5NknhGFZDgnTC9smgMS+9miyUMPpqT0tDXjl5H65MGaDWwqXU3qmiQV0wbFduKAGMdSWjYiY1smbOMudim/QPk3mF3GvD03PkFCvnayV25KCzHw0MkzVJ/biUsSPIYSORKO93T59JnMx4eRar51Ck9wjK7jqd+HJnEJU5g7ElobzqPO2YpDZxrUt1luYFipXLtAJD1+iDiTrKbFNK0mz4XhbC35uboCD1b2YMJHewwhb0tmp4xdqZbJfEFBilbdzYS1liDK49t0nzLbEidXxGPQG9Scenl2gXujpoFhJ/fUQYETeTE7mKC3WtseSKQUPYKepMWLrlezZvk27/1n1P8Bs1GCu38/tx2Itxmf6AOQitYiqFvdWD3I/JGZBGfU6dfg+QE5Qy0Q9pdb31Lg3N2irNY3RLq7Gatd7udoGT9RLj5asV6nj1G7tJiVp+0+AAQBG75rb2h9vVQAAAABJRU5ErkJggg==) no-repeat center center / 35px
        }

        .hero-lists ul li:last-child {
            padding-right: 0
        }

        .hero-lists ul li {
            padding: 0 50px 0 45px
        }

        .hero-lists ul {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .charge-alert {
            background-image: -webkit-gradient(linear, left top, left bottom, from(var(--grad-color-1)), to(var(--grad-color-2)));
            background-image: linear-gradient(to bottom, var(--grad-color-1), var(--grad-color-2));
            color: var(--light);
            width: 195px;
            border-radius: 50%;
            height: 195px;
            padding: 36px;
            text-align: center;
            font-family: Roboto, var(--sp-font);
            position: absolute;
            right: -27px;
            top: -135px
        }

        .charge-alert h3 {
            font-weight: 700;
            font-size: 28px;
            letter-spacing: 0.5px
        }

        .charge-alert h3 small {
            display: block;
            color: var(--light);
            font-weight: 700;
            font-size: 25px
        }

        .charge-alert h3 span {
            font-weight: 100;
            font-size: 25px
        }

        .hero-boxes {
            margin-top: 55px;
            position: relative
        }

        .hero-box {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            text-align: center
        }

        .hero-box-in {
            padding: 0 46px
        }

        .hero-box-wrap {
            background-image: -webkit-gradient(linear, left top, left bottom, from(var(--grad-color-1)), to(var(--grad-color-2)));
            background-image: linear-gradient(to bottom, var(--grad-color-1), var(--grad-color-2));
            border-radius: 20px;
            padding: 20px;
            height: 100%;
            max-width: 388px;
            color: var(--light);
            border: 3px solid var(--light);
            position: relative
        }

        .hero-box-wrap p {
            font-size: 16px;
            font-weight: 100
        }

        .hero-box-in-up h3 {
            font-weight: 800;
            font-size: 30px;
            letter-spacing: 0.5px;
            line-height: 24px;
            margin-bottom: 15px;
            padding-bottom: 19px;
            position: relative
        }

        .hero-box-in-up h3 {
            font-weight: 200;
            padding-bottom: 0
        }

        .hero-box-in-up {
        / / border-bottom: 2 px solid var(--light);
            margin-bottom: 20px;
            margin-left: 30px;
            margin-right: 30px
        }

        .btn-appply {
            color: var(--light);
            font-family: Roboto, var(--sp-font);
            font-size: 15px;
            font-weight: 600;
            background: var(--gray-dark);
            padding: 10px 15px;
            display: block;
            border-radius: 50px;
            border: 2px solid var(--light);
            max-width: 220px;
            margin: 0 auto;
            position: absolute;
            bottom: -22px;
            width: 100%;
            left: 0;
            right: 0;
            text-transform: uppercase
        }

        .sec-eligliblity {
            position: relative;
            z-index: 1;
            padding-bottom: 0
        }

        .h3-wabe {
            position: absolute;
            width: 100%;
            height: auto;
            display: block;
            top: -75px;
            left: 0;
            right: 0;
            z-index: 1
        }

        .h3-wabe img {
            width: 100%;
            height: auto;
            display: block
        }

        .elig-header {
            background-image: -webkit-gradient(linear, left top, left bottom, from(var(--grad-color-1)), to(var(--grad-color-2)));
            background-image: linear-gradient(to bottom, var(--grad-color-1), var(--grad-color-2));
            border-radius: 50px;
            padding: 40px;
            color: var(--light);
            border: 6px solid var(--light);
            position: relative;
            text-align: center
        }

        .elig-in {
            max-width: 810px;
            margin: 0 auto
        }

        .elig-header h2 {
            font-weight: 700;
            font-size: 30px;
            letter-spacing: 1px;
            margin-bottom: 3px
        }

        .elig-header p {
            font-size: 18px;
            letter-spacing: 1px;
            padding-bottom: 13px;
            margin-bottom: 25px;
            position: relative
        }

        .elig-header p:after {
            content: "";
            width: 60%;
            height: 2px;
            position: absolute;
            background: var(--light);
            border-radius: 50%;
            left: 0;
            right: 0;
            bottom: 0;
            margin: 0 auto
        }

        .sec-eligliblity:after {
            content: "";
            background: #efefef;
            height: 800px;
            width: 800px;
            border-radius: 50%;
            position: absolute;
            top: 180px;
            z-index: -2;
            left: -50px;
            opacity: 0.2
        }

        .faq-inner .panel-default > .panel-heading + .panel-collapse > .panel-body {
            border: none !important;
            padding: 14px 0 60px 0;
            font-size: 20px;
            color: var(--light)
        }

        .main-reviewimage {
            border-radius: 50%;
            height: 100%;
            width: 100%;
            background: var(--third-color)
        }

        .main-reviewimage img {
            opacity: 0.3
        }

        .test_img {
            position: relative;
            opacity: 1;
            margin: 0 -48px;
            margin-top: 40px
        }

        .test_img img {
            border-radius: 100%;
            overflow: hidden;
            margin: 0 auto
        }

        .testimonial_detail {
            text-align: center
        }

        .testimonial_detail {
            transform: scale(0.7) !important;
            width: 447px;
            position: relative;
            left: -71px
        }

        .testimonial_detail ul {
            margin: 22px 0px 19px
        }

        .testimonial_detail ul > li {
            display: inline-block
        }

        .testimonial_detail ul > li .fa {
            color: var(--third-color);
            margin-right: 10px;
            font-size: 34px
        }

        .testimonial_detail h4 {
            font-size: 38px
        }

        .testimonial_detail p {
            color: #151515;
            font-size: 26px
        }

        @media (max-width: 1199px) {
            .header-menus .header-lef ul > li {
                padding: 0 5px
            }

            .header-menus .header-lef ul > li > a {
                font-size: 14px
            }

            .header-menus .header-right ul li {
                padding-left: 10px
            }

            .charge-alert {
                right: -100px;
                top: -145px
            }

            .charge-alert {
                right: -20px;
                top: -125px;
                width: 150px;
                height: 150px;
                padding: 20px
            }

            .hero-box-in {
                padding: 0 26px
            }

            .hero-header h2 {
                font-size: 35px
            }

            .charge-alert h3 {
                font-weight: 700;
                font-size: 22px
            }

            .charge-alert h3 small {
                font-size: 25px
            }

            .charge-alert h3 span {
                font-size: 25px
            }

            .h3-wabe {
                top: -30px
            }

            .hero-header {
                padding-top: 30px
            }

            .sec.sec-hero {
                min-height: auto;
                padding-bottom: 50px
            }
        }

        @media (max-width: 991px) {
            .testimonial_detail h4 {
                font-size: 24px
            }

            .testimonial_detail p {
                font-size: 19px
            }

            .faq-inner .panel-default > .panel-heading + .panel-collapse > .panel-body {
                font-size: 18px;
                margin-bottom: 20px
            }

            .faq-inner .panel-default > .panel-heading + .panel-collapse > .panel-body {
                padding: 14px 0 17px 0
            }

            .header-wrapper {
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column
            }

            .header-logo {
                padding-bottom: 10px
            }

            .header-logo img {
                max-width: 100px;
                width: 100px !important
            }

            .btn-secure {
                font-size: 12px;
                line-height: 24px;
                padding: 9px 15px
            }

            .header-menus .header-right ul li:last-child {
                padding-left: 0
            }

            .header-menus .header-right ul li:last-child img {
                max-width: 140px
            }

            .header-menus .header-lef ul > li > a {
                font-size: 13px
            }

            .hero-header h2 {
                font-size: 26px
            }

            .hero-box-in {
                padding: 0 15px
            }

            .charge-alert {
                right: -20px;
                top: -45px;
                width: 120px;
                height: 120px;
                padding: 10px;
                padding-top: 25px;
                z-index: 1;
                border: 3px solid
            }

            .elig-header {
                padding: 20px
            }

            .charge-alert h3 {
                font-size: 19px
            }

            .h3-wabe {
                top: 30px
            }

            .charge-alert h3 small {
                font-size: 25px
            }

            .charge-alert h3 span {
                font-size: 18px
            }

            .hero-box-in-up h3 {
                font-size: 26px
            }

            .sec-eligliblity:after {
                height: 500px;
                width: 500px
            }

            .hero-box-wrap p {
                font-size: 14px;
                margin-bottom: 15px
            }

            .hero-box-in-up {
                margin-bottom: 15px;
                margin-left: 15px;
                margin-right: 15px
            }
        }

        @media (max-width: 767px) {
            .sec.sec-hero:after {
                background-image: linear-gradient(to bottom, transparent, rgba(255, 255, 255, 1)), url(/images/Silver_Image_MobileTest3.jpg);
                background-size: cover;
                top: -71px !important;
            }

            .alert-bar {
                font-size: 11px;
                font-weight: normal;
                padding: 10px;
                line-height: 1.4
            }

            header {
                position: relative;
                top: 0;
                font-family: var(--theme-font)
            }

            .header-logo {
                padding-bottom: 0
            }

            .header-wrapper {
                -webkit-box-align: start;
                -ms-flex-align: start;
                align-items: flex-start
            }

            .mobile-toggles {
                position: absolute;
                top: 15px;
                right: 15px;
                border-radius: 10px;
                width: 50px;
                padding: 5px;
                -webkit-box-shadow: 0 0 5px rgba(204, 204, 204, 0.3);
                box-shadow: 0 0 5px rgba(204, 204, 204, 0.3);
                border: 2px solid var(--primary-color)
            }

            .one, .two, .three {
                background-color: var(--primary-color);
                height: 2px;
                margin: 4px auto;
                display: table;
                width: 20px;
                border-radius: 5px
            }

            .overlay {
                position: fixed;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.7215686274509804);
                left: 0;
                top: 0;
                bottom: 0;
                left: 0;
                z-index: 99;
                opacity: 0;
                visibility: hidden
            }

            .header-menus {
                position: fixed;
                top: 0;
                left: 0;
                height: 100%;
                z-index: 999999;
                width: 200px;
                -webkit-font-smoothing: antialiased;
                -webkit-transform-origin: 0% 0%;
                transform-origin: 0% 0%;
                -webkit-transform: translate(-100%, 0);
                transform: translate(-100%, 0);
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
                background-image: -webkit-gradient(linear, left top, left bottom, from(var(--grad-color-1)), to(var(--grad-color-2)));
                background-image: linear-gradient(to bottom, var(--grad-color-1), var(--grad-color-2))
            }

            .header-menus .header-lef ul > li {
                width: 100%;
                padding: 0
            }

            .header-menus .header-lef ul > li > a {
                color: var(--light);
                font-size: 14px;
                padding: 12px 15px;
                text-align: left;
                display: block;
                border-bottom: 1px solid rgba(255, 255, 255, 0.11);
                font-weight: 100;
                text-transform: capitalize
            }

            .header-menus .header-lef ul > li > a:after, .header-menus .header-lef ul > li.active a:after {
                display: none
            }

            .header-right {
                border-top: 1px solid rgba(255, 255, 255, 0.11);
                padding: 15px
            }

            .header-menus .header-right ul li {
                padding-left: 0;
                width: 100%
            }

            .header-menus .header-right ul li:last-child {
                padding-top: 10px
            }

            .btn-secure {
                padding: 6px 10px;
                width: 100%;
                display: block;
                text-align: center;
                background: transparent;
                border: 1px solid rgba(255, 255, 255, 0.3);
                border-radius: 50px 50px 50px 0;
                font-size: 14px;
                font-weight: 100
            }

            .header-lef {
                height: 100%;
                overflow: auto
            }

            .header-menus .header-right ul li:last-child img {
                max-width: 100%
            }

            .hero-header {
                padding-top: 0
            }

            .hero-lists ul {
                flex-direction: column;
                text-align: center;
                align-items: flex-start;
                max-width: 157px;
                margin: 0 auto
            }

            .hero-lists ul li {
                padding: 0 0 0 45px;
                margin-top: 10px
            }

            .elig-header h2 {
                font-size: 26px;
                line-height: 1.3
            }

            .elig-header p {
                font-size: 14px;
                margin-bottom: 15px
            }

            .hero-box-wrap p {
                font-size: 13px;
                line-height: 1.5
            }

            .h3-wabe {
                top: 0
            }

            .hero-boxes {
                margin-top: 15px
            }

            .hero-lists ul li:first-child {
                margin-top: 0
            }

            .hero-box-in {
                padding: 0;
                position: relative
            }

            .hero-box-wrap {
                margin: 0 auto 30px
            }

            .hero-box-in + .hero-box-in {
                margin-top: 110px
            }

            .charge-alert {
                right: 0;
                top: -110px;
                left: 0;
                margin: 0 auto
            }

            .hero-header h4 {
                font-size: 18px;
                margin-bottom: 15px
            }

            .hero-box {
                flex-direction: column
            }

            .hero-lists ul li {
                font-size: 15px;
                padding: 0 0 0 35px
            }

            .hero-lists ul li:before {
                width: 25px;
                height: 25px;
                background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6RjgwRTMwNjg0QzI4MTFFOUE4MkZGQzk5RERFMzBEOUEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6RjgwRTMwNjk0QzI4MTFFOUE4MkZGQzk5RERFMzBEOUEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpGODBFMzA2NjRDMjgxMUU5QTgyRkZDOTlEREUzMEQ5QSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpGODBFMzA2NzRDMjgxMUU5QTgyRkZDOTlEREUzMEQ5QSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pl1PWokAAAaeSURBVHjavJhZbFRV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) no-repeat center center / 25px
            }

            .faq-inner .panel-default > .panel-heading + .panel-collapse > .panel-body {
                font-size: 14px;
                margin-bottom: 0px
            }

            .test_img {
                margin: 0
            }

            .testimonial_detail {
                transform: scale(1) !important;
                width: 100%;
                position: relative;
                left: 0;
                margin-top: 30px
            }

            .sec-eligliblity:after {
                height: 250px;
                width: 250px;
                top: 318px
            }
        }

        @import url('https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Raleway:300,400,500,600,700');
        :root {
            --dark: #000;
            --gray-dark: #5a5a5a;
            --light: #fff;
            --dark-light: #f5f5f5;
            --title-color: #375754;
            --light-opa: rgba(255, 255, 255, 0.7);
            --primary-color: #5bccca;
            --secondary-color: #1ea7a5;
            --third-color: #44c6b8;
            --rating-color: #ffc90e;
            --grad-color-1: rgba(76, 184, 196, 1);
            --grad-color-2: rgba(62, 207, 176, 1);
            --theme-font: 'Poppins', sans-serif;
            --sp-font: 'Raleway', sans-serif
        }

        ::-webkit-scrollbar {
            width: 5px
        }

        ::-webkit-scrollbar-track {
            background: var(--dark-light)
        }

        ::-webkit-scrollbar-thumb {
            background-image: -webkit-gradient(linear, left bottom, left top, from(var(--grad-color-1)), to(var(--grad-color-2)));
            background-image: linear-gradient(to top, var(--grad-color-1), var(--grad-color-2))
        }

        ::-webkit-scrollbar-thumb:hover {
            background-image: -webkit-gradient(linear, left bottom, left top, from(var(--grad-color-1)), to(var(--grad-color-2)));
            background-image: linear-gradient(to top, var(--grad-color-1), var(--grad-color-2))
        }

        body {
            font-family: Roboto;
            font-size: 20px;
            color: var(--dark);
            overflow-x: hidden;
            font-weight: normal
        }

        main {
            position: relative;
            z-index: 1
        }

        a {
            color: var(--third-color)
        }

        img {
            max-width: 100%
        }

        .list-inline {
            margin: 0
        }

        ul, li {
            margin: 0;
            list-style: none;
            padding: 0
        }

        button {
            border: 0
        }

        h2, h3, h4 {
            margin: 0
        }

        h2 {
            font-size: 34px;
            line-height: inherit;
            letter-spacing: 0.5px
        }

        p {
            letter-spacing: 0.5px;
            margin: 0 0 20px
        }

        @media (max-width: 1199px) {
            h2 {
                font-size: 25px
            }
        }

        @media (max-width: 767px) {
            #back-to-top {
                bottom: 54px !important
            }
        }

        #back-to-top {
            position: fixed;
            bottom: 40px;
            right: 10px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.1);
            color: #fff;
            text-align: center;
            z-index: 100;
            font-size: 16px;
            line-height: 48px;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
            border: solid 1px transparent
        }

        #representative-apr-banner {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: auto;
            background-color: var(--gray-dark);
            color: #fff;
            font-size: 13px;
            padding: 5px 2px;
            text-align: center;
            line-height: 20px;
            z-index: 100
        }

        @media (max-width: 768px) {
            .header-logo-container img.header-logo {
                margin-top: 8px;
            }

            .sec.sec-hero {
                padding-top: 0
            }

            #representative-apr-banner {
                padding: 2px
            }

            .header-logo {
                width: 100%;
                padding-right: 65px
            }

            .header-logo-container {
                width: 50%;
                display: block
            }

            .header-logo-container:first-child {
                padding-right: 7.5px
            }

            .header-logo-container + .header-logo-container {
                padding-left: 7.5px;
                padding-top: 8px
            }

            .header-logo-container img {
                max-width: 100%;
                width: 100% !important;
                padding: 0
            }
        }

        #representative-apr-banner a {
            text-decoration: underline;
            color: #fff
        }

        #cookie-notice a {
            color: white
        }

        #cookie-notice {
            font-size: 14px;
            position: fixed;
            bottom: 15px;
            z-index: 200;
            text-align: center;
            left: 15px;
            right: 15px;
            padding: 5px 10px;
            background: black;
            color: white;
            border-radius: 4px;
            box-shadow: 0 0 30px 1px black
        }

        .text-blue {
            color: #44c6b8
        }

        .hero-lists li {
            white-space: nowrap
        }

        .header-logo img {
            width: 150px
        }

        .hero-box-in-up img {
            width: 40%
        }
    </style>


</head>
<body data-spy="scroll" data-bs-target=".navbar" data-offset="80">
<!-- Preloader-->
<div class="loader-wrapper">
    <div class="loader"></div>
</div>
<!-- Preloader end-->

<!-- Nav Start-->
<nav class="navbar navbar-expand-lg navbar-light theme-nav fixed-top">
    <div class="container"><a class="navbar-brand" href="{{route('index') }}<?= $query_params; ?>">
            <img src="../assets/images/anyday.png" width="200" height="50" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse default-nav" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto" id="mymenu">
                <li class="nav-item"><a class="nav-link" href="{{route('index') }}<?= $query_params; ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">about</a></li>
                <li class="nav-item"><a class="nav-link" href="#feature">do i qualify</a></li>
                <li class="nav-item"><a class="nav-link" href="#price">how it works</a></li>
                <li class="nav-item"><a class="nav-link" href="#testimonial">reviews</a></li>
                <li class="nav-item"><a class="nav-link"  href="{{route('faqs') }}<?= $query_params; ?>">FAQ</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact" data-menuanchor="contact">contact us</a></li>
                <li class="nav-item">
                    <a class="nav-link btn btn-custom theme-color rounded-pill text-white border-2 p-2"
                       href="{{route('apply') }}<?= $query_params; ?>"
                                        data-menuanchor="apply">apply now</a>
                </li>
                <li class="nav-item"><a class="nav-link">
{{--                    <img data-src="../images/trustpilot_only_stars.png" class="lazy" alt="5 star reviews" />--}}
                    <img src="../images/trustpilot_only_stars.png" class="lazy marg-15" width="150" height="35" alt="5 star reviews" />
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Nav end-->

<!-- Home Section start-->
<section class="home home vertical-scrolling" id="home">

    <div class="container wow-disabled fadeInUp">
        <div class="hero-header mt-5">
            <h2 class= text-center" style="margin-bottom: 30px;">
                Get an instant quote for loans
                <br/>
                <span class= bolder"><?php __('£')?>$ 100</span>
                to
                <span class= bolder"><?php __('£')?>$ 10,000</span>
            </h2>
            <h3 class="text-center mb-3 f-bold text-black-50">Same Day Loans* - All Credit Welcome</h3>
        </div>

        <div class="hero-body wow-disabled fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
            <div class="hero-lists mt-5">
                <ul class="list-inline text-center">
                    <li class="">
                        <img class="img-fluid mr-2 " src="../assets/images/fact-tick.png" width="25" height="25" alt="">
                        No paperwork
                    </li>
                    <li class="">
                        <img class="img-fluid mr-2 " src="../assets/images/fact-tick.png" width="25" height="25" alt="">
                        Easy to apply
                    </li>
                    <li class="">
                        <img class="img-fluid mr-2 " src="../assets/images/fact-tick.png" width="25" height="25" alt="">
                        256 bit security
                    </li>
                </ul>
            </div>


            <div class="hero-boxes">
                <div class="hero-box">
                    <div class="hero-box-in">
                        <div class="hero-box-wrap">
                            <div class="hero-box-in-up">
                                <div class="hero-img-container" style="margin-bottom: 20px;">
                                    <img class="lazy" src="../images/Today_Badge_Updated.png" width="125" height="35"
                                         style="" alt=""/>
                                    <!-- <img src="/images/lenderwhite.png" /> -->
                                </div>
                                <h2 class="text-black-50 f-bold"><?php __('£')?>$ 100 - <?php __('£')?>$ 1000</h2>
                                <h4 class="text-black">
                                    <p class="f-bold text-center text-black-50">
                                        {{--                                        <img class="img-fluid mr-2 " src="../assets/images/fact-tick.png"" width="25" height="25" alt="">--}}
                                        {{--                                        <img class="img-fluid mr-2 f-bold" src="../images/img/icon-mark.png" width="25" height="25" alt="">--}}
                                        Money Can Be Sent Today³<br/>
                                        {{--                                        <img class="img-fluid mr-2 f-bold" src="../images/img/icon-mark.png" width="25" height="25" alt="">--}}
                                        Longer Term, Lower Rates<br/>
                                        {{--                                        <img class="img-fluid mr-2 f-bold" src="../images/img/icon-mark.png" width="25" height="25" alt="">--}}
                                        Flexible Repayment One Secure Form</p>
{{--                                    <p class="f-bold">Representative APR 49.9%</p>--}}
                                  </h4>
                                <h5 class="text-white f-bold">Representative APR 49.9%</h5>
                            </div>
                            <div class="hero-box-in-down">
                                <a class="btn-appply" href="<?= $apply_link; ?>">Apply Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="hero-box-in">
                        <div class="charge-alert">
                            <h3 class="text-white">We DON'T <small>charge</small><span> any fees</span></h3>
                        </div>
                        <div class="hero-box-wrap">
                            <div class="hero-box-in-up">
                                <div class="hero-img-container" style="margin-bottom: 20px;">
                                    <img class="lazy" src="../images/Plus_Badge_Updated.png" width="125" height="35"
                                         style="" alt=""/>
                                </div>
                                <h2 class="text-black-50 f-bold"><?php __('£')?>$ 1000 - <?php __('£')?>$ 5000</h2>
                                <p class="text-black-50 f-bold">
                                    {{--                                        <img class="img-fluid mr-2 " src="../assets/images/fact-tick.png"" width="25" height="25" alt="">--}}
                                    {{--                                        <img class="img-fluid mr-2 f-bold" src="../images/img/icon-mark.png" width="25" height="25" alt="">--}}
                                    Money Can Be Sent Today³<br/>
                                    {{--                                        <img class="img-fluid mr-2 f-bold" src="../images/img/icon-mark.png" width="25" height="25" alt="">--}}
                                    Longer Term, Lower Rates<br/>
                                    {{--                                        <img class="img-fluid mr-2 f-bold" src="../images/img/icon-mark.png" width="25" height="25" alt="">--}}
                                    Flexible Repayment One Secure Form</p>
{{--                                <p class="f-bold">Representative APR 49.9%</p>--}}
                            </div>
                            <h5 class="text-white f-bold">Representative APR 49.9%</h5>

                            <div class="hero-box-in-down">
                                <a class="btn-appply" href="<?= $apply_link; ?>">Apply Now</a>
                            </div>
                        </div>
                    </div>

                </div>
                    <div class="innerpage-circle1"><img src="../assets/images/Testimonial2.png" alt=""></div>
                    <div class="innerpage-circle2"><img src="../assets/images/Testimonial1.png" alt=""></div>
            </div>
        </div>
    </div>
</section>

<!-- Home Section End-->

<!-- About Start-->
<section class="about" id="about">
    <div class="about-decor">
        <div class="about-circle1"><img src="../assets/images/team1.png" alt="team1"></div>
        <div class="about-circle2"><img src="../assets/images/main-banner1.png" alt="banner1"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="about-contain">
                    <div>
                        <h2 class="title">Outstanding<span> service</span></h2>
{{--                        <h3 class="caption-about">Take a look at what makes us different from other services</h3>--}}
                        <div class="row sm-mb">
                            <div class="col-12 position-relative">
                                <br>
                                {{--                                <div class="represent-circle wow-disabled fadeInRight" data-wow-duration="0.7s"--}}
                                <p>Get an instant decision online up to $10,000 today*<br>
                                </p>
                                <p>We’re here to help you find the right loan for you, nothing else.</p>
                                {{--                                    <p>Our online loans are here to make your life easier – if you’ve had an emergency and are in need of some cash to get you through – we’re here to help. Apply online and we can give you an instant decision so you can see whether you could be accepted for £100 to £10,000 loans (between 3 and 60 months). You could even get your loan on the same day*.</p>--}}

                                <p>We compare the top direct lenders in the UK so you have the best chance of getting
                                    the cheapest loan rate through us. We always endeavour to be as flexible as
                                    possible, so we offer a loan for everyone- if you have been declined elsewhere, we
                                    still may be able to help. We also offer a free no hard credit footprint eligibility
                                    checker so you can apply with confidence.</p>

                                <p>Our small loan form is designed to be as easy as possible to fill out with an average
                                    result time of just 39 seconds.</p>

                            </div>
                        </div>
                        <div class="top-margin">
                            <button class="btn btn-custom theme-color"
                                    href="{{route('apply') }}<?= $query_params; ?>"
                                    type="button">apply now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 d-medium-none">
                <div class="about-right">
                    <div class="about-phone">
                        <h1 class="text-white text-center"><span class="f-bold">free</span></h1>

                        <h3 class="text-white text-center mt-5">What Does this mean?</h3>

                        <div class="col-12 mt-5">
                            <ul class=" text-white">
                                <li class="text-white">
                                    <img class="img-fluid mr-2 " src="../assets/images/fact-tick.png" width="35"
                                         height="35" alt="">
                                    This Service Is Free
                                </li>
                                <li class="text-white">
                                    <img class="img-fluid mr-2 " src="../assets/images/fact-tick.png" width="35"
                                         height="35" alt="">
                                    No Hidden Fees OR Charges. <br>
                                </li>
                                <li class="text-white">
                                    <img class="img-fluid mr-2 " src="../assets/images/fact-tick.png" width="35"
                                         height="35" alt="">
                                    No Credit Footprint Whatsoever <br>
                                </li>
                                <li>
                                    <img class="img-fluid mr-2 " src="../assets/images/fact-tick.png" width="35"
                                         height="35" alt="">
                                    No Obligation Quote<br>
                                </li>
                            </ul>
                        </div>
                        {{--                  <h4 class="text-white center">What does this mean?--}}
                        {{--                      This means our service is FREE to use, no hidden charges. We do not touch your credit score whatsoever.</h4>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About End-->

<!-- Feature Section start-->
<section class="feature" id="feature">
    <div class="feature-decor">
        <div class="feature-circle1"><img src="../assets/images/feature2.png" alt=""></div>
    </div>
    <div class="container">
        <div class="row">
{{--            <div class="feature-phone"><img class="img-fluid" src="../assets/images/222.png" alt=""></div>--}}
            <div class="offset-lg-4 col-lg-8">
                <div class="row">
                    <div class="col-sm-12 mrgn-md-top">
                        <h2 class="title">Why <span>  choose us?</span></h2>
                    </div>
                    <div class="col-12 col-md-6">
                        <ul class="feature-style">
                            <li>
                                <div class="feature-icon"><img src="../assets/images/fact-tick.png" alt="icon"></div>
                                <div class="feature-subtitle">
                                    <h3>Borrow $500 - $10000</h3>
                                </div>
                            </li>
                            <li>
                                <div class="feature-icon"><img src="../assets/images/fact-tick.png" alt="icon"></div>
                                <div class="feature-subtitle">
                                    <h3>Compare Loans Instantly</h3>
                                </div>
                            </li>
                            <li>
                                <div class="feature-icon"><img src="../assets/images/fact-tick.png" alt="icon"></div>
                                <div class="feature-subtitle">
                                    <h3>Same Day Cash Loans*</h3>
                                </div>
                            </li>
                            <li>
                                <div class="feature-icon"><img src="../assets/images/fact-tick.png" alt="icon"></div>
                                <div class="feature-subtitle">
                                    <h3>One Simple Online Form</h3>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6 sm-m-top">
                        <ul class="feature-style">
                            <li>
                                <div class="feature-icon"><img src="../assets/images/fact-tick.png" alt="icon"></div>
                                <div class="feature-subtitle">
                                    <h3>No Paperwork</h3>
                                </div>
                            </li>
                            <li>
                                <div class="feature-icon"><img src="../assets/images/fact-tick.png" alt="icon"></div>
                                <div class="feature-subtitle">
                                    <h3>256-bit security</h3>
                                </div>
                            </li>
                            <li>
                                <div class="feature-icon"><img src="../assets/images/fact-tick.png" alt="icon"></div>
                                <div class="feature-subtitle">
                                    <h3>Available 24 Hours A Day</h3>
                                </div>
                            </li>
                            <li>
                                <div class="feature-icon"><img src="../assets/images/fact-tick.png" alt="icon"></div>
                                <div class="feature-subtitle">
                                    <h3>No Hidden Fees OR Costs</h3>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Feature Section End-->


<!-- Screenshot Section Start-->
<section class="price" id="price">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                {{--                <div class="price-carousel owl-carousel owl-theme">--}}
                <div class="price-item">
                    <div class="price-block">
                        <div class="">
                            <h2 class="f-bold">Free no credit footprint loan <br>
                                confidence rating</h2>
                        </div>
                        <div class="mrp">
                            <h6 class="user-type"></h6>
                            <div class="price-devide"></div>
                            <h2>compare 40+ lenders</h2>
                            <h6 class="price-year"></h6>
                            <div class="price-devide"></div>
                        </div>
                        <p class="text-center">
                            Find out if you can get the loan before you apply!<br><br>

                            You tell us about you, and we tell you your chances of being accepted for your chosen loan -
                            <br>without any impact on your credit rating!
                            <br><br>
                            This is completely free and is a 100% no obligation rating -
                            <br>it is up to you if you’d like to proceed to application.
                            <br><br>
                            Will I be accepted for this loan?</p>
                        <br>
                        <p>Get your rating in 60 seconds and you decide
                            whether or not to proceed to application</p>
                        <div class="form-button text-center">
                            <button class="btn btn-custom theme-color"
                                    href="<?= $apply_link; ?>" style="width: 50%" type="submit">Apply Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            {{--            </div>--}}
        </div>
    </div>
</section>
<!-- Screenshot Section End-->


<!-- testimonial Section start-->
<section class="testimonial" id="testimonial">
    <div class="testimonial-decor">
        <div class="testi-circle1"><img src="../assets/images/Testimonial2.png" alt=""></div>
        <div class="testi-circle2"><img src="../assets/images/Testimonial1.png" alt=""></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="testimonial-carousel owl-carousel owl-theme">
                    <div class="testimonial-item">
                        <div class="testimonial-block">
                            <div class="testimonial-avtar"><img src="../assets/images/avtar/22.jpg" alt=""></div>
                            <div class="testimonial-text">
                                <p>Really fast, great customer service. Great service!!</p>
                                <h3>mark dennis</h3>
                                <h6></h6>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-block">
                            <div class="testimonial-avtar"><img src="../assets/images/avtar/22.jpg" alt=""></div>
                            <div class="testimonial-text">
                                <p>Easy, simple and quick. I found my lender within minutes.</p>
                                <h3>Adegoke Yusuff</h3>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-block">
                            <div class="testimonial-avtar"><img src="../assets/images/avtar/22.jpg" alt=""></div>
                            <div class="testimonial-text">
                                <p>LoanAnyDay provide a great service. I will use them again.</p>
                                <h3>John Shipmen</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- testimonial Section End-->

<!-- Contact Section start-->
<section class="contact" id="contact">
    <div class="container">
        <div class="row">
            {{--            <div class="container">--}}
            <div class="lender-wrapper wow-disabled fadeIn" data-wow-duration="0.3s" data-wow-delay="0.3s">
                {{--                    <div class="lender-content">--}}
                <div class="faq">
                    {{--                            <div class="container">--}}
                    <div class="row">
                        <div class="col-md-12">
                            <div id="accordion">
                                <div class="card border-theme mb-3 radius-0">
                                    <div class="card-header" id="headingOne" role="heading"
                                         data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                         aria-expanded="true" aria-controls="collapseOne"><a>Compliance<i
                                                class="fa fa-angle-down"></i></a></div>
                                    <div class="accordion-collapse show" id="collapseOne"
                                         aria-labelledby="headingOne" data-bs-parent="#accordion">
                                        <div class="card-body"> LoanPal is a trading name of Amikaro Finance
                                            Limited and is registered with the Information Commissioner's
                                            Office in compliance with the Data Protection Act of 1998.
                                        </div>
                                    </div>
                                </div>
                                <div class="card border-theme mb-3 radius-0">
                                    <div class="card-header" id="headingTwo" role="heading"
                                         data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                         aria-expanded="false" aria-controls="collapseTwo"><a>Implications
                                            of late or non-payment<i class="fa fa-angle-down"></i></a></div>
                                    <div class="collapse accordion-collapse" id="collapseTwo"
                                         aria-labelledby="headingTwo" data-bs-parent="#accordion">
                                        <div class="card-body"> As a broker we work with numerous lenders
                                            all of which have their own practices and
                                            distinct loan agreement terms and conditions. Late or
                                            non-payment may result in
                                            default charges, fees and extra interest charges. If you are
                                            likely to miss or have
                                            any problems making a payment you should contact the lender
                                            directly to discuss your
                                            options.
                                        </div>
                                    </div>
                                </div>
                                <div class="card border-theme mb-3 radius-0">
                                    <div class="card-header" id="headingThree" role="heading"
                                         data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                         aria-expanded="false" aria-controls="collapseThree"><a>Credit
                                            checks and potential impact to credit score<i
                                                class="fa fa-angle-down"></i></a></div>
                                    <div class="collapse accordion-collapse" id="collapseThree"
                                         aria-labelledby="headingThree" data-bs-parent="#accordion">
                                        <div class="card-body">We do not perform any credit checks but the
                                            lender you have been matched with may
                                            perform traditional credit checks from a major credit reporting
                                            bureau. A missed
                                            and/or late payment may have a negative impact on your credit
                                            score.
                                        </div>
                                    </div>
                                </div>
                                <div class="card border-theme radius-0">
                                    <div class="card-header" id="headingFour" role="heading"
                                         data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                         aria-expanded="false" aria-controls="collapseFour"><a>Collection
                                            practices<i class="fa fa-angle-down"></i></a></div>
                                    <div class="collapse" id="collapseFour" aria-labelledby="headingFour"
                                         data-bs-parent="#accordion">
                                        <div class="card-body"> As a broker we are not involved with the
                                            collection practices. If you are likely to
                                            miss or have any problems making a payment you should contact
                                            the lender you have
                                            been matched with directly to discuss your options. If you fail
                                            resolve with the
                                            lender directly then your account may be referred to a
                                            collections agency.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-theme radius-0">
                                <div class="card-header" id="headingFive" role="heading"
                                     data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                     aria-expanded="false" aria-controls="collapseFive"><a>Renewal policy<i
                                            class="fa fa-angle-down"></i></a></div>
                                <div class="collapse" id="collapseFive" aria-labelledby="headingFour"
                                     data-bs-parent="#accordion">
                                    <div class="card-body"> As a broker we are not involved with the
                                        decision to renew your loan. We work with
                                        numerous lenders all of whom have their own specific renewal
                                        policies. We encourage
                                        you to read the loan agreement terms and conditions specified by the
                                        lender we match
                                        you with carefully. Should you have any questions or if you need to
                                        renew your loan,
                                        please kindly contact the lender you are matched with directly. So
                                        be sure to read
                                        carefully the terms outlined by the lender you have been matched
                                        with. If you are
                                        likely to miss or have any problems making a payment you should
                                        contact the lender
                                        directly to discuss your options.
                                    </div>
                                </div>
                            </div>
                            <div class="card border-theme radius-0">
                                <div class="card-header" id="headingSix" role="heading"
                                     data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                     aria-expanded="false" aria-controls="collapseSix"><a> Code of practice
                                        and policy on responsible lending<i
                                            class="fa fa-angle-down"></i></a></div>
                                <div class="collapse" id="collapseSix" aria-labelledby="headingSix"
                                     data-bs-parent="#accordion">
                                    <div class="card-body"> LoanAnyDay work with a carefully selected panel
                                        of lenders who all abide to an
                                        ethical code of practise and are contractually committed to
                                        responsible lending. Our
                                        preference is for a lender to be a member of a trade body
                                        association. The code of
                                        practise and policy on responsible lending is available from all
                                        lenders for the
                                        customer's information.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End--><!--Subscribe section start-->

<!--Subscribe section Ends-->


<!-- Map Section Start-->
<section class="p-0">
    <div class="container-fluid">
        <div class="bottom-section">
            <div class="row">
                <div class="col-md-12 p-0">
                    <div class="address-bar">
                        <div>
                            <ul class="footer-style text-center">
                                <li>
                                    <div>
                                        <img class="center" src="../assets/images/anyday-white.png" alt="logo" width="200" height="50">
                                    </div>
                                </li>
                                <li>
                                    <div class="footer-icon"><img src="../assets/images/locate.png" alt="locate"></div>
                                    <div class="footer-address"><a href="#">
                                            <p>71-75 Shelton Street, London, WC2H 9QJ, United Kingdom
                                            <br>
                                            <br>Company No: 12829944
                                            <br>ICO: ZA781906
                                            <br>
                                            <br>
                                            <br>LoanAnyDay t/a Amikaro Finance Limited
                                            <br>
                                            <br>Support@LoanAnyDay.Com

                                        </a>
                                        </p>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Map Section Ends-->


<!-- Tap on Top-->
<div class="tap-top">
    <div><i class="fa fa-angle-double-up"></i></div>
</div>
<!-- Tap on Ends-->

<!-- Footer Section start-->
<div class="copyright-section index-footer">
    <p>2021 LoanAnyDay t/a Amikaro Finance Limited</p>
</div>
<!-- Footer Section End-->

<!-- facebook chat section start-->
<div id="fb-root"></div>
<script>
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

{{--<link href="../assets/newcss/bootstrap.min.css" rel="stylesheet" type="text/css">--}}
<link href="../newcss/owl.carousel.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
<link href="../newcss/animate.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
<link href="../newcss/font-awesome.min.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
<link href="../newcss/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
<link href="../newcss/responsive.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
<link href="../newcss/global.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">

<!-- js file-->
<script src="../assets/js/jquery-3.3.1.min.js"></script>
<!-- bootstrap js file-->
<script src="../assets/js/bootstrap.min.js"></script>
<!-- popper js file-->
<script src="../assets/js/popper.min.js"></script>
<!-- Owl carousel js file-->
<script src="../assets/js/owl.carousel.min.js"></script>
<!-- script js file-->
<script src="../assets/js/script.js"></script>
<!-- tilt js file-->
<script src="../assets/js/tilt.jquery.js"></script>
<!-- validation-->
<script src="../assets/js/jquery.validate.min.js"></script>
<script src="../assets/js/additional-methods.min.js"></script>
<script src="../assets/js/contact.js"></script>
<!--scroll js-->
<script src="../assets/js/scroll.js"></script>
<script src="../assets/js/scroll.js"></script>
</body>
</html>
