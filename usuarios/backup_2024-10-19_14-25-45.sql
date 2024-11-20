

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `name2` varchar(255) DEFAULT NULL COMMENT 'AFTER name',
  `email2` varchar(255) DEFAULT NULL COMMENT 'AFTER email',
  `phone2` varchar(15) DEFAULT NULL COMMENT 'AFTER phone',
  `address` text DEFAULT NULL COMMENT 'AFTER phone2',
  `startDate` date DEFAULT NULL COMMENT 'AFTER address',
  `endDate` date DEFAULT NULL COMMENT 'AFTER startDate',
  `observations` text DEFAULT NULL COMMENT 'AFTER endDate',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `filedata` longblob NOT NULL,
  `uploaded_at` int(11) DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `recibos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa` varchar(255) NOT NULL,
  `nome_cliente` varchar(255) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `referente` varchar(255) NOT NULL,
  `forma_pagamento` varchar(50) NOT NULL,
  `parcelas` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `codigo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO users VALUES("1","vitor","$2y$10$.lcwjOH1mVcDLivn.b7pBeWF7.vtXuwrZRljvFaY3k37voK0NBTX.","vg052173@gmail.com");
