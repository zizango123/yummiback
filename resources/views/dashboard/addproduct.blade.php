@extends('layouts.public')

@section('content')
  @include('layouts.header')
<div class="container">
  @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

  <div class="col-lg-12 mtext"><span><b style="color:#363636;">ADD Product</b></span></div>
<hr>
  <div class="row justify-content-around">
      {{ Form::open( array('url' => action('PageController@store'), 'files'=>true,'method'=>'post') ) }}
      @csrf
    <select class="custom-select custom-select-lg mb-3" name="category" id="category">
        <option>Select Product Category</option>
        <option value="veg">Veg Pizza</option>
        <option value="nonveg">Non Veg Pizza</option>
        <option value="drinks">Drinks</option>
    </select>
    <label>Product Image</label>
    {!! Form::file('image_1'); !!}

    <div class="text-left">Product Name</div>
      <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name">


        <label>Product Description</label>
        <textarea class="form-control" rows="5" name="description" id="description"></textarea>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Product Price in&nbsp;&#36;</label>
                <input type="text" name="price_dollar" id="price_dollar" class="form-control" placeholder="Price in $">
            </div>
            <div class="form-group col-md-6">
        <label>Product Price in&nbsp;&#128;</label>
        <input type="text" name="price_euro" id="price_euro" class="form-control" placeholder="Price in €">
      </div>
    </div>
        </br>
          <button type="submit" class="btn btn-primary">Submit</button>

      {!! Form::close() !!}


  </div>

</div>
@endsection
