const Pool = require('pg').Pool
const pool = new Pool({
    user: 'postgres',
    host: 'localhost',
    database: 'proyeksbd',
    password: 'password',
    port: 5432,
});

const getPrices = (request, response) => {
    pool.query('SELECT * FROM price_data ORDER BY film_id ASC', (err, results) => {
        if (err) {
            throw err;
        }
        response.status(200).json(results.rows);
    })
}

const getPricesbyID = (request, response) => {
    const film_id = parseInt(request.params.film_id);
    pool.query('SELECT * FROM price_data WHERE film_id = $1', [film_id], (err, results) => {
        if(err) {
            throw err;
        }
        response.status(200).json(results.rows);
    })
}

const createPrice = (request, response) => {
    const { price } = request.body;
    const film_id = parseInt(request.params.film_id);

    pool.query('INSERT INTO price_data (price) VALUES ($1)', [price], (err, results) => {
        if(err){
            throw err;
        }
        response.status(201).send(`Price created for film id: ${film_id}`);
    })
}

const updatePrice = (request, response) => {
    const film_id = parseInt(request.params.film_id);
    const { price } = request.body;

    pool.query('UPDATE price_data SET price = $1 WHERE film_id = $2', [price, film_id], (err, results) => {
        if(err){
            throw err;
        }
        response.status(200).send(`Price updated for film id: ${film_id}`);
    })
}

const deletePrice = (request, response) => {
    const film_id = parseInt(request.params.film_id);
    pool.query('DELETE FROM price_data WHERE film_id = $1', [film_id], (err, results) => {
        if(err){
            throw err;
        }
        response.status(200).send(`Price deleted with film id: ${film_id}`);
    })
}

module.exports = {
    getPrices,
    getPricesbyID,
    createPrice,
    updatePrice,
    deletePrice,
}