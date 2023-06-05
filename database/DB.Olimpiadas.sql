DROP DATABASE IF EXISTS olimpiadas;

CREATE DATABASE olimpiadas;
USE olimpiadas; 

-- -----------------------------------------------------------------------------------------------------------------------------------
CREATE TABLE personas
(
	idpersona 			INT AUTO_INCREMENT PRIMARY KEY,
	apellidos			VARCHAR 	(40) NOT NULL,
	nombres				VARCHAR 	(40) NOT NULL,
	documentoI			VARCHAR 	(10) NOT NULL,
	numDocumento 			CHAR 		(20) NOT NULL,
	genero				CHAR 	  	(1)  NOT NULL, -- Masculino(M), Femenino(F)
	peso				CHAR     	(10) NULL,
	fechanacimiento 		DATE      	NOT NULL,
	edad				CHAR  		(3)  NOT NULL,
	pais				VARCHAR 	(20) NOT NULL,
	
	CONSTRAINT uk_numDocumento_per 			UNIQUE(numDocumento), 
	CONSTRAINT check_complejidad_per			CHECK(genero IN('M','F'))
	
)ENGINE = INNODB;

INSERT INTO personas(apellidos, nombres, documentoI, numDocumento, genero, peso, fechanacimiento, edad,  pais) VALUES
('Bielsa Caldera','Felipe','DNI','11223344555','M','40 kilos','1993/01/06','30','Argentina'),
('Vincente Del Bosque','González','DNI','22443345','M','60 kilos','1997/04/12','26','España'),
('Perreira Santos','Alberto','RIC','7711228812','M','67 kilos','1988/12/10','35','Brasil'),
('Gomez Quispe','Juan','DNI','99112234','M','50 kilos','1990/11/11','33','Peru'),
('Perez Cusi','Alessia','RIC','9711228112','F','40 kilos','1993/02/10','30','Brasil'),
('Mendoza Laura','Juan Jhon','DNI','3741228842','M','12 kilos','1997/06/11','26','Colombia'),
('Guillen Gallardo','Leydi Deyanira','RIC','1311528812','F','46 kilos','1988/12/10','35','Argentina'),
('Camacho Carrasco','Jesus','RIC','2311528232','M','40 kilos','2004/12/10','18','Argentina')

-- -----------------------------------------------------------------------------------------------------------------------------------
-- Usuario
INSERT INTO personas(apellidos, nombres, documentoI, numDocumento, genero, fechanacimiento, edad,  pais)VALUES
('Camacho Mendoza','Edu','DNI','772223176','M','1993/01/06','30','Peru')

  
CREATE TABLE usuarios
(
	idusuario		INT AUTO_INCREMENT PRIMARY KEY,
	idpersona		INT 		NOT NULL,
	nombreusuario		VARCHAR(70)	NOT NULL,
	claveacceso		VARCHAR(90)	NOT NULL,
	email			VARCHAR(70)	NOT NULL,
	fecharegistro		DATETIME	NOT NULL DEFAULT NOW(),
	estado			CHAR(1)		NOT NULL DEFAULT '1',
	
	CONSTRAINT fk_idpersonausu_personas FOREIGN KEY (idpersona) REFERENCES personas (idpersona),
	CONSTRAINT uk_nom_usuarios	UNIQUE (nombreusuario),
	CONSTRAINT uk_email_usuarios	UNIQUE (email)
	
)ENGINE = INNODB;
  
  
  INSERT INTO usuarios (idpersona,nombreusuario,claveacceso , email)VALUES
  (8,'jesu','jesuscc','jesu@gmail.com')
  
  SELECT * FROM usuarios;
  
  
DELIMITER$$
CREATE PROCEDURE spu_usuario_login(IN _email VARCHAR(70))
BEGIN
SELECT 	idusuario,
	nombreusuario,
	claveacceso,
	email
     FROM usuarios
     WHERE email = _email AND estado ='1';
END$$

CALL spu_usuario_login ('jesu@gmail.com');

