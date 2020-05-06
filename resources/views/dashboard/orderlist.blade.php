@extends('layouts.public')

@section('content')
  @include('layouts.header')
<div class="container">
  <div class="col-lg-12 mtext"><span><b style="color:#363636;">Orders</b></span></div>

        <table class="table table-striped">
        <thead>
        <tr>
        <th scope="col">Order ID</th>
        <th scope="col">Delivery Address</th>
        <th scope="col">Grand Total</th>
        <th scope="col">Payment Type</th>
        <th scope="col">Status</th>
        <th scope="col">Orders Date</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($orders as  $value )
        <tr>
        <th scope="row">YUM{{$value->id}}</th>
        <td>{{$value->delivery_address}}<br><span>Mobile:&nbsp;</span>{{$value->mobile}}</td>
        <td>€&nbsp;{{$value->grand_total}}</td>
        <td>{{$value->payment_type}}</td>
        <td>
          @if($value->status=='')
          <span style="color:red;">Order inComplete</span>
        @else
          {{$value->status}}
        @endif
        </td>
        <td>{{$value->created_at}}</td>
        </tr>
        @endforeach
        </tbody>
        </table>
</div>
@endsection
