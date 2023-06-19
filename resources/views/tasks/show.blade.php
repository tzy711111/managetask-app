@extends('tasks.layout')
@section('title', 'Task - ' . $task->title)
@section('header')
<header class="w3-display-container w3-content" style="max-width:1400px;" id="add">
    <img class="w3-image" src="https://images.unsplash.com/photo-1656872626959-d40665207e18?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" alt="Homepage" 
    style="width:1400px; height:250px;">
    <style>
        img {
            filter: brightness(60%);
        }
    </style>
    <div class="w3-display-middle w3-margin-top w3-margin-left w3-center" style="max-width:1400px;">
        <h1 class="w3-xxxlarge w3-text-white"><span class=" w3-text-light-grey"><b> TASK DETAILS</b></span></h1>
    </div>
</header>
@endsection
@section('content')


<div class="w3-main w3-content w3-padding w3-center" style="max-width:1500px;margin-top:30px">
  <div style="display:flex; justify-content: center">
      <div class="w3-container w3-card w3-padding w3-margin" style="width:600px;margin:auto;text-align:left;">
              <label>Title</label><br>
              <input type="text" name="title" id="title" class="w3-input w3-round w3-border" value="{{ $task->title }}" placeholder="Title" disabled>

              <br>
              <label>Description</label><br>
              <textarea name="description" id="description" placeholder="Desription" class="w3-input w3-round w3-border" disabled>{{ $task->description }}</textarea>
              <br>

              
              <label>Due Date</label><br>
              <input type="datetime-local" name="due_date" id="due_date"  class="w3-input w3-round w3-border" min="{{ now()->timezone('Asia/Kuala_Lumpur')->format('Y-m-d\TH:i') }}" value="{{ $task->due_date }}" disabled>

              <br>

               <!--Delete button-->
              <form method="POST" action="{{ route('tasks.destroy', ['id' => $task->id]) }}" accept-charset="UTF-8" style="display:inline">
                @method('DELETE')
                @csrf
                <button type="submit"  style="width: 25%;  float: right; " class="button delete-button" title="Delete Task" onclick="return confirm(&quot;Are you sure you want to delete this task?&quot;)">
                  <i class="fa fa-trash-o" aria-hidden="true"></i>
                  <span class="button-text">Delete</span>
                </button>
              </form> 

              <!--Edit button-->
              <button class="button edit-button"  style="width: 25%;  float: right; "type="button" onclick="window.location.href = '{{ route('tasks.edit', ['id' => $task->id]) }}'">  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                <span class="button-text">Edit</span></button>

              <!--Back button-->
              <button class="button back-button" style="width: 25%;  float: right; " type="button" onclick="window.location.href = '{{ route('tasks.index') }}'"><i class="fa fa-arrow-left" aria-hidden="true"></i> 
                <span class="button-text">Back</span></button>
      </div>
  </div>
</div>
@endsection



