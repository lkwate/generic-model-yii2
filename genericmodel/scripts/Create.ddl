CREATE TABLE classeRubriqueParam (code int(10) NOT NULL AUTO_INCREMENT, libelle varchar(25) NOT NULL UNIQUE, PRIMARY KEY (code));
CREATE TABLE relationParam (code int(10) NOT NULL AUTO_INCREMENT, rubrique_source int(10) NOT NULL, rubrique_cible int(10) NOT NULL, champ_source varchar(31) NOT NULL, champ_cible varchar(31) NOT NULL, statut int(10) NOT NULL, PRIMARY KEY (code));
CREATE TABLE rubriqueParam (code int(10) NOT NULL AUTO_INCREMENT, libelle varchar(30) NOT NULL, nom_table varchar(31), rubrique_parent int(10) default NULL, class_rubrique int(10) NOT NULL, statut int(10) NOT NULL, PRIMARY KEY (code));
CREATE TABLE statutParam (code int(10) NOT NULL AUTO_INCREMENT, libelle varchar(20) NOT NULL UNIQUE, PRIMARY KEY (code));
CREATE TABLE tableCodeParam (code int(10) NOT NULL AUTO_INCREMENT, nom_table varchar(31) NOT NULL, index_code int(10) NOT NULL, prefix_code varchar(5), suffix_code varchar(5), statut int(10) NOT NULL, PRIMARY KEY (code));
ALTER TABLE tableCodeParam ADD CONSTRAINT FKtableCodeP454334 FOREIGN KEY (statut) REFERENCES statutParam (code);
ALTER TABLE rubriqueParam ADD CONSTRAINT FKrubriquePa1825 FOREIGN KEY (rubrique_parent) REFERENCES rubriqueParam (code);
ALTER TABLE rubriqueParam ADD CONSTRAINT FKrubriquePa251440 FOREIGN KEY (class_rubrique) REFERENCES classeRubriqueParam (code);
ALTER TABLE relationParam ADD CONSTRAINT FKrelationPa546268 FOREIGN KEY (rubrique_source) REFERENCES rubriqueParam (code);
ALTER TABLE relationParam ADD CONSTRAINT FKrelationPa498518 FOREIGN KEY (rubrique_cible) REFERENCES rubriqueParam (code);
ALTER TABLE rubriqueParam ADD CONSTRAINT FKrubriquePa18155 FOREIGN KEY (statut) REFERENCES statutParam (code);
ALTER TABLE relationParam ADD CONSTRAINT FKrelationPa392067 FOREIGN KEY (statut) REFERENCES statutParam (code);

INSERT INTO statutParam(code, libelle) VALUES (1, ACTIF), (2, BLOQUE);
INSERT INTO classeRubriqueParam(code, libelle) VALUES (1, BRANCHE), (2, FEUILLE);
INSERT INTO rubriqueParam(code, libelle, nom_table, rubrique_parent, class_rubrique, statut) VALUES (1, Technique, NULL, NULL, 1, 1), (2, rubrique, rubriqueParam, 2, 1);
