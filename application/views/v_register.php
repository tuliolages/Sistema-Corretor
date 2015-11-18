<?php
	if (!isset($nome)) $nome = '';
	if (!isset($login)) $login = '';
?>

<h1>Cadastro</h1>
<p>Preencha com seu nome completo, seu <strong>login do CIn</strong> e, finalmente, crie uma senha para usar neste sistema.

<?=form_open(base_url('/index.php/home/register'))?>
    <table>
        <tr>
            <td>Nome:</td>
            <td><input name='nome' value="<?=$nome?>" type="text" /></td>
        </tr>
        <tr>
            <td>Login:</td>
            <td><input name='login' value="<?=$login?>" type="text" onchange="document.getElementById('email_form').value = (this.value)+'@cin.ufpe.br'"/></td>
        </tr>
        <tr>
            <td>Senha:</td>
            <td><input name='pwd' type="password" /></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input id="email_form" name='email' value="<?=$login.'@cin.ufpe.br'?>" type="text" disabled="disabled"/></td>
        <tr>
            <td colspan="2"><input type="submit" value="Enviar" /></td>
        </tr>
</form>
