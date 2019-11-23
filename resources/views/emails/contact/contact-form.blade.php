@component('mail::message')
{{-- Tiêu đề: {{$contact->subject}}

Tên : {{$contact->name}}

Email: {{$contact->email}}

Số đt: {{$contact->phone}}

Nội dung tin nhắn: {{$contact->content}}

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
