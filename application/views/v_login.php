<?php
	if (!isset($login)) $login = '';
?>

<h1>Login</h1>
<p>Caso você ainda não esteja cadastrado, <a href="<?=base_url('/index.php/home/register')?>"><strong>clique aqui</strong></a>. Digite o login que você escolheu ao se cadastrar e sua respectiva senha para logar no sistema.

<?=form_open(base_url('/index.php/home/login'))?>
    <table>
        <tr>
            <td>Login:</td>
            <td><input name='login' value="<?=$login?>" type="text" /></td>
        </tr>
        <tr>
            <td>Senha:</td>
            <td><input name='pwd' type="password" /></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Enviar" /></td>
        </tr>
    </table>
</form>

