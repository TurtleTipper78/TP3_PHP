CREATE TABLE privilege (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    level VARCHAR(50) NOT NULL
);

CREATE TABLE utilisateur (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    permission INT NOT NULL,
    FOREIGN KEY (permission) REFERENCES privilege (id)
);

CREATE TABLE pays (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pays_nom VARCHAR(50) NOT NULL
);

CREATE TABLE format (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    format_nom VARCHAR(50) NOT NULL
);

CREATE TABLE production (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    year DATE
);

CREATE TABLE modele (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    modele_nom VARCHAR(50) NOT NULL,
    manufacturier VARCHAR(50) NOT NULL,
    modele_pays INT NOT NULL,
    production_year INT NOT NULL,
    modele_format INT NOT NULL,
    createur_id INT,
    modele_image_path VARCHAR(255),
    FOREIGN KEY (modele_pays) REFERENCES pays (id),
    FOREIGN KEY (production_year) REFERENCES production (id),
    FOREIGN KEY (modele_format) REFERENCES format (id),
    FOREIGN KEY (createur_id) REFERENCES log_book(id)
);

CREATE TABLE log_book (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    action VARCHAR(255),
    table_name VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES utilisateur(id)
);

INSERT INTO privilege (level) VALUES ('Admin');
INSERT INTO privilege (level) VALUES ('Employee');

INSERT INTO utilisateur (username, password, permission) VALUES ('admin_user', '12345', 1);
INSERT INTO utilisateur (username, password, permission) VALUES ('employee_user', '12345', 2);

INSERT INTO pays (pays_nom) VALUES ('Germany');
INSERT INTO pays (pays_nom) VALUES ('Sweden');
INSERT INTO pays (pays_nom) VALUES ('Japan');

INSERT INTO format (format_nom) VALUES ('35mm');
INSERT INTO format (format_nom) VALUES ('6x6');

INSERT INTO production (year) VALUES ('1986-01-01');
INSERT INTO production (year) VALUES ('1983-01-01');
INSERT INTO production (year) VALUES ('1979-01-01');

INSERT INTO modele (modele_nom, manufacturier, modele_pays, production_year, modele_format, createur_id, modele_image_path) 
VALUES ('M4P', 'Leica', 1, 1, 1, 1, 'image/leicaM4P.jpg');

INSERT INTO log_book (user_id, action, table_name)
VALUES
    (1, 'Update', 'modele'),
    (2, 'Insert', 'utilisateur'),
    (3, 'Delete', 'pays'),
    (1, 'Insert', 'log_book'),
    (2, 'Update', 'format'),
    (3, 'Delete', 'production');
