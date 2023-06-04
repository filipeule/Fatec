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
  cursos (nome, qtd_ciclos, id_status, id_duracao_ciclo, id_nivel)
VALUES
  ('Cornologia', 1, 1, 1, 1);

INSERT INTO
  permissoes (secao, campo)
VALUES
  ('Cornos', 'Nome'),
  ('Cornos', 'Email'),
  ('Cornos', 'CPF'),
  ('Cornos', 'Telefone'),
  ('Cornos', 'Endereco'),
  ('Cornos', 'Tipo Corno'),
  ('Cornos', 'Criar'),
  ('Cornos', 'Listar'),
  ('Cornos', 'Excluir'),
  ('Cursos', 'Nome'),
  ('Cursos', 'Quantidade Ciclos'),
  ('Cursos', 'Status'),
  ('Cursos', 'Duracao'),
  ('Cursos', 'Nivel'),
  ('Cursos', 'Criar'),
  ('Cursos', 'Listar'),
  ('Cursos', 'Excluir'),
  ('Turmas', 'Numero Turma'),
  ('Turmas', 'Ciclo'),
  ('Turmas', 'Periodo'),
  ('Turmas', 'Curso'),
  ('Turmas', 'Local'),
  ('Turmas', 'Criar'),
  ('Turmas', 'Listar'),
  ('Turmas', 'Excluir'),
  ('Locais', 'Nome'),
  ('Locais', 'Endereco'),
  ('Locais', 'Telefone'),
  ('Locais', 'Responsavel'),
  ('Locais', 'Criar'),
  ('Locais', 'Listar'),
  ('Locais', 'Excluir'),
  ('Tipos Corno', 'Administrador'),
  ('Tipos Corno', 'Diretor'),
  ('Tipos Corno', 'Coordenador'),
  ('Tipos Corno', 'Professor'),
  ('Tipos Corno', 'Secretário'),
  ('Tipos Corno', 'Aluno');

INSERT INTO
  permissoes_tipos_corno (id_permissao, id_tipo_corno, nivel_acesso)
