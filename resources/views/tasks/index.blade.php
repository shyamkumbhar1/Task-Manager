@extends('tasks.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Task Manager</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('tasks.create') }}"> Create New Task</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Description</th>
            <th>Due Date</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($tasks as $task)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $task->title }}</td>
            <td>{{ $task->description }}</td>
            <td>{{ $task->due_date }}</td>

            <td>
                <input data-id="{{$task->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Completed" data-off="Incompleted" {{ $task->status ? 'checked' : '' }}>
             </td>
            <td>
                <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('tasks.show',$task->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('tasks.edit',$task->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $tasks->links() !!}

@endsection
@section('script')
$(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var id = $(this).data('id');
        console.log(id);

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeStatus',
            data: {'status': status, 'id': id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })

@endsection
