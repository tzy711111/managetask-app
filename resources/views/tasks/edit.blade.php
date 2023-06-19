@extends('tasks.layout')
@section('title', 'Edit Task - ' . $task->title)
@section('header')
<header class="w3-display-container w3-content" style="max-width:1400px;" id="edit">
    <img class="w3-image" src="https://images.unsplash.com/photo-1656964503364-7de7a776bbdd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" alt="Homepage" 
    style="width:1400px; height:250px;">
    <style>
        img {
            filter: brightness(60%);
        }
    </style>
    <div class="w3-display-middle w3-margin-top w3-margin-left w3-center" style="max-width:1400px;">
        <h1 class="w3-xxxlarge w3-text-white"><span class=" w3-text-light-grey"><b> EDIT TASK</b></span></h1>
    </div>
</header>
@endsection
@section('content')
<div class="w3-main w3-content w3-padding w3-center" style="max-width:1500px;margin-top:30px">
  <div style="display:flex; justify-content: center">
      <div class="w3-container w3-card w3-padding w3-margin" style="width:600px;margin:auto;text-align:left;">
            <form action="{{ route('tasks.update', ['id' => $task->id]) }}" method="post">
              @csrf
              @method('PUT')
              <input type="hidden" name="id" value="{{ $task->id }}">
              <label>Title</label><br>
               <!--Set the title field's value to the previously submitted value (if any), or pre-filled with the current task's title value.-->
              <input type="text" name="title" id="title" class="w3-input w3-round w3-border" value="{{ old('title', $task->title) }}" placeholder="Title">

              <!--Display an error message if title is empty-->
              @error('title')
                <span style="font-size: smaller; color: red;">{{ $message }}</span>
              @enderror
          
              <br>
              <label>Description</label><br>
               <!--Set the description field's value to the previously submitted value (if any), or pre-filled with the current task's description value.-->
              <textarea name="description" id="description" placeholder="Desription" class="w3-input w3-round w3-border">{{ old('description', $task->description) }}</textarea>
              <br>

              
              <label>Due Date</label><br>
              <!--Set the min value to the current date and time (after 1 min) in the Malaysia time zone. User cannot select before current date and time-->
              <!--Set the due date field's value to the previously submitted value (if any), or pre-filled with the current task's due date value.-->
              <input type="datetime-local" name="due_date" id="due_date"  class="w3-input w3-round w3-border"  min="{{ now()->addMinute()->timezone('Asia/Kuala_Lumpur')->format('Y-m-d\TH:i') }}"  value="{{ old('due_date', $task->due_date)}}">
              
              <!--Display an error message if due date is empty-->
              @error('due_date')
                <span style="font-size: smaller; color: red;">{{ $message }}</span>
              @enderror

              <br>
               <!--Save button-->
              <button class="button save-button"  style="width: 25%;  float: right; "type="submit"  value="Update"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                <span class="button-text">Save</span></button>
               <!--Back button-->
              <button class="button back-button" style="width: 25%;  float: right; " type="button" onclick="window.history.back();"><i class="fa fa-arrow-left" aria-hidden="true"></i> 
                <span class="button-text">Back</span></button>
            </form>
          </div>
  </div>
</div>
@endsection
