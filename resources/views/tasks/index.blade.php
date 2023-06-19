@extends('tasks.layout')
@section('title', 'Home')
@section('header')
<header class="w3-display-container w3-content" style="max-width:1400px;" id="home">
    <img class="w3-image"
        src="https://images.unsplash.com/photo-1656931251449-07493b9f6caf?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
        alt="Homepage" style="width:1400px; height:250px;">
    <style>
        img {
            filter: brightness(60%);
        }
    </style>
    <div class="w3-display-middle w3-margin-top w3-margin-left w3-center" style="max-width:1400px;">
        <h1 class="w3-xxxlarge w3-text-white"><span class=" w3-text-light-grey"><b>W E L C O M E</b></span></h1>
    </div>
</header>
@endsection
@section('content')

<div class="w3-padding w3-center" style='max-width:1100px; margin:auto'>
    <h2><b>MY TASKS</b></h2><hr />
     <!--Add the new task function-->
    <a href="{{ url('/tasks/create') }}" title="Add New Task" style="font-size: larger;">
        <i class="fa fa-plus" aria-hidden="true"></i> Add New Task
    </a>
        <!--Table for display all the tasks-->
        <table class="w3-table w3-striped w3-bordered w3-margin-top">
            <thead>
                <tr>
                    <th style="width: 5%;">#</th>
                    <th style="width: 15%;">Title</th>
                    <th style="width: 30%;">Description</th>
                    <th style="width: 25%;">
                        Due Date
                         <!--Sort the data based on the due date and direction (ascending / descending)-->
                        <a href="{{ route('tasks.index', ['sort' => 'due_date', 'direction' => 'asc']) }}">&#9650;</a>
                        <a href="{{ route('tasks.index', ['sort' => 'due_date', 'direction' => 'desc']) }}">&#9660;</a>
                    </th>
                    <th style="width: 25%;">Actions</th>
                </tr>
            </thead>
            
            <tbody>

                <!-- Loop all the tasks -->
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                         <!-- Display the task title as a link to the task details page -->
                        <td>
                            <div style="max-height: 65px; overflow: auto;">
                            <a href="{{ route('tasks.show', ['id' => $task->id]) }}" style="color: blue; font-weight: bold;">{{ $task->title }}</a>
                           </div>
                        </td>

                     
                        <td>
                            <div style="max-height: 65px; overflow: auto;">
                            @if ($task->description)
                                {{ $task->description }}
                             <!--Display "Add a description..." sentence instead of blank if description is null-->
                            @else
                                <span style="color: #999;">Add a description...</span>
                            @endif
                             </div>
                        </td>

                        <td>
                        {{ $task->due_date }}    

                        @php
                            // Convert the due_date to date and time in the Malaysian time zone
                            $dueDate = new DateTime($task->due_date, new DateTimeZone('Asia/Kuala_Lumpur'));
                            // Get today's date and time in the Malaysian time zone
                            $today = new DateTime('now', new DateTimeZone('Asia/Kuala_Lumpur'));
                        @endphp

                        <!--Display "Overdue" message if task is expired-->
                        @if ($dueDate < $today)
                            <span style="color: green; font-weight: bold;">(Overdue)</span>
                        <!--Display "Due Today" message if task's due date is today-->
                        @elseif ($dueDate->format('Y-m-d') === $today->format('Y-m-d'))
                            <span style="color: red; font-weight: bold;">(Due Today)</span>
                        @endif
                    </td>
                        
                    <td>
                         <!--Edit button-->
                        <button class="button edit-button" style="width: 40%;" onclick="window.location.href = '{{ route('tasks.edit', ['id' => $task->id]) }}'">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            <span class="button-text">Edit</span>
                        </button>

                        <!--Delete button-->
                        <form method="POST" action="{{ route('tasks.destroy', ['id' => $task->id]) }}" accept-charset="UTF-8" style="display:inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="button delete-button" style="width: 40%;" title="Delete Task" onclick="return confirm(&quot;Are you sure you want to delete this task?&quot;)">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                <span class="button-text">Delete</span>
                            </button>
                        </form>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

             <!--Displays "No tasks available at the moment." message when there are no tasks.-->
            @if($tasks->isEmpty())
            <h4>No tasks available at the moment.</h4>
        @endif
    </div>
@endsection