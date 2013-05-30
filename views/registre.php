<div id="register-cont">
    Registra't!<br>
    <form id="register" method="POST" action="register.php" onsubmit="return validateForm()" name="register">
        Nom d'usuari: <input type="text" name="user" /><br>
        <span id="resposta-u"></span>
        Contrassenya: <input type="password" name="password" /><br>
        Repeteix contrassenya: <input type="password" name="re-password" /><br>
        Correu electrònic: <input type="email" name="email" /><br>
        <span id="resposta-e"></span>
        Nom complet: <input type="text" name="name" /><br>
        <input type="submit" value="Registra't" />
    </form>
    <br>
    <a href="index.php">Login</a>
</div>