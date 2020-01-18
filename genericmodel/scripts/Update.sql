UPDATE classeRubriqueParam SET libelle = ? WHERE code = ?;
UPDATE cleEtrangere SET table_primaire = ?, table_etrangere = ?, champ_primaire = ?, champ_etranger = ? WHERE code = ?;
UPDATE relationParam SET rubrique_source = ?, rubrique_cible = ?, champ_source = ?, champ_cible = ?, statut = ? WHERE code = ?;
UPDATE rubriqueParam SET libelle = ?, nom_table = ?, rubrique_parent = ?, class_rubrique = ?, statut = ? WHERE code = ?;
UPDATE statutParam SET libelle = ? WHERE code = ?;
UPDATE tableCodeParam SET nom_table = ?, index_code = ?, prefix_code = ?, suffix_code = ?, statut = ? WHERE code = ?;

