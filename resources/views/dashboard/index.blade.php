@extends('layouts.public')

@section('content')
  @include('layouts.header')
<div class="container">


  <div class="row justify-content-around margin_login">

    <a href="/addproduct" class="col-5 btn btn-info" >
      <div><i class="fa fa-plus">&nbsp;</i>ADD Products</div>
    </a>


    <a href="/orderlist" class="col-5 btn btn-danger">
      <div><i class="fa fa-eye">&nbsp;</i>View Orders</div>
    </a>

  </div>
</br>
  <table class="table table-striped">
  <thead>
  <tr>
  <th scope="col">Sl.no.</th>
  <th scope="col">Product Category</th>
  <th scope="col">Product Name</th>
  <th scope="col">Product Description</th>
  <th scope="col">Price in Dollar</th>
  <th scope="col">Price in Euro</th>
  </tr>
  </thead>
  <tbody>
    @foreach ($products as  $value )
  <tr>
  <th scope="row">{{$no++}}</th>
  <td>
     @if($value->product_category=='veg')
    <span style="color:Green;">Veg Pizza</span>
  @elseif($value->product_category=='nonveg')
    <span style="color:red;">Non-Veg Pizza</span>
    @else
    <span style="color:red;">Drinks</span>
  @endif
</td>
  <td>{{$value->product_name}}</td>
  <td>{{$value->product_description}}</td>
  <td>
    $&nbsp;{{$value->product_price_dollar}}
  </td>
  <td>€&nbsp;{{$value->product_price_euro}}</td>
  </tr>
  @endforeach
  </tbody>
  </table>

</div>
@endsection
