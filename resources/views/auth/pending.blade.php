@extends('layouts.app')

@section('content')
<div class="container">
<ul class="nav nav-tabs justify-content-end">
  <li class="nav-item">
    <a class="nav-link " href="{{route('home')}}"> All </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{route('done')}}"> Done </a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{route('pending')}}"> Pending </a>
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
                <div class="card-header">Pending Tasks</div>
                <div class="card-body">
                   <table class="table table-striped">
                   @if($tasks)
                       @foreach ($tasks as $task)
                           <tr>
                               <td>
                                   @if ($task->iscompleted)
                                   <?php $value=$task->id ?>
                                   <input type="checkbox"  data-task={{ $value }} checked value={{ $value }}><label> &nbsp; {{ $task->task }} </label>
                                       
                                   @else
                                   <?php $value=$task->id ?>
                                   <input type="checkbox" data-task={{ $value }} value={{ $value }}><label> &nbsp; {{ $task->task }}</label>
                                   @endif
                               </td>
                           </tr>
                       @endforeach
                       @endif
                     
                   </table>

                 
                </div>
            </div>

            <!-- new task -->          
            <div class="card card-new-task">
                <div class="card-header">New Task</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tasks.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input id="title" name="title" type="text" maxlength="255" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" autocomplete="off" />
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                
                </div>
            </div>
            <!--  -->
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).on('change','input[type=checkbox]',function(){
    var id = $(this).data('task');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
        url: 'tasks/update/'+$(this).data('task'),
        method: 'POST',
        success: function(data) {
            location.reload();
       },
    })               
   })

</script>
@endsection