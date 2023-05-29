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
	CONSTRAINT check_complejidad_per			CHECK(genero IN('M','F')),
	CONSTRAINT check_montopago_per			CHECK(edad>=12)
	
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

CREATE TABLE entrenadores 
(	
	identrenador	INT AUTO_INCREMENT PRIMARY KEY,
	idpersona		INT NOT NULL,
	
	CONSTRAINT 	uk_idpersona_ent	FOREIGN KEY (idpersona) REFERENCES personas(idpersona)
)ENGINE = INNODB;

INSERT INTO entrenadores(idpersona)VALUES
(1),
(3),
(5),
(7)

SELECT * FROM entrenadores;
-- -----------------------------------------------------------------------------------------------------------------------------------
CREATE TABLE deportistas 
(
	iddeportista	INT AUTO_INCREMENT PRIMARY KEY,
	idpersona		INT NOT NULL,
	identrenador	INT NOT NULL,
	
	CONSTRAINT fk_idpersona_dep	FOREIGN KEY (idpersona) REFERENCES personas(idpersona),
	CONSTRAINT fk_identrenador_dep  FOREIGN KEY (identrenador)  REFERENCES entrenadores(identrenador)
	
)ENGINE = INNODB;

INSERT INTO  deportistas (idpersona, identrenador)VALUES
(2,1),
(4,2),
(6,3),
(8,4)

SELECT * FROM deportistas;
-- ----------------------------------------------------------------------------------------------------------------------------------- 

CREATE TABLE  deportes
(
	iddeporte			INT AUTO_INCREMENT PRIMARY KEY,
	iddeportista		INT 				NOT NULL,
	nombreDeporte		VARCHAR (50) 	NOT NULL,
	descripcion			VARCHAR (200) 	NOT NULL,
	
	CONSTRAINT fk_iddeprotista_dep FOREIGN KEY (iddeportista) REFERENCES deportistas(iddeportista),
	CONSTRAINT uk_nomD_dep UNIQUE (nombreDeporte)
	

)ENGINE = INNODB;

INSERT INTO deportes (iddeportista, nombreDeporte, descripcion)VALUES
(1,'Atletismo','El atletismo es un deporte que agrupa numerosas disciplinas. El término atletismo deriva de la palabra griega "aetders" que significa competencia o combate'),
(2,'Ciclismo','Competición El ciclismo de competición es un deporte en el que se utilizan distintos tipos de bicicletas'),
(3,'Béisbol','El béisbol consiste en un juego que utiliza un bate, una pelota y guantes entre dos equipos de nueve jugadores cada uno en un campo con cuatro '),
(4,'Boxeo',' es un conjunto de deportes de combate centrados en el golpe, en el que dos oponentes se enfrentan en una pelea usando al menos los puños')

SELECT * FROM deportes;
-- ----------------------------------------------------------------------------------------------------------------------------------- 

CREATE TABLE resultados
(
	idresultado		 INT AUTO_INCREMENT PRIMARY KEY,
	iddeportista	 INT NOT NULL,	
	puntos			 VARCHAR (10) NOT NULL,
	
	CONSTRAINT	fk_iddeportista_rel FOREIGN KEY (iddeportista) REFERENCES deportistas(iddeportista),
	CONSTRAINT  ch_punto_rel	CHECK(puntos>0)
	
)ENGINE=INNODB;

INSERT INTO resultados (iddeportista, puntos)VALUES
(1,100),
(2,123),
(3,144),
(4,166)



SELECT * FROM resultados;
-- ----------------------------------------------------------------------------------------------------------------------------------- 

CREATE TABLE sedes
(
	idsede		INT AUTO_INCREMENT PRIMARY KEY,
	nombre		VARCHAR(20),
	pais			VARCHAR(20),
	ciudad 		VARCHAR(30),
	direccion 	VARCHAR(30),
	
	CONSTRAINT uk_nombre_sed UNIQUE(nombre),
	CONSTRAINT uk_direccion_sed UNIQUE(direccion)
	
)ENGINE = INNODB;

INSERT INTO sedes (nombre, pais, ciudad, direccion)VALUES
('ATLETIC','Peru','Lima','AVN.Callao'),
('CICLIT','Peru','Ica','AVN.chincha'),
('BOXDT','Peru','Cusco','AVN.Cusco'),
('BEIST','Peru','Lima','AVN.Lima')

SELECT * FROM sedes;
-- ----------------------------------------------------------------------------------------------------------------------------------- 

CREATE TABLE premiaciones
(
	idpremiacion	INT AUTO_INCREMENT PRIMARY KEY,
	idsede			INT NOT NULL,
	idresultado		INT NOT NULL,
	iddeporte		INT NOT NULL,
	medalla			VARCHAR(10) NOT NULL,
	numPuesto		CHAR(1) 		NOT NULL,		
	fechaP			DATE 			NOT NULL,
	
	
CONSTRAINT fk_idsede_pre FOREIGN KEY (idsede) REFERENCES sedes(idsede),
CONSTRAINT fk_resultado_pre FOREIGN KEY (idresultado) REFERENCES resultados(idresultado),
CONSTRAINT fk_iddeporte_pre FOREIGN KEY (iddeporte) REFERENCES deportes (iddeporte)

)ENGINE =INNODB;

INSERT INTO premiaciones (idsede, idresultado, iddeporte, medalla, numPuesto, FechaP)VALUES
(1,1,1,'Oro', 1, '2022/01/01'),
(2,2,2,'Plata', 2, '2022/01/11'),
(3,3,3,'Bronce', 3, '2022/01/13'),
(4,4,4,'Oro', 4, '2022/01/04')

SELECT * FROM premiaciones;