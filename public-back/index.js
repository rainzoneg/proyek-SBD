const express = require('express');
const app = express();
const db = require('./controllers/film_data');
const db2 = require('./controllers/account_data');
const db3 = require('./controllers/order_data');
const db4 = require('./controllers/price_data');
const bodyParser = require('body-parser');
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true}));
const http = require('http');
//const { response } = require('express');
const hostname = '127.0.0.1';
const port = 3001;
// const server = http.createServer((req,res) => {
// 	res.statusCode = 200;
// 	res.setHeader('Content-Type', 'text/html');
// 	res.write('Hello Worlds!!');
// 	res.end();
// });server.listen(port, hostname, () => {
// 	console.log(`Server running`);
// });
var cors = require('cors');
app.use(cors());
app.get('/', (request, response) => {
	response.json(
		{ info: 'Back-End API for Proyek SBD Kelompok 7A' }	
	)
})

// app.get('/users', db.getUsers);
// app.get('/users/:id', db.getUsersbyID);
// app.post('/users', db.createUser);
// app.put('/users/:id', db.updateUser);
// app.delete('/users/:id', db.deleteUser);

app.get('/films', db.getFilms);
app.get('/films/:film_id', db.getFilmsbyID);
app.post('/films', db.createFilm);
app.put('/films/:film_id', db.updateFilm);
app.delete('/films/:film_id', db.deleteFilm);

app.get('/accounts', db2.getAccounts);
app.get('/accounts/:account_id', db2.getAccountsbyID);
app.post('/accounts', db2.createAccount);
app.put('/accounts/:account_id', db2.updateAccount);
app.delete('/accounts/:account_id', db2.deleteAccount);

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

