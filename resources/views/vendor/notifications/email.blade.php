@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('สวัสดี!')
@endif
@endif

{{-- Intro Lines --}}
@lang('คุณได้รับอีเมล์ในการเปลี่ยนรหัสผ่าน')
{{-- @foreach ($introLines as $line)
{{ $line }}

@endforeach --}}

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@lang('ให้คุณ Reset Password เพื่อที่จะสามารถเข้าสู่ระบบได้')
{{-- @foreach ($outroLines as $line)

@endforeach --}}

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('ขอแสดงความนับถือ'),<br>
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "คลิกที่ปุ่ม \":actionText\" หรือคลิกลิงค์ที่นี่เพื่อเปลี่ยนรหัสผ่าน\n".
    ':',
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent
