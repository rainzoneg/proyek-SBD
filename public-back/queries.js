const Pool = require('pg').Pool
const pool = new Pool({
    user: 'postgres',
    host: 'localhost',
    database: 'proyeksbd',
    password: 'password',
    port: 5432,
});

const getUsers = (request, response) => {
    pool.query('SELECT * FROM users ORDER BY id ASC', (err, results) => {
        if (err) {
            throw err;
        }
        response.status(200).json(results.rows);
    })
}

const getUsersbyID = (request, response) => {
    const id = parseInt(request.params.id);
    pool.query('SELECT * FROM users WHERE id = $1', [id], (err, results) => {
        if(err) {
            throw err;
        }
        response.status(200).json(results.rows);
    })
}

const createUser = (request, response) => {
    const { name, email } = request.body;

    pool.query('INSERT INTO users (name, email) VALUES ($1, $2)', [name, email], (err, results) => {
        if(err){
            throw err;
        }
        response.status(201).send(`User added with name: ${name}`);
    })
}

const updateUser = (request, response) => {
    const id = parseInt(request.params.id);
    const { name, email } = request.body;

    pool.query('UPDATE users SET NAME = $1, email = $2 WHERE id = $3', [name, email, id], (err, results) => {
        if(err){
            throw err;
        }
        response.status(200).send(`User modified with ID: ${id}`);
    })
}

const deleteUser = (request, response) => {
    const id = parseInt(request.params.id);
    pool.query('DELETE FROM users WHERE id = $1', [id], (err, results) => {
        if(err){
            throw err;
        }
        response.status(200).send(`User deleted with ID: ${id}`);
    })
}

module.exports = {
    getUsers,
    getUsersbyID,
    createUser,
    updateUser,
    deleteUser,
}