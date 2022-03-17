CREATE TABLE `anum`.`especie`(
	`id` INT NOT NULL AUTO_INCREMENT,
	`nombre` INT NOT NULL,
	PRIMARY KEY(`id`)
) ENGINE = InnoDB;

CREATE TABLE `anum`.`contacto`(
	`id` INT NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(30) NOT NULL,
	`correo` VARCHAR(30) NOT NULL,
	`telefono` VARCHAR(20) NOT NULL,
	`eliminado` BOOLEAN DEFAULT FALSE,
	PRIMARY KEY(`id`)
) ENGINE = InnoDB;

CREATE TABLE `anum`.`animal`(
	`id` INT NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(20) NOT NULL,
	`edad` INT(11) NOT NULL,
	`foto` VARCHAR(255) NOT NULL ,
	`idEspecie` INT NOT NULL REFERENCES especie(id),
	`idContacto` INT NOT NULL REFERENCES contacto(id),
	`eliminado` BOOLEAN DEFAULT FALSE,
	PRIMARY KEY(`id`)
) ENGINE = InnoDB;

CREATE TABLE `anum`.`empleado`(
	`id` INT NOT NULL AUTO_INCREMENT,
	`usuario` VARCHAR(30) NOT NULL,
	`nombre` VARCHAR(30) NOT NULL,
	`contraseña` VARCHAR(255) NOT NULL,
	`correo` VARCHAR(30) NOT NULL,
	`area` VARCHAR(30) NOT NULL,
	`esAdmin` BOOLEAN DEFAULT FALSE,
	`eliminado` BOOLEAN DEFAULT FALSE,
	PRIMARY KEY(`id`)
) ENGINE = InnoDB;

CREATE TABLE `anum`.`gasto`(
	`id` INT NOT NULL AUTO_INCREMENT,
	`concepto` VARCHAR(30) NOT NULL,
	`fecha` DATE NOT NULL,
	`cantidad` INT NOT NULL,
	`eliminado` BOOLEAN DEFAULT FALSE,
	PRIMARY KEY(`id`)
) ENGINE = InnoDB;

CREATE TABLE `anum`.`vacunacion`(
	`id` INT NOT NULL AUTO_INCREMENT,
	`tipo` VARCHAR(30) NOT NULL,
	`marca` VARCHAR(30) NOT NULL,
	`fecha` VARCHAR(30) NOT NULL,
	`idAnimal` INT NOT NULL REFERENCES animal(id),
	`idGasto` INT NOT NULL REFERENCES gasto(id),
	`eliminado` BOOLEAN DEFAULT FALSE,
	PRIMARY KEY(`id`)
) ENGINE = InnoDB;

CREATE TABLE `anum`.`veterinario`(
	`id` INT NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(30) NOT NULL,
	`correo` VARCHAR(30) NOT NULL ,
	`telefono` VARCHAR(20) NOT NULL ,
	`direccion` VARCHAR(30) NOT NULL ,
	`horario` VARCHAR(30) NOT NULL,
	`eliminado` BOOLEAN DEFAULT FALSE,
	PRIMARY KEY(`id`)
) ENGINE = InnoDB;

CREATE TABLE `anum`.`voluntario`(
	`id` INT NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(30) NOT NULL,
	`correo` VARCHAR(30) NOT NULL,
	`eliminado` BOOLEAN DEFAULT FALSE,
	PRIMARY KEY(`id`)
) ENGINE = InnoDB;

CREATE TABLE `anum`.`donador`(
	`id` INT NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(30) NOT NULL,
	`rfc` VARCHAR(15) NOT NULL, 
	`correo` VARCHAR(30) NOT NULL,
	`eliminado` BOOLEAN DEFAULT FALSE,
	PRIMARY KEY(`id`)
) ENGINE = InnoDB;

CREATE TABLE `anum`.`donaciones`(
	`id` INT NOT NULL AUTO_INCREMENT,
	`fecha` DATE NOT NULL,
	`cantidad` VARCHAR(255) NOT NULL,
	`idDonador` INT NOT NULL REFERENCES donador(id),
	`eliminado` BOOLEAN DEFAULT FALSE,
	PRIMARY KEY(`id`)
) ENGINE = InnoDB;

CREATE TABLE `anum`.`tratamiento`(
	`id` INT NOT NULL AUTO_INCREMENT,
	`duracion` VARCHAR(30) NOT NULL,
	`frecuencia` VARCHAR(30) NOT NULL,
	`descripcion` VARCHAR(30) NOT NULL,
	`idAnimal` INT NOT NULL REFERENCES animal(id),
	`idGasto` INT NOT NULL REFERENCES gasto(id),
	`eliminado` BOOLEAN DEFAULT FALSE,
	PRIMARY KEY(`id`)
) ENGINE = InnoDB;

CREATE TABLE `anum`.`enfermedad`(
	`id` INT NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(30) NOT NULL,
	`tratoEspecial` TEXT NOT NULL,
	`descripcion` TEXT NOT NULL,
	`idAnimal` INT NOT NULL REFERENCES animal(id)
	PRIMARY KEY(`id`)
) ENGINE = InnoDB;