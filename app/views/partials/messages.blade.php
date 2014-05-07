<!-- check for flash messages -->
@if (Session::has('flash_error'))
    <div class="message message--error">{{ Session::get('flash_error') }}</div>
@endif
@if (Session::has('flash_notice'))
    <div class="message message--notice">{{ Session::get('flash_notice') }}</div>
@endif
@if (Session::has('flash_ok'))
    <div class="message message--ok">{{ Session::get('flash_ok') }}</div>
@endif