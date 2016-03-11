<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>IF686 - PLC - CIn/UFPE</title>

	<link href="<?=base_url('/css/style.css')?>" rel="stylesheet" type="text/css"/>
	<link href="<?=base_url('/css/notas.css')?>" rel="stylesheet" type="text/css"/>

</head>
<body>
<script>
$ = function(id) {
	return document.getElementById(id);
}
hide_box = function (node) {
	node.parentNode.style.opacity = 0.0;
	return false;
}
hide_all_warnings = function () {
	$('notice_box').style.opacity = 0.0;
	$('error_box').style.opacity = 0.0;
}
scrolls_to = function(id) {
	var node = $('scroll_point_'+id);
	if (node)
		node.scrollIntoView();
}
window.onload = function() {
	setTimeout("hide_all_warnings()", 5000);
<?php if (isset($scroll) && $scroll) { ?>
	scrolls_to('<?=$scroll?>');
<?php } ?>
}
</script>

<?php
if (!isset($tab)) $tab = FALSE;
if (!isset($notice)) $notice = FALSE;
if (!isset($error)) $error = FALSE;
if (!isset($logged)) $logged = FALSE;
if (!isset($is_admin)) $is_admin = FALSE;
?>
<div id="notice_box" style="<?=($notice == FALSE ? 'opacity: 0.0; visibility: hidden;' : 'opacity: 1.0;')?>"><div class="warning_content" onclick="return hide_box(this);"><?=($notice == FALSE ? '' : $notice)?></div></div>

<div id="error_box" style="<?=($error == FALSE ? 'opacity: 0.0; visibility: hidden;' : 'opacity: 1.0;')?>"><div class="warning_content" onclick="return hide_box(this);"><?=($error == FALSE ? '' : $error)?></div></div>

<div id="navi-wrapper">
    <ul id="navi">
        <li>
            <img src="<?=base_url('/img/logo_cin.png')?>" alt="CIn - UFPE" />
        </li>
        <li <?=($tab == 'home' ? 'class="selected"' : '')?>>
            <a href="<?=base_url('/index.php')?>">Home</a>
        </li>
        <li <?=($tab == 'lists' ? 'class="selected"' : '')?>>
            <a href="<?=base_url('/index.php/home/lists')?>">Listas</a>
        </li>
        <!--
        <li onclick="window.location = '<?=base_url('/index.php/home/pages/avisos.htm')?>';">Avisos</li>
        <li onclick="window.location = '<?=base_url('/index.php/home/pages/programacao.htm')?>';">Cronograma</li>
        <li onclick="window.location = '<?=base_url('/index.php/home/pages/aulasPraticas.htm')?>';">Monitoria</li>
        <li onclick="window.location = '<?=base_url('/index.php/home/pages/material.htm')?>';">Material</li>
        -->
        <?php if ($logged) { ?>
            <li id="perfil_button">
                <a href="<?=base_url('/index.php/home/perfil')?>">perfil</a>
            </li>
            <li id="logout_button">
                <a href="<?=base_url('/index.php/home/logout')?>">logout</a>
            </li>
        <?php } else { ?>
            <li id="login_button">
                <a href="<?=base_url('/index.php/home/login')?>">login</a>
            </li>
        <?php } ?>
    </ul>
</div>

<div id="content">
