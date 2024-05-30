CREATE TABLE `projetos` (
  `idProj` int(11) NOT NULL AUTO_INCREMENT,
  `nomeProj` varchar(75) DEFAULT NULL,
  `breveDescProj` varchar(500) DEFAULT NULL,
  `maisInfoProj` varchar(10000) DEFAULT NULL,
  `imgProj` varchar(50) DEFAULT NULL,
  `dataCriacao` date DEFAULT NULL,
  PRIMARY KEY (`idProj`)
)

  CREATE TABLE `usuarios` (
  `idUsu` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `tipoUsu` varchar(10) DEFAULT NULL,
  `ultimoAcesso` date DEFAULT NULL,
  PRIMARY KEY (`idUsu`)
)
