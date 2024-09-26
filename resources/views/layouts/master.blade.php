<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- link--}}
    <link rel="stylesheet" href="{{asset('vendor/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('js/angular.min.js')}}"></script>
    <script src="{{asset('vendor/toastr/toastr.min.js')}}"></script>
    <title>@yield('title', 'Bike shop')</title>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-default navbar-static-top" style="background-color: white">
            <div class="navbar-header">
                <a href="/" class="navbar-brand">Bike shop</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{ URL::to('home') }}">หน้าแรก</a></li>
                    <li><a href="{{ URL::to('product')}}">ข้อมูลสินค้า</a></li>
                    <li><a href="{{ URL::to('category')}}">ข้อมูลรายการสินค้า</a></li>
                    <li><a href="/">รายงาน</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ URL::to('cart/view')}}">
                            <i class="fa fa-shopping-cart"></i> 
                            ตะกร้า
                            <span class="label label-danger">
                                {{-- check if not have product in cart --}}
                                @if (Session::has('cart_items') != '')
                                    {!! count(Session::get('cart_items')) !!}
                                @else
                                    {!! count(array()) !!}
                                @endif
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>  
    </div>
    {{-- <h1 style="text-align: center">นายนฤนาท คามวารี 6506021611076</h1> --}}
    @yield('content')
    @if(session('msg'))
        @if(session('ok'))
            <script>toastr.success("{{ session('msg') }}")</script>
        @else
            <script>toastr.error("{{ session('msg') }}")</script>
        @endif
    @endif
    {{-- link --}}
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>