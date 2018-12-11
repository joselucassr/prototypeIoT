CREATE TABLE empresa (
  id_empresa INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome_empresa VARCHAR(255) NULL,
  cnpj VARCHAR(16) NULL,
  email_empresa VARCHAR(255) NULL,
  telefone_empresa VARCHAR(11) NULL,
  celular_empresa VARCHAR(13) NULL,
  cidade VARCHAR(60) NULL,
  estado CHAR(2) NULL,
  cep VARCHAR(10) NULL,
  password_empresa VARCHAR(255) NULL,
  PRIMARY KEY(id_empresa)
);

CREATE TABLE estado (
  id_estado INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  sensor_id_sensor INTEGER UNSIGNED NOT NULL,
  temperatura FLOAT NULL,
  bateria FLOAT NULL,
  status_sensor INT NULL,
  PRIMARY KEY(id_estado),
  INDEX estado_FKIndex1(sensor_id_sensor)
);

CREATE TABLE grupo (
  id_grupo INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  empresa_id_empresa INTEGER UNSIGNED NOT NULL,
  usuario_id_usuario INTEGER UNSIGNED NOT NULL,
  nome_grupo VARCHAR(255) NULL,
  descricao_grupo TEXT NULL,
  PRIMARY KEY(id_grupo),
  INDEX grupo_FKIndex1(usuario_id_usuario),
  INDEX grupo_FKIndex2(empresa_id_empresa)
);

CREATE TABLE sensor (
  id_sensor INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  empresa_id_empresa INTEGER UNSIGNED NOT NULL,
  grupo_id_grupo INTEGER UNSIGNED NOT NULL,
  nome_sensor VARCHAR(255) NULL,
  temp_max INT NULL,
  temp_min INT NULL,
  obs_sensor TEXT NULL,
  PRIMARY KEY(id_sensor),
  INDEX sensor_FKIndex1(grupo_id_grupo),
  INDEX sensor_FKIndex2(empresa_id_empresa)
);

CREATE TABLE usuario (
  id_usuario INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  empresa_id_empresa INTEGER UNSIGNED NOT NULL,
  nome_usuario VARCHAR(255) NULL,
  cpf VARCHAR(16) NULL,
  email_usuario VARCHAR(255) NULL,
  telefone_usuario VARCHAR(11) NULL,
  celular_usuario VARCHAR(13) NULL,
  genero VARCHAR(10) NULL,
  password_usuario VARCHAR(255) NULL,
  PRIMARY KEY(id_usuario),
  INDEX usuario_FKIndex1(empresa_id_empresa)
);