UPDATE usuarios SET
claveacceso = '$2y$10$fSTQcDmaZbPu3zL8ypwp..Xuulmqq2oxAER9pF14pYdMrNsjswBT2'
WHERE idusuario =1;

-- -----------------------------------------------------------------------------------------------------------------------------------

CREATE TABLE olimpiadas
(
  idolimpiada INT AUTO_INCREMENT PRIMARY KEY,
  nombre	VARCHAR (50) NOT NULL,
  fechaInicio	DATETIME     NOT NULL,
  fechaFin	DATETIME     NOT NULL
  
)ENGINE = INNODB;

INSERT INTO olimpiadas (nombre, fechaInicio, fechaFin) VALUES
	('Olimpiadas/2023', '2023/07/01', '2023/11/01')

SELECT * FROM olimpiadas;

-- -----------------------------------------------------------------------------------------------------------------------------------
CREATE TABLE delegaciones
(
	iddelegacion	INT AUTO_INCREMENT PRIMARY KEY,
	nombre		VARCHAR(20) NOT NULL,
	pais		VARCHAR(20) NOT NULL,
	ciudad 		VARCHAR(30) NOT NULL,
	direccion 	VARCHAR(30) NOT NULL,
	equipoDe	VARCHAR(20) NOT NULL,
	
	CONSTRAINT uk_nombre_sed UNIQUE(nombre,direccion,equipoDe)
	
)ENGINE = INNODB;

INSERT INTO delegaciones (nombre, pais, ciudad, direccion, equipoDe)VALUES
('ATLETIC','Peru','Lima','AVN.Callao','E-1'),
('CICLIT','Peru','Ica','AVN.chincha','E-2'),
('BOXDT','Peru','Cusco','AVN.Cusco','E-3'),
('BEIST','Peru','Lima','AVN.Lima', 'E-4')

INSERT INTO delegaciones (nombre, pais, ciudad, direccion, equipoDe)VALUES
('ARYENTINA','Argentina','Buenos Aires','AVN.Arg','E-5'),



SELECT * FROM delegaciones;

-- -----------------------------------------------------------------------------------------------------------------------------------
CREATE TABLE entrenadores 
(	
	identrenador	INT AUTO_INCREMENT PRIMARY KEY,
	idpersona	INT NOT NULL,
	idolimpiada	INT NOT NULL,
	iddelegacion	INT NOT NULL,
	
	CONSTRAINT uk_idpersona_ent FOREIGN KEY (idpersona) REFERENCES personas(idpersona),
	CONSTRAINT uk_idolimpiada_ent FOREIGN KEY (idolimpiada) REFERENCES olimpiadas(idolimpiada),
	CONSTRAINT uk_iddelegacion_ent FOREIGN KEY (iddelegacion) REFERENCES delegaciones(iddelegacion)
	
)ENGINE = INNODB;

INSERT INTO entrenadores(idpersona, idolimpiada, iddelegacion)VALUES
(1,1,1),
(3,1,2),
(5,1,3),
(7,1,4)

INSERT INTO entrenadores(idpersona, idolimpiada, iddelegacion)VALUES
(1,1,5)

INSERT INTO entrenadores(idpersona, idolimpiada, iddelegacion)VALUES
(1,1,6)



SELECT * FROM entrenadores;
-- -----------------------------------------------------------------------------------------------------------------------------------
CREATE TABLE  deportes
(
	iddeporte		INT AUTO_INCREMENT PRIMARY KEY,
	nombreDeporte		VARCHAR (50) 	NOT NULL,
	descripcion		VARCHAR (200) 	NOT NULL,
	
	CONSTRAINT uk_nomD_dep UNIQUE (nombreDeporte)
	

)ENGINE = INNODB;

