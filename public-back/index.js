//Using nodemon, pg, express
//npx nodemon in public-back folder to start backend server
//using http-server in public folder to start frontend server http-server -p port
//Use 3 seperate terminals: 1 for backend (nodemon), 1 for frontend (http-server), 1 for other

const express = require('express');
const app = express();
const db = require('./queries');
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

app.get('/users', db.getUsers);
app.get('/users/:id', db.getUsersbyID);
app.post('/users', db.createUser);
app.put('/users/:id', db.updateUser);
app.delete('/users/:id', db.deleteUser);



app.listen(port, () => {
	console.log(`App running on port ${port}.`);
})

