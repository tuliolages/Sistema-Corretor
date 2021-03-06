USE if686cc_corretor;

DROP TABLE IF EXISTS `Corretor`;
DROP TABLE IF EXISTS `Lista_Exercicios`;
DROP TABLE IF EXISTS `Material_Correcao`;
DROP TABLE IF EXISTS `Nota_Lista`;
DROP TABLE IF EXISTS `Pedido_Clarification`;
DROP TABLE IF EXISTS `Pedido_Revisao`;
DROP TABLE IF EXISTS `Submissao`;
DROP TABLE IF EXISTS `Usuario`;
DROP TABLE IF EXISTS `Questao`;

CREATE TABLE `Corretor` (
  `id_corretor` int(11) NOT NULL AUTO_INCREMENT,
  `data_pedido` datetime NOT NULL,
  `id_lista` int(11) DEFAULT NULL,
  `id_revisao` int(11) DEFAULT NULL,
  `estado` enum('Correcao', 'Em Andamento', 'Revisao', 'Feito') DEFAULT  'Correcao';
  `relatorio_pcopia` blob,
  PRIMARY KEY (`id_corretor`)
);

CREATE TABLE `Lista_Exercicios` (
  `id_lista` int(11) NOT NULL AUTO_INCREMENT,
  `nome_lista` varchar(45) NOT NULL,
  `estado_lista` enum('preparacao','andamento','correcao','revisao','finalizada') NOT NULL DEFAULT 'preparacao',
  `data_lancamento` datetime DEFAULT NULL,
  `data_finalizacao` datetime DEFAULT NULL,
  `data_inicio_revisao` datetime DEFAULT NULL,
  `data_fim_revisao` datetime DEFAULT NULL,
  PRIMARY KEY (`id_lista`),
  UNIQUE KEY `nome_lista_UNIQUE` (`nome_lista`)
) ;

CREATE TABLE `Material_Correcao` (
  `id_Questao` int(11) NOT NULL,
  `id_Correcao` int(11) NOT NULL AUTO_INCREMENT,
  `entrada` MEDIUMBLOB NOT NULL,
  `saida` MEDIUMBLOB NOT NULL,
  `max_tempo_execucao` int(11) NOT NULL,
  `peso_correcao` int(11) NOT NULL,
  `formato_arquivo` varchar(45) NOT NULL,
  PRIMARY KEY (`id_Correcao`,`id_Questao`),
  KEY `fk_Material_Correcao_1` (`id_Questao`)
) ;

CREATE TABLE `Nota_Lista` (
  `valor_nota` int(11) NOT NULL,
  `id_correcao` int(11) NOT NULL,
  `login` varchar(15) NOT NULL,
  `id_questao` int(11) NOT NULL,
  PRIMARY KEY (`id_correcao`,`login`,`id_questao`),
  KEY `fk_Nota_Lista_1` (`id_correcao`),
  KEY `fk_Nota_Lista_2` (`id_questao`),
  KEY `fk_Nota_Lista_3` (`login`)
) ;

CREATE TABLE `Pedido_Clarification` (
  `data_pedido` datetime NOT NULL,
  `id_questao` int(11) NOT NULL,
  `login_usuario` varchar(15) NOT NULL,
  `estado_pedido` enum('pendente','respondido','desconsiderado') NOT NULL,
  `descricao_pedido` blob NOT NULL,
  `resposta` blob,
  PRIMARY KEY (`data_pedido`,`id_questao`,`login_usuario`) USING BTREE,
  KEY `fk_Pedido_Clarification_1` (`id_questao`),
  KEY `fk_Pedido_Clarification_2` (`login_usuario`)
) ;

CREATE TABLE `Pedido_Revisao` (
  `data_pedido` datetime NOT NULL,
  `id_questao` int(11) NOT NULL,
  `login_usuario` varchar(15) NOT NULL,
  `estado_pedido` enum('pendente','respondido','desconsiderado') NOT NULL,
  `descricao_pedido` blob NOT NULL,
  `id_revisao` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_revisao`),
  KEY `fk_Pedido_Revisao_1` (`id_questao`),
  KEY `fk_Pedido_Revisao_2` (`login_usuario`)
);

CREATE TABLE `Questao` (
  `enunciado` blob,
  `entrada_exemplo` blob,
  `saida_exemplo` blob,
  `descricao_entrada` blob,
  `descricao_saida` blob,
  `id_questao` int(11) NOT NULL AUTO_INCREMENT,
  `id_lista` int(11) NOT NULL,
  `nome` varchar(60) DEFAULT NULL,
  `numero` int(11) NOT NULL,
  PRIMARY KEY (`id_questao`,`id_lista`),
  KEY `fk_Questao_1` (`id_lista`)
) ;

CREATE TABLE `Submissao` (
  `data_submissao` datetime NOT NULL,
  `id_questao` int(11) NOT NULL,
  `login` varchar(15) NOT NULL,
  `codigo_fonte` blob NOT NULL,
  `linguagem` varchar(10) NOT NULL,
  `compilacao_erro` text DEFAULT NULL,
  `submissao_zerada` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`data_submissao`,`id_questao`,`login`),
  KEY `fk_Submissao_1` (`id_questao`),
  KEY `fk_Submissao_2` (`login`)
) ;

CREATE TABLE `Usuario` (
  `nome` varchar(200) NOT NULL,
  `tipo_permissao` enum('aluno','administrador') NOT NULL,
  `email` varchar(200) NOT NULL,
  `login` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `data_confirmacao` datetime DEFAULT NULL,
  PRIMARY KEY (`login`),
  UNIQUE KEY `email_UNIQUE` (`email`)
);