INSERT INTO deportes (nombreDeporte, descripcion)VALUES
('Atletismo','El atletismo es un deporte que agrupa numerosas disciplinas. El término atletismo deriva de la palabra griega "aetders" que significa competencia o combate'),
('Ciclismo','Competición El ciclismo de competición es un deporte en el que se utilizan distintos tipos de bicicletas'),
('Béisbol','El béisbol consiste en un juego que utiliza un bate, una pelota y guantes entre dos equipos de nueve jugadores cada uno en un campo con cuatro '),
('Boxeo',' es un conjunto de deportes de combate centrados en el golpe, en el que dos oponentes se enfrentan en una pelea usando al menos los puños')

SELECT * FROM deportes;

-- ----------------------------------------------------------------------------------------------------------------------------------- 

CREATE TABLE premiaciones
(
	idpremiacion		INT AUTO_INCREMENT PRIMARY KEY,
	idolimpiada		INT NOT NULL,
	iddelegacion		INT NOT NULL,
	puntos			VARCHAR(10) NOT NULL,
	medalla			VARCHAR(10) NOT NULL,
	numPuesto		CHAR(1) NOT NULL,		
	fechaP			DATE 	NOT NULL,
	
	CONSTRAINT fk_idolimpiada_pre FOREIGN KEY (idolimpiada) REFERENCES olimpiadas(idolimpiada),
	CONSTRAINT fk_iddelegacion_pre FOREIGN KEY (iddelegacion) REFERENCES delegaciones(iddelegacion)
)ENGINE =INNODB;

INSERT INTO premiaciones (idolimpiada, iddelegacion, puntos, medalla, numPuesto, FechaP)VALUES
(1,1,400,'Oro', 1, '2022/01/01'),
(1,2,300,'Plata', 2, '2022/01/11'),
(1,3,200,'Bronce', 3, '2022/01/13'),
(1,4,100,'Diploma', 4, '2022/01/04')

INSERT INTO premiaciones (idolimpiada, iddelegacion, puntos, medalla, numPuesto, FechaP)VALUES
(1,5,400,'Oro', 1, '2022/01/01')

INSERT INTO premiaciones (idolimpiada, iddelegacion, puntos, medalla, numPuesto, FechaP)VALUES
(1,1,400,'Diploma', 5, '2022/01/01')


SELECT * FROM premiaciones;

-- ----------------------------------------------------------------------------------------------------------------------------------- 

CREATE TABLE deportistas
(
	iddeportista	INT AUTO_INCREMENT PRIMARY KEY,
	idpersona	INT NOT NULL,
	iddeporte	INT NOT NULL,
	identrenador	INT NOT NULL,
	iddelegacion	INT NOT NULL,
	idpremiacion	INT NOT NULL,
	
	CONSTRAINT fk_idpersona_dep	FOREIGN KEY (idpersona) REFERENCES personas(idpersona),
	CONSTRAINT fk_identrenador_dep  FOREIGN KEY (identrenador)  REFERENCES entrenadores(identrenador),
	CONSTRAINT fk_iddeporte_dep  FOREIGN KEY (iddeporte)  REFERENCES deportes(iddeporte),
	CONSTRAINT fk_iddelegacion_dep	FOREIGN KEY (iddelegacion) REFERENCES delegaciones(iddelegacion),
	CONSTRAINT fk_idpremiacion_dep	FOREIGN KEY (idpremiacion) REFERENCES premiaciones(idpremiacion)
	
)ENGINE = INNODB;

INSERT INTO  deportistas (idpersona,iddeporte, identrenador, iddelegacion, idpremiacion)VALUES
(2,1,1,1,1),
(4,1,2,2,2),
(6,1,3,3,3),
(8,1,4,4,4)

INSERT INTO  deportistas (idpersona,iddeporte, identrenador, iddelegacion, idpremiacion)VALUES
(2,2,1,5,5)
INSERT INTO  deportistas (idpersona,iddeporte, identrenador, iddelegacion, idpremiacion)VALUES
(2,2,1,1,6)


SELECT * FROM deportistas;

