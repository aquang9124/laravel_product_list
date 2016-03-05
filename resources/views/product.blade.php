@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="center-align">{{ $product['product'] }}</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<form action="{{ url('/products/update', [$product['id']]) }}" method="post" role="form" class="form-horizontal">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label class="control-label col-md-2">Manufacturer/Brand: </label>
                    <div class="col-md-10">
                        <select class="form-control" name="manufacturer">
                            <option value="Kenneth Cole">Kenneth Cole</option>
                            <option value="Gap">Gap</option>
                            <option value="Rudy Project">Rudy Project</option>
                            <option value="Samsung">Samsung</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="product" class="col-md-2 control-label">Product Name: </label>
                    <div class="col-md-10">
                        <input type="text" name="product" class="form-control" id="product" value="{{ $product['product'] }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-md-2 control-label">Price ($): </label>
                    <div class="col-md-10">
                        <input type="number" name="price" id="price" class="form-control" value="{{ $product['price'] }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Description: </label>
                    <div class="col-md-10">
                        <textarea name="description" class="form-control" rows="10">{{ $product['description'] }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2 col-md-offset-10 align-right">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<form action="/products/delete/{{ $product['id'] }}" method="post" role="form" id="deletion">
	            {{ csrf_field() }}
	            <input type="hidden" name="_method" value="DELETE">
	            <div class="form-group align-right">
			            <button class="btn btn-danger">Delete</button>
		        </div>
	        </form>
	    </div>
	</div>
</div>
@endsection