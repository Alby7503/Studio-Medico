/*
Elenco giornaliero delle visite prenotate per ogni singolo medico
*/
SELECT prenotazione.*
FROM prenotazione
GROUP BY prenotazione.cod_medico;

/*
Elenco giornaliero delle visite prenotate e non effettuate
*/
SELECT prenotazione.*
FROM prenotazione
WHERE prenotazione.effettuata = 0;

/*
Elenco settimanale contenente gli appuntamenti di ciascun medico suddivisi per giorno e ora
*/
SELECT prenotazione.*
FROM prenotazione
GROUP BY prenotazione.cod_medico, prenotazione.data, prenotazione.ora;

/*
Elenco cronologico delle visite usufruite da ciascun paziente
*/
SELECT prenotazione.cod_paziente, COUNT(*)
FROM prenotazione
GROUP BY prenotazione.cod_paziente;