<ul id="browse">
	<li onclick="document.location = '<?=base_url('/index.php/monitor')?>'">Administrador</li>
</ul>

<pre>
<h1>Perfil</h1>Olá, <strong><?=$nome?></strong>, seu login é <strong><?=$login?></strong> e seu email, <strong><?=$email?></strong>.

<h1>Usuário</h1>
<a href="<?=base_url('/index.php/home/change_pass')?>">Mudar senha</a> - clique aqui para alterar sua senha no sistema.

<h1>Administrador</h1>Você tem privilégios de administrador neste sistema.

<a href="<?=base_url('/index.php/monitor/lists')?>">Listas de Exercícios</a> - criar, editar ou remover listas e suas respectivas questões.

<a href="<?=base_url('/index.php/monitor/clarifications')?>">Clarifications</a> - listar clarifications pendentes e respondê-los.

<a href="<?=base_url('/index.php/monitor/reviews')?>">Revisões</a> - listar revisões solicitadas e analisá-las.

<a href="<?=base_url('/index.php/monitor/corrector')?>">Corretor</a> - executa correção de listas e pega-cópias.

<a href="<?=base_url('/index.php/monitor/pending_registers')?>">Cadastros Pendentes</a> - lista cadastros pendentes e efetua confirmação dos mesmos.

<a href="<?=base_url('/index.php/monitor/register_user')?>">Cadastrar Aluno/Monitor</a> - permite o cadastro manual de alunos ou de monitores.

<a href="<?=base_url('/index.php/monitor/list_users')?>">Listar Alunos e Monitores</a> - listar, editar ou excluir dados de alunos ou monitores cadastrados.

<a href="<?=base_url('/index.php/monitor/notas_semestre')?>">Notas do Semestre</a> - ver a lista de notas dos alunos nas listas.

<a href="<?=base_url('/index.php/monitor/semester_filing')?>">Arquivamento e Reset do Sistema</a> - salvar estado do sistema, limpar o sistema para novo semestre.

</pre>
