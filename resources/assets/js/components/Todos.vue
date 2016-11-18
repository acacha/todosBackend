<template>
    <div>
        <p v-show="seen">{{message}}</p>
        <input type="text" v-model="message">
        <button v-on:click="reverseMessage">Reverse</button>

        <ol>
            <li v-for="todo in todos">{{todo.name}} | {{todo.priority}} | {{todo.done}}</li>
        </ol>
    </div>
</template>
<style>

</style>
<script>
    export default {
        created() {
            console.log('Component todolist created.')
        }
    }
</script>
