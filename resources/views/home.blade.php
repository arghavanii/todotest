@extends('layouts.app')

@section('content')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<div class="container">
    <div class="row">
        
         <div class="col-4">
         <h1 classs="title_todo"> Todo Lists </h1>
    <div class="list-group" id="list-tab" role="tablist">
    @foreach ($record as $rec)
     
     
      <a class="list-group-item list-group-item-action" id="list-{{$rec->id}}-list" data-toggle="list" href="#list-{{$rec->id}}" role="tab" aria-controls="{{$rec->id}}"><p  class="pull-right  todostatus">status :  {{$rec->status}}</p> {{ $rec->title }}</a>
      @endforeach
    </div>
</div>

 
  <div class="col-8">
   <div class="tab-content" id="nav-tabContent">
@foreach ($record as $rec)

  @php $tasks = App\todolist::find($rec->id)->task @endphp
 
 <div class="tab-pane fade " id="list-{{$rec->id}}" role="tabpanel" aria-labelledby="list-{{$rec->id}}-list">
     @foreach ( $tasks as $task )

   
      <div class="list-group">
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
    <div class="d-flex w-100 justify-content-between">
      <h2 class="mb-1">title :  {{$task->title}}</h2>
     
    </div>
    <p class="mb-1">describe : {{$task->description}}</p>
    <p class="pull-right task_status"> status : {{$task->status}}</p>
  </a>
  
     </div>
      
    @endforeach
</div> 
     
    
    @endforeach
 </div>
      </div>

</div>
</div>
@endsection
