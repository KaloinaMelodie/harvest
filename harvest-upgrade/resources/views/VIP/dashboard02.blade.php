@extends('layouts.sidebar')

@section('dashboard')

<meta http-equiv="Refresh" content="600; url=dashboard02">

<link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/product/">
<link href="{{asset('css/product.css')}}" rel="stylesheet">

    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center div01">
        @include('VIP.lineChart')

    </div>
    <div style="max-width:100%; height: 100%" class="position-relative p-3 p-md-5 m-md-3 text-center div01">
        @include('VIP.pieChart')
    </div>

    <div class="base-section">
        <div class="circle-container">
            <div class="box">
                @include('VIP.circle-count01')
            </div>
        </div>
    </div>

@endsection
