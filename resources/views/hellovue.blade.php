<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body>
 
 <div id="app">
     <p v-show="seen">@{{message}}</p>
     <input type="text" v-model="message">
     <button v-on:click="reverseMessage">Reverse</button>

     <ol>
         <li v-for="todo in todos">@{{todo.name}} | @{{todo.priority}} | @{{todo.done}}</li>
     </ol>
 </div>
 
 <script src="js/app.js"></script>
</body>
</html>