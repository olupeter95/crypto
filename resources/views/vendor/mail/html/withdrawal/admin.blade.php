@component('mail::layout')
{{-- Header --}}
@component('mail::header', ['url' => config('app.url')])
{{ config('app.name') }}
@endcomponent

<p>
    <strong> Hello Admin !</strong>
</p><br>
<div>
    A new withdrawal order by <strong>"{{ $details['name'] }}"</strong> has been placed on Coinshape.<br>
    To view the withdrawal order, please click on the button below
</div>
<table class="action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="center">
<table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="center">
<table border="0" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td>
<a href="{{ $details['url'] }}" class="button button-{{ $color ?? 'primary' }}" target="_blank" rel="noopener">Withdrawal Request</a>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>

@lang('Regards'),<br>
{{ config('app.name') }}


@component('mail::subcopy')
{{ "Have any questions? Send us a mail at support@coinshape.com" }}
@endcomponent


{{-- Footer --}}
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
@endcomponent
