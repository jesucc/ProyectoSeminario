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
	fechanacimiento 		DATE      	     NOT NULL,
	
	CONSTRAINT uk_numDocumento_per 				UNIQUE(numDocumento), 
	CONSTRAINT check_complejidad_per			CHECK(genero IN('M','F','N/O'))
	
)ENGINE = INNODB;

INSERT INTO personas(apellidos, nombres, documentoI, numDocumento, genero, fechanacimiento) VALUES
('Bielsa Caldera','Felipe','DNI','23232323','M','1993/01/06'),
('Vincente Del Bosque','González','DNI','34543654','M','1997/04/12'),
('Gomes Del Valle','Juan','DNI','76767543','M','1997/04/12'),
('Gallardo Mendoza','Jesus','DNI','98765454','M','1997/04/12')


-- Entrenadores
INSERT INTO personas(apellidos, nombres, documentoI, numDocumento, genero, fechanacimiento)VALUES
('Quimick','Joel','DNI','11223344555','M','1993/01/06'),
('Cussi','González','DNI','21443345','M','1997/04/12'),
('Huculmana','Leydi','DNI','22443445','F','1997/04/12'),
('Del los rios','Betza','DNI','22441345','F','1997/04/12')

SELECT * FROM personas;
-- -----------------------------------------------------------------------------------------------------------------------------------
-- Usuario
INSERT INTO personas(apellidos, nombres, documentoI, numDocumento, genero, fechanacimiento)VALUES
('Camacho Mendoza','Edu','DNI','772223176','M','1993/01/06')

  
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
  (9,'jesu','jesuscc','jesu@gmail.com')
  
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
	nombreD		VARCHAR(20) NOT NULL,
	pais		VARCHAR(20) NOT NULL,
	equipo		VARCHAR(20) NOT NULL,
	
	CONSTRAINT uk_nombre_sed UNIQUE(nombreD, equipo)
	
)ENGINE = INNODB;

INSERT INTO delegaciones (nombreD, pais, equipo)VALUES
('ATLETIC','Peru','E-1'),
('CICLIT','Peru','E-2'),
('MACC','Peru','E-4'),
('ZZSSS','Peru','E-5')


SELECT * FROM delegaciones;

-- -----------------------------------------------------------------------------------------------------------------------------------
CREATE TABLE entrenadores 
(	
	identrenador	INT AUTO_INCREMENT PRIMARY KEY,
	idpersona	INT NOT NULL,
	
	CONSTRAINT uk_idpersona_ent FOREIGN KEY (idpersona) REFERENCES personas(idpersona)
)ENGINE = INNODB;

INSERT INTO entrenadores(idpersona)VALUES
(5),
(6),
(7),
(8)

SELECT * FROM entrenadores;

-- -----------------------------------------------------------------------------------------------------------------------------------
CREATE TABLE  deportes
(
	iddeporte		INT AUTO_INCREMENT PRIMARY KEY,
	nombreDeporte		VARCHAR (50) 	NOT NULL,
	
	CONSTRAINT uk_nomD_dep UNIQUE (nombreDeporte)
	

)ENGINE = INNODB;

INSERT INTO deportes (nombreDeporte)VALUES
('Atletismo'),
('Ciclismo'),
('Béisbol'),
('Boxeo')

SELECT * FROM deportes;

-- ----------------------------------------------------------------------------------------------------------------------------------- 


CREATE TABLE premiaciones
(
	idpremiacion		INT AUTO_INCREMENT PRIMARY KEY,
	idolimpiada		INT NOT NULL,
	iddelegacion		INT NOT NULL,
	iddeporte		INT NOT NULL,
	medalla			VARCHAR(10) NOT NULL,
	numPuesto		CHAR(1) NOT NULL,		
	fechaP			DATE 	NOT NULL,
	
	CONSTRAINT fk_idolimpiada_pre FOREIGN KEY (idolimpiada) REFERENCES olimpiadas(idolimpiada),
	CONSTRAINT fk_deporte_pre FOREIGN KEY (iddeporte) REFERENCES deportes(iddeporte),
	CONSTRAINT fk_iddelegacion_pre FOREIGN KEY (iddelegacion) REFERENCES delegaciones(iddelegacion)
	
)ENGINE =INNODB;

