<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main page</title>
</head>
<body>
<div id="app">
    <v-header></v-header>
    <main>
        <div class="uk-container">
            <router-view></router-view>
        </div>
    </main>
</div>
<script src="./js/app.js"></script>
</body>
</html>
