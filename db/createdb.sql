CREATE DATABASE sistema_corno;

USE sistema_corno;

CREATE TABLE tipos_corno (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  descricao VARCHAR(20) NOT NULL
);

CREATE TABLE cornos (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(300) NOT NULL,
  senha VARCHAR(20) NOT NULL,
  cpf VARCHAR(11) NOT NULL,
  telefone VARCHAR(11) NOT NULL,
  endereco VARCHAR(100) NOT NULL,
  id_tipo_corno INT NOT NULL,

  FOREIGN KEY (id_tipo_corno) REFERENCES tipos_corno(id)
);

CREATE TABLE disciplinas (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  descricao VARCHAR(50) NOT NULL,
  id_professor INT NOT NULL,

  FOREIGN KEY (id_professor) REFERENCES cornos (id)
);

CREATE TABLE curso_status (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  descricao VARCHAR(20) NOT NULL
);

CREATE TABLE nivel (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  descricao VARCHAR(30) NOT NULL
);

CREATE TABLE duracao_ciclo (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  descricao VARCHAR(20) NOT NULL
);

CREATE TABLE cursos (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(50) NOT NULL,
  qtd_ciclos INT NOT NULL,
  id_status INT NOT NULL,
  id_duracao_ciclo INT NOT NULL,
  id_nivel INT NOT NULL,

  FOREIGN KEY (id_status) REFERENCES curso_status(id),
  FOREIGN KEY (id_duracao_ciclo) REFERENCES duracao_ciclo(id),
  FOREIGN KEY (id_nivel) REFERENCES nivel(id)
);

CREATE TABLE cursos_disciplinas (
  relation_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  id_curso INT NOT NULL,
  id_disciplina INT NOT NULL,

  FOREIGN KEY (id_curso) REFERENCES cursos(id),
  FOREIGN KEY (id_disciplina) REFERENCES disciplinas(id)
);

CREATE TABLE cursos_cornos (
  relation_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  id_curso INT NOT NULL,
  id_corno INT NOT NULL,

  FOREIGN KEY (id_curso) REFERENCES cursos(id),
  FOREIGN KEY (id_corno) REFERENCES cornos(id)
);

CREATE TABLE locais (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(50) NOT NULL,
  endereco VARCHAR(100) NOT NULL,
  telefone VARCHAR(11) NOT NULL,
  id_responsavel INT NOT NULL,

  FOREIGN KEY (id_responsavel) REFERENCES cornos(id)
);

CREATE TABLE locais_cursos (
  relation_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  id_curso INT NOT NULL,
  id_local INT NOT NULL,

  FOREIGN KEY (id_curso) REFERENCES cursos(id),
  FOREIGN KEY (id_local) REFERENCES locais(id)
);

CREATE TABLE periodo (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  descricao VARCHAR(15) NOT NULL
);

CREATE TABLE turmas (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  ciclo INT NOT NULL,
  id_periodo INT NOT NULL,
  id_curso INT NOT NULL,
  id_local INT NOT NULL,

  FOREIGN KEY (id_periodo) REFERENCES periodo(id),
  FOREIGN KEY (id_curso) REFERENCES cursos(id),
  FOREIGN KEY (id_local) REFERENCES locais(id)
);

CREATE TABLE turmas_cornos (
  relation_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  id_turma INT NOT NULL,
  id_corno INT NOT NULL,

  FOREIGN KEY (id_turma) REFERENCES turmas(id),
  FOREIGN KEY (id_corno) REFERENCES cornos(id)
);

CREATE TABLE permissoes (
	id_permissao INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  secao VARCHAR(30) NOT NULL,
	campo VARCHAR(50) NOT NULL
);

CREATE TABLE permissoes_tipos_corno (
  relation_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  id_permissao INT NOT NULL,
  id_tipo_corno INT NOT NULL,
  nivel_acesso INT NOT NULL,
  FOREIGN KEY (id_permissao) REFERENCES permissoes(id_permissao),
  FOREIGN KEY (id_tipo_corno) REFERENCES tipos_corno(id)
);

INSERT INTO
  tipos_corno (descricao)
VALUES
  ('Administrador'),
  ('Diretor'),
  ('Coordenador'),
  ('Professor'),
  ('Secretário'),
  ('Aluno');

INSERT INTO
  cornos (nome, email, senha, cpf, telefone, endereco, id_tipo_corno)