INSERT INTO premiaciones (idolimpiada, iddelegacion, iddeporte,medalla, numPuesto, FechaP)VALUES
(1,1,1,'Oro',1, '2023/06/01'),
(1,2,1,'Plata',2, '2023/06/01'),
(1,3,1,'Bronce',4, '2023/06/01'),
(1,4,1,'Diploma',5, '2023/06/01')


SELECT * FROM premiaciones;

-- -----------------------------------------------------------------------------------------------------------------------------
CREATE TABLE deportistas
(
	iddeportista	INT AUTO_INCREMENT PRIMARY KEY,
	idpersona	INT NOT NULL,
	idpremiacion    INT NOT NULL,
	identrenador	INT NOT NULL,
	
	CONSTRAINT fk_idpremiacion_dep	FOREIGN KEY (idpremiacion) REFERENCES premiaciones(idpremiacion),
	CONSTRAINT fk_idpersona_dep	FOREIGN KEY (idpersona) REFERENCES personas(idpersona),
	CONSTRAINT fk_identrenador_dep  FOREIGN KEY (identrenador)  REFERENCES entrenadores(identrenador)
	
)ENGINE = INNODB;



-- ----------------------------------------------------------------------------------------------------------------------------------- 
DELIMITER $$
CREATE PROCEDURE spu_deportista_registrar
(
	
	_idpersona	INT,
	_identrenador	INT,
	_idpremiacion   INT

)
BEGIN
	INSERT INTO  deportistas (idpersona, identrenador,idpremiacion )VALUES
	(_idpersona ,_identrenador,_idpremiacion );	

END $$

DELIMITER $$




DELIMITER $$
CREATE PROCEDURE spu_premiaciones_listar()
BEGIN
	SELECT
	    (SELECT nombre FROM olimpiadas WHERE olimpiadas.idolimpiada = premiaciones.idolimpiada ) AS Olimpiada,
	    (SELECT nombreD FROM delegaciones WHERE delegaciones.iddelegacion = premiaciones.iddelegacion ) AS Delegaciones,
	    CONCAT (personas.nombres,' ',personas.apellidos)AS Deportista,
	    (SELECT nombreDeporte FROM deportes WHERE deportes.iddeporte = premiaciones.iddeporte )AS nombreDeporte,
	    premiaciones.medalla,
	    premiaciones.numPuesto,
	    premiaciones.fechaP
	FROM
	    deportistas
	INNER JOIN premiaciones ON premiaciones.idpremiacion = deportistas.idpremiacion
	INNER JOIN personas ON personas.idpersona = deportistas.idpersona
	
	ORDER BY iddeportista DESC;

END $$

DELIMITER $$
CREATE PROCEDURE spu_olimpiada_listar()
BEGIN
	SELECT idolimpiada, nombre
	 FROM olimpiadas;
 END $$
 

DELIMITER $$
CREATE PROCEDURE spu_premiacion_listar()
BEGIN
	SELECT idpremiacion, medalla
	 FROM premiaciones;
 END $$


DELIMITER $$
CREATE  PROCEDURE spu_deportista_listar()
BEGIN
	SELECT idpersona,  
	CONCAT(personas.apellidos,' ', personas.nombres) AS deportista
	 FROM personas;
 END $$
 


DELIMITER $$
CREATE PROCEDURE spu_entrenador_listar()
BEGIN
	SELECT  identrenador,
		(SELECT apellidos  FROM personas WHERE personas.idpersona = entrenadores.idpersona ) AS entrenador
	 FROM entrenadores;
 END $$


