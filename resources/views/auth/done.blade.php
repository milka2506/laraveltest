@extends('layouts.app')

@section('content')
<div class="container">
        
<ul class="nav nav-tabs justify-content-end">
  <li class="nav-item">
  <a class="nav-link " href="{{route('home')}}"> All </a>
  </li>
  <li class="nav-item">
  <a class="nav-link active" href="{{route('done')}}"> Done </a>
  </li>
  <li class="nav-item">
  <a class="nav-link " href="{{route('pending')}}"> Pending </a>
  </li>

</ul>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Tasks - Done </div>
                <div class="card-body">
                   <table class="table ">
                   @if($tasks)
                       @foreach ($tasks as $task)
                           <tr>
                               <td>
                                   @if ($task->iscompleted)
                                   <?php $value=$task->id ?>
                                   <input type="checkbox" disabled  data-task={{ $value }} checked value={{ $value }}><label> &nbsp; {{ $task->task }} </label>
                                   @endif
                               </td>
                           </tr>
                       @endforeach
                       @endif
                     
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection