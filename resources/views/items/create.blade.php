@extends('items.layout')
 
@section('content')
    <div class="card mt-5">
         <div class="card-header">
            <div class="col-md-12">
                <h4 class="card-title"><strong>Create - </strong> Bid Contract  
                  <a class="btn btn-success ml-5" href="{{ route('items.index') }}">Back</a>
                </h4>
            </div>
         </div>
         <div class="card-body">
           @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
               
            <form action="{{ route('items.store') }}" method="POST">
                @csrf
              
                 <div class="row">
              
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Port:</strong>
                            <input type="text" name="port" class="form-control" placeholder="Port">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Factory:</strong>
                            <!-- <input type="text" name="factory" class="form-control" placeholder="Factory"> -->
                        <select name="factory" class="form-control">
						<option value="">Select Factory</option>
						<option>Factory A</option>
						<option>Factory B</option>
						<option>Factory C</option>
					    </select>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Price:</strong>
                            <input type="number" name="price" class="form-control" placeholder="Price">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Quantity:</strong>
                            <input type="text" name="quantity" class="form-control" placeholder="Quantity">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Good For:</strong>
                            <input type="number" name="duration" class="form-control" placeholder="Time in mnts">
                        </div>
                    </div>
 
                    <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </div>
                </div>
            </form>
        </div>
@endsection