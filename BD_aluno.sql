CREATE DATABASE `notas`;
use `notas`;
DROP TABLE IF EXISTS `alunos`;
CREATE TABLE IF NOT EXISTS `alunos` (
  `aluno_id` int(11) NOT NULL AUTO_INCREMENT,
  `aluno_nome` varchar(255) NOT NULL,
  `aluno_nota` int(2) NOT NULL,
  PRIMARY KEY (`aluno_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO alunos(aluno_nome, aluno_nota) VALUES ('José de Oliveira', 7);
INSERT INTO alunos(aluno_nome, aluno_nota) VALUES ('Joana Cruz', 7);
INSERT INTO alunos(aluno_nome, aluno_nota) VALUES ('Michel Alves', 8);
INSERT INTO alunos(aluno_nome, aluno_nota) VALUES ('Talita Moraes', 9);
INSERT INTO alunos(aluno_nome, aluno_nota) VALUES ('Jonas Lourenço', 3);
INSERT INTO alunos(aluno_nome, aluno_nota) VALUES ('Tamires Castro', 4);
INSERT INTO alunos(aluno_nome, aluno_nota) VALUES ('Washigton Prado', 6);
INSERT INTO alunos(aluno_nome, aluno_nota) VALUES ('Denis Wilson', 10);
INSERT INTO alunos(aluno_nome, aluno_nota) VALUES ('Liana Marques', 10);
INSERT INTO alunos(aluno_nome, aluno_nota) VALUES ('Abel Lima', 10);
INSERT INTO alunos(aluno_nome, aluno_nota) VALUES ('Rosangela Borba', 7);
INSERT INTO alunos(aluno_nome, aluno_nota) VALUES ('Elisa Carvalho', 8);
INSERT INTO alunos(aluno_nome, aluno_nota) VALUES ('Marcio Oliveira', 8);
INSERT INTO alunos(aluno_nome, aluno_nota) VALUES ('Daniel Norton', 8);
INSERT INTO alunos(aluno_nome, aluno_nota) VALUES ('Janes Araújo', 5);
INSERT INTO alunos(aluno_nome, aluno_nota) VALUES ('Alvin Melo', 6);
INSERT INTO alunos(aluno_nome, aluno_nota) VALUES ('Thais Melo', 6);
INSERT INTO alunos(aluno_nome, aluno_nota) VALUES ('Lúcia Vasconcelos', 3);
INSERT INTO alunos(aluno_nome, aluno_nota) VALUES ('João da Silva', 5);
INSERT INTO alunos(aluno_nome, aluno_nota) VALUES ('Clarice Schmidt', 6);
INSERT INTO alunos(aluno_nome, aluno_nota) VALUES ('Pedro Taub', 7);

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
    `usuario_id` int(11) NOT NULL AUTO_INCREMENT,    
    `usuario_nome` varchar(255) NOT NULL,
    `usuario_email` varchar(255) NOT NULL,
    `usuario_login` varchar(100) NOT NULL,
    `usuario_senha` varchar(45) NOT NULL,
    `usuario_nivel` ENUM('Admin', 'Prof', 'Aluno' ) NOT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO usuarios(usuario_nome, usuario_email, usuario_login, usuario_senha, usuario_nivel) 
            VALUES ('Fulano de Tal', 'meu@email.com.br', 'fulano', 'f1c47f4e9eee40b575e33c7f3471ad35', 'Admin'); /*Senha: FulanoDeTal*/

