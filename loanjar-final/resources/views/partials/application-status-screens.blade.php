<div id="error-box" style="text-align: left !important; display: none; position: fixed; top: 0; left: 0; right: 0; height: 50%; height: 70vh; background-color: white; color: black; font-size: 14px; z-index: 40000; border: solid 5px black; box-shadow: 0 0 10px 1px black; overflow: auto; padding: 5px;">
  <button style="position: absolute; width: 30px; height: 30px; background-color: black; border-radius: 50%; color: white; text-align: center; top: 0; right: 0;" onclick="closeWhiteBox();">X</button>
  <p>Hi there! You've just opened our debugger (probably by mistake). It's just better to close it using the button on the top right.</p>
  <button class="btn btn-danger" onclick="stopAutomaticRedirect(this)">Stop Automatic Redirect</button>
  <br />
  <br />
  <h3>CHECK STATUS LOG:</h3>
  <button class="btn btn-warning" onclick="copyText('checkStatusLog')">Copy</button>
  <textarea id="checkStatusLog" class="form-control"></textarea>
  <h3>ERROR LOG:</h3>
  <button class="btn btn-warning" onclick="copyText('errorLog')">Copy</button>
  <textarea id="errorLog" class="form-control"></textarea>
</div>
<div class="container overlay screen hidden" id="loading-screen">
  <h2><?php __('Thanks for applying with myLoans'); ?></h2>
  <div class="spinner text-center">
    <i class="fa fa-spinner fa-spin"></i>
  </div>
  <h3><?php __('Validating your application...'); ?></h3>
  <label class="text-danger"><?php __('Please don\'t close/reload the page until your application is processed.'); ?></label>
</div>
<div class="container overlay screen hidden" id="progress-screen">
  <h2 id="rotatingText"></h2>
  <div class="progress" style="height: 40px;">
    <div id="progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%; font-size: 20px; line-height: 40px;">
      0% Complete
    </div>
  </div>
  <label class="text-danger text-center"><?php __('Please don\'t close/reload the page until your application is processed.'); ?></label>
</div>
<div class="container overlay screen hidden" id="redirecting-screen">
  <div class="col-sm-12 text-center">
    <h2><?php __('Congrats!'); ?></h2>
    <h1><?php __('You\'re being redirected to the offers page'); ?></h1>
    <h3><a href="">Click here if you're not redirected within 3 seconds</a></h3>
  </div>
</div>
<div class="container overlay screen hidden error" id="validation-errors-screen">
  <span class="close-btn">&times;</span>
  <div class="col-sm-12 text-center">
    <h1><?php __('Please fix the following validation errors and resubmit the form'); ?></h1>
    <ul id="server-validation-errors"></ul>
  </div>
</div>
<div class="container overlay screen hidden error" id="error-screen">
  <div class="col-sm-12 text-center">
    <h2><?php __('An error occurred'); ?></h2>
    <h1><?php __('Please try again later'); ?></h1>
  </div>
</div>
<div class="container overlay screen hidden error" id="network-error-screen">
  <div class="col-sm-12 text-center">
    <h2><?php __('A network error occurred'); ?></h2>
    <h1><?php __('Please check your internet connection. If it\'s working, please retry after some time.'); ?></h1>
    <button class="btn-appply retry-submit">Retry</button>
  </div>
</div>
<div class="container overlay screen hidden error" id="unhandled-error-screen">
  <div class="col-sm-12 text-center">
    <h2><?php __('An unhandled error occurred'); ?></h2>
    <h1><?php __('We are on it. Please try again after some time.'); ?></h1>
  </div>
</div>
<div class="container overlay screen hidden error" id="database-error-screen">
  <div class="col-sm-12 text-center">
    <h2><?php __('A database error occurred'); ?></h2>
    <h1><?php __('We are on it. Please try again after some time.'); ?></h1>
  </div>
</div>
<div class="container overlay screen hidden error" id="rejected-screen">
  <span class="close-btn">&times;</span>
  <div class="col-sm-12 text-center">
    <h2><?php __('Rejected'); ?></h2>
    <h1><?php __('Sorry, your application was rejected. Please try again later.'); ?></h1>
  </div>
</div>
