<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <!-- Styles -->
</head>
<body>
<div id="app">
    <div class="container">
        <h3 class="mt-5">Todo 管理システム</h3>

        <div class="form-group mt-4">
            <label for="todo">新規Todo</label>
            <input type="text" class="form-control" id="todo" v-model="newTodo">
        </div>

        <button type="submit" class="btn btn-primary" v-on:click="addTodo">登録</button>

        <table class="table mt-5">
            <thead>
            <th>ID</th><th>タスク</th><th>完了</th>
            </thead>
            <tbody>
            {{--<p>@{{ todos }}</p>--}}
            <tr v-for="todo in todos" v-bind:key="todos">
                <td>@{{todo.id}}</td>
                <td>@{{todo.title}}</td>
                <td><button class="btn btn-secondary" v-on:click="deleteTodo(todo.id)">完了</button></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- avaScript -->
<script src="{{ asset('js/app.js')}}"></script>
</body>
</html>
