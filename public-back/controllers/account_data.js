const Pool = require('pg').Pool
const pool = new Pool({
    user: 'postgres',
    host: 'localhost',
    database: 'proyeksbd',
    password: 'password',
    port: 5432,
});
const { validationResult } = require('express-validator')

const getAccounts = (request, response) => {
    pool.query('SELECT * FROM account_data ORDER BY account_id ASC', (err, results) => {
        if (err) {
            throw err;
        }
        response.status(200).json(results.rows);
    })
}

const getAccounts2 = (request, response) => {
    pool.query('SELECT * FROM account_test ORDER BY account_id ASC', (err, results) => {
        if (err) {
            throw err;
        }
        response.status(200).json(results.rows);
    })
}

const getAccounts2byID = (request, response) => {
    const account_id = parseInt(request.params.account_id);
    pool.query('SELECT * FROM account_test WHERE account_id = $1', [account_id], (err, results) => {
        if(err) {
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
    const firstname = request.body.firstname;
	const surname = request.body.lastname;
	const email = request.body.email;
	const wallet = 0;
	const password = request.body.password;
    if (!errors.isEmpty()){
		return response.status(422).json({ errors: errors.array() });
    } else {
		pool.query('SELECT * FROM account_test WHERE email = $1', [email], (err, results) => {
			if (err) {
				throw err;
			}
			//Pengecekkan kesamaan email dengan membandingkan hasil POST dan SELECT yang sudah ada
			if (results.rows.length > 0){ 
				//Kalau Create Account gagal (email yang sama udah ada)
				response.status(301).redirect('http://localhost/front-end2/profil-user/login/signup.html');
                
			}else{
				pool.query('INSERT INTO account_test (firstname, surname, email, wallet, password) VALUES ($1, $2, $3, $4, $5)', [firstname, surname, email, wallet, password], (err, results) => {
					if(err){
						throw err;
					}
					// response.status(201).send(`Account addedss with name: ${firstname} ${surname}`);
					//Kalau create account berhasil
					response.status(301).redirect('http://localhost/front-end2/profil-user/profil.html');
				});
			}
		})	
	}
    // pool.query('INSERT INTO account_data (firstname, surname, email, wallet, password) VALUES ($1, $2, $3, $4, $5)', [firstname, surname, email, wallet, password], (err, results) => {
    //     if(err){
    //         throw err;
    //     }
    //     response.status(201).send(`Account added with name: ${firstname} ${surname}`);
    // })
}

const createAccount2 = (request, response) => {
    const firstname = request.body.firstname;
	const surname = request.body.lastname;
	const email = request.body.email;
	const wallet = 0;
	const password = request.body.password;
    const errors = validationResult(request);
    if (!errors.isEmpty()){
		return response.status(422).json({ errors: errors.array() });
    } else {
		pool.query('SELECT * FROM account_test WHERE email = $1', [email], (err, results) => {
			if (err) {
				throw err;
			}
			//Pengecekkan kesamaan email dengan membandingkan hasil POST dan SELECT yang sudah ada
			if (results.rows.length > 0){ 
				//Kalau Create Account gagal (email yang sama udah ada)
				response.status(301).redirect('http://localhost/front-end2/profil-user/login/signup2.html');
			}else{
				pool.query('INSERT INTO account_test (firstname, surname, email, wallet, password) VALUES ($1, $2, $3, $4, $5)', [firstname, surname, email, wallet, password], (err, results) => {
					if(err){
						throw err;
					}
					// response.status(201).send(`Account addedss with name: ${firstname} ${surname}`);
					//Kalau create account berhasil
					response.status(301).redirect('http://localhost/front-end2/profil-user/profil.html');
				});
			}
		})	
	}
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
    getAccounts2,
    getAccounts2byID,
    getAccountsbyID,
    createAccount,
    createAccount2,
    updateAccount,
    deleteAccount,
}