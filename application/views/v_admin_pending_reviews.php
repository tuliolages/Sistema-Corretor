<?php
if (!isset($reviews)) $reviews = array();
?>
<ul id="browse">
	<li onclick="document.location = '<?=base_url('/index.php/monitor')?>'">Administrador</li>
	<li>Revisões</li>
</ul>
<pre>
<h1>Lista de Revisões Pendentes</h1>
Nesta seção você terá a lista de revisões que foram solicitados e que ainda não foram analisados.

<?php
$last = 0;
foreach ($reviews as $review) {
	if ($last != $review['id_questao']) {
		$last = $review['id_questao'];
		?><strong>[<?=$this->problems->get_problem_repr($last)?>]<br/></strong><?php
	}
?>
	Revisão solicitada por <strong><?=$review['login_usuario']?></strong> em <strong><?=$this->datahandler->translate_date_format($review['data_pedido'])?></strong> [ <a href="<?=base_url('/index.php/monitor/review/'.$review['login_usuario'].'/'.$review['id_questao'].'/'.strtotime($review['data_pedido']))?>">analisar</a> ]
	
<?php } ?>

</pre>
