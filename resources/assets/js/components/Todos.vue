<style>

</style>
<template>
    <div>
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Tasques</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Task</th>
                        <th>Priority</th>
                        <th>Done</th>
                        <th>Progress</th>
                        <th style="width: 40px">Label</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(todo, index) in todos">
                        <td>{{index}}</td>
                        <td>{{todo.name}}</td>
                        <td>{{todo.priority}}</td>
                        <td>{{todo.done}}</td>
                        <td>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                            </div>
                        </td>
                        <td><span class="badge bg-red">55%</span></td>
                    </tr>
                    </tbody>

                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                message: 'Hola que tal',
                seen: false,
                todos: [],
            }
        },
        created() {
            console.log('Component todolist created.');
            this.fetchData();
        },
        methods: {
            reverseMessage: function() {
                this.message = this.message.split('').reverse().join('');
            },
            fetchData: function() {
                // GET /someUrl
                this.$http.get('/api/v1/task').then((response) => {
                    console.log(response);
                    this.todos = response.data.data;
                }, (response) => {
                    // error callback
                    sweetAlert("Oops...", "Something went wrong!", "error");
                    console.log(response);
                });
            }
        }
    }
</script>
