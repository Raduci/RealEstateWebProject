# Proiect Web Agenție Imobiliară

Un proiect web complet, dezvoltat pentru o agenție imobiliară, oferind funcționalități de prezentare a ofertelor, înregistrare/autentificare utilizatori, gestionarea recenziilor și formulare de contact/rezervare.

---

## Despre Proiect

Acest proiect își propune să ofere o platformă online robustă și ușor de utilizat pentru o agenție imobiliară. Utilizatorii pot naviga prin ofertele disponibile, pot vizualiza detalii despre proprietăți, pot lăsa recenzii și pot interacționa cu agenția prin formulare de contact și rezervare. Administratorii pot gestiona ofertele și recenziile prin intermediul bazei de date.

---

## Funcționalități

  * **Prezentare Oferte:** Afișarea detaliată a proprietăților disponibile (apartamente, case, terenuri etc.).
  * **Detalii Proprietate:** Pagini dedicate fiecărei proprietăți cu informații extinse, imagini și posibilitatea de rezervare.
  * **Autentificare și Înregistrare:** Sistem de management al utilizatorilor (login, logout, înregistrare).
  * **Recenzii Utilizatori:** Posibilitatea utilizatorilor de a adăuga recenzii pentru servicii sau proprietăți.
  * **Formular de Contact/Rezervare:** Formular pentru solicitări de informații sau programări.
  * **Administrare Oferte:** (Presupus, având `add.php`) Posibilitatea de a adăuga noi oferte.
  * **Bază de Date:** Stocarea datelor despre utilizatori, oferte și recenzii.

---

## Tehnologii Utilizate

  * **Backend:**
    * **PHP:** Limbajul principal pentru logica server-side.
    * **MySQL (via XAMPP):** Sistem de management al bazei de date.
  * **Frontend:**
    * **HTML:** Structura paginilor web.
    * **CSS:** Stiluri pentru aspectul vizual.
    * **JavaScript:** Interactivitate pe partea de client.
    * **Bootstrap:** Framework CSS pentru un design responsiv și modern.
  * **Server Local:**
    * **XAMPP:** Mediu de dezvoltare local ce include Apache, MySQL, PHP și Perl.

---

## Structura Proiectului

```
proiect_imobiliare/
├── uploads/
│   ├── about.php
│   ├── oferte.php
│   ├── database.php
│   ├── logout.php
│   ├── salveaza_formular.php
│   ├── recenzii.php
│   ├── oferta*.php (oferta1.php, oferta2.php, etc.)
│   ├── add.php
│   ├── index.php
│   ├── adauga_recenzie.php
│   ├── rezervare.php
│   ├── registration.php
│   └── login.php
├── public/
│   ├── main.js
│   └── img/ (Director pentru imagini)
├── includes/
│   ├── users.sql
│   ├── header.php
│   └── footer.php
└── README.md
```

---

## Instalare și Configurare

Pentru a rula acest proiect local, urmează pașii de mai jos:

1. **Instalează XAMPP:**  
   Descarcă și instalează XAMPP de pe [site-ul oficial](https://www.apachefriends.org/index.html).

2. **Clonează Repozitoriul:**
   ```bash
   git clone https://github.com/Raduci/RealEstateWebProject.git
   ```
   Sau descarcă arhiva ZIP a proiectului și dezarhiveaz-o.

3. **Mută Proiectul:**  
   Copiază întregul director `RealEstateWebProject` în `htdocs` din XAMPP (ex: `C:\xampp\htdocs\`).

4. **Pornește XAMPP:**  
   Deschide XAMPP Control Panel și pornește modulele **Apache** și **MySQL**.

5. **Creează Baza de Date:**
   - Accesează `http://localhost/phpmyadmin/`
   - Creează baza de date `agentie_imobiliara`
   - Importă fișierul `users.sql` din `includes/` pentru a crea tabelul utilizatorilor

6. **Configurează Conexiunea la Bază de Date:**  
   Deschide `uploads/database.php` și actualizează:
   ```php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "agentie_imobiliara";
   ```

7. **Accesează Proiectul:**  
   În browser, mergi la:  
   `http://localhost/proiect_imobiliare/uploads/index.php`

---

## Planuri de Dezvoltare

Următoarele funcționalități sunt planificate pentru versiunile viitoare:

-  Pagină de profil pentru utilizatori
-  Sistem de mesagerie între utilizator și agent
-  Filtrare și sortare avansată pentru oferte
-  Panou de administrare ( admin panel )
---
