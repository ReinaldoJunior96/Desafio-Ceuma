-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Abr-2019 às 00:09
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desafio_ceuma`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome_aluno` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `CPF` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` text COLLATE utf8_unicode_ci NOT NULL,
  `CEP` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `curso_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `nome_aluno`, `CPF`, `endereco`, `CEP`, `email`, `telefone`, `curso_id`) VALUES
(3, 'João Enzo', '00280910274', 'rua taltaltalla chupá minha benga lalallalalala', '69932970', 'jjoaoenzobrito@efetivaseguros.com.br', '985847584', 7),
(5, 'Sarah Isabel Fátima Nunes', '45678912348', 'Avenida Prefeito Rolando Moreira 336', '65048752', 'Sarah@gmail.com', '(68) 2512-1772', 7),
(6, 'Jaqueline Manuela da Rocha', '25485698475', 'Avenida Prefeito Rolando Moreira 336', '65489658', 'jaqueline@gmail.com', '(68) 98526-3326', 7),
(7, 'Anderson Igor Melo', '05485321542', 'Avenida Prefeito Rolando Moreira 336', '62536741', 'anderson@gmail.com', '(68) 3729-4376', 8),
(8, 'Diogo Lucas Bento da Luz', '24582365412', 'Avenida Prefeito Rolando Moreira 336', '52415379', 'diogo@gmail.com', '(68) 3998-7709', 8),
(9, 'Thales Julio Manoel Drumond', '24584575362', 'Avenida Prefeito Rolando Moreira 336', '01524523', 'thales@gmail.com', '(68) 3998-7709', 9),
(10, 'Juan Lorenzo Anthony de Paula', '02536954753', 'Avenida Prefeito Rolando Moreira 336', '06532154', 'juan@gmail.com', '(68) 2512-1772', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunolog`
--

CREATE TABLE `alunolog` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario_logado` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `operacao_realizada` text COLLATE utf8_unicode_ci NOT NULL,
  `operacao` char(1) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome_curso` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `data_cadastro` date NOT NULL,
  `carga_horaria` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id`, `nome_curso`, `data_cadastro`, `carga_horaria`) VALUES
(7, 'Medicina', '2019-04-12', '120 Horas'),
(8, 'Administração', '2019-04-09', '150 Horas'),
(9, 'Direito', '2019-04-20', '200 Horas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursolog`
--

CREATE TABLE `cursolog` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario_logado` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `operacao_realizada` text COLLATE utf8_unicode_ci NOT NULL,
  `operacao` char(1) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cursolog`
--

INSERT INTO `cursolog` (`id`, `usuario_logado`, `data`, `operacao_realizada`, `operacao`) VALUES
(1, 'reinaldo', '2019-04-14 04:54:40', 'DB::table(\'curso\')->where(\'id\', \'=\', 20)->delete();', 'E'),
(2, 'admin', '2019-04-14 05:12:58', 'DB::table(\'curso\')->where(\'id\', \'=\', 19)->delete();', 'E'),
(3, 'admin', '2019-04-14 05:13:05', 'DB::table(\'curso\')->where(\'id\', \'=\', 16)->delete();', 'E'),
(4, 'admin', '2019-04-15 21:09:00', 'DB::table(\'curso\')->insert([\n            \'nome_curso\' => Sistema de informação,\n            \'data_cadastro\' => 2019-04-15,\n            \'carga_horaria\' =>50 horas\n            ]);', 'I'),
(5, 'admin', '2019-04-15 21:12:26', 'DB::table(\'curso\')\n                ->where(\'id\', \'=\',10)\n                ->update([\n                    \'nome_curso\' => Sistema de reinaldo,\n                    \'data_cadastro\' =>2019-04-15,\n                    \'carga_horaria\' => 550 horas\n                ]);', 'A'),
(6, 'admin', '2019-04-15 21:14:49', 'DB::table(\'curso\')->where(\'id\', \'=\', 10)->delete();', 'E'),
(7, 'admin', '2019-04-15 21:28:08', 'DB::table(\'curso\')\n                ->where(\'id\', \'=\',9)\n                ->update([\n                    \'nome_curso\' => Direito,\n                    \'data_cadastro\' =>2019-04-20,\n                    \'carga_horaria\' => 200 Horas\n                ]);', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(41, '2014_10_12_000000_create_users_table', 1),
(42, '2014_10_12_100000_create_password_resets_table', 1),
(43, '2019_04_11_002050_criar_tabela_aluno', 1),
(44, '2019_04_11_003028_criar_tabela_curso', 1),
(50, '2019_04_11_004030_criar_tabela_alunolog', 3),
(51, '2019_04_11_004048_criar_tabela_cursolog', 3),
(52, '2019_04_11_162609_criar_tabela_usuario', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `modulo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `operacao` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `senha`, `modulo`, `operacao`) VALUES
(1, 'admin', '123', 'curso', 'IAEV'),
(2, 'admin', '123', 'aluno', 'IAEV'),
(3, 'reinaldo', '123', 'curso', 'IAEV'),
(4, 'reinaldo', '123', 'aluno', 'V');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aluno_cpf_unique` (`CPF`),
  ADD UNIQUE KEY `aluno_cep_unique` (`CEP`),
  ADD UNIQUE KEY `aluno_email_unique` (`email`),
  ADD KEY `curso_id` (`curso_id`);

--
-- Indexes for table `alunolog`
--
ALTER TABLE `alunolog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cursolog`
--
ALTER TABLE `cursolog`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `alunolog`
--
ALTER TABLE `alunolog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cursolog`
--
ALTER TABLE `cursolog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `curso_id` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
