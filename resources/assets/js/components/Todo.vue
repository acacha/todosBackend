<style>

</style>
<template>
    <tr>
        <td>{{index + from }}</td>
        <td>
            <template v-if="!editing">
                <span @dblclick="edit">{{todo.name}}</span>
            </template>
            <input v-model="todo.name" v-show="editing" @keyup.esc="unedit" @keyup.enter="save"> <i class="fa fa-fw fa-edit" v-show="!editing" @click="edit"></i> <i class="fa fa-fw fa-check" @click="save" v-show="editing"></i> <i class="fa fa-fw fa-close" v-show="editing" @click="unedit"></i>
        </td>
        <td>{{todo.priority}}</td>
        <td>{{todo.done}}</td>
        <td>
            <div class="progress progress-xs">
                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
            </div>
        </td>
        <td><span class="badge bg-red">55%</span></td>
        <td>
            <span class="btn btn-md btn-info">
                <i class="fa fa-fw fa-edit" @click="edittodo"></i>
            </span>
            <span class="btn btn-md btn-danger">
                <i class="fa fa-fw fa-trash" @click="deletetodo(index)"></i>
            </span>
        </td>
    </tr>
</template>
<script>

export default {
    props: ['todo','index','from'],

    data() {
        return {
            editing: false
        }
    },
    created() {
        console.log('Component todo created.');
    },
    methods: {
        hello: function() {
            console.log('hello');
        },
        edit: function() {
            this.editing=true;
        },
        unedit: function() {
            this.editing=false;
        },
        save: function() {
            this.editing=false;
        },
        edittodo: function() {
            console.log('TODO editing');
        },
        deletetodo: function(index) {
            console.log('Deleting todo');
            this.$emit('todo-deleted',index);
        },
    }
}
</script>
