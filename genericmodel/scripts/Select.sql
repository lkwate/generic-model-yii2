SELECT code, libelle FROM classeRubriqueParam;
SELECT code, table_primaire, table_etrangere, champ_primaire, champ_etranger FROM cleEtrangere;
SELECT code, rubrique_source, rubrique_cible, champ_source, champ_cible, statut FROM relationParam;
SELECT code, libelle, nom_table, rubrique_parent, class_rubrique, statut FROM rubriqueParam;
SELECT code, libelle FROM statutParam;
SELECT code, nom_table, index_code, prefix_code, suffix_code, statut FROM tableCodeParam;

