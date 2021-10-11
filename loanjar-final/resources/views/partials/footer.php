<!-- Footer Start Here -->
<footer>
    <div class="container">
        <div class="footer-wrapper">
            <ul class="list-inline">
                <li><a href="terms.php<?= $query_params; ?>">
                        Terms & Conditions
                    </a></li>
                <li><a href="privacy.php<?= $query_params; ?>">
                        Privacy Policy
                    </a></li>
                <li><a href="https://www.u-ping.co.uk/">
                        Affiliates/Partners
                    </a></li>
                <li><a href="marketing-opt-out.php<?= $query_params; ?>">
                        Marketing Opt Out
                    </a></li>
                <li><a href="tcf.php<?= $query_params; ?>">
                        Treating Customers Fairly
                    </a></li>
                <li><a href="complaints.php<?= $query_params; ?>">
                        Complaints
                    </a></li>
                <li><a href="contact.php<?= $query_params; ?>">
                        Contact
                    </a></li>
                <li><a href="https://www.u-ping.co.uk/">
                        Stag Finance
                    </a></li>
            </ul>
        </div>
    </div>
</footer>
<!-- Footer End Here -->

<!-- Back to top -->
<div id="back-to-top" style="display: none" title="Back to top">
    <i class="fa fa-chevron-up"></i>
</div>
<!--/ Back to top -->

<!-- Representative APR Banner -->
<div id="representative-apr-banner" class="hidden-xs">
    Representative 277.6% APR (Fixed)&nbsp;&nbsp;&nbsp;<br class="visible-xs hidden-sm"/><a
            href="javascript:toggleDisplay('#toggle-example-text');">View Representative Example</a>
    <div id="toggle-example-text" style="display: none;">
        <hr/>
        Borrow <?php ; ?>850 for 11 months at <?php ; ?> ?>146.30 per month. Total repayment
        of <?php ; ?> ?>1,609.25. Interest: <?php ; ?> ?>759.25. Interest rate: 150% pa (fixed). 277.6%
        APR Representative. APR rates range from 45.3% APR to 1575% Max APR. Your APR rate will be based on your
        circumstances.<br/><br/>
        <strong>Rates between 45.3% ARR to maximum 1575% APR</strong>
    </div>
</div>
<!--/ Representative APR Banner -->

<!-- Cookie notice -->
<div id="cookie-notice" style="display: none;">
    <span>This website uses cookies to ensure you get the best experience on our website. <a href="" target="_blank">Learn more</a></span>
    <button class="btn btn-primary" onclick="closeCookieNotice();">Got it!</button>
</div>
<!--/ Cookie notice -->

<!-- CSS -->
<!-- <link href="/myloansnewx/css/bootstrap.min.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
  <link href="/myloansnewx/css/owl.carousel.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
  <link href="/myloansnewx/css/animate.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
  <link href="/myloansnewx/css/font-awesome.min.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
  <link href="/myloansnewx/css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
  <link href="/myloansnewx/css/responsive.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
  <link href="/myloansnewx/css/global.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
/ CSS -->

<link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900" rel="stylesheet">

<!-- JS Here -->

<script src="./../../../myloansnewx/js/jquery.min.js"></script>
<script defer src="./../../../myloansnewx/js/bootstrap.min.js"></script>

<link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="./../../../assets/js/validation.js?v=<?php echo time(); ?>"></script>
<!-- <script src="assets/js/api_caller.js?v=<?php echo time(); ?>"></script> -->
<script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
<script src="./../../../assets/js//form.js?v=<?php echo time(); ?>"></script>
<!-- <script src="/myloansnewx/js/all.min.js"></script> -->
<script type="text/javascript">
    $(".mobile-toggles").click(function () {
        $("body").toggleClass("open")
    }), $(".overlay").click(function () {
        $("body").removeClass("open")
    })
</script>

<!-- JS End -->

</body>

</html>
