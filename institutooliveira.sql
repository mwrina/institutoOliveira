DROP TABLE IF EXISTS usuarios;

CREATE TABLE usuarios (
  idUsu INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(50),
  email VARCHAR(100),
  senha VARCHAR(50),
  ultimoAcesso DATE
);

INSERT INTO usuarios (nome, email, senha) VALUES (
  "usuario teste",
  "teste@teste",
  "teste"
);
  