VALUES
  (1, 1, 3),
  (2, 1, 3),
  (3, 1, 3),
  (4, 1, 3),
  (5, 1, 3),
  (6, 1, 3),
  (7, 1, 2),
  (8, 1, 3),
  (9, 1, 2),
  (10, 1, 3),
  (11, 1, 3),
  (12, 1, 3),
  (13, 1, 3),
  (14, 1, 3),
  (15, 1, 2),
  (16, 1, 3),
  (17, 1, 2),
  (18, 1, 1),
  (19, 1, 3),
  (20, 1, 3),
  (21, 1, 3),
  (22, 1, 3),
  (23, 1, 2),
  (24, 1, 3),
  (25, 1, 2),
  (26, 1, 3),
  (27, 1, 3),
  (28, 1, 3),
  (29, 1, 3),
  (30, 1, 2),
  (31, 1, 3),
  (32, 1, 2),
  (33, 1, 1),
  (34, 1, 3),
  (35, 1, 3),
  (36, 1, 3),
  (37, 1, 3),
  (38, 1, 3),
  (1, 2, 3), 
  (2, 2, 3), 
  (3, 2, 3), 
  (4, 2, 3), 
  (5, 2, 1), 
  (6, 2, 3), 
  (7, 2, 2), 
  (8, 2, 3), 
  (9, 2, 2), 
  (10, 2, 3),
  (11, 2, 3),
  (12, 2, 3),
  (13, 2, 3),
  (14, 2, 3),
  (15, 2, 0),
  (16, 2, 3),
  (17, 2, 0),
  (18, 2, 1),
  (19, 2, 1),
  (20, 2, 1),
  (21, 2, 1),
  (22, 2, 1),
  (23, 2, 2),
  (24, 2, 3),
  (25, 2, 2),
  (26, 2, 1),
  (27, 2, 1),
  (28, 2, 3),
  (29, 2, 1),
  (30, 2, 0),
  (31, 2, 3),
  (32, 2, 0),
  (33, 2, 0),
  (34, 2, 1),
  (35, 2, 3),
  (36, 2, 3),
  (37, 2, 3),
  (38, 2, 3),
  (1, 3, 1),
  (2, 3, 1),
  (3, 3, 0),
  (4, 3, 1),
  (5, 3, 0),
  (6, 3, 1),
  (7, 3, 0),
  (8, 3, 0),
  (9, 3, 0),
  (10, 3, 1),
  (11, 3, 1),
  (12, 3, 1),
  (13, 3, 1),
  (14, 3, 1),
  (15, 3, 0),
  (16, 3, 1),
  (17, 3, 0),
  (18, 3, 1),
  (19, 3, 1),
  (20, 3, 1),
  (21, 3, 1),
  (22, 3, 1),
  (23, 3, 0),
  (24, 3, 1),
  (25, 3, 0),
  (26, 3, 1),
  (27, 3, 1),
  (28, 3, 1),
  (29, 3, 1),
  (30, 3, 0),
  (31, 3, 1),
  (32, 3, 0),
  (33, 3, 0),
  (34, 3, 0),
  (35, 3, 1),
  (36, 3, 1),
  (37, 3, 1),
  (38, 3, 1),
  (1, 4, 1),
  (2, 4, 1),
  (3, 4, 0),
  (4, 4, 0),
  (5, 4, 0),
  (6, 4, 1),
  (7, 4, 0),
  (8, 4, 0),
  (9, 4, 0),
  (10, 4, 1),
  (11, 4, 1),
  (12, 4, 1),
  (13, 4, 1),
  (14, 4, 1),
  (15, 4, 0),
  (16, 4, 1),
  (17, 4, 0),
  (18, 4, 1),
  (19, 4, 1),
  (20, 4, 1),
  (21, 4, 1),
  (22, 4, 1),
  (23, 4, 0),
  (24, 4, 0),
  (25, 4, 0),
  (26, 4, 1),
  (27, 4, 1),
  (28, 4, 1),
  (29, 4, 1),
  (30, 4, 0),
  (31, 4, 1),
  (32, 4, 0),
  (33, 4, 0),
  (34, 4, 0),
  (35, 4, 0),
  (36, 4, 0),
  (37, 4, 0),
  (38, 4, 1),
  (1, 5, 3),
  (2, 5, 3),
  (3, 5, 3),
  (4, 5, 3),
  (5, 5, 3),
  (6, 5, 1),
  (7, 5, 2),
  (8, 5, 3),
  (9, 5, 0),
  (10, 5, 1),
  (11, 5, 1),
  (12, 5, 1),
  (13, 5, 1),
  (14, 5, 1),
  (15, 5, 0),
  (16, 5, 1),
  (17, 5, 0),
  (18, 5, 1),
  (19, 5, 1),
  (20, 5, 1),
  (21, 5, 1),
  (22, 5, 1),
  (23, 5, 0),
  (24, 5, 1),
  (25, 5, 0),
  (26, 5, 1),
  (27, 5, 1),
  (28, 5, 3),
  (29, 5, 1),
  (30, 5, 0),
  (31, 5, 1),
  (32, 5, 0),
  (33, 5, 0),
  (34, 5, 1),
  (35, 5, 1),
  (36, 5, 1),
  (37, 5, 1),
  (38, 5, 3),
  (1, 6, 1),
  (2, 6, 1),
  (3, 6, 0),
  (4, 6, 0),
  (5, 6, 0),
  (6, 6, 0),
  (7, 6, 0),
  (8, 6, 0),
  (9, 6, 0),
  (10, 6, 1),
  (11, 6, 1),
  (12, 6, 1),
  (13, 6, 1),
  (14, 6, 1),
  (15, 6, 0),
  (16, 6, 1),
  (17, 6, 0),
  (18, 6, 0),
  (19, 6, 0),
  (20, 6, 0),
  (21, 6, 0),
  (22, 6, 0),
  (23, 6, 0),
  (24, 6, 0),
  (25, 6, 0),
  (26, 6, 1),
  (27, 6, 1),
  (28, 6, 1),
  (29, 6, 1),
  (30, 6, 0),
  (31, 6, 1),
  (32, 6, 0),
  (33, 6, 0),
  (34, 6, 0),
  (35, 6, 0),
  (36, 6, 0),
  (37, 6, 0),
  (38, 6, 1);

INSERT INTO
  curso_status (descricao)
VALUES
  ('Ativo'),
  ('Inativo'),
  ('Cancelado');

INSERT INTO
  duracao_ciclo (descricao)
VALUES
  ('Semestral'),
  ('Anual'),
  ('40 horas'),
  ('80 horas'),
  ('120 horas');

INSERT INTO
  nivel (descricao)
VALUES
  ('Profissionalizante'),
  ('Técnico'),
  ('Tecnólogo'),
  ('Licenciatura'),
  ('Bacharelado'),
  ('Especialização'),
  ('Mestrado'),
  ('Doutorado');