CREATE TABLE empresa (
  id_empresa INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome_empresa VARCHAR(255) NOT NULL,
  cnpj VARCHAR(16) NOT NULL UNIQUE,
  email_empresa VARCHAR(255) NOT NULL UNIQUE,
  telefone_empresa VARCHAR(11) NOT NULL UNIQUE,
  celular_empresa VARCHAR(13) NOT NULL UNIQUE,
  cidade VARCHAR(60) NULL,
  estado CHAR(2) NULL,
  cep VARCHAR(10) NULL,
  password VARCHAR(255) NOT NULL,
  remember_token varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY(id_empresa)
);

CREATE TABLE estado (
  id_estado INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  sensor_id_sensor INTEGER UNSIGNED NOT NULL,
  temperatura FLOAT NULL,
  bateria FLOAT NULL,
  status_sensor INT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
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

CREATE TABLE sensors (
  id_sensor bigint(19) UNSIGNED NOT NULL AUTO_INCREMENT,
  empresa_id_empresa INTEGER UNSIGNED NOT NULL,
  grupo_id_grupo INTEGER UNSIGNED NOT NULL,
  nome_sensor VARCHAR(255) NULL,
  tempmax INT NULL,
  tempmin INT NULL,
  obs TEXT NULL,
  temperatura FLOAT NULL,
  bateria FLOAT NULL,
  status_sensor INT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY(id_sensor),
  INDEX sensor_FKIndex1(grupo_id_grupo),
  INDEX sensor_FKIndex2(empresa_id_empresa)
);

CREATE TABLE users (
  id_usuario INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  empresa_id_empresa INTEGER UNSIGNED NOT NULL,
  nome_usuario VARCHAR(255) NOT NULL,
  cpf VARCHAR(16 ) NOT NULL UNIQUE,
  email_usuario VARCHAR(255) NOT NULL UNIQUE,
  telefone_usuario VARCHAR(11) NOT NULL UNIQUE,
  celular_usuario VARCHAR(13) NOT NULL UNIQUE,
  genero VARCHAR(10) NULL,
  password VARCHAR(255) NOT NULL,
  remember_token varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY(id_usuario),
  INDEX users_FKIndex1(empresa_id_empresa)
);

CREATE TABLE `password_resets` (
 `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
 `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
 `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

/* Inserção na tabela USERS */
INSERT INTO `users` (`id_usuario`,`nome_usuario`, `cpf`, `email_usuario`, `telefone_usuario`, `celular_usuario`, `genero`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Zé', '9999999999', 'joselucasrs@gmail.com', '6199999999', '6199999999', 1, '$2y$12$58VeD2qfy9v3h2kwn24/fu0OzOCPo0SlRXTVxZIY5oTQIEv4elPPO', 'Ob8VRGdRRPNVLnycg1oupFq1awfDRDa3QDnbOfXt8sdd17dvYdMaII94THn2', '2018-11-26 18:37:31', '2018-12-05 19:46:55'),
(2, 'Eliel', '888.899.997-66', 'eliel@apresentar.com', '(61) 9852-5535', '(61) 95233-5852', 1, '$2y$10$dTUNfuupP5nSpYHxJ1Dg7.4VW7rRxkU.VZxuYCG/d5RjYAAXsgOyq', 'hvVMQv21DKOUwZhSf2p4AursreJF2i0XUpX65XF3K3t50v35UNuxUxT5X79j', '2018-11-28 23:19:42', '2018-11-28 23:19:42');

/* Inserção na tabela EMPRESA */
INSERT INTO `empresa` (`id_empresa`, `nome_empresa`, `cnpj`, `email_empresa`, `telefone_empresa`, `celular_empresa`, `cidade`, `estado`, `cep`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jeni Enterprise', '99999999996', 'jeni@empresa.com', '6191111111', '6191111111', 'Brasília', 'DF', '99999999', '$2y$12$58VeD2qfy9v3h2kwn24/fu0OzOCPo0SlRXTVxZIY5oTQIEv4elPPO', 'Ob8VRGdRRPNVLnycg1oupFq1awfDRDa3QDnbOfXt8sdd17dvYdMaII94THn2', '2018-11-26 18:37:31', '2018-12-05 19:46:55'),
(2, 'Apresentar', '78.907.668/9096-66', 'email@apresentar.com', '(61) 9999-8888', '(61) 97777-3333', 'Brasília', 'DF', '70778-887', '$2y$10$dTUNfuupP5nSpYHxJ1Dg7.4VW7rRxkU.VZxuYCG/d5RjYAAXsgOyq', 'hvVMQv21DKOUwZhSf2p4AursreJF2i0XUpX65XF3K3t50v35UNuxUxT5X79j', '2018-11-28 23:19:42', '2018-11-28 23:19:42');

/* Inserção na tabela SENSORS */
INSERT INTO `sensors` (`id_sensor`, `nome_sensor`, `tempmax`, `tempmin`, `obs`, `temperatura`, `bateria`, `status_sensor`, `created_at`, `updated_at`, `grupo_id_grupo`, `empresa_id_empresa`) VALUES
(268, 'Salsicha 2', 16, -13, 'fdfdfdjhj', -20, 100, 1, '2018-11-30 15:56:22', '2018-12-03 16:32:00', 7, 1),
(123445, 'Teste', 50, 60, 'AYEBEUEBEEJ', NULL, NULL, NULL, '2018-12-04 17:58:27', '2018-12-04 17:59:29', 8, 1),
(1234567, 'Novo', 546, 23, 'Atualizado', 10, 75, 1, '2018-12-04 19:04:19', '2018-12-04 19:54:06', 6, 1),
(68546856, 'Amendoim 1', 20, 33, 'Esse é dos amendoins de cebola e salsa', -20, 100, 1, '2018-11-30 15:47:11', '2018-12-04 19:20:16', 6, 1),
(123445678, 'Teste2', 62, 56, 'Gaysbeejdben', NULL, NULL, NULL, '2018-12-04 18:07:28', '2018-12-04 18:07:28', 8, 1),
(230316668, 'Loko', -17, 15, 'dfgdgdfgdfgdfg', -10, 100, 1, '2018-12-04 01:17:04', '2018-12-04 01:17:04', 6, 1),
(304948933, 'Amendoim 2', 24, 15, 'amendoim :D', 20, 100, 1, '2018-11-30 15:52:53', '2018-12-03 17:34:11', 6, 1),
(745387658, 'Sorvetes 3', 1, 1, 'ghgdsggsgd', 5, 100, 1, '2018-11-30 19:26:22', '2018-11-30 19:26:22', 6, 1),
(864165168, 'Salsicha 1', -15, -20, 'Tem salsicha', 12, 100, 1, '2018-11-30 15:47:42', '2018-11-30 15:47:42', 7, 1),
(6656514641, 'Amendoim 4', 10, -5, 'lorem ipsum dolor sit amed', 6, 100, 1, '2018-12-03 17:33:45', '2018-12-03 17:33:45', 6, 1),
(6656514642, 'Sorvete', -10, -20, 'XPTO', NULL, NULL, NULL, '2018-12-04 19:26:00', '2018-12-04 19:26:00', 14, 2);
