drop database proyecto;
create database proyecto;
use proyecto;
-- Creación de la tabla Grupos
CREATE TABLE Grupos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombreGrupo TEXT
);

INSERT INTO Grupos (nombreGrupo) VALUES
("1ºASIR"),
("2ºASIR"),
("Profesorado"),
("Administración");

-- Creación de la tabla Categoria
CREATE TABLE Categoria (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombreCategoria TEXT
);

INSERT INTO Categoria (nombreCategoria) VALUES 
("IAW"),
("AXBD"),
("ASO"),
("EIE"),
("SRI"),
("SAD"),
("FOL");


-- Creación de la tabla Pregunta
CREATE TABLE Pregunta (
  id INT AUTO_INCREMENT PRIMARY KEY,
  enunciado TEXT,
  respuestaA TEXT,
  respuestaB TEXT,
  respuestaC TEXT,
  respuestaD TEXT,
  categoria INT,
  FOREIGN KEY (categoria) REFERENCES Categoria(id)
);

INSERT INTO Pregunta (enunciado, respuestaA, respuestaB, respuestaC, respuestaD, categoria) VALUES
("IAW_Examen1_enunciado", "Respuesta_A", "RespuestaB", "Respuesta_C", "Respuesta_D", 1),
("IAW_Examen2_enunciado", "Respuesta_A", "RespuestaB", "Respuesta_C", "Respuesta_D", 1),
("ASXBD_Examen1_enunciado", "Respuesta_A", "RespuestaB", "Respuesta_C", "Respuesta_D", 2),
("ASXBD_Examen2_enunciado", "Respuesta_A", "RespuestaB", "Respuesta_C", "Respuesta_D", 2),
("ASO_Examen1_enunciado", "Respuesta_A", "RespuestaB", "Respuesta_C", "Respuesta_D", 3),
("ASO_Examen2_enunciado", "Respuesta_A", "RespuestaB", "Respuesta_C", "Respuesta_D", 3),
("EIE_Examen1_enunciado", "Respuesta_A", "RespuestaB", "Respuesta_C", "Respuesta_D", 4),
("EIE_Examen2_enunciado", "Respuesta_A", "RespuestaB", "Respuesta_C", "Respuesta_D", 4),
("SRI_Examen1_enunciado", "Respuesta_A", "RespuestaB", "Respuesta_C", "Respuesta_D", 5),
("SRI_Examen2_enunciado", "Respuesta_A", "RespuestaB", "Respuesta_C", "Respuesta_D", 5),
("SAD_Examen1_enunciado", "Respuesta_A", "RespuestaB", "Respuesta_C", "Respuesta_D", 6),
("SAD_Examen2_enunciado", "Respuesta_A", "RespuestaB", "Respuesta_C", "Respuesta_D", 6),
("FOL_Examen1_enunciado", "Respuesta_A", "RespuestaB", "Respuesta_C", "Respuesta_D", 7),
("FOL_Examen2_enunciado", "Respuesta_A", "RespuestaB", "Respuesta_C", "Respuesta_D", 7);

-- Creación de la tabla TiposUser
CREATE TABLE TiposUser (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombreTipo TEXT
);

INSERT INTO TiposUser (nombreTipo) VALUES 
("alumno"),
("profesor"),
("administrador");

-- Creación de la tabla Usuarios
CREATE TABLE Usuarios (
  correo varchar(40) PRIMARY KEY,
  password TEXT,
  nombre TEXT,
  apellidos TEXT,
  tipoUsuario INT,
  grupo INT,
  FOREIGN KEY(grupo) REFERENCES Grupos (id),
  FOREIGN KEY (tipoUsuario) REFERENCES TiposUser(id)
);

INSERT INTO Usuarios (correo, password, nombre, apellidos, tipoUsuario, grupo) values
("usuario1@example.com", "abc1", "Ernesto", "García Pazo", 1, 1),
("usuario2@example.com", "abc2", "Juan", "Guerra Lordán", 1, 2),
("profesor1@example.com", "cba1", "Marta", "Sanchez Alejandre", 2, 3),
("profesor2@example.com", "cba2", "Emilio", "Cuesta Molina", 2, 3),
("administrador1@example.com", "abc123.", "Administrador", "Admin Admin", 3, 4);

-- Creación de la tabla Examenes
CREATE TABLE Examenes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo TEXT,
  grupo INT,
  puntuacionTotal INT,
  borrado BOOLEAN,
  creador varchar(40),
  FOREIGN KEY (creador) REFERENCES Usuarios(correo),
  FOREIGN KEY(grupo) REFERENCES Grupos (id)
);

INSERT INTO Examenes (titulo, grupo, puntuacionTotal, borrado, creador) VALUES
("IAW_Examen1", 2, 10, True, "profesor1@example.com"),
("IAW_Examen2", 2, 10, False, "profesor2@example.com"),
("AXDB_Examen1", 2, 20, True, "profesor2@example.com"),
("AXDB_Examen2", 2, 20, False, "profesor1@example.com"),
("ASO_Examen1", 2, 10, False, "profesor2@example.com"),
("ASO_Examen2", 2, 20, False, "profesor1@example.com"),
("SRI_Examen1", 2, 10, False, "profesor1@example.com"),
("SRI_Examen2", 2, 10, False, "profesor1@example.com"),
("EIE_Examen1", 2, 100, False, "profesor2@example.com"),
("EIE_Examen2", 2, 10, False, "profesor2@example.com"),
("SAD_Examen1", 2, 12, False, "profesor1@example.com"),
("SAD_Examen2", 2, 10, True, "profesor2@example.com"),
("FOL_Examen", 2, 15, False, "profesor2@example.com"),
("FOL_Examen", 2, 15, False, "profesor2@example.com");

-- Creación de la tabla Preguntas-Examenes
CREATE TABLE Preguntas_Examenes (
  examen INT,
  pregunta INT,
  puntuacion INT,
  PRIMARY KEY (examen, pregunta),
  FOREIGN KEY (examen) REFERENCES Examenes(id),
  FOREIGN KEY (pregunta) REFERENCES Pregunta(id)
);

INSERT INTO Preguntas_Examenes (examen, pregunta, puntuacion) VALUES
(1, 1, 10),
(2, 2, 10),
(3, 3, 20),
(4, 4, 20),
(5, 5, 10),
(6, 6, 20),
(7, 7, 10),
(8, 8, 10),
(9, 9, 100),
(10, 10, 10),
(11, 11, 12),
(12, 12, 10),
(13, 13, 15),
(14, 14, 15);

-- Creación de la tabla Examenes_Usuarios
CREATE TABLE Examenes_Usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  examen INT,
  usuario varchar(40),
  nota INT,
  FOREIGN KEY (examen) REFERENCES Examenes(id),
  FOREIGN KEY (usuario) REFERENCES Usuarios(correo)
);

INSERT INTO Examenes_Usuarios (examen, usuario, nota) VALUES
( 1, "usuario2@example.com", 6),
( 2, "usuario2@example.com", 5),
( 3, "usuario2@example.com", 4),
( 4, "usuario2@example.com", 10),
( 5,"usuario2@example.com", 10),
( 6, "usuario2@example.com", 5),
( 7, "usuario2@example.com", 1),
( 8, "usuario2@example.com", 2),
( 9, "usuario2@example.com", 4),
( 10, "usuario2@example.com", 3),
( 11, "usuario2@example.com", 10),
( 12, "usuario2@example.com", 10),
( 13, "usuario1@example.com", 15),
( 14, "usuario1@example.com", 0);