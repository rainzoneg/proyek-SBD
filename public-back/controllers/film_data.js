const Pool = require('pg').Pool
const pool = new Pool({
    user: 'postgres',
    host: 'localhost',
    database: 'proyeksbd',
    password: 'password',
    port: 5432,
});

const createUser = (request, response) => {
    const { name, email } = request.body;

    pool.query('INSERT INTO users (name, email) VALUES ($1, $2)', [name, email], (err, results) => {
        if(err){
            throw err;
        }
        response.status(201).send(`User added with name: ${name}`);
    })
}

const getFilms = (request, response) => {
    pool.query('SELECT * FROM film ORDER BY release_date DESC', (err, results) => {
        if (err) {
            throw err;
        }
        response.status(200).json(results.rows);
    })
}

const getFilmsbyID = (request, response) => {
    const film_id = parseInt(request.params.film_id);
    pool.query('SELECT * FROM film WHERE film_id = $1', [film_id], (err, results) => {
        if(err) {
            
        }
        response.status(200).json(results.rows);
    })
}

const createFilm = (request, response) => {
    const { title, poster_url, release_date, studio, genre1, genre2, genre3, rating, length, description } = request.body;

    pool.query('INSERT INTO film (title, poster_url, release_date, studio, genre1, genre2, genre3, rating, length, description) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10)', [title, poster_url, release_date, studio, genre1, genre2, genre3, rating, length, description], (err, results) => {
        if(err){
            throw err;
        }
        response.status(201).send(`Film added with title: ${title}`);
    })
}

const updateFilm = (request, response) => {
    const film_id = parseInt(request.params.film_id);
    const { title, poster_url, release_date, studio, genre1, genre2, genre3, rating, length, description } = request.body;

    pool.query('UPDATE film SET title = $1, poster_url = $2, release_date = $3, studio = $4, genre1 = $5, genre2 = $6, genre3 = $7, rating = $8, length = $9, description = $10 WHERE film_id = $11', [title, poster_url, release_date, studio, genre1, genre2, genre3, rating, length, description, film_id], (err, results) => {
        if(err){
            throw err;
        }
        response.status(200).send(`Film modified with title: ${title}`);
    })
}

const deleteFilm = (request, response) => {
    const film_id = parseInt(request.params.film_id);
    pool.query('DELETE FROM film WHERE film_id = $1', [film_id], (err, results) => {
        if(err){
            throw err;
        }
        response.status(200).send(`Film deleted with ID: ${film_id}`);
    })
}

module.exports = {
    createUser,
    getFilms,
    getFilmsbyID,
    createFilm,
    updateFilm,
    deleteFilm,
}