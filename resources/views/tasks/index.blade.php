@extends('layouts.app')

@section('content')


    <h1>タスクリスト</h1>

    @if (count($tasks) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>ステータス</th>
                    <th>タスク</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <?php $user = $task->user; ?>
                    <tr>
                        @if (Auth::id() == $task->user_id)
                        <td>

                            {!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}

                        </td>
                        <td>{{ $task->status }}</td>
                        <td>{{ $task->content }}</td>
                        @endif    
                        </tr>
                @endforeach
            </tbody>
        </table>
    @endif

     {!! link_to_route('tasks.create', '新規タスクの作成', null, ['class' => 'btn btn-primary']) !!}

@endsection