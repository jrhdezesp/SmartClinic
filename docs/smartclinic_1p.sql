SET FOREIGN_KEY_CHECKS = 0;

CREATE DATABASE IF NOT EXISTS smartclinic_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE smartclinic_db;

SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE IF NOT EXISTS roles (
    rolId INT AUTO_INCREMENT PRIMARY KEY,
    rolNombre VARCHAR(50) NOT NULL UNIQUE,
    rolDescripcion VARCHAR(150) NOT NULL,
    rolStatus CHAR(3) NOT NULL DEFAULT 'ACT'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS funciones (
    funcionId INT AUTO_INCREMENT PRIMARY KEY,
    funcionNombre VARCHAR(100) NOT NULL,
    funcionDescripcion VARCHAR(200) NOT NULL,
    funcionStatus CHAR(3) NOT NULL DEFAULT 'ACT'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS roles_usuarios (
    rolUsuarioId INT AUTO_INCREMENT PRIMARY KEY,
    usuarioId INT NOT NULL,
    rolId INT NOT NULL,
    ruStatus CHAR(3) NOT NULL DEFAULT 'ACT',
    ruFechaInicio DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    ruFechaFin DATETIME NOT NULL,
    FOREIGN KEY (rolId) REFERENCES roles (rolId) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS funciones_roles (
    funcionRolId INT AUTO_INCREMENT PRIMARY KEY,
    funcionId INT NOT NULL,
    rolId INT NOT NULL,
    frStatus CHAR(3) NOT NULL DEFAULT 'ACT',
    frFechaInicio DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    frFechaFin DATETIME NOT NULL,
    FOREIGN KEY (funcionId) REFERENCES funciones (funcionId) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (rolId) REFERENCES roles (rolId) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS usuario (
    usercod INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    useremail VARCHAR(150) NOT NULL UNIQUE,
    userpswd VARCHAR(255) NOT NULL,
    userfching DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    userpswdest CHAR(3) NOT NULL DEFAULT 'ACT',
    userpswdexp DATETIME DEFAULT NULL,
    userest CHAR(3) NOT NULL DEFAULT 'ACT',
    useractcod VARCHAR(100) DEFAULT NULL,
    userpswdchg DATETIME DEFAULT NULL,
    usertipo CHAR(3) NOT NULL DEFAULT 'NOR'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

ALTER TABLE roles_usuarios
ADD CONSTRAINT fk_roles_usuarios_usuario FOREIGN KEY (usuarioId) REFERENCES usuario (usercod) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE IF NOT EXISTS especialidad (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_especialidad VARCHAR(100) NOT NULL UNIQUE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS estado_cita (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_estado VARCHAR(50) NOT NULL UNIQUE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS paciente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    identidad VARCHAR(20) NOT NULL UNIQUE,
    nombres VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    direccion VARCHAR(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS medico (
    id INT AUTO_INCREMENT PRIMARY KEY,
    especialidad_id INT NOT NULL,
    nombres VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    num_colegiatura VARCHAR(50) NOT NULL UNIQUE,
    telefono VARCHAR(20) NOT NULL,
    FOREIGN KEY (especialidad_id) REFERENCES especialidad (id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS cita (
    id INT AUTO_INCREMENT PRIMARY KEY,
    paciente_id INT NOT NULL,
    medico_id INT NOT NULL,
    estado_id INT NOT NULL,
    fecha_hora DATETIME NOT NULL,
    FOREIGN KEY (paciente_id) REFERENCES paciente (id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (medico_id) REFERENCES medico (id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (estado_id) REFERENCES estado_cita (id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

INSERT INTO
    roles (
        rolId,
        rolNombre,
        rolDescripcion,
        rolStatus
    )
VALUES (
        1,
        'Administrador',
        'Acceso total al sistema',
        'ACT'
    ),
    (
        2,
        'Recepción',
        'Gestión de pacientes y citas',
        'ACT'
    );

INSERT INTO
    funciones (
        funcionId,
        funcionNombre,
        funcionDescripcion,
        funcionStatus
    )
VALUES (
        1,
        'Ver panel',
        'Acceso al panel principal',
        'ACT'
    ),
    (
        2,
        'Gestionar usuarios',
        'Administrar cuentas de acceso',
        'ACT'
    ),
    (
        3,
        'Gestionar roles',
        'Administrar roles del sistema',
        'ACT'
    ),
    (
        4,
        'Gestionar funciones',
        'Administrar permisos y accesos',
        'ACT'
    ),
    (
        5,
        'Gestionar pacientes',
        'Registrar y actualizar pacientes',
        'ACT'
    ),
    (
        6,
        'Gestionar médicos',
        'Registrar y actualizar médicos',
        'ACT'
    ),
    (
        7,
        'Gestionar citas',
        'Registrar y actualizar citas',
        'ACT'
    );

-- La contraseña original del administrador es: SmartClinic#2026
-- En la base de datos se guarda la contraseña hasheada.
INSERT INTO
    usuario (
        usercod,
        username,
        useremail,
        userpswd,
        userfching,
        userpswdest,
        userpswdexp,
        userest,
        useractcod,
        userpswdchg,
        usertipo
    )
VALUES (
        1,
        'Administrador',
        'admin@smartclinic.com',
        '$2y$10$qozQxczCslUQ0Jk6AShyXOCQh7HZwMePuCgHq7LKWMIdmC2HDZNBm',
        CURRENT_TIMESTAMP,
        'ACT',
        NULL,
        'ACT',
        'ADMIN',
        NULL,
        'ADM'
    );

INSERT INTO
    roles_usuarios (
        rolUsuarioId,
        usuarioId,
        rolId,
        ruStatus,
        ruFechaInicio,
        ruFechaFin
    )
VALUES (
        1,
        1,
        1,
        'ACT',
        CURRENT_TIMESTAMP,
        '2099-12-31 23:59:59'
    );

INSERT INTO
    funciones_roles (
        funcionRolId,
        funcionId,
        rolId,
        frStatus,
        frFechaInicio,
        frFechaFin
    )
VALUES (
        1,
        1,
        1,
        'ACT',
        CURRENT_TIMESTAMP,
        '2099-12-31 23:59:59'
    ),
    (
        2,
        2,
        1,
        'ACT',
        CURRENT_TIMESTAMP,
        '2099-12-31 23:59:59'
    ),
    (
        3,
        3,
        1,
        'ACT',
        CURRENT_TIMESTAMP,
        '2099-12-31 23:59:59'
    ),
    (
        4,
        4,
        1,
        'ACT',
        CURRENT_TIMESTAMP,
        '2099-12-31 23:59:59'
    ),
    (
        5,
        5,
        1,
        'ACT',
        CURRENT_TIMESTAMP,
        '2099-12-31 23:59:59'
    ),
    (
        6,
        6,
        1,
        'ACT',
        CURRENT_TIMESTAMP,
        '2099-12-31 23:59:59'
    ),
    (
        7,
        7,
        1,
        'ACT',
        CURRENT_TIMESTAMP,
        '2099-12-31 23:59:59'
    ),
    (
        8,
        5,
        2,
        'ACT',
        CURRENT_TIMESTAMP,
        '2099-12-31 23:59:59'
    ),
    (
        9,
        7,
        2,
        'ACT',
        CURRENT_TIMESTAMP,
        '2099-12-31 23:59:59'
    );

INSERT INTO
    especialidad (id, nombre_especialidad)
VALUES (1, 'Medicina General'),
    (2, 'Pediatría'),
    (3, 'Ginecología'),
    (4, 'Cardiología'),
    (5, 'Dermatología'),
    (6, 'Ortopedia'),
    (7, 'Neurología');

INSERT INTO
    estado_cita (id, nombre_estado)
VALUES (1, 'Pendiente'),
    (2, 'Cancelada'),
    (3, 'Completada');

INSERT INTO
    paciente (
        identidad,
        nombres,
        apellidos,
        fecha_nacimiento,
        telefono,
        direccion
    )
VALUES (
        '0801199901234',
        'Ana María',
        'Gómez',
        '1989-05-21',
        '+502 5555-1234',
        'Calle Real 123, Ciudad'
    );

INSERT INTO
    paciente (
        identidad,
        nombres,
        apellidos,
        fecha_nacimiento,
        telefono,
        direccion
    )
VALUES (
        '0702199405678',
        'Carlos Eduardo',
        'López',
        '1994-02-10',
        '+502 5555-2345',
        'Avenida Central 45, Zona 1'
    );

INSERT INTO
    paciente (
        identidad,
        nombres,
        apellidos,
        fecha_nacimiento,
        telefono,
        direccion
    )
VALUES (
        '0903198504321',
        'Beatriz Elena',
        'Santos',
        '1985-03-18',
        '+502 5555-3456',
        'Boulevard del Lago 78, Villa'
    );

INSERT INTO
    paciente (
        identidad,
        nombres,
        apellidos,
        fecha_nacimiento,
        telefono,
        direccion
    )
VALUES (
        '0104199309876',
        'David Javier',
        'Méndez',
        '1993-04-05',
        '+502 5555-4567',
        'Colonia Primavera 12, Mixco'
    );

INSERT INTO
    paciente (
        identidad,
        nombres,
        apellidos,
        fecha_nacimiento,
        telefono,
        direccion
    )
VALUES (
        '0205199208765',
        'Laura Isabel',
        'Ramírez',
        '1992-05-02',
        '+502 5555-5678',
        'Residencial Sol 5, Zona 10'
    );

INSERT INTO
    medico (
        especialidad_id,
        nombres,
        apellidos,
        num_colegiatura,
        telefono
    )
VALUES (
        1,
        'José Manuel',
        'Pérez',
        'MED-00123',
        '+502 4777-1122'
    );

INSERT INTO
    medico (
        especialidad_id,
        nombres,
        apellidos,
        num_colegiatura,
        telefono
    )
VALUES (
        2,
        'María Fernanda',
        'Ortiz',
        'MED-00124',
        '+502 4777-2233'
    );

INSERT INTO
    medico (
        especialidad_id,
        nombres,
        apellidos,
        num_colegiatura,
        telefono
    )
VALUES (
        1,
        'Ricardo',
        'Vargas',
        'MED-00125',
        '+502 4777-3344'
    );

INSERT INTO
    medico (
        especialidad_id,
        nombres,
        apellidos,
        num_colegiatura,
        telefono
    )
VALUES (
        3,
        'Sofía',
        'Alvarez',
        'MED-00126',
        '+502 4777-4455'
    );

INSERT INTO
    medico (
        especialidad_id,
        nombres,
        apellidos,
        num_colegiatura,
        telefono
    )
VALUES (
        2,
        'Miguel Ángel',
        'Ruiz',
        'MED-00127',
        '+502 4777-5566'
    );