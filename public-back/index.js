const express = require('express');
const app = express();
const db = require('./controllers/film_data');
const db2 = require('./controllers/account_data');
const db3 = require('./controllers/order_data');
const db4 = require('./controllers/price_data');
const { body, validationResult } = require('express-validator')
const session = require('express-session');
app.use(session({
	secret: 'secret',
	resave: true,
	saveUninitialized: true
}));
const bodyParser = require('body-parser');
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true}));
const http = require('http');
const hostname = '127.0.0.1';
const port = 3001;
const Pool = require('pg').Pool
const pool = new Pool({
    user: 'postgres',
    host: 'localhost',
    database: 'proyeksbd',
    password: 'password',
    port: 5432,
});
var cors = require('cors');
app.use(cors());

app.get('/', (request, response) => {
	response.json(
		{ info: 'Back-End API for Proyek SBD Kelompok 7A' }	
	)
})


app.get('/films', db.getFilms);
app.get('/films/:film_id', db.getFilmsbyID);
app.post('/films/', db.createFilm);
app.put('/films/:film_id', db.updateFilm);
app.delete('/films/:film_id', db.deleteFilm);

// app.get('/accounts', db2.getAccounts);
// app.get('/accounts/:account_id', db2.getAccountsbyID);
// app.post('/accounts', db2.createAccount);
// app.put('/accounts/:account_id', db2.updateAccount);
// app.put('/accounts2/saldo/:account_id', db2.updateSaldo);
// app.delete('/accounts/:account_id', db2.deleteAccount);


app.post('/accounts2/saldo/:account_id', db2.updateSaldo);
app.get('/accounts2', db2.getAccounts2)
app.get('/accounts2/:account_id', db2.getAccounts2byID)
app.post('/accounts2', body('email').trim().normalizeEmail().isEmail().withMessage('Invalid email'), db2.createAccount2);
app.post('/login', (request, response) => {
	let email = request.body.email;
    let password = request.body.password;
    pool.query('SELECT account_id FROM account_test WHERE email = $1 AND password = $2', [email, password], (err, results) => {
        if (err) {
            throw err;
        }
        if (results.rows.length > 0){ //Valid login
			let sessionId = results.rows[0].account_id;
			request.session.loggedin = true;
			request.session.email = email;
            response.status(301).redirect(`http://localhost/front-end2/profil-user/profil.html?sessionId=${sessionId}`);


        }else { //Invalid Login
            response.status(301).redirect('http://localhost/front-end2/profil-user/login/signin.html?sc=3');
        }
    })
});


app.get('/orders', db3.getOrders);
app.get('/orders/:order_id', db3.getOrdersbyID);
app.post('/orders', db3.createOrder);
app.put('/orders/:order_id', db3.updateOrder);
app.delete('/orders/:order_id', db3.deleteOrder);

app.get('/prices', db4.getPrices);
app.get('/prices/:film_id', db4.getPricesbyID);
app.post('/prices', db4.createPrice);
app.put('/prices/:film_id', db4.updatePrice);
app.delete('/prices/:film_id', db4.deletePrice);

app.listen(port, () => {
	console.log(`App running on port ${port}.`);
})

