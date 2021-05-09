# Modello relazionale

## Entità

**utenti** **(** *__ID__*, email, password, nome, cognome, ruolo **)** 

**postazione** **(** *__IDp__*, *__superU__*,  lngt, lttd **)** 
**V.I.R** *__superU__* come *__utente__*, utente deve avere il ruolo di *MANUTENZIONE*

**campionamento** **(** *__postazione__*, *__IDcamp__*, dato, valore, dataRil  **)** 
**V.I.R** *__IDp__* come *__postazione__*

**interventi** **(** *__utente__*, *__IDPostazione__*, dataInt  **)** 
**V.I.R** *__ID__* come *__utente__*, *__IDp__* come *__IDPostazione__*

## Relazioni
**supervisione** **(** *__utente__*, *__IDPostazione__*, dataIni, datoFin  **)** 
**V.I.R** *__ID__* come *__utente__*, *__IDp__* come *__IDPostazione__*