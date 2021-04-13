@extends('items.layout')
 
@section('content')
    <div class="card mt-5">
         <div class="card-header">
            <div class="col-md-12">
                <h4 class="card-title"><strong>Edit - </strong> Bid Contract  
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
               
            <form action="{{ route('items.update',$item->id) }}" method="POST">
                @csrf
                @method('PUT')
                 <div class="row">


                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Port:</strong>
                            <input type="text" name="port"  value="{{ $item->port }}" class="form-control" placeholder="Port">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Factory:</strong>
                        <select name="factory" class="form-control">
						<option value="">Select Factory</option>
						<option <?php if($item->factory=="Factory A"){echo "selected";}?>>Factory A</option>
                        <option <?php if($item->factory=="Factory B"){echo "selected";}?>>Factory B</option>
                        <option <?php if($item->factory=="Factory C"){echo "selected";}?>>Factory C</option>
					    </select>
					   

                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Price:</strong>
                            <input type="number" name="price"  value="{{ $item->price }}" class="form-control" placeholder="Price">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Quantity:</strong>
                            <input type="text" name="quantity"  value="{{ $item->quantity }}" class="form-control" placeholder="Quantity">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Good For:</strong>
                            <input type="number" name="duration"  value="{{ $item->duration }}" class="form-control" placeholder="Time in mnts">
                        </div>
                    </div>
                
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
@endsection