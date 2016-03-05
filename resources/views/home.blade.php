@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 center-align">
            <h1>Trader's Store</h1>
            <p><small>The place to buy and sell luxury products</small></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Product Listing:</h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Manufacturer</th>
                        <th>Product</th>
                        <th>Price ($)</th>
                        <th>Date Added</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($products))
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->manufacturer }}</td>
                            <td><a href="{{ url('/products/show', [$product->id]) }}">{{ $product->product }}</a></td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->created_at }}</td>
                            <td>
                                <a class="btn btn-default" href="{{ url('/products/show', [$product->id]) }}"><i class="fa fa-pencil fa-md"></i></a>
                                <a class="btn btn-default" href="{{ url('/products/show', [$product->id]) }}"><i class="fa fa-trash fa-md"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Add a Product:</h1>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('/products/store', [Auth::id()]) }}" method="post" role="form" class="form-horizontal">
                {{ csrf_field() }}
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
                        <input type="text" name="product" class="form-control" id="product">
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-md-2 control-label">Price ($): </label>
                    <div class="col-md-10">
                        <input type="number" name="price" id="price" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Description: </label>
                    <div class="col-md-10">
                        <textarea name="description" class="form-control" rows="10"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2 col-md-offset-10 align-right">
                        <button class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
