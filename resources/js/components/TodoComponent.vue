<template>
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
            <!--<p>{{ todos }}</p>-->
            <tr v-for="todo in todos" v-bind:key="todos">
                <td>{{todo.id}}</td>
                <td>{{todo.title}}</td>
                <td><button class="btn btn-secondary" v-on:click="deleteTodo(todo.id)">完了</button></td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                todos: [],
                newTodo: ''
            }
        },
        methods: {
            fetchTodos: function () {
                axios.get('/api/todo').then((res) => {
                    this.todos = res.data['data'];
                });
            },
            addTodo: function () {
                axios.post('/api/todo', {
                    title: this.newTodo
                }).then((res) => {
                    this.newTodo = '';
                    this.fetchTodos();
                });
            },
            deleteTodo: function (targetId) {
                axios.delete('/api/todo/' + targetId).then((res) => {
                    this.fetchTodos();
                })

            }
        },
        created() {
            this.fetchTodos();
        }
    }
</script>

<style scoped>

</style>
