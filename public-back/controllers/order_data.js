const Pool = require('pg').Pool
const pool = new Pool({
    user: 'postgres',
    host: 'localhost',
    database: 'proyeksbd',
    password: 'password',
    port: 5432,
});

const getOrders = (request, response) => {
    pool.query('SELECT * FROM order_data ORDER BY order_id ASC', (err, results) => {
        if (err) {
            throw err;
        }
        response.status(200).json(results.rows);
    })
}

const getOrdersbyID = (request, response) => {
    const order_id = parseInt(request.params.order_id);
    pool.query('SELECT * FROM order_data WHERE order_id = $1', [order_id], (err, results) => {
        if(err) {
            throw err;
        }
        response.status(200).json(results.rows);
    })
}

const createOrder = (request, response) => {
    const { account_id, film_id, amount } = request.body;

    pool.query('INSERT INTO order_data (account_id, film_id, amount) VALUES ($1, $2, $3)', [account_id, film_id, amount], (err, results) => {
        if(err){
            throw err;
        }
        response.status(201).send(`Order created with ids: ${account_id} ${film_id}`);
    })
}

const updateOrder = (request, response) => {
    const order_id = parseInt(request.params.order_id);
    const { account_id, film_id, amount } = request.body;

    pool.query('UPDATE order_data SET account_id = $1, film_id = $2, amount = $3 WHERE order_id = $4', [account_id, film_id, amount, order_id], (err, results) => {
        if(err){
            throw err;
        }
        response.status(200).send(`Order modified with ids: ${account_id} ${film_id}`);
    })
}

const deleteOrder = (request, response) => {
    const order_id = parseInt(request.params.order_id);
    pool.query('DELETE FROM order_data WHERE order_id = $1', [order_id], (err, results) => {
        if(err){
            throw err;
        }
        response.status(200).send(`Order deleted with id: ${order_id}`);
    })
}

module.exports = {
    getOrders,
    getOrdersbyID,
    createOrder,
    updateOrder,
    deleteOrder,
}