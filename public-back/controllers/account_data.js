const Pool = require('pg').Pool
const pool = new Pool({
    user: 'postgres',
    host: 'localhost',
    database: 'proyeksbd',
    password: 'password',
    port: 5432,
});

const getAccounts = (request, response) => {
    pool.query('SELECT * FROM account_data ORDER BY account_id ASC', (err, results) => {
        if (err) {
            throw err;
        }
        response.status(200).json(results.rows);
    })
}

const getAccountsbyID = (request, response) => {
    const account_id = parseInt(request.params.account_id);
    pool.query('SELECT * FROM account_data WHERE account_id = $1', [account_id], (err, results) => {
        if(err) {
            throw err;
        }
        response.status(200).json(results.rows);
    })
}

const createAccount = (request, response) => {
    const { firstname, surname, email, wallet, password } = request.body;

    pool.query('INSERT INTO account_data (firstname, surname, email, wallet, password) VALUES ($1, $2, $3, $4, $5)', [firstname, surname, email, wallet, password], (err, results) => {
        if(err){
            throw err;
        }
        response.status(201).send(`Account added with name: ${firstname} ${surname}`);
    })
}

const updateAccount = (request, response) => {
    const account_id = parseInt(request.params.account_id);
    const { firstname, surname, email, wallet, password } = request.body;

    pool.query('UPDATE account_data SET firstname = $1, surname = $2, email = $3, wallet = $4, password = $5 WHERE account_id = $6', [firstname, surname, email, wallet, password, account_id], (err, results) => {
        if(err){
            throw err;
        }
        response.status(200).send(`Account modified with name: ${firstname} ${surname}`);
    })
}

const deleteAccount = (request, response) => {
    const account_id = parseInt(request.params.account_id);
    pool.query('DELETE FROM account_data WHERE account_id = $1', [account_id], (err, results) => {
        if(err){
            throw err;
        }
        response.status(200).send(`Account deleted with id: ${account_id}`);
    })
}

module.exports = {
    getAccounts,
    getAccountsbyID,
    createAccount,
    updateAccount,
    deleteAccount,
}