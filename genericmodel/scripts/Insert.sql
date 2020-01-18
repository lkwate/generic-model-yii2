INSERT INTO classeRubriqueParam(code, libelle) VALUES (?, ?);
INSERT INTO cleEtrangere(code, table_primaire, table_etrangere, champ_primaire, champ_etranger) VALUES (?, ?, ?, ?, ?);
INSERT INTO relationParam(code, rubrique_source, rubrique_cible, champ_source, champ_cible, statut) VALUES (?, ?, ?, ?, ?, ?);
INSERT INTO rubriqueParam(code, libelle, nom_table, rubrique_parent, class_rubrique, statut) VALUES (?, ?, ?, ?, ?, ?);
INSERT INTO statutParam(code, libelle) VALUES (?, ?);
INSERT INTO tableCodeParam(code, nom_table, index_code, prefix_code, suffix_code, statut) VALUES (?, ?, ?, ?, ?, ?);

