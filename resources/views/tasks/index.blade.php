@extends('layouts.app')

@section('content')

    <div class="panel-body">
        @include('common.errors')

        {!! Form::open(['route' => 'tasks']) !!}

            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label"> @lang('tasks.task') </label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">

                    {!! Form::submit(trans('tasks.add_task')) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>

    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('tasks.current_task')
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <thead>
                        <th>@lang('tasks.task')</th>
                        <th>&nbsp;</th>
                    </thead>

                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>

                                <td>

                                    {{ Form::open(['method' => 'DELETE', 'route' => ['tasks.destroy', $task->id]]) }}
                                        {{ Form::submit(trans('tasks.delete'), ['class' => 'btn btn-danger']) }}
                                    {{ Form::close() }}

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection
