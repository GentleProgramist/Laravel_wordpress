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
      <title>LoanAnyDay | Application - Short Term Loans 100 - 5000</title>
      <meta charset="utf-8">
      <meta name="author" content="LoanAnyDay">
      <meta name="description" content="LoanAnyDay |Short Term Loans 500 - 10000">
      <meta name="keywords" content="LoanAnyDay |Short Term Loans 500 - 10000">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">

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
              list-style: none
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
              src: url('/my-loans/myloansnewx/fonts/fontawesome-webfont3e6e.eot?v=4.7.0');
              src: url('/my-loans/myloansnewx/fonts/fontawesome-webfontd41d.eot?#iefix&v=4.7.0') format('embedded-opentype'), url('/my-loans/myloansnewx/fonts/fontawesome-webfont3e6e.woff2?v=4.7.0') format('woff2'), url('/my-loans/myloansnewx/fonts/fontawesome-webfont3e6e.woff?v=4.7.0') format('woff'), url('/my-loans/myloansnewx/fonts/fontawesome-webfont3e6e.ttf?v=4.7.0') format('truetype'), url('/my-loans/myloansnewx/fonts/fontawesome-webfont3e6e.svg?v=4.7.0#fontawesomeregular') format('svg');
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

          .sec.sec-hero:after {
              background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 1));
              content: "";
              position: absolute;
              top: 0;
              height: 100%;
              width: 100%;
          }

          .sec.sec-hero {
              background-repeat: no-repeat;
              position: relative;
              min-height: auto;
              padding-bottom: 100px;
              padding-top: 100px
          }

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
              background: url('/my-loans/myloansnewx/img/icon-mark.png') no-repeat center center / 35px
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

          .sec-eligliblity:before {
              content: "";
              position: absolute;
              top: 0;
              width: 100%;
              height: 100%;
              z-index: -1
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
                  background: url(/my-loans/myloansnewx/img/icon-mark.png) no-repeat center center / 25px
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
              header {
                  position: absolute;
                  top: 50px;
                  left: 0;
                  right: 0;
                  width: 100vw;
              }

              .sec.sec-hero {
                  background-position: center;
                  padding-top: 70px;
              }

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

              .#representative-apr-banner {
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

      <!-- Facebook Pixel Base Code -->
  <?php if(isset($_GET['fbpix']) && trim($_GET['fbpix']) !== ''): ?>
  <!-- Facebook Pixel Code -->
      <script>
          !function (f, b, e, v, n, t, s) {
              if (f.fbq) return;
              n = f.fbq = function () {
                  n.callMethod ?
                      n.callMethod.apply(n, arguments) : n.queue.push(arguments)
              };
              if (!f._fbq) f._fbq = n;
              n.push = n;
              n.loaded = !0;
              n.version = '2.0';
              n.queue = [];
              t = b.createElement(e);
              t.async = !0;
              t.src = v;
              s = b.getElementsByTagName(e)[0];
              s.parentNode.insertBefore(t, s)
          }(window, document, 'script',
              'https://connect.facebook.net/en_US/fbevents.js');
          fbq('init', '<?php echo $_GET["fbpix"]; ?>');
          fbq('track', 'PageView');
          var facebookPixelId = '<?php echo $_GET["fbpix"]; ?>';
      </script>
      <noscript>
          <img height="1" width="1"
               src="https://www.facebook.com/tr?id=<?php echo $_GET['fbpix']; ?>&ev=PageView
	    &noscript=1"/>
      </noscript>
      <!-- End Facebook Pixel Code -->
      <?php else: ?>
      <script type="text/javascript">
          var facebookPixelId = '';
      </script>
      <?php endif; ?>
  <!--/ Facebook Pixel Base Code -->

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous"></script>

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
    <link id="color" rel="stylesheet" href="../assets/css/color/color-1.css" media="screen">

    <link rel="stylesheet" type="text/css" href="../css/form-new.css?v=<?php echo time(); ?>"/>


      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
{{--      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>--}}
{{--      <script data-require="bootstrap@*" data-semver="3.1.1" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>--}}
  </head>
  <body>
    <!-- Preloader-->
    <div class="loader-wrapper">
      <div class="loader"></div>
    </div>

{{--    <!-- Alert -->--}}
{{--    <div class="alert-bar">Warning: Late repayment can cause you serious money problems. For help, go to--}}
{{--        <a href="#">moneyadviceservice.org.uk</a>--}}
{{--    </div>--}}


    <!-- Nav Start-->
    <!-- Nav Start-->
    <nav class="navbar navbar-expand-lg navbar-light theme-nav fixed-top">
        <div class="container"><a class="navbar-brand" href="{{route('index')}}">
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
                        <a class="nav-link btn btn-custom theme-color rounded-pill text-white border-2 p-2" href="{{route('apply') }}<?= $query_params; ?>"
                           data-menuanchor="contact">apply now</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Nav end-->

    <!-- Nav end-->


    <main >
        <div class="innerpage-decor">
            <div class="innerpage-circle1"><img src="../assets/images/Testimonial2.png" alt=""></div>
            <div class="innerpage-circle2"><img src="../assets/images/Testimonial1.png" alt=""></div>
        </div>

    @include('form')

    </main>


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




    <div id="cookie-notice" style="display: none;">
        <span>This website uses cookies to ensure you get the best experience on our website. <a href="" target="_blank">Learn more</a></span>
        <button class="btn btn-primary" onclick="closeCookieNotice();">Got it!</button>
    </div>

    <script>
        var cb = function () {
            var l = document.createElement('link');
            l.rel = 'stylesheet';
            // l.href = '../../myloansnewx/css/all.min.css';

            var h = document.getElementsByTagName('head')[0];
            h.parentNode.insertBefore(l, h);
        };
        var raf = requestAnimationFrame || mozRequestAnimationFrame ||
            webkitRequestAnimationFrame || msRequestAnimationFrame;
        if (raf) raf(cb);
        else window.addEventListener('load', cb);</script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900" rel="stylesheet">


    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"/>
    <link href="../newcss/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../newcss/owl.carousel.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    <link href="../newcss/animate.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    <link href="../newcss/font-awesome.min.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    <link href="../newcss/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    <link href="../newcss/responsive.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
{{--    <link href="../newcss/global.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">--}}

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900" rel="stylesheet">

    <script src="../js/validation-new.js?v=<?php echo time(); ?>"></script>
    <script src="../js/form-new.js?v=<?php echo time(); ?>"></script>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

    <script src="../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/jquery.magnific-popup.min.js"></script>
{{--    <script src="../assets/js/jquery.validate.min.js"></script>--}}
    <script src="../js/jquery.min.js"></script>
    <script defer src="../js/modernizr.min.js"></script>
    <script defer src="../js/bootstrap4.min.js"></script>
    <script defer src="../js/owl.carousel.js"></script>
    <script defer src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
    <script defer src="../js/custom.js?v=<?php echo time(); ?>"></script>

    <!-- js file-->
    <script src="../assets/js/script.js"></script>





  </body>
</html>
