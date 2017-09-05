<form action="" method="post">
    {{ csrf_field() }}

    {{ var_dump($errors->all()) }}

    <input type="text" name="name" placeholder="name">
    <input type="email" name="email" placeholder="email">
    <input type="text" name="cpf" placeholder="cpf">

    <input type="submit" value="enviar">
</form>