-- ----------------------------------------------------------------------------------------------------------------------------------- 
DELIMITER $$
CREATE PROCEDURE spu_premiacion_listar()
BEGIN
	SELECT 
		delegaciones.`iddelegacion`,
		delegaciones.`nombre`,
		CONCAT (personas.`nombres`, ' ',personas.`apellidos`) AS Deportistas,-- Utilizo la funcion concat
		CONCAT(entrenadores_personas.`nombres`, ' ', entrenadores_personas.`apellidos`) AS Entrenador,
		deportes.`nombreDeporte`,
		premiaciones.`numPuesto`,
		premiaciones.`medalla`,
		premiaciones.`puntos`
		
		
	FROM deportistas
	
	LEFT  JOIN premiaciones ON premiaciones.`idpremiacion` = deportistas.`idpremiacion`
	LEFT  JOIN deportes ON deportes.`iddeporte` = deportistas.`iddeporte`
	LEFT  JOIN delegaciones ON delegaciones.`iddelegacion` = deportistas.`iddelegacion`
	LEFT  JOIN personas ON personas.`idpersona` = deportistas.`idpersona`
	LEFT  JOIN entrenadores ON entrenadores.`identrenador` = deportistas.`identrenador`
	LEFT JOIN personas entrenadores_personas ON entrenadores_personas.idpersona = entrenadores.idpersona;
END $$

CALL spu_premiacion_listar();

-- ----------------------------------------------------------------------------------------------------------------------------------- 
DELIMITER $$
CREATE PROCEDURE spu_personas_registrar
(


	IN _apellidos 		VARCHAR (40),
	IN _nombres    		VARCHAR (40),
	IN _documentoI   	VARCHAR (10),
	IN _numDocumento 	CHAR 	(20),
	IN _Genero  		CHAR 	(1)
)
BEGIN 
	INSERT INTO personas (apellidos  , nombres , documentoI , numDocumento , Genero)  VALUES
		(_apellidos  , _nombres, _documentoI, _numDocumento, _Genero);
	
END $$

CALL spu_personas_registrar ('Melgar Quispe', 'Pedro','DNI','73224253','M');
CALL spu_personas_registrar ('Fretel', 'Yefer','DNI','73244553','M');

-- ----------------------------------------------------------------------------------------------------------------------------------- 
DELIMITER $$
CREATE PROCEDURE spu_Deportista_registrar
(


	IN _idpersona 		INT,
	IN _iddeporte    	INT,
	IN _identrenador    	INT,
	IN _iddelegacion 	INT,
	IN _idpremiacion  	INT
)
BEGIN 
	INSERT INTO deportistas (idpersona , iddeporte , identrenador , iddelegacion , idpremiacion)  VALUES
		(_idpersona , _iddeporte, _identrenador, _iddelegacion, _idpremiacion);
	
END $$

CALL  spu_Deportista_registrar (10,2,1,1,6);

-- ----------------------------------------------------------------------------------------------------------------------------------- 

DELIMITER $$
CREATE PROCEDURE spu_delegaciones_lista(IN iddelegacion INT)
BEGIN
	SELECT 
		delegaciones.`iddelegacion`,
		delegaciones.`nombre`,
		CONCAT (personas.`nombres`, ' ',personas.`apellidos`) AS Deportistas,-- Utilizo la funcion concat
		CONCAT(entrenadores_personas.`nombres`, ' ', entrenadores_personas.`apellidos`) AS Entrenador,
		delegaciones.`pais`,
		delegaciones.`ciudad`,
		delegaciones.`direccion`,
		delegaciones.`equipoDe`
		
	FROM deportistas
	
	INNER  JOIN delegaciones ON delegaciones.`iddelegacion` = deportistas.`iddelegacion`
	INNER  JOIN personas ON personas.`idpersona` = deportistas.`idpersona`
	INNER  JOIN entrenadores ON entrenadores.`identrenador` = deportistas.`identrenador`
	INNER  JOIN personas entrenadores_personas ON entrenadores_personas.idpersona = entrenadores.idpersona
	
	WHERE deportistas.`iddelegacion` = iddelegacion;
END $$

CALL spu_delegaciones_lista (1);

