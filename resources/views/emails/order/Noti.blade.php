@component('mail::message')

Một đơn hàng mới vừa được tạo

Khách hàng: {{$cus['name_customer']}}

Số điện thoại: {{$cus['phone']}}
<?php
    $prov = DB::table('province')->where('provinceid', $cus['province'])->first();
    $dis = DB::table('district')->where('districtid', $cus['district'])->first();
?>

Địa chỉ: {{$cus['address']}}, {{$dis->name}}, {{$prov->name}}

Email: {{$cus['email']}}

<!--@component('mail::button', ['url' => ''])-->
<!--Button Text-->
<!--@endcomponent-->

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Khối lượng</th>
      <th scope="col">Giá</th>
    </tr>
  </thead>
  <tbody>
    @foreach(Cart::content() as $item)
    <tr>
      <td>{{$item->name}}</td>
      <td align="right">{{$item->qty}}</td>
      <td align="right">{{$item->weight}}</td>
      <td align="right">{{$item->price}}</td>
    </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <td>Tổng tiền:</td>
      <td align="right">{{Cart::total(0)}}</td>
    </tr>
  </tfoot>
</table>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
