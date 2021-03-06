CREATE DATABASE IF NOT EXISTS studio_medico;
USE studio_medico;

CREATE TABLE IF NOT EXISTS specializzazione (
    id_specializzazione INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_specializzazione)
);

CREATE TABLE IF NOT EXISTS medico (
    id_medico INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
    cognome VARCHAR(30) NOT NULL,
    cod_specializzazione INT NOT NULL,
    PRIMARY KEY (id_medico),
    FOREIGN KEY (cod_specializzazione) REFERENCES specializzazione(id_specializzazione)
);

CREATE TABLE IF NOT EXISTS paziente (
    id_paziente INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
    cognome VARCHAR(30) NOT NULL,
    data_nascita DATE NOT NULL,
    genere VARCHAR(1) NOT NULL,
    PRIMARY KEY (id_paziente)
);

CREATE TABLE IF NOT EXISTS visita (
    id_visita INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
    cod_specializzazione INT NOT NULL,
    costo DECIMAL NOT NULL,
    tempoMedio INT NOT NULL,
    PRIMARY KEY (id_visita),
    FOREIGN KEY (cod_specializzazione) REFERENCES specializzazione(id_specializzazione)
);

CREATE TABLE IF NOT EXISTS prenotazione (
    id_prenotazione INT NOT NULL AUTO_INCREMENT,
    cod_medico INT NOT NULL,
    cod_visita INT NOT NULL,
    cod_paziente INT NOT NULL,
    data DATE NOT NULL,
    ora TIME NOT NULL,
    effettuata BOOLEAN NOT NULL DEFAULT 0,
    PRIMARY KEY (id_prenotazione),
    FOREIGN KEY (cod_medico) REFERENCES medico(id_medico),
    FOREIGN KEY (cod_visita) REFERENCES visita(id_visita),
    FOREIGN KEY (cod_paziente) REFERENCES paziente(id_paziente)
);

INSERT INTO specializzazione (nome) VALUES ("Cardiologia");
INSERT INTO specializzazione (nome) VALUES ("Neurologia");
INSERT INTO specializzazione (nome) VALUES ("Pediatria");

INSERT INTO visita (nome, cod_specializzazione, costo, tempoMedio) VALUES ("Analisi Cuore ❤️", (SELECT id_specializzazione FROM specializzazione WHERE nome = "Cardiologia"), 100, 30);
INSERT INTO visita (nome, cod_specializzazione, costo, tempoMedio) VALUES ("Controllo Cervello 🧠", (SELECT id_specializzazione FROM specializzazione WHERE nome = "Neurologia"), 150, 60);
INSERT INTO visita (nome, cod_specializzazione, costo, tempoMedio) VALUES ("Assistenza Bambini 👶", (SELECT id_specializzazione FROM specializzazione WHERE nome = "Pediatria"), 40, 10);

INSERT INTO medico (nome, cognome, cod_specializzazione) VALUES ("Mario", "Rossi", (SELECT id_specializzazione FROM specializzazione WHERE nome = "Cardiologia"));
INSERT INTO medico (nome, cognome, cod_specializzazione) VALUES ("Giovanni", "Verdi", (SELECT id_specializzazione FROM specializzazione WHERE nome = "Neurologia"));
INSERT INTO medico (nome, cognome, cod_specializzazione) VALUES ("Paolo", "Bianchi", (SELECT id_specializzazione FROM specializzazione WHERE nome = "Pediatria"));