<!-- resources/views/tasks.blade.php -->
@extends('add')

@section('content')

<!-- Bootstrap шаблон... -->

<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('errors')

    <!-- Форма новой задачи -->
    <form action="{{ url('tasks/add') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- имя задачи -->
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Задача</label>

            <div class="col-sm-6">
                <input type="text" name="title" id="tasks-title" class="form-control">
            </div>
        </div>

        <!-- Кнопка добавления задачи -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Добавить задачу
                </button>
            </div>
        </div>
    </form>
</div>

<!-- TODO: Текущие задачи -->
@endsection
