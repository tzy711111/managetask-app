@extends('tasks.layout')
@section('title', 'Create New Task')
@section('header')
<header class="w3-display-container w3-content" style="max-width:1400px;" id="add">
    <img class="w3-image" src="https://images.unsplash.com/photo-1656998019079-a7f9182c12be?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80" alt="Homepage" 
    style="width:1400px; height:250px;">
    <style>
        img {
            filter: brightness(60%);
        }
    </style>
    <div class="w3-display-middle w3-margin-top w3-margin-left w3-center" style="max-width:1400px;">
        <h1 class="w3-xxxlarge w3-text-white"><span class=" w3-text-light-grey"><b> ADD NEW TASK</b></span></h1>
    </div>
</header>
@endsection

@section('content')
<div class="w3-main w3-content w3-padding w3-center" style="max-width:1500px;margin-top:30px">
  <div style="display:flex; justify-content: center">
      <div class="w3-container w3-card w3-padding w3-margin" style="width:600px;margin:auto;text-align:left;">
            <form action="{{ route('tasks.store') }}" method="post">
              @csrf
              @method('post')
              <label>Title</label><br>
              <!--Set the title field's value to the previously submitted value (if any)-->
              <input type="text" name="title" id="title" class="w3-input w3-round w3-border" value="{{ old('title') }}" placeholder="Title">

              <!--Display an error message if title is empty-->
              @error('title')
                <span style="font-size: smaller; color: red;">{{ $message }}</span>
              @enderror
          
              <br>
              <label>Description</label><br>
              <!--Set the description field's value to the previously submitted value (if any)-->
              <textarea name="description" id="description" placeholder="Desription" class="w3-input w3-round w3-border">{{ old('description') }}</textarea>
              <br>

              
              <label>Due Date</label><br>
              <!--Set the min value to the current date and time (after 1 min) in the Malaysia time zone. User cannot select before current date and time-->
              <!--Set the due date field's value to the previously submitted value (if any)-->
              <input type="datetime-local" name="due_date" id="due_date"  class="w3-input w3-round w3-border" min="{{ now()->addMinute()->timezone('Asia/Kuala_Lumpur')->format('Y-m-d\TH:i') }}" value="{{ old('due_date') }}">
              
              <!--Display an error message if due date is empty-->
              @error('due_date')
                <span style="font-size: smaller; color: red;">{{ $message }}</span>
              @enderror

              <br>
              <div style="display:flex; justify-content: flex-end;">
                <!--Back button-->
                <button class="button back-button" type="button" style="width: 25%;" onclick="window.location.href = '{{ route('tasks.index') }}'">  <i class="fa fa-arrow-left" aria-hidden="true"></i> 
                  <span class="button-text">Back</span></button>

                <!--Save button-->
                <button class="button save-button" type="submit" style="width: 25%;" >  <i class="fa fa-floppy-o" aria-hidden="true"></i>
                  <span class="button-text">Save</span></button>
              </div>
          </form>
      </div>
  </div>
</div>
@endsection