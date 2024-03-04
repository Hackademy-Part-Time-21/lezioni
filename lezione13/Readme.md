# Recap 2

- Editor (Blogger)
    - Sistema di Gestione CRUD
    - Ticket composto da 
        - oggetto
        - descrizione
        - priorità (bassa,media,alta)
        - possibilità di allegare screenshot
        - stato (aperto,lavorazione,chiuso)
        - screenshot del problema (extra)
        - risposta
    
    - L'edit di un ticket (da parte del blogger) saranno possibili solo se il ticket non è in fase di lavorazione oppure chiuso

    - La cancellazione di un ticket non è concessa

    - Protetto da middleware auth

- Admin
    - Visualizzare l'elenco dei ticket
        - in ordine decrescente rispetto all'id

        - Puo modificare lo stato (in lavorazione,chiuso)

        - Può chiudere il ticket ed allegare una risposta

        - protected da middlware (custom admin)