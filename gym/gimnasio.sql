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
('Natalia', 'Silva', '1989-06-23', '555-8892', 'natalia.silva@mail.com', 'Avenida U, 1818'),
('Raúl', 'Mendoza', '1994-09-11', '555-9903', 'raul.mendoza@mail.com', 'Calle V, 1919'),
('Valeria', 'Fuentes', '1997-12-29', '555-1124', 'valeria.fuentes@mail.com', 'Avenida W, 2020'),
('Emilio', 'Ortega', '1990-07-07', '555-2235', 'emilio.ortega@mail.com', 'Calle X, 2121'),
('Carmen', 'Reyes', '1988-11-16', '555-3346', 'carmen.reyes@mail.com', 'Avenida Y, 2222'),
('Fernando', 'Guzmán', '1992-05-30', '555-5568', 'fernando.guzman@mail.com', 'Calle Z, 2323'),
('Paula', 'Lara', '1995-08-03', '555-7780', 'paula.lara@mail.com', 'Avenida AA, 2424'),
('Sergio', 'Domínguez', '1991-01-21', '555-9902', 'sergio.dominguez@mail.com', 'Calle BB, 2525'),
('Adriana', 'Herrera', '1996-04-15', '555-1125', 'adriana.herrera@mail.com', 'Avenida CC, 2626'),
('Roberto', 'Suárez', '1993-09-12', '555-2236', 'roberto.suarez@mail.com', 'Calle DD, 2727'),
('Elisa', 'Navarro', '1994-11-20', '555-3347', 'elisa.navarro@mail.com', 'Avenida EE, 2828'),
('Diego', 'Ortega', '1990-06-15', '555-4458', 'diego.ortega@mail.com', 'Calle FF, 2929'),
('Mónica', 'Jiménez', '1987-05-03', '555-5569', 'monica.jimenez@mail.com', 'Avenida GG, 3030'),
('Ricardo', 'Vargas', '1995-07-08', '555-6670', 'ricardo.vargas@mail.com', 'Calle HH, 3131'),
('Laura', 'Pérez', '1992-08-19', '555-7781', 'laura.perez@mail.com', 'Avenida II, 3232'),
('Gabriel', 'Ríos', '1989-10-25', '555-8892', 'gabriel.rios@mail.com', 'Calle JJ, 3333'),
('Daniela', 'Fernández', '1996-01-14', '555-9903', 'daniela.fernandez@mail.com', 'Avenida KK, 3434'),
('José', 'Gómez', '1985-03-22', '555-1124', 'jose.gomez@mail.com', 'Calle LL, 3535'),
('Esteban', 'Luna', '1992-04-13', '555-4451', 'esteban.luna@mail.com', 'Calle MM, 3636'),
('Andrea', 'Castillo', '1990-10-22', '555-5562', 'andrea.castillo@mail.com', 'Avenida NN, 3737'),
('Felipe', 'Moreno', '1993-12-15', '555-6673', 'felipe.moreno@mail.com', 'Calle OO, 3838'),
('Isabel', 'Pacheco', '1987-07-30', '555-7784', 'isabel.pacheco@mail.com', 'Avenida PP, 3939'),
('Javier', 'Santos', '1991-06-18', '555-8895', 'javier.santos@mail.com', 'Calle QQ, 4040'),
('Liliana', 'Méndez', '1994-03-25', '555-9906', 'liliana.mendez@mail.com', 'Avenida RR, 4141'),
('Tomás', 'Rojas', '1989-11-14', '555-1127', 'tomas.rojas@mail.com', 'Calle SS, 4242'),
('Silvia', 'Benítez', '1996-08-07', '555-2238', 'silvia.benitez@mail.com', 'Avenida TT, 4343'),
('Mauricio', 'García', '1992-02-05', '555-3349', 'mauricio.garcia@mail.com', 'Calle UU, 4444'),
('Camila', 'Vargas', '1995-05-11', '555-5560', 'camila.vargas@mail.com', 'Avenida VV, 4545'),
('Rodrigo', 'Salas', '1993-07-19', '555-6671', 'rodrigo.salas@mail.com', 'Calle WW, 4646'),
('Valentina', 'Ordoñez', '1988-02-14', '555-7782', 'valentina.ordonez@mail.com', 'Avenida XX, 4747'),
('Alejandro', 'Peralta', '1991-12-30', '555-8893', 'alejandro.peralta@mail.com', 'Calle YY, 4848'),
('Mariana', 'Serrano', '1996-09-25', '555-9904', 'mariana.serrano@mail.com', 'Avenida ZZ, 4949'),
('Daniel', 'Correa', '1985-05-18', '555-1128', 'daniel.correa@mail.com', 'Calle AAA, 5050'),
('Lucía', 'Cortés', '1990-03-10', '555-2239', 'lucia.cortes@mail.com', 'Avenida BBB, 5151'),
('Héctor', 'Pineda', '1987-06-22', '555-3350', 'hector.pineda@mail.com', 'Calle CCC, 5252'),
('Elena', 'Suárez', '1994-08-13', '555-4461', 'elena.suarez@mail.com', 'Avenida DDD, 5353'),
('Antonio', 'López', '1992-10-04', '555-5572', 'antonio.lopez@mail.com', 'Calle EEE, 5454');
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
('Lucía', 'Gómez', 'Yoga', '555-2020', 'lucia.gomez@mail.com', '2021-07-15'),
('Javier', 'Fernández', 'Boxeo', '555-3030', 'javier.fernandez@mail.com', '2020-05-20'),
('Carla', 'López', 'Pilates', '555-4040', 'carla.lopez@mail.com', '2019-11-30'),
('Raúl', 'Sánchez', 'Entrenamiento Funcional', '555-5050', 'raul.sanchez@mail.com', '2023-03-25'),
('Marina', 'Díaz', 'Zumba', '555-6060', 'marina.diaz@mail.com', '2018-09-10'),
('Fernando', 'Ruiz', 'Levantamiento de Pesas', '555-7070', 'fernando.ruiz@mail.com', '2020-02-28'),
('Natalia', 'Ortega', 'Spinning', '555-8080', 'natalia.ortega@mail.com', '2021-06-18'),
('Hugo', 'Pérez', 'Calistenia', '555-9090', 'hugo.perez@mail.com', '2019-04-05'),
('Andrea', 'Vargas', 'HIIT', '555-0000', 'andrea.vargas@mail.com', '2022-10-12');


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
(2, 2, 50.00, NOW()),
(3, 3, 80.00, NOW()),
(4, 4, 130.00, NOW()),
(5, 5, 300.00, NOW()),
(6, 6, 500.00, NOW()),
(7, 7, 10.00, NOW()),
(8, 8, 20.00, NOW()),
(9, 1, 30.00, NOW()),
(10, 2, 50.00, NOW()),
(11, 3, 80.00, NOW()),
(12, 4, 130.00, NOW()),
(13, 5, 300.00, NOW()),
(14, 6, 500.00, NOW()),
(15, 7, 10.00, NOW()),
(16, 8, 20.00, NOW()),
(17, 1, 30.00, NOW()),
(18, 2, 50.00, NOW()),
(19, 3, 80.00, NOW()),
(20, 4, 130.00, NOW());
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
(2, 2, '2025-02-15'),
(3, 3, '2025-02-16'),
(4, 4, '2025-02-17'),
(5, 5, '2025-02-18'),
(6, 6, '2025-02-19'),
(7, 7, '2025-02-20'),
(8, 8, '2025-02-21'),
(9, 9, '2025-02-22'),
(10, 10, '2025-02-23'),
(11, 1, '2025-02-24'),
(12, 2, '2025-02-25'),
(13, 3, '2025-02-26'),
(14, 4, '2025-02-27'),
(15, 5, '2025-02-28'),
(16, 6, '2025-03-01'),
(17, 7, '2025-03-02'),
(18, 8, '2025-03-03'),
(19, 9, '2025-03-04'),
(20, 10, '2025-03-05');



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
('natalia.silva@mail.com', '1234', 'cliente', 2, NULL),
('raul.mendoza@mail.com', '1234', 'cliente', 3, NULL),
('valeria.fuentes@mail.com', '1234', 'cliente', 4, NULL),
('emilio.ortega@mail.com', '1234', 'cliente', 5, NULL),
('carmen.reyes@mail.com', '1234', 'cliente', 6, NULL),
('fernando.guzman@mail.com', '1234', 'cliente', 7, NULL),
('paula.lara@mail.com', '1234', 'cliente', 8, NULL),
('sergio.dominguez@mail.com', '1234', 'cliente', 9, NULL),
('adriana.herrera@mail.com', '1234', 'cliente', 10, NULL),
('roberto.suarez@mail.com', '1234', 'cliente', 11, NULL),
('elisa.navarro@mail.com', '1234', 'cliente', 12, NULL),
('diego.ortega@mail.com', '1234', 'cliente', 13, NULL),
('monica.jimenez@mail.com', '1234', 'cliente', 14, NULL),
('ricardo.vargas@mail.com', '1234', 'cliente', 15, NULL),
('laura.perez@mail.com', '1234', 'cliente', 16, NULL),
('gabriel.rios@mail.com', '1234', 'cliente', 17, NULL),
('daniela.fernandez@mail.com', '1234', 'cliente', 18, NULL),
('jose.gomez@mail.com', '1234', 'cliente', 19, NULL),
('esteban.luna@mail.com', '1234', 'cliente', 20, NULL),
('andrea.castillo@mail.com', '1234', 'cliente', 21, NULL),
('felipe.moreno@mail.com', '1234', 'cliente', 22, NULL),
('isabel.pacheco@mail.com', '1234', 'cliente', 23, NULL),
('javier.santos@mail.com', '1234', 'cliente', 24, NULL),
('liliana.mendez@mail.com', '1234', 'cliente', 25, NULL),
('tomas.rojas@mail.com', '1234', 'cliente', 26, NULL),
('silvia.benitez@mail.com', '1234', 'cliente', 27, NULL),
('mauricio.garcia@mail.com', '1234', 'cliente', 28, NULL),
('camila.vargas@mail.com', '1234', 'cliente', 29, NULL),
('rodrigo.salas@mail.com', '1234', 'cliente', 30, NULL);


-- Insertar Entrenadores en Usuarios con contraseña "1234" encriptada
INSERT INTO Usuarios (correo, password, tipo, id_cliente, id_entrenador) VALUES
('pedro.martinez@mail.com', '1234', 'trabajador', NULL, 1),
('lucia.gomez@mail.com', '1234', 'trabajador', NULL, 2),
('javier.fernandez@mail.com', '1234', 'trabajador', NULL, 3),
('carla.lopez@mail.com', '1234', 'trabajador', NULL, 4),
('raul.sanchez@mail.com', '1234', 'trabajador', NULL, 5),
('marina.diaz@mail.com', '1234', 'trabajador', NULL, 6),
('fernando.ruiz@mail.com', '1234', 'trabajador', NULL, 7),
('natalia.ortega@mail.com', '1234', 'trabajador', NULL, 8),
('hugo.perez@mail.com', '1234', 'trabajador', NULL, 9),
('andrea.vargas@mail.com', '1234', 'trabajador', NULL, 10);
