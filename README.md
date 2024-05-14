# Laravel Assignment

## .env setup

root env file should have working database connection variables.

## Commands

```bash
  php artisan migrate --path=/database/migrations/2024_05_14_111840_create_subjects_table.php
```
Will give you the table where subjects are being stored.

## Routes

```bash
  /screening
```
will give you the form

```bash
  /screenings
```
will list the subjects from database table

## files

```bash
  resources/views/subject_screening.blade.php
```
will render the screening form.

```bash
  resources/views/subjects.blade.php
```
will render the subjects from databse table.

```bash
  App/Models/Subject
```
will save the subjects in databse table.

```bash
  App/Http/Controllers/ScreeningController
```
will validate the request and show the result.

```bash
  database/migration/create_subject_table.php
```
will help create the subjects table.
