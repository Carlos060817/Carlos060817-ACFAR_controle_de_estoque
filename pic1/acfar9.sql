
CREATE DATABASE IF NOT EXISTS `acfar9` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `acfar9`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastros`
--

DROP TABLE IF EXISTS `cadastros`;
CREATE TABLE IF NOT EXISTS `cadastros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `sobrenome` varchar(45) DEFAULT NULL,
  `endereco` varchar(70) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `criado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadastros`
--

INSERT INTO `cadastros` (`id`, `nome`, `sobrenome`, `endereco`, `cidade`, `bairro`, `numero`, `estado`, `cep`, `criado`, `modificado`) VALUES
(1, 'carlos ', 'dan ', 'aaa ', 'aaaa ', 'areias ', NULL, 'Paraiba ', 'aaaaa ', '2020-12-12 12:25:29', '2020-12-12 12:25:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_pedidos`
--

DROP TABLE IF EXISTS `log_pedidos`;
CREATE TABLE IF NOT EXISTS `log_pedidos` (
  `id` int(11) NOT NULL,
  `id_vendedor` int(11) DEFAULT NULL,
  `id_cadastro` int(11) DEFAULT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `transportadora` varchar(50) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `data_pedido` datetime DEFAULT NULL,
  `data_finalizado` datetime DEFAULT NULL,
  `prioridade` varchar(50) DEFAULT NULL,
  `estatus` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_vendedor` (`id_vendedor`),
  KEY `id_produto` (`id_produto`),
  KEY `id_cadastro` (`id_cadastro`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `log_pedidos`
--

INSERT INTO `log_pedidos` (`id`, `id_vendedor`, `id_cadastro`, `id_produto`, `quantidade`, `transportadora`, `valor`, `data_pedido`, `data_finalizado`, `prioridade`, `estatus`) VALUES
(1, 1, 1, 1, 10, 'correios', 100, '2020-12-12 12:27:17', NULL, 'Mediana', 'em processo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_vendedor` int(11) DEFAULT NULL,
  `id_cadastro` int(11) DEFAULT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `transportadora` varchar(50) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `data_pedido` datetime DEFAULT NULL,
  `prioridade` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_vendedor` (`id_vendedor`),
  KEY `id_produto` (`id_produto`),
  KEY `id_cadastro` (`id_cadastro`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_vendedor`, `id_cadastro`, `id_produto`, `quantidade`, `transportadora`, `valor`, `data_pedido`, `prioridade`) VALUES
(1, 1, 1, 1, 10, 'correios', 100, '2020-12-12 12:27:17', 'Mediana');

--
-- Acionadores `pedidos`
--
DROP TRIGGER IF EXISTS `insere_pedido_em_log`;
DELIMITER $$
CREATE TRIGGER `insere_pedido_em_log` AFTER INSERT ON `pedidos` FOR EACH ROW begin
	insert into log_pedidos(id,id_vendedor,id_cadastro,id_produto,quantidade,transportadora,valor,data_pedido,prioridade,estatus)
    values (new.id,new.id_vendedor,new.id_cadastro,new.id_produto,new.quantidade,new.transportadora,new.valor,new.data_pedido,new.prioridade,"em processo");
end
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `insere_pedido_em_log2`;
DELIMITER $$
CREATE TRIGGER `insere_pedido_em_log2` AFTER DELETE ON `pedidos` FOR EACH ROW begin
	update log_pedidos set estatus = "finalizado",data_finalizado=current_timestamp() where log_pedidos.id=old.id;  
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `nome` varchar(70) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `descricao` varchar(70) DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `criado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL,
  `entrada_merdoria` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `id_usuario`, `nome`, `quantidade`, `descricao`, `preco`, `marca`, `criado`, `modificado`, `entrada_merdoria`) VALUES
(1, 1, 'parafuso', 89990, 'jomarca', 10, 'jomarca', '2020-12-12 12:26:15', '2020-12-12 12:26:15', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `tipo` tinyint(4) DEFAULT '0',
  `telefone` varchar(15) DEFAULT NULL,
  `endereco` varchar(70) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `cnpj` double DEFAULT NULL,
  `cpf` double DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `criado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`senha`,`login`,`cep`,`cnpj`),
  KEY `id_empresa` (`id_empresa`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `id_empresa`, `nome`, `login`, `senha`, `tipo`, `telefone`, `endereco`, `cidade`, `bairro`, `numero`, `cnpj`, `cpf`, `cep`, `criado`, `modificado`) VALUES
(1, 'cdaniel-011@gmail.com', 1, 'carlos dan', 'carlos', '1234', 0, '8888888', 'aaa', 'aaaa', 'areias', 123, 654654, 454545, 'aaaaa', '2020-12-12 12:27:00', '2020-12-12 12:27:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedor_tem_cliente`
--

DROP TABLE IF EXISTS `vendedor_tem_cliente`;
CREATE TABLE IF NOT EXISTS `vendedor_tem_cliente` (
  `id_cadastro` int(11) NOT NULL,
  `vendedor_id` int(11) NOT NULL,
  PRIMARY KEY (`id_cadastro`,`vendedor_id`),
  KEY `vendedor_id` (`vendedor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;


