# 📚 BookNest

BookNest è una web application full-stack sviluppata con Laravel che consente di esplorare, consultare e gestire una collezione di libri, autori, generi e case editrici.

Il progetto è strutturato con una separazione chiara tra area pubblica (guest) e area amministrativa (admin), replicando una logica tipica delle applicazioni reali.

---

## 🚀 Funzionalità

### 👤 Area Pubblica
- Visualizzazione lista libri
- Pagina dettaglio per ogni libro
- Filtro dinamico per:
  - Autore
  - Genere
- Ricerca live per titolo (senza ricaricare la pagina)

### 🔐 Area Admin
- CRUD completo per:
  - Libri
  - Autori
  - Generi
  - Case editrici
- Upload e gestione immagini (copertine libri)
- Accesso protetto tramite autenticazione

---

## 🧠 Concetti implementati

- Architettura MVC (Laravel)
- Relazioni Eloquent:
  - Book → Author (belongsTo)
  - Book → Genre (belongsTo)
  - Book → Publisher (belongsTo)
  - Book → Tags (many-to-many)
- Filtri dinamici tramite Request
- Blade templating con layout riutilizzabili
- Separazione logica tra guest e admin
- Gestione file con `storage:link`
- UI responsive con Tailwind CSS

---

## 🛠 Tecnologie utilizzate

- **Backend:** Laravel (PHP)
- **Frontend:** Blade + Tailwind CSS
- **Database:** MySQL
- **Storage:** Laravel File System

---

## ⚙️ Installazione

1. Clona il repository

```bash
git clone https://github.com/GiacomoGaudino/BookNest.git
cd BookNest
```
2. Installa le dipendenze

```bash
composer install
npm install
```

3. Configura l'ambiente

```bash
cp .env.example .env
php artisan key:generate
```

4. Configura il database nel file `.env`

5. esegui le migrazioni e i seeder

```bash
php artisan migrate --seed
```
6. Crea il link per lo storage

```bash
php artisan storage:link
```
7. Avvia il server

```bash
php artisan serve
npm run dev
``` 

## Struttura del progetto

app/
├── Http/
│   ├── Controllers/
│   │   ├── admin/
│   │   └── guest/

resources/views/
├── admin/
├── guest/
├── layouts/

---

## Autore

Giacomo Gaudino