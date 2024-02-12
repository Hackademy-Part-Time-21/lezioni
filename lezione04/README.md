# Laravel - Lezione 4

# Approfondimento
- dd($var)
- @dd($var)

# Componenti
- Introduzione al DRY (Don't reapeat yourself)
- Componente
    - php artisan make:component Footer
- Componente Anonimo
    - php artisan make:componente Footer --view

- Problema con dipendenze non aggiornate del componente
    - Soluzione : php artisa view:clear
    
- Differenze , vantaggi e svantaggi dei due tipi di componenti

- Componente con passaggio dei dati
    - differenza tra :attributo=... e attributo=...
    
- Layout 
    - {{$slot}}
    - `<x-slot:header>.....</x-slot>`

# Vite
- Node.js e Npm

- Installare vite
    - `npm install`

- Come utilizzare vite
    - Lanciare il server locale 
        - `npm run dev`
    
    - Buildare gli assets
        - `npm run build`
