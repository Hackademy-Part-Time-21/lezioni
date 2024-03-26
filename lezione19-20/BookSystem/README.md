# Sviluppo di un Sistema di Gestione delle Biblioteche

- Obiettivo:
Creare un'applicazione Laravel semplice per la gestione di una biblioteca. L'applicazione permetterà agli utenti di visualizzare i libri disponibili e registrare i prestiti. Gli amministratori possono aggiungere, modificare e cancellare i libri dal sistema.

- Composer Dependencies
    - fortify 
    - livewire

- Npm Dependencies
    - bootstrap

- Schema Database

    - Lista entità
        - Book -> (id,name,description,cover,genre,author_id)
        - Author -> (id,name,surname,year)
        - User -> (id,name,email,password,is_admin)

    - Relazioni tra entità
        - 1 a N 
        - N a N tra Book e User
            - pivot : book_user(id,id_book,id_user,start_date,end_date) 
        

- Funzionalità da implementare
    - Login/Registrazione
    - Pannello di amministrazione
        - Crud del libro
        - Crud dell'autore

    - Home
        - Gli ultimi 10 libri

    - Ricerca di libri per autore

    - Prenotare un libro
