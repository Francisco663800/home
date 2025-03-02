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
-- Insertar 30 registros de Clientes
INSERT INTO Clientes (nombre, apellido, fecha_nacimiento, telefono, correo, direccion) VALUES
('Lucas', 'Morales', '1993-02-14', '555-7781', 'lucas.morales@mail.com', 'Calle T, 1717'),

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
-- Insertar 10 entrenadores 
INSERT INTO Entrenadores (nombre, apellido, especialidad, telefono, correo, fecha_contratacion) VALUES
('Pedro', 'Martínez', 'CrossFit', '555-1010', 'pedro.martinez@mail.com', '2022-01-10'),



-- Tabla de Membresías
CREATE TABLE Membresias (
    id_membresia INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(50) NOT NULL, -- Ejemplo: Mensual, Trimestral, Anual
    precio DECIMAL(10,2) NOT NULL,
    duracion INT NOT NULL, -- Duración en días
    descripcion TEXT
);
-- Insertar 8 membresías
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
    id_cliente INT,
    id_membresia INT,
    monto DECIMAL(10,2) NOT NULL,
    fecha_pago TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_cliente) REFERENCES Clientes(id_cliente) ON DELETE CASCADE,
    FOREIGN KEY (id_membresia) REFERENCES Membresias(id_membresia) ON DELETE CASCADE
);
-- Insertar 20 pagos
INSERT INTO Pagos (id_cliente, id_membresia, monto, fecha_pago) VALUES
(1, 1, 30.00, NOW()),

-- Tabla de Clases
CREATE TABLE Clases (
    id_clase INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL, -- Ejemplo: Yoga, Spinning, CrossFit
    id_entrenador INT,
    cupo_maximo INT NOT NULL,
    horario TIME NOT NULL,
    duracion INT NOT NULL, -- Duración en minutos
    FOREIGN KEY (id_entrenador) REFERENCES Entrenadores(id_entrenador) ON DELETE SET NULL
);
-- Insertar 10 clases
INSERT INTO Clases (nombre, id_entrenador, cupo_maximo, horario, duracion) VALUES
('Yoga', 1, 15, '08:00:00', 60),
('Spinning', 2, 20, '09:30:00', 45),
('CrossFit', 3, 12, '10:00:00', 50),
('Pilates', 4, 10, '11:00:00', 60),
('Boxeo', 5, 18, '12:30:00', 75),
('Zumba', 6, 25, '14:00:00', 50),
('HIIT', 7, 15, '16:00:00', 40),
('Calistenia', 8, 12, '17:30:00', 45),
('Levantamiento de Pesas', 9, 10, '19:00:00', 60),
('Entrenamiento Funcional', 10, 20, '20:30:00', 50),
('Aeróbicos', 1, 20, '07:00:00', 45),
('Kickboxing', 2, 15, '08:30:00', 60),
('Body Pump', 3, 18, '10:30:00', 50),
('Tai Chi', 4, 10, '12:00:00', 55),
('Karate', 5, 20, '13:30:00', 60),
('Stretching', 6, 12, '15:00:00', 40),
('Aqua Gym', 7, 25, '17:00:00', 45),
('Power Yoga', 8, 15, '18:30:00', 50),
('Step Aerobics', 9, 20, '20:00:00', 55),
('Entrenamiento Militar', 10, 22, '21:30:00', 60);
-- Tabla de Reservas de Clases
CREATE TABLE Reservas (
    id_reserva INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT,
    id_clase INT,
    fecha_reserva DATE NOT NULL,
    FOREIGN KEY (id_cliente) REFERENCES Clientes(id_cliente) ON DELETE CASCADE,
    FOREIGN KEY (id_clase) REFERENCES Clases(id_clase) ON DELETE CASCADE
);


-- Insertar 20 reservas
INSERT INTO Reservas (id_cliente, id_clase, fecha_reserva) VALUES
(1, 1, '2025-02-14'),




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

-- Insertar Clientes en Usuarios con contraseña "1234" encriptada
INSERT INTO Usuarios (correo, password, tipo, id_cliente, id_entrenador) VALUES
('lucas.morales@mail.com', '1234', 'cliente', 1, NULL),

('rodrigo.salas@mail.com', '1234', 'cliente', 30, NULL);


-- Insertar Entrenadores en Usuarios con contraseña "1234" encriptada
INSERT INTO Usuarios (correo, password, tipo, id_cliente, id_entrenador) VALUES
('pedro.martinez@mail.com', '1234', 'trabajador', NULL, 1),

