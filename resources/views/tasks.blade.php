<!-- resources/views/tasks.blade.php -->
@extends('layouts.app')

@section('content')

<h1>CRUD <span style="font-size: x-small">Powered by: Laravel</span></h1>

<!-- Create Task Form... -->

<div class="panel panel-default">
    <div class="panel-heading">
        <span style="font-size: 26px">C</span>reate Task
    </div>
    <br>

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="{{ url('task') }}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}

                    <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus-sign"></span> Create Task
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Read Tasks -->
@if (count($tasks) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">
            <span style="font-size: 26px">R</span>ead Task
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-striped table-hover table-condensed">

                <!-- Table Headings -->
                <thead>
                <tr>
                    <th>Task</th>

                </tr>

                </thead>

                <!-- Table Body -->
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <!-- Task Name -->
                        <td class="table-text">
                            <div>{{ $task->name }}</div>
                        </td>

                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif


@if (count($tasks) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">
            <span style="font-size: 26px">U</span>pdate Task
        </div>

        <div class="panel-body">

            <table class="table table-striped table-hover table-condensed">

                <!-- Table Headings -->
                <thead>
                <tr>
                    <th>Task</th>
                    <th></th>
                </tr>

                </thead>

                <!-- Table Body -->
                <tbody>
                @foreach ($tasks as $task)
                    <form action="{{ url('task/'.$task->id.'/edit') }}" method="POST">
                        {!! csrf_field() !!}
                        {!! method_field('PATCH') !!}
                        <tr>
                            <td>
                                {{ $task->name }}
                            </td>

                            <td style="text-align: right">
                                <button type="submit" class="btn btn-warning">
                                    <span class="glyphicon glyphicon-edit"></span> Edit
                                </button>
                            </td>
                        </tr>

                    </form>



                @endforeach
                </tbody>
            </table>


            @foreach($tasks as $task)

            @endforeach
        </div>
    </div>
@endif



<!-- Delete Tasks -->
@if (count($tasks) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">
            <span style="font-size: 26px">D</span>elete Task
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-striped table-hover table-condensed">

                <!-- Table Headings -->
                <thead>
                <tr>
                    <th>Task</th>
                    <th></th>

                </tr>


                </thead>

                <!-- Table Body -->
                <tbody>
                @foreach ($tasks as $task)

                    <tr>
                        <!-- Task Name -->
                        <td class="table-text">
                            <div>{{ $task->name }}</div>
                        </td>


                        <!-- Delete Button -->
                        <td style="text-align: right">
                            <form action="{{ url('task/'.$task->id) }}" method="POST">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}

                                <button type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span> Delete
                                </button>
                            </form>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
@endsection