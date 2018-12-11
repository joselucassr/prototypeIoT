-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 10-Dez-2018 às 15:46
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
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `id` int(10) UNSIGNED NOT NULL,
  `temperatura` double(8,3) NOT NULL,
  `status` double(8,3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bateria` double(8,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sensor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos`
--

CREATE TABLE `grupos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `obs` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `grupos`
--

INSERT INTO `grupos` (`id`, `nome`, `obs`, `created_at`, `updated_at`, `user_id`) VALUES
(6, 'Amendoim', 'Nem precisa mas está gelando', '2018-11-28 19:07:22', '2018-11-28 19:07:22', 1),
(7, 'Salsicha', 'É feito de jornal', '2018-11-28 21:12:35', '2018-11-28 21:12:35', 1),
(9, 'Biscoito', 'Esse tem biscoito', '2018-11-29 11:45:27', '2018-11-29 11:45:27', 1),
(13, 'Refrigerantes', 'Tem refris', '2018-11-30 19:10:21', '2018-11-30 19:10:21', 1),
(14, 'Grupo #1', 'Lorem ipsum dolor sit amed', '2018-12-04 19:23:54', '2018-12-04 19:23:54', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_11_25_131929_create_grupos_table', 1),
(4, '2018_11_25_133223_create_sensores_table', 1),
(5, '2018_11_25_133822_create_estado_table', 1),
(6, '2018_11_25_225255_add_user_id_to_grupos', 1),
(7, '2018_11_25_231436_add_grupo_id_to_sensor', 1),
(8, '2018_11_25_231704_add_sensor_id_to_dado', 1);

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
  `id` bigint(19) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempmax` int(11) NOT NULL,
  `tempmin` int(11) NOT NULL,
  `obs` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `temperatura` float DEFAULT NULL,
  `bateria` float DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `grupo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sensors`
--

INSERT INTO `sensors` (`id`, `nome`, `tempmax`, `tempmin`, `obs`, `temperatura`, `bateria`, `status`, `created_at`, `updated_at`, `grupo_id`, `user_id`) VALUES
(268, 'Salsicha 2', 16, -13, 'fdfdfdjhj', -20, 100, 'ATIVO', '2018-11-30 15:56:22', '2018-12-03 16:32:00', 7, 1),
(123445, 'Teste', 50, 60, 'AYEBEUEBEEJ', NULL, NULL, NULL, '2018-12-04 17:58:27', '2018-12-04 17:59:29', 8, 1),
(1234567, 'Novo', 546, 23, 'Atualizado', 10, 75, 'ATIVO', '2018-12-04 19:04:19', '2018-12-04 19:54:06', 6, 1),
(68546856, 'Amendoim 1', 20, 33, 'Esse é dos amendoins de cebola e salsa', -20, 100, 'ATIVO', '2018-11-30 15:47:11', '2018-12-04 19:20:16', 6, 1),
(123445678, 'Teste2', 62, 56, 'Gaysbeejdben', NULL, NULL, NULL, '2018-12-04 18:07:28', '2018-12-04 18:07:28', 8, 1),
(230316668, 'Loko', -17, 15, 'dfgdgdfgdfgdfg', -10, 100, 'ATIVO', '2018-12-04 01:17:04', '2018-12-04 01:17:04', 6, 1),
(304948933, 'Amendoim 2', 24, 15, 'amendoim :D', 20, 100, 'ATIVO', '2018-11-30 15:52:53', '2018-12-03 17:34:11', 6, 1),
(745387658, 'Sorvetes 3', 1, 1, 'ghgdsggsgd', 5, 100, 'ATIVO', '2018-11-30 19:26:22', '2018-11-30 19:26:22', 6, 1),
(864165168, 'Salsicha 1', -15, -20, 'Tem salsicha', 12, 100, 'ATIVO', '2018-11-30 15:47:42', '2018-11-30 15:47:42', 7, 1),
(6656514641, 'Amendoim 4', 10, -5, 'lorem ipsum dolor sit amed', 6, 100, 'ATIVO', '2018-12-03 17:33:45', '2018-12-03 17:33:45', 6, 1),
(6656514642, 'Sorvete', -10, -20, 'XPTO', NULL, NULL, NULL, '2018-12-04 19:26:00', '2018-12-04 19:26:00', 14, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome_empresa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_empresa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone_1_empresa` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone_2_empresa` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_usuario`
--

CREATE TABLE `users_usuario` (
                       `id` int(10) UNSIGNED NOT NULL,
                       `nome_usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                       `cpf` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
                       `email_usuario` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
                       `telefone_usuario` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
                       `celular_usuario` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
                       `genero` int(11) NOT NULL,
                       `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
                       `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                       `created_at` timestamp NULL DEFAULT NULL,
                       `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome_empresa`, `cnpj`, `email_empresa`, `telefone_1_empresa`, `telefone_2_empresa`, `cidade`, `estado`, `cep`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jeni Enterprise', '99999999996', 'jeni@empresa.com', '6191111111', '6191111111', 'Brasília', 'DF', '99999999', '$2y$12$58VeD2qfy9v3h2kwn24/fu0OzOCPo0SlRXTVxZIY5oTQIEv4elPPO', 'Ob8VRGdRRPNVLnycg1oupFq1awfDRDa3QDnbOfXt8sdd17dvYdMaII94THn2', '2018-11-26 18:37:31', '2018-12-05 19:46:55'),
(2, 'Apresentar', '78.907.668/9096-66', 'email@apresentar.com', '(61) 9999-8888', '(61) 97777-3333', 'Brasília', 'DF', '70778-887', '$2y$10$dTUNfuupP5nSpYHxJ1Dg7.4VW7rRxkU.VZxuYCG/d5RjYAAXsgOyq', 'hvVMQv21DKOUwZhSf2p4AursreJF2i0XUpX65XF3K3t50v35UNuxUxT5X79j', '2018-11-28 23:19:42', '2018-11-28 23:19:42');


--
-- Extraindo dados da tabela `users_usuario`
--

INSERT INTO `users_usuario` (`id`,`nome_usuario`, `cpf`, `email_usuario`, `telefone_usuario`, `celular_usuario`, `genero`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Zé', '9999999999', 'joselucasrs@gmail.com', '6199999999', '6199999999', 1, '$2y$12$58VeD2qfy9v3h2kwn24/fu0OzOCPo0SlRXTVxZIY5oTQIEv4elPPO', 'Ob8VRGdRRPNVLnycg1oupFq1awfDRDa3QDnbOfXt8sdd17dvYdMaII94THn2', '2018-11-26 18:37:31', '2018-12-05 19:46:55'),
(2, 'Eliel', '888.899.997-66', 'eliel@apresentar.com', '(61) 9852-5535', '(61) 95233-5852', 1, '$2y$10$dTUNfuupP5nSpYHxJ1Dg7.4VW7rRxkU.VZxuYCG/d5RjYAAXsgOyq', 'hvVMQv21DKOUwZhSf2p4AursreJF2i0XUpX65XF3K3t50v35UNuxUxT5X79j', '2018-11-28 23:19:42', '2018-11-28 23:19:42');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `dados`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `sensors`
--
ALTER TABLE `sensors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_cnpj_unique` (`cnpj`),
  ADD UNIQUE KEY `users_email_empresa_unique` (`email_empresa`),
  ADD UNIQUE KEY `users_telefone_1_empresa_unique` (`telefone_1_empresa`),
  ADD UNIQUE KEY `users_telefone_2_empresa_unique` (`telefone_2_empresa`),
  ADD UNIQUE KEY `users_cpf_unique` (`cpf`),
  ADD UNIQUE KEY `users_email_usuario_unique` (`email_usuario`),
  ADD UNIQUE KEY `users_telefone_usuario_unique` (`telefone_usuario`),
  ADD UNIQUE KEY `users_celular_usuario_unique` (`celular_usuario`);

--
-- Indexes for table `users_usuario`
--
ALTER TABLE `users_usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_cpf_unique` (`cpf`),
  ADD UNIQUE KEY `users_email_usuario_unique` (`email_usuario`),
  ADD UNIQUE KEY `users_telefone_usuario_unique` (`telefone_usuario`),
  ADD UNIQUE KEY `users_celular_usuario_unique` (`celular_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sensors`
--
ALTER TABLE `sensors`
  MODIFY `id` bigint(19) UNSIGNED NOT NULL;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- AUTO_INCREMENT for table `users_usuario`
--
ALTER TABLE `users_usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
