@extends('items.layout')
 
@section('content')
    <div class="card mt-5">
         <div class="card-header">
            <div class="col-md-12">
                <h4 class="card-title"><strong>Show - </strong> Bid Contract  
                  <a class="btn btn-success ml-5" href="{{ route('items.index') }}">Back</a>
                </h4>
            </div>
         </div>
         <div class="card-body">
           <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Port : </strong>
                        <strong style="color:#007bff;">{{ $item->port }}</strong>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-1">
                    <div class="form-group">
                        <strong>Price:</strong>
                        <strong style="color:#007bff;"><span class="input-group-addon">$</span>  {{ $item->price }}</strong>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-1">
                    <div class="form-group">
                        <strong>Factory:</strong>
                        <strong style="color:#007bff;">{{ $item->factory }}</strong>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-1">
                    <div class="form-group">
                        <strong>Quantity:</strong>
                        <strong style="color:#007bff;">{{ $item->quantity }}</strong>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-1">
                    <div class="form-group">
                        <strong>Good For:</strong>
                        <strong style="color:#007bff;">{{ $item->duration }} MINS</strong>
                    </div>
                </div>
            </div>
        </div>
@endsection