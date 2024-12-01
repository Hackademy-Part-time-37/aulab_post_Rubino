## Documentazione 

INTRODUZIONE

“The Aulab Post” è una piattaforma per la gestione di articoli online. Gli utenti possono pubblicare, visualizzare, cercare, modificare e approvare articoli in base ai loro ruoli. La piattaforma è stata sviluppata in Laravel, utilizzando il modello MVC per una gestione strutturata e scalabile del codice.

BACKLOG

	1.	Caricamento di un articolo da parte di un utente loggato al sistema:
	•	L’utente può inserire un articolo con titolo, sottotitolo, corpo del testo e immagine.
	•	Relazione con categorie predefinite (1-a-N).
	•	Visualizzazione di un messaggio di conferma all’inserimento.
	2.	Visualizzazione pubblica degli articoli e del loro dettaglio:
	•	Lista degli articoli più recenti in home.
	•	Possibilità di cliccare per vedere il dettaglio di ogni articolo.
	3.	Sistema di approvazione degli articoli da parte di utenti abilitati:
	•	Ruoli gestiti: Admin, Revisor, Writer.
	•	Revisor può accettare o rifiutare articoli.
	4.	Sistema di ricerca degli articoli pubblicati in piattaforma:
	•	Ricerca full-text per titolo, sottotitolo, categoria.
	5.	Sistema di gestione dei tag da parte di utenti abilitati:
	•	Relazione N-a-N tra articoli e tag.
	•	Permesso di aggiungere/modificare tag limitato agli admin.
	6.	Sistema di modifica e cancellazione degli articoli pubblicati da parte di utenti abilitati:
	•	Dashboard per writer.
	•	Solo l’autore può modificare/cancellare il proprio articolo.

    User Stories

