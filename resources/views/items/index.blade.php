
@extends('items.layout')
 
@section('content')
    <div class="card mt-5">
         <div class="card-header">
            <div class="col-md-12">
                <h4 class="card-title"> Bid Contract  
                  <a class="btn btn-success ml-5" href="{{ route('items.create') }}" id="createNewItem"> Create New Item</a>
                </h4>
            </div>
         </div>
         <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered">
                <tr>
                    <th width="5%">No</th>
                    <th>Port</th>
                    <th>Price</th>
                    <th width="20%">Action</th>
                </tr>
                @foreach ($items as $item)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $item->port }}</td>
                    <td><span class="input-group-addon">$</span>  {{ $item->price }}</td>
                    <td>
                        <form action="{{ route('items.destroy',$item->id) }}" method="POST">
                            <a class="btn btn-info btn-sm" href="{{ route('items.show',$item->id) }}">Show</a>
                            <a class="btn btn-primary btn-sm" href="{{ route('items.edit',$item->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
@endsection