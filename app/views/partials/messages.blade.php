<!-- check for flash messages -->
@if (Session::has('flash_error'))
    <div class="message message--error">{{ Session::get('flash_error') }}</div>
    <?php Session::forget('flash_error');?>
@endif
@if (Session::has('flash_notice'))
    <div class="message message--notice">{{ Session::get('flash_notice') }}</div>
    <?php Session::forget('flash_notice');?>
@endif
@if (Session::has('flash_ok'))
    <div class="message message--ok">{{ Session::get('flash_ok') }}</div>
    <?php Session::forget('flash_ok');?>
@endif

