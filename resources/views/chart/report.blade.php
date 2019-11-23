@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        {!! $order->container() !!}
    </div>
    {!! $order->script() !!}
    <div class="col-md-6">
        {!! $cus->container() !!}
    </div>
    {!! $cus->script() !!}
</div>
@endsection