VALUES
  ('AdmCorno', 'corno@corno', 'corno', '69696969696', '69969696969', 'Rua dos Cornos, 69, Jardim Chifrudo', 1),
  ('Diretor', 'diretor@corno', 'corno', '69696969696', '69969696969', 'Rua dos Cornos, 69, Jardim Chifrudo', 2),
  ('Coordenador', 'coordenador@corno', 'corno', '69696969696', '69969696969', 'Rua dos Cornos, 69, Jardim Chifrudo', 3),
  ('Professor', 'professor@corno', 'corno', '69696969696', '69969696969', 'Rua dos Cornos, 69, Jardim Chifrudo', 4),
  ('Secretário', 'secretario@corno', 'corno', '69696969696', '69969696969', 'Rua dos Cornos, 69, Jardim Chifrudo', 5),
  ('Aluno', 'aluno@corno', 'corno', '69696969696', '69969696969', 'Rua dos Cornos, 69, Jardim Chifrudo', 6);

INSERT INTO
  permissoes (secao, campo)
VALUES
  ('Cornos', 'Nome'),
  ('Cornos', 'Email'),
  ('Cornos', 'CPF'),
  ('Cornos', 'Telefone'),
  ('Cornos', 'Endereco'),
  ('Cornos', 'Tipo Corno'),
  ('Cursos', 'Nome'),
  ('Cursos', 'Quantidade Ciclos'),
  ('Cursos', 'Status'),
  ('Cursos', 'Duracao'),
  ('Cursos', 'Nivel'),
  ('Turmas', 'Numero Turma'),
  ('Turmas', 'Ciclo'),
  ('Turmas', 'Periodo'),
  ('Turmas', 'Curso'),
  ('Turmas', 'Local'),
  ('Locais', 'Nome'),
  ('Locais', 'Endereco'),
  ('Locais', 'Telefone'),
  ('Locais', 'Responsavel');

INSERT INTO
  permissoes_tipos_corno (id_permissao, id_tipo_corno, nivel_acesso)
VALUES
  (1, 1, 3),
  (2, 1, 3),
  (3, 1, 3),
  (4, 1, 3),
  (5, 1, 3),
  (6, 1, 3),
  (7, 1, 3),
  (8, 1, 3),
  (9, 1, 3),
  (10, 1, 3),
  (11, 1, 3),
  (12, 1, 1),
  (13, 1, 3),
  (14, 1, 3),
  (15, 1, 3),
  (16, 1, 3),
  (17, 1, 3),
  (18, 1, 3),
  (19, 1, 3),
  (20, 1, 3),
  (1, 2, 3),
  (2, 2, 3),
  (3, 2, 3),
  (4, 2, 3),
  (5, 2, 1),
  (6, 2, 3),
  (7, 2, 3),
  (8, 2, 3),
  (9, 2, 3),
  (10, 2, 3),
  (11, 2, 3),
  (12, 2, 1),
  (13, 2, 1),
  (14, 2, 1),
  (15, 2, 1),
  (16, 2, 1),
  (17, 2, 1),
  (18, 2, 1),
  (19, 2, 3),
  (20, 2, 1),
  (1, 3, 1),
  (2, 3, 1),
  (3, 3, 0),
  (4, 3, 1),
  (5, 3, 0),
  (6, 3, 1),
  (7, 3, 1),
  (8, 3, 1),
  (9, 3, 1),
  (10, 3, 1),
  (11, 3, 1),
  (12, 3, 1),
  (13, 3, 1),
  (14, 3, 1),
  (15, 3, 1),
  (16, 3, 1),
  (17, 3, 1),
  (18, 3, 1),
  (19, 3, 1),
  (20, 3, 1),
  (1, 4, 1),
  (2, 4, 1),
  (3, 4, 0),
  (4, 4, 0),
  (5, 4, 0),
  (6, 4, 1),
  (7, 4, 1),
  (8, 4, 1),
  (9, 4, 1),
  (10, 4, 1),
  (11, 4, 1),
  (12, 4, 1),
  (13, 4, 1),
  (14, 4, 1),
  (15, 4, 1),
  (16, 4, 1),
  (17, 4, 1),
  (18, 4, 1),
  (19, 4, 1),
  (20, 4, 1),
  (1, 5, 3),
  (2, 5, 3),
  (3, 5, 3),
  (4, 5, 3),
  (5, 5, 3),
  (6, 5, 1),
  (7, 5, 1),
  (8, 5, 1),
  (9, 5, 1),
  (10, 5, 1),
  (11, 5, 1),
  (12, 5, 1),
  (13, 5, 1),
  (14, 5, 1),
  (15, 5, 1),
  (16, 5, 1),
  (17, 5, 1),
  (18, 5, 1),
  (19, 5, 3),
  (20, 5, 1),
  (1, 6, 1),
  (2, 6, 1),
  (3, 6, 0),
  (4, 6, 0),
  (5, 6, 0),
  (6, 6, 0),
  (7, 6, 1),
  (8, 6, 1),
  (9, 6, 1),
  (10, 6, 1),
  (11, 6, 1),
  (12, 6, 0),
  (13, 6, 0),
  (14, 6, 0),
  (15, 6, 0),
  (16, 6, 0),
  (17, 6, 1),
  (18, 6, 1),
  (19, 6, 1),
  (20, 6, 1);