@component('mail::message')
Người dùng mới vừa đăng ký

{{$news->email}}

<!--@component('mail::button', ['url' => ''])-->
<!--Button Text-->
<!--@endcomponent-->

Thanks,<br>
{{ config('app.name') }}
@endcomponent
