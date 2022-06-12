@extends('layouts.app2')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>My Dashboard </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('todos.create')}}" title="Create a todo"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>
    

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Task</th>
            <th>Status</th>
            <th>Due</th>
            <th>Date Created</th>
            <th>Actions</th>
        </tr>
        @foreach ($todos as $todo)
        @if (Auth::user()->id==$todo->user_id)
            <tr>
                <td>#{{$loop->iteration}}</td>
                <td>{{$todo->task}}</td>
                <td>{{$todo->completed==0 ? "Incomplete" : "Complete"}}</td>
                <td>{{$todo->due}}</td>
                <td>{{$todo->created_at}}</td>
                <td>
                    <form action="{{route('todos.destroy',$todo)}}" method="POST">

                        <a href="{{route('todos.show',$todo)}}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{route('todos.edit',$todo)}}" title="edit">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endif
        @endforeach
    </table>

    {!! $todos->links() !!}

@endsection