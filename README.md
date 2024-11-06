# Proiect - Gestionare Studenți și Discipline în Baza de Date „Facultate”

## Descrierea Proiectului

Aplicație web pentru gestionarea studenților și disciplinelor dintr-o facultate, realizată în cadrul laboratorului de Programarea Aplicațiilor Internet la Universitatea Politehnica din Timișoara, Facultatea de Automatică și Informatică Aplicată, specializarea Ingineria Sistemelor, Automatică și Informatică Aplicată.

Proiectul utilizează o bază de date MySQL gestionată prin phpMyAdmin, care conține tabele pentru `studenti_AC`, `discipline` și `note`. Funcționalitățile includ adăugarea de noi înregistrări (studenți și discipline), vizualizarea listelor existente și validarea datelor pentru a preveni duplicările. 

Prin phpMyAdmin, utilizatorii pot explora structura bazei de date, efectua operațiuni de administrare, vizualizare și modificare a datelor într-un mod ușor și intuitiv.

## Structura Bazei de Date

Baza de date `facultate` conține următoarele tabele:

### Tabelul `studenti_AC`:
- `Marca` (Tip: `char(6)`) - Cheia primară care identifică unic fiecare student.
- `Nume` (Tip: `varchar(30)`) - Numele studentului.
- `Prenume` (Tip: `varchar(30)`) - Prenumele studentului.
- `An_Studiu` (Tip: `integer`) - Anul de studiu al studentului.

### Tabelul `discipline`:
- `codDisciplina` (Tip: `int`) - Cheia primară care identifică unic fiecare disciplină.
- `Disciplina` (Tip: `varchar(30)`) - Numele disciplinei.
- `An_Studiu` (Tip: `integer`) - Anul de studiu în care este predată disciplina.

### Tabelul `note`:
- `Marca` (Tip: `char(6)`) - Referință către cheia primară a tabelului `studenti_AC`.
- `codDisciplina` (Tip: `int`) - Referință către cheia primară a tabelului `discipline`.
- `Nota` (Tip: `double`) - Nota obținută de student pentru disciplina respectivă.

**Notă**: De recomandat ar fi ca pe fiecare câmp al tabelei sa fie aplicată câte o constragere (după caz) de tip `NOT NULL` / `UNIQUE` / etc.

```sql
CREATE DATABASE facultate;
USE facultate;

CREATE TABLE studenti_AC (
    Marca CHAR(6) PRIMARY KEY,
    Nume VARCHAR(30),
    Prenume VARCHAR(30),
    An_Studiu INTEGER
);

CREATE TABLE discipline (
    codDisciplina INT PRIMARY KEY,
    Disciplina VARCHAR(30),
    An_Studiu INTEGER
);

CREATE TABLE note (
    Marca CHAR(6) REFERENCES studenti_AC (Marca),
    codDisciplina INT REFERENCES discipline (codDisciplina),
    Nota DOUBLE
);
```

## Funcționalitățile Proiectului

### 1. Gestionarea Studenților
- **Interfața pentru Adăugarea unui Student**: Permite utilizatorilor să adauge un nou student în baza de date `studenti_AC` printr-un formular care colectează `Marca`, `Nume`, `Prenume` și `An_Studiu`.
- **Navigare**: Butoane pentru accesarea altor secțiuni ale aplicației, cum ar fi vizualizarea listei de studenți sau gestionarea disciplinelor.
- **Flux de Lucru**: Utilizatorul completează formularul și apasă pe `Add`. Scriptul verifică dacă studentul există deja în baza de date (după `Marca`). Dacă studentul nu există, este adăugat; altfel, utilizatorul este notificat că înregistrarea există deja.

### 2. Gestionarea Disciplinelor
- **Interfața pentru Adăugarea unei Discipline**: Permite introducerea de noi discipline în tabelul `discipline` prin completarea câmpurilor `codDisciplina`, `Disciplina` și `An_Studiu`.
- **Navigare**: Butoane care permit navigarea între paginile pentru adăugarea de studenți, vizualizarea studenților și vizualizarea listelor de discipline.
- **Flux de Lucru**: Utilizatorul completează formularul și apasă pe `Add`. Scriptul validează datele și verifică dacă există deja o disciplină cu același `codDisciplina`. Dacă disciplina nu există, este inserată în baza de date; dacă există, este afișat un mesaj de eroare.

### 3. Vizualizarea Listelor
- **Afișarea Listei de Studenți**: Interfața permite afișarea tuturor studenților din baza de date `studenti_AC` sub formă de tabel, prezentând toate informațiile despre studenți.
- **Afișarea Listei de Discipline**: Interfața oferă afișarea tuturor disciplinelor din tabelul `discipline` într-un format tabelar. De asemenea, este afișat un mesaj care indică numărul total de discipline înregistrate.

## Paleta de Culori

Proiectul utilizează o paletă de culori de pe [Color Hunt](https://colorhunt.co/palette/222831393e4600adb5eeeeee), compusă din următoarele culori:
- ![#222831](https://via.placeholder.com/15/222831/222831.png) `#222831`: Fundal închis pentru secțiuni importante.
- ![#393E46](https://via.placeholder.com/15/393E46/393E46.png) `#393E45`: Culoare pentru elemente de text și fundaluri secundare.
- ![#00ADB5](https://via.placeholder.com/15/00ADB5/00ADB5.png) `#00ADB5`: Culoare de accent pentru elemente interactive.
- ![#EEEEEE](https://via.placeholder.com/15/EEEEEE/EEEEEE.png) `#EEEEEE`: Fundal deschis și text pentru contrast ridicat.

---

**Notă**: Acest proiect a fost realizat în cadrul laboratorului materiei *Programarea aplicațiilor internet* de la *Universitatea Politehnica din Timișoara*, *Facultatea de Automatică și Informatică Aplicată*, specializarea *Ingineria Sistemelor - Automatică și Informatică Aplicată*.
