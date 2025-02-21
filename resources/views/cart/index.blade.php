@extends("layouts.master") @section('title') BikeShop | ตะกร้าสินค้า @stop
@section('content')
<div class="container">
    <h1>สินค้าในตะกร้า</h1>
    <div class="breadcrumb">
        <li><a href="{{ URL::to('home') }}"><i class="fa fa-home"></i> หน้าร้าน</a></li>
        <li class="active">สินค้าในตะกร้า</li>
    </div>
    <div class="panel panel-default">
        @if($cart_items != '' ? count($cart_items) : '0')
            <?php $sum_price = 0 ?>
            <?php $sum_qty = 0 ?>

            <table class="table bs-table">
                <thead class="bg-primary">
                    <tr>
                        <th>รูปสินค้า </th>
                        <th>รหัส</th>
                        <th>ชื่อสินค้า </th>
                        <th style="text-align: center">จํานวน</th>
                        <th>ราคา</th>
                        <th width="50px"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart_items as $c)
                        <tr>
                            <td><img src="{{ asset($c['image_url']) }}" height="36"></td>
                            <td>{{ $c['code'] }}</td>
                            <td>{{ $c['name'] }}</td>
                            <td align="center"><input style="width: 70px; text-align:center;" type="number" class="form-control" value="{{ $c['qty'] }}" onChange="updateCart({{$c['id']}}, this)"></td>
                            <td>{{ number_format($c['price'], 0) }}</td>
                            <td>
                                <a href="{{ URL::to('cart/delete/'.$c['id']) }}" class="btn btn-danger">
                                <i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        <?php $sum_price += $c['price'] * $c['qty'] ?>
                        <?php $sum_qty += $c['qty'] ?>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">รวม</th>
                        <th style="text-align: center">{{ number_format($sum_qty, 0) }}</th>
                        <th>{{ number_format($sum_price, 0) }}</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>                
        @else
            <div class="panel-body"><strong>ไม่พบรายการสินค้า !</strong></div>
        @endif
    </div>
    <!-- buttons -->
    <a href="{{ URL::to('/home') }}" class="btn btn-default">ย้อนกลับ </a>
    <div class="pull-right">
        <a href="{{ URL::to('cart/checkout') }}" class="btn btn-primary">ชําระเงิน <i class="fa fa-chevron-right"></i></a>
    </div>
</div>
@endsection

<script>
    function updateCart(id, qty) {
        if(qty.value == '') {
            qty.value = 1;
        }
        window.location.href = '/cart/update/' + id + '/' + qty.value;
    }
</script>