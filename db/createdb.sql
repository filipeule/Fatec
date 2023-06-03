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
  ('AdmCorno', 'corno@corno', 'corno', '69696969696', '69969696969', 'Rua dos Cornos, 69, Jardim Chifrudo', 1);