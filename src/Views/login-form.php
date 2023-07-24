<?php
require_once __DIR__ . '/open-html.php'; ?>

<div id="form" method="POST">
    <h1>Login</h1>
    <p>preencha o formulário abaixo para realizar o login:</p>
    
    <form method="POST">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    
        <label for="password">Senha</label>
        <input type="password" name="password" id="password">
    
        <input class="button"  type="submit" value="Entrar">
    </form>
</div>

<?php require_once __DIR__ . '/close-html.php'; ?>