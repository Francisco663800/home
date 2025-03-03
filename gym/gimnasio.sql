-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS Gimnasio;
USE Gimnasio;

-- Tabla de Clientes
CREATE TABLE Clientes (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    telefono VARCHAR(15),
    correo VARCHAR(100) UNIQUE,
    direccion TEXT,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insertar un cliente de prueba
INSERT INTO Clientes (nombre, apellido, fecha_nacimiento, telefono, correo, direccion) VALUES
('Lucas', 'Morales', '1993-02-14', '555-7781', 'lucas.morales@mail.com', 'Calle T, 1717');

-- Tabla de Entrenadores
CREATE TABLE Entrenadores (
    id_entrenador INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    especialidad VARCHAR(100),
    telefono VARCHAR(15),
    correo VARCHAR(100) UNIQUE,
    fecha_contratacion DATE NOT NULL
);

-- Insertar un entrenador de prueba
INSERT INTO Entrenadores (nombre, apellido, especialidad, telefono, correo, fecha_contratacion) VALUES
('Pedro', 'Martínez', 'CrossFit', '555-1010', 'pedro.martinez@mail.com', '2022-01-10');

-- Tabla de Membresías
CREATE TABLE Membresias (
    id_membresia INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(50) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    duracion INT NOT NULL,
    descripcion TEXT
);

-- Insertar membresías
INSERT INTO Membresias (tipo, precio, duracion, descripcion) VALUES
('Mensual Básico', 30.00, 30, 'Acceso ilimitado a gimnasio durante un mes'),
('Mensual Premium', 50.00, 30, 'Acceso ilimitado + clases dirigidas durante un mes'),
('Trimestral Básico', 80.00, 90, 'Acceso ilimitado a gimnasio durante tres meses'),
('Trimestral Premium', 130.00, 90, 'Acceso ilimitado + clases dirigidas durante tres meses'),
('Anual Básico', 300.00, 365, 'Acceso ilimitado a gimnasio durante un año'),
('Anual Premium', 500.00, 365, 'Acceso ilimitado + clases dirigidas durante un año'),
('Clase Individual', 10.00, 1, 'Acceso a una sola clase'),
('Semana de Prueba', 20.00, 7, 'Acceso al gimnasio por una semana');

-- Tabla de Pagos
CREATE TABLE Pagos (
    id_pago INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    id_membresia INT NOT NULL,
    monto DECIMAL(10,2) NOT NULL,
    fecha_pago TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_cliente) REFERENCES Clientes(id_cliente) ON DELETE CASCADE,
    FOREIGN KEY (id_membresia) REFERENCES Membresias(id_membresia) ON DELETE CASCADE
);

-- Insertar un pago de prueba
INSERT INTO Pagos (id_cliente, id_membresia, monto) VALUES
(1, 1, 30.00);

-- Tabla de Clases
CREATE TABLE Clases (
    id_clase INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    tipo ENUM('individual', 'grupal') NOT NULL DEFAULT 'grupal',
    id_entrenador INT NULL,
    cupo_maximo INT NOT NULL,
    horario TIME NOT NULL,
    duracion INT NOT NULL,
    FOREIGN KEY (id_entrenador) REFERENCES Entrenadores(id_entrenador) ON DELETE SET NULL
);

-- Insertar clases de prueba con id_entrenador en NULL
INSERT INTO Clases (nombre, tipo, id_entrenador, cupo_maximo, horario, duracion) VALUES
('Kickboxing', 'grupal', NULL, 15, '08:30:00', 60),
('Yoga', 'grupal', NULL, 20, '09:00:00', 45),
('CrossFit', 'grupal', NULL, 12, '10:00:00', 50),
('Pilates', 'grupal', NULL, 10, '11:00:00', 60),
('Boxeo', 'grupal', NULL, 18, '12:30:00', 75),
('Zumba', 'grupal', NULL, 25, '14:00:00', 50),
('HIIT', 'grupal', NULL, 15, '16:00:00', 40),
('Calistenia', 'grupal', NULL, 12, '17:30:00', 45),
('Levantamiento de Pesas', 'grupal', NULL, 10, '19:00:00', 60),
('Entrenamiento Funcional', 'grupal', NULL, 20, '20:30:00', 50);

-- Tabla de Reservas
CREATE TABLE Reservas (
    id_reserva INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    id_clase INT NOT NULL,
    fecha_reserva DATE NOT NULL,
    FOREIGN KEY (id_cliente) REFERENCES Clientes(id_cliente) ON DELETE CASCADE,
    FOREIGN KEY (id_clase) REFERENCES Clases(id_clase) ON DELETE CASCADE
);

-- Insertar una reserva de prueba
INSERT INTO Reservas (id_cliente, id_clase, fecha_reserva) VALUES
(1, 1, '2025-02-14');

-- Tabla de Usuarios (Para Login)
CREATE TABLE Usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    correo VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    tipo ENUM('cliente', 'trabajador') NOT NULL,
    id_cliente INT NULL,
    id_entrenador INT NULL,
    FOREIGN KEY (id_cliente) REFERENCES Clientes(id_cliente) ON DELETE CASCADE,
    FOREIGN KEY (id_entrenador) REFERENCES Entrenadores(id_entrenador) ON DELETE CASCADE
);

-- Insertar Clientes en Usuarios con contraseña encriptada (MD5)
INSERT INTO Usuarios (correo, password, tipo, id_cliente) VALUES
('lucas.morales@mail.com', MD5('1234'), 'cliente', 1),
('rodrigo.salas@mail.com', MD5('1234'), 'cliente', NULL);

-- Insertar Trabajadores en Usuarios con contraseña encriptada (MD5)
INSERT INTO Usuarios (correo, password, tipo, id_entrenador) VALUES
('admin@mail.com', MD5('123'), 'trabajador', NULL);