<?php

    // Start the session if not alreay started
if (session_status() == PHP_SESSION_NONE) {
 session_start();
}

//    // Add country detection functionality
//require_once($_SERVER['DOCUMENT_ROOT'] . '/countrycode/locale.php');
//
//    // Add language file
//require_once($_SERVER['DOCUMENT_ROOT'] . '/countrycode/translate.php');



?>

<!DOCTYPE html>
<html lang="en">

<head>

        <!-- Meta -->
        <title>my-Loans - Instant Loan Approval | Small Loans Upto 5000</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="description" content="Instant lending approval of small loans from 100 to 5000! The best and most reliable lending & finance website | Installments of 3 - 48 months">
        <link rel="shortcut icon" href="/img/logos/logo-shortcut.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
        <!--/ Meta -->

        <!-- Twitter Card data -->
        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="@publisher_handle">
        <meta name="twitter:title" content="my-Loans - Instant Loan Approval | Small Loans Upto 5000">
        <meta name="twitter:description" content="Instant lending approval of small loans from 100 to 5000! The best and most reliable lending & finance website | Installments of 3 - 48 months">
        <meta name="twitter:creator" content="@author_handle">
        <!-- Twitter summary card with large image must be at least 280x150px -->
        <meta name="twitter:image:src" content="https://my-loans.co.uk/img/logos/logo_light.jpg">
        <!-- Twitter Card data -->

        <!-- Open Graph data -->
        <meta property="og:title" content="my-Loans - Instant Loan Approval | Small Loans Upto 5000" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="https://my-loans.co.uk/" />
        <meta property="og:image" content="https://my-loans.co.uk/img/logos/logo_light.jpg" />
        <meta property="og:description" content="Instant lending approval of small loans from 100 to 5000! The best and most reliable lending & finance website | Installments of 3 - 48 months" />
        <meta property="og:site_name" content="my-Loans" />
        <meta property="article:published_time" content="<?php echo time(); ?>" />
        <meta property="article:modified_time" content="<?php echo time(); ?>" />
        <meta property="article:section" content="Smarter, Simpler Lending" />
        <meta property="article:tag" content="Loans,Lending" />
        <!-- Open Graph data -->

        <!-- ****** favicons ****** -->
        <link rel="shortcut icon" href="/images/favicons/favicon.ico">
        <link rel="icon" sizes="16x16 32x32 64x64" href="/images/favicons/favicon.ico">
        <link rel="icon" type="image/png" sizes="196x196" href="/images/favicons/favicon-192.png">
        <link rel="icon" type="image/png" sizes="160x160" href="/images/favicons/favicon-160.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/images/favicons/favicon-96.png">
        <link rel="icon" type="image/png" sizes="64x64" href="/images/favicons/favicon-64.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/images/favicons/favicon-32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/images/favicons/favicon-16.png">
        <link rel="apple-touch-icon" href="/images/favicons/favicon-57.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/images/favicons/favicon-114.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/images/favicons/favicon-72.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/images/favicons/favicon-144.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/images/favicons/favicon-60.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/images/favicons/favicon-120.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/images/favicons/favicon-76.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/images/favicons/favicon-152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/images/favicons/favicon-180.png">
        <meta name="msapplication-TileColor" content="#FFFFFF">
        <meta name="msapplication-TileImage" content="/images/favicons/favicon-144.png">
        <meta name="msapplication-config" content="/images/favicons/browserconfig.xml">
        <!-- ****** favicons ****** -->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!--/ HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136336019-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-136336019-1');
      </script>
      <!--/ Global site tag (gtag.js) - Google Analytics -->

      <!-- Canonical URLs -->
      <link rel="canonical" href="https://www.my-loans.co.uk/index.html"/>
      <link rel="canonical" href="http://www.my-loans.co.uk/index.html"/>
      <link rel="canonical" href="https://my-loans.co.uk/index.html"/>
      <link rel="canonical" href="http://my-loans.co.uk/index.html"/>
      <link rel="canonical" href="http://www.my-loans.co.uk/"/>
      <link rel="canonical" href="https://my-loans.co.uk/"/>
      <link rel="canonical" href="http://my-loans.co.uk/"/>
      <!-- Canonical URLs -->

      <!-- CSS for the new form -->
	<link rel="stylesheet" href="../../../../myloansnewx/css/all.min.css?v=<?php echo time(); ?>" />
	<link rel="stylesheet" type="text/css" href="../../../assets/css/form-new.css?v=<?php echo time(); ?>" />
      <!--/ CSS for the new form -->

      <!-- Facebook Pixel Base Code -->
      <?php if(isset($_GET['fbpix']) && trim($_GET['fbpix']) !== ''): ?>
      <!-- Facebook Pixel Code -->
      <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window,document,'script',
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

</head>