User Story #1

	•	Come: Sara
	•	Vorrei: Registrarmi in piattaforma per inserire un articolo.
	•	In modo tale: Da lavorare per “The Aulab Post”.
	•	Acceptance Criteria:
	•	Utente può registrarsi/loggarsi.
	•	Pulsante “Inserisci articolo” visibile solo agli utenti loggati.
	•	Articolo composto da: titolo, sottotitolo, corpo, immagine di copertina.
	•	Messaggio di conferma dopo l’inserimento.

    User Story #2

	•	Come: Lorenzo
	•	Vorrei: Visualizzare gli ultimi articoli sul portale.
	•	In modo tale: Da informarmi su ciò che succede nel mondo.
	•	Acceptance Criteria:
	•	Home mostra solo gli articoli più recenti.
	•	Ordine cronologico inverso (dal più recente).
	•	Link per vedere il dettaglio di ogni articolo.

    User Story #3

	•	Come: Marta
	•	Vorrei: Contare su una funzione di fact-checking.
	•	In modo tale: Da controllare quali notizie pubblicare.
	•	Acceptance Criteria:
	•	Ruoli gestiti: Admin, Revisor, Writer.
	•	Revisor può accettare/rifiutare articoli.

    User Story #4

	•	Come: Lorenzo
	•	Vorrei: Cercare tra gli articoli.
	•	In modo tale: Da visualizzare subito quello che mi interessa.
	•	Acceptance Criteria:
	•	Ricerca per titolo, sottotitolo, categoria.

    User Story #5

	•	Come: Corrado
	•	Vorrei: Gestire in autonomia tag e categorie.
	•	In modo tale: Da avere una piattaforma sempre aggiornata.
	•	Acceptance Criteria:
	•	Creazione/modifica/eliminazione di tag e categorie riservata agli admin.

    User Story #6

	•	Come: Sara
	•	Vorrei: Modificare o cancellare i miei articoli.
	•	In modo tale: Da mantenere alta la qualità del mio lavoro.
	•	Acceptance Criteria:
	•	Dashboard per writer con opzioni di modifica/cancellazione.

    Extra User Story #7

	•	Come: Lorenzo
	•	Vorrei: Avere informazioni aggiuntive sugli articoli.
	•	In modo tale: Da scegliere cosa leggere.
	•	Acceptance Criteria:
	•	Slug del titolo nell’URL.
	•	Calcolo del tempo di lettura dell’articolo.

    Funzionalità Implementate

	1.	Gestione Ruoli:
	•	Ruoli Admin, Writer, Revisor implementati.
	•	Middleware per autorizzazioni.
	2.	CRUD Articoli:
	•	Creazione, lettura, modifica e cancellazione di articoli.
	•	Validazione dei campi obbligatori.
	3.	Ricerca Articoli:
	•	Funzione di ricerca full-text per titolo, sottotitolo, categoria.
	4.	Sistema di Categorie e Tag:
	•	Relazione 1-a-N per categorie.
	•	Relazione N-a-N per tag.
	5.	Approfondimenti Extra:
	•	Slug negli URL per SEO.
	•	Tempo di lettura calcolato automaticamente.

    Tecnologie e Strumenti

	•	Framework: Laravel 9
	•	Linguaggi: PHP, Blade (HTML), CSS
	•	Database: MySQL
	•	Gestione Dipendenze: Composer
	•	Versionamento: Git (GitHub)


	## Iterazioni

	Iterazione 1: Registrazione e Inserimento Articoli

	•	Obiettivo: Consentire agli utenti di registrarsi e creare articoli.
	•	Task:
	1.	Implementare la registrazione e il login degli utenti.
	2.	Creare il pulsante “Inserisci Articolo” visibile solo agli utenti loggati.
	3.	Consentire agli utenti di creare articoli con i seguenti campi:
	•	Titolo
	•	Sottotitolo
	•	Corpo del testo
	•	Immagine di copertina
	•	Categoria precompilata
	4.	Aggiungere un messaggio di conferma dopo l’inserimento.

	Iterazione 2: Visualizzazione degli Articoli

	•	Obiettivo: Permettere la visualizzazione pubblica degli articoli.
	•	Task:
	1.	Mostrare in home page gli articoli più recenti.
	2.	Aggiungere un ordinamento in home e index dal più recente al più vecchio.
	3.	Creare una pagina di dettaglio per ogni articolo.

	Iterazione 3: Sistema di Approvazione

	•	Obiettivo: Consentire agli amministratori di approvare o rifiutare articoli.
	•	Task:
	1.	Definire tre ruoli utente: Admin, Revisore, Writer.
	2.	Creare una dashboard per gestire le richieste.
	3.	Aggiungere pulsanti “Accetta Articolo” e “Rifiuta Articolo”.

	Iterazione 4: Funzione di Ricerca

	•	Obiettivo: Permettere agli utenti di cercare articoli.
	•	Task:
	1.	Implementare una barra di ricerca con:
	•	Ricerca per titolo.
	•	Ricerca per sottotitolo.
	•	Ricerca per categoria.
    
    Iterazione 5: Gestione Tag e Categorie

	•	Obiettivo: Consentire la gestione autonoma di tag e categorie.
	•	Task:
	1.	Creare i tags.
	2.	Collegare tags e articoli con relazione “N-a-N”.
	3.	Permettere solo all’Admin di:
	•	Modificare e cancellare categorie.
	•	Modificare e cancellare tags.

	Iterazione 6: Modifica e Cancellazione Articoli

	•	Obiettivo: Consentire ai writer di modificare e cancellare i propri articoli.
	•	Task:
	1.	Creare una dashboard dedicata ai writer.
	2.	Permettere ai writer di:
	•	Modificare i propri articoli.
	•	Cancellare i propri articoli.
	3.	Implementare le seguenti regole:
	•	Se l’articolo viene modificato, deve tornare in revisione.
	•	Se l’immagine di un articolo viene modificata, cancellare la vecchia immagine dallo storage.
	•	Quando l’articolo viene cancellato, cancellare l’immagine dallo storage.

	Iterazione Extra: Informazioni Avanzate

	•	Obiettivo: Aggiungere funzionalità avanzate per gli utenti.
	•	Task:
	1.	Aggiungere lo slug del titolo nell’URI della pagina di dettaglio.
	2.	Calcolare i minuti di lettura degli articoli.