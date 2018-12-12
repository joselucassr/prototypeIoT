-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 12-Dez-2018 às 16:50
-- Versão do servidor: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `temp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(10) UNSIGNED NOT NULL,
  `nome_empresa` varchar(255) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `email_empresa` varchar(255) NOT NULL,
  `telefone_empresa` varchar(14) NOT NULL,
  `celular_empresa` varchar(15) NOT NULL,
  `cidade` varchar(60) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nome_empresa`, `cnpj`, `email_empresa`, `telefone_empresa`, `celular_empresa`, `cidade`, `estado`, `cep`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jeni Enterprise', '99999999996', 'jeni@empresa.com', '6191111111', '6191111111', 'Brasília', 'DF', '99999999', '$2y$12$58VeD2qfy9v3h2kwn24/fu0OzOCPo0SlRXTVxZIY5oTQIEv4elPPO', 'dC2VxniBwRYNra5hyYlNjQeNAIKou4GMilERBSZMWNq6zqcBSrO4hk9TR8ch', '2018-11-26 20:37:31', '2018-12-05 21:46:55'),
(2, 'Apresentar', '78.907.668/9096-', 'email@apresentar.com', '(61) 9999-8', '(61) 97777-33', 'Brasília', 'DF', '70778-887', '$2y$10$dTUNfuupP5nSpYHxJ1Dg7.4VW7rRxkU.VZxuYCG/d5RjYAAXsgOyq', 'hvVMQv21DKOUwZhSf2p4AursreJF2i0XUpX65XF3K3t50v35UNuxUxT5X79j', '2018-11-29 01:19:42', '2018-11-29 01:19:42'),
(3, 'Empresa', '36.541.635/4163-54', 'teste@empresa.com', '(36) 5416-3541', '(36) 54163-5416', 'Brasília', 'AM', '36541-635', '$2y$10$zistGRe7kYnv8UxQX6tMxu/TVZ4HF7v1hAZ9BrrTenDgZHGIJ3zL.', 'bB4U3mimhgigWi0PZ4dazc6M7bVQbQmxpkju1BmxVqJp1jk7zsoSBT87keLW', '2018-12-11 17:55:50', '2018-12-11 17:55:50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(10) UNSIGNED NOT NULL,
  `sensor_id_sensor` int(10) UNSIGNED NOT NULL,
  `temperatura` float DEFAULT NULL,
  `bateria` float DEFAULT NULL,
  `status_sensor` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos`
--

CREATE TABLE `grupos` (
  `id_grupo` int(10) UNSIGNED NOT NULL,
  `empresa_id_empresa` int(10) UNSIGNED NOT NULL,
  `nome_grupo` varchar(255) DEFAULT NULL,
  `descricao_grupo` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `grupos`
--

INSERT INTO `grupos` (`id_grupo`, `empresa_id_empresa`, `nome_grupo`, `descricao_grupo`, `created_at`, `updated_at`) VALUES
(1, 3, 'Sorvete', 'Sorvete foi', '2018-12-11 18:53:25', '2018-12-11 18:53:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sensors`
--

CREATE TABLE `sensors` (
  `id_sensor` bigint(19) UNSIGNED NOT NULL,
  `empresa_id_empresa` int(10) UNSIGNED NOT NULL,
  `grupo_id_grupo` int(10) UNSIGNED NOT NULL,
  `nome_sensor` varchar(255) DEFAULT NULL,
  `tempmax` int(11) DEFAULT NULL,
  `tempmin` int(11) DEFAULT NULL,
  `obs` text,
  `temperatura` float DEFAULT NULL,
  `bateria` float DEFAULT NULL,
  `status_sensor` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sensors`
--

INSERT INTO `sensors` (`id_sensor`, `empresa_id_empresa`, `grupo_id_grupo`, `nome_sensor`, `tempmax`, `tempmin`, `obs`, `temperatura`, `bateria`, `status_sensor`, `created_at`, `updated_at`) VALUES
(268, 1, 7, 'Salsicha 2', 16, -13, 'fdfdfdjhj', -20, 100, 1, '2018-11-30 17:56:22', '2018-12-03 18:32:00'),
(123445, 1, 8, 'Teste', 50, 60, 'AYEBEUEBEEJ', NULL, NULL, NULL, '2018-12-04 19:58:27', '2018-12-04 19:59:29'),
(1234567, 1, 6, 'Novo', 546, 23, 'Atualizado', 10, 75, 1, '2018-12-04 21:04:19', '2018-12-04 21:54:06'),
(68546856, 1, 6, 'Amendoim 1', 20, 33, 'Esse é dos amendoins de cebola e salsa', -20, 100, 1, '2018-11-30 17:47:11', '2018-12-04 21:20:16'),
(123445678, 1, 8, 'Teste2', 62, 56, 'Gaysbeejdben', NULL, NULL, NULL, '2018-12-04 20:07:28', '2018-12-04 20:07:28'),
(230316668, 1, 6, 'Loko', -17, 15, 'dfgdgdfgdfgdfg', -10, 100, 1, '2018-12-04 03:17:04', '2018-12-04 03:17:04'),
(304948933, 1, 6, 'Amendoim 2', 24, 15, 'amendoim :D', 20, 100, 1, '2018-11-30 17:52:53', '2018-12-03 19:34:11'),
(745387658, 1, 6, 'Sorvetes 3', 1, 1, 'ghgdsggsgd', 5, 100, 1, '2018-11-30 21:26:22', '2018-11-30 21:26:22'),
(864165168, 1, 7, 'Salsicha 1', -15, -20, 'Tem salsicha', 12, 100, 1, '2018-11-30 17:47:42', '2018-11-30 17:47:42'),
(6656514641, 1, 6, 'Amendoim 4', 10, -5, 'lorem ipsum dolor sit amed', 6, 100, 1, '2018-12-03 19:33:45', '2018-12-03 19:33:45'),
(6656514642, 2, 14, 'Sorvete', -10, -20, 'XPTO', NULL, NULL, NULL, '2018-12-04 21:26:00', '2018-12-04 21:26:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `empresa_id_empresa` int(10) UNSIGNED NOT NULL,
  `nome_usuario` varchar(255) NOT NULL,
  `cpf` varchar(16) NOT NULL,
  `email_usuario` varchar(255) NOT NULL,
  `telefone_usuario` varchar(15) NOT NULL,
  `celular_usuario` varchar(18) NOT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id_usuario`, `empresa_id_empresa`, `nome_usuario`, `cpf`, `email_usuario`, `telefone_usuario`, `celular_usuario`, `genero`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Zé', '9999999999', 'joselucasrs@gmail.com', '6199999999', '6199999999', '1', '$2y$12$58VeD2qfy9v3h2kwn24/fu0OzOCPo0SlRXTVxZIY5oTQIEv4elPPO', 'Ob8VRGdRRPNVLnycg1oupFq1awfDRDa3QDnbOfXt8sdd17dvYdMaII94THn2', '2018-11-26 20:37:31', '2018-12-05 21:46:55'),
(2, 2, 'Eliel', '888.899.997-66', 'eliel@apresentar.com', '(61) 9852-5', '(61) 95233-58', '1', '$2y$10$dTUNfuupP5nSpYHxJ1Dg7.4VW7rRxkU.VZxuYCG/d5RjYAAXsgOyq', 'hvVMQv21DKOUwZhSf2p4AursreJF2i0XUpX65XF3K3t50v35UNuxUxT5X79j', '2018-11-29 01:19:42', '2018-11-29 01:19:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`),
  ADD UNIQUE KEY `cnpj` (`cnpj`),
  ADD UNIQUE KEY `email_empresa` (`email_empresa`),
  ADD UNIQUE KEY `telefone_empresa` (`telefone_empresa`),
  ADD UNIQUE KEY `celular_empresa` (`celular_empresa`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`),
  ADD KEY `estado_FKIndex1` (`sensor_id_sensor`);

--
-- Indexes for table `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id_grupo`),
  ADD KEY `grupo_FKIndex2` (`empresa_id_empresa`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `sensors`
--
ALTER TABLE `sensors`
  ADD PRIMARY KEY (`id_sensor`),
  ADD KEY `sensor_FKIndex1` (`grupo_id_grupo`),
  ADD KEY `sensor_FKIndex2` (`empresa_id_empresa`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email_usuario` (`email_usuario`),
  ADD UNIQUE KEY `telefone_usuario` (`telefone_usuario`),
  ADD UNIQUE KEY `celular_usuario` (`celular_usuario`),
  ADD KEY `users_FKIndex1` (`empresa_id_empresa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id_grupo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
