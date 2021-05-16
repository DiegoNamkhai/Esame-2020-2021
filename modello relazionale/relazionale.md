# Modello relazionale

## Entità

**utenti** **(** *__email__*, password, nome, cognome, ruolo **)** 

**postazione** **(** *__nomeP__*, *__superU__*,  lngt, lttd **)** 
**V.I.R** *__email__* come *__superU__*, utente deve avere il ruolo di *MANUTENZIONE*

**campionamento** **(** *__postazione__*, *__IDcamp__*, dato, valore, dataRil  **)** 
**V.I.R** *__nomeP__* come *__postazione__*

## Relazioni
**supervisione** **(** *__utente__*, *__IDPostazione__*, dataIni, datoFin  **)** 
**V.I.R** *__email__* come *__utente__*, *__nomeP__* come *__IDPostazione__*

**interventi** **(** *__utenteInt__*, *__IDPostazioneInt__*, dataInt  **)** 
**V.I.R** *__email__* come *__utenteInt__*, *__nomeP__* come *__IDPostazioneInt__*