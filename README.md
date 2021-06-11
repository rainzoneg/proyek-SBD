<a href="https://github.com/rainzoneg/proyek-SBD/">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/HTML5_logo_and_wordmark.svg/180px-HTML5_logo_and_wordmark.svg.png" alt="HTML" title="HTML" align="right" height="90" />
</a>

# Proyek SBD Kelompok 7a
[![Website shields.io](https://img.shields.io/website-up-down-green-red/http/shields.io.svg)](https://cow-7a.web.app/)
[![Website shields.io](https://img.shields.io/badge/made%20with-bootstrap-orange?&style=plastic)](https://cow-7a.web.app/)




## Anggota
* Juan Patrick 1906355516
* Richard Tanoto 1906355586
* Ronald Grant 1906355655
* Samuel Nathaniel H. 1906355560

## Tentang
Proyek Sistem Basis Data Kelompok 7a, berupa aplikasi Website Cinema On Web (COW) terintegrasi database PostgreSQL untuk menyimpan dan menampilkan data
Film, info film terbaru, databaes film, dll. Prototype dari website dapat dilihat di https://cow-7a.web.app/

## Requirement:
1. [XAMPP Web Server](https://www.apachefriends.org/download.html)
2. [PostgreSQL](https://www.postgresql.org/download/)
3. [Node.js](https://nodejs.org/en/)


## Installation:
Buka *XAMPP->php->php.ini* dan uncomment pada extension pgsql agar library pgsql dapat digunakan XAMPP dalam mengoperasikan PHP.

![image](https://user-images.githubusercontent.com/80802092/121706702-12c0dd00-cb00-11eb-86a6-13a1a54300e5.png)


### Database yang Digunakan
Database yang digunakan adalah PostgreSQL, dan spesifikasi database adalah sebagai berikut:

Nama Database: proyeksbd

Digunakan 4 tabel/relasi:

![image](https://user-images.githubusercontent.com/68103682/120690166-108ecb00-c4cf-11eb-9d1f-0a6851d6da22.png)

*Tabel Account*

![image](https://user-images.githubusercontent.com/68103682/121511790-3b1edd80-ca13-11eb-972c-437dc49ddd04.png)


```sql
CREATE table account_test(account_id serial UNIQUE PRIMARY KEY, 
firstname text NOT NULL,
surname text,
email text UNIQUE NOT NULL,
wallet bigint,
password text);

```

*Tabel Film*

![image](https://user-images.githubusercontent.com/68103682/120690766-d2de7200-c4cf-11eb-9c54-8e8241e39c00.png)

```SQL
CREATE table film(film_id int, 
title text,
poster_url text,
release_date date,
studio text,
genre1 text,
genre2 text,
genre3 text,
rating text,
length int,
description text);
```

*Tabel Order*

![asdasd2](https://user-images.githubusercontent.com/68103682/121388523-bfbb1e80-c975-11eb-9d7f-ccec3248a707.PNG)

```
CREATE TABLE order_data(
order_id serial NOT NULL PRIMARY KEY,
account_id int,
film_id int,
amount smallint);
```

*Tabel Prices*

![asdasd3](https://user-images.githubusercontent.com/68103682/121388866-090b6e00-c976-11eb-983d-4a8af1a2b953.PNG)

```
CREATE TABLE price_data(
film_id int,
price int
);
```






