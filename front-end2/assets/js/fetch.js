//Title doang
function readFilmsById(id) {
    var userData;
    // var divId = document.getElementById(id).parentNode.id;
    fetch(`http://localhost:3001/films/${id}`, {
        method:"GET",
        // headers: {
        //     'Content-Type': 'application/json',
        // },
    })
    .then(response => response.json())
    .then(users => userData = users)
    .then(users => showUsers(users.results))
    let showUsers = (users) => {
        let usersDiv = document.querySelector(`#t${id}`);
        userData.forEach(userData => {
            usersDiv.innerText = `${userData.title}`;
        });
    }
}

//Poster doang
function readFilmPosterById(id) {
    var userData;
    // var divId = document.getElementById(id).parentNode.id;
    fetch(`http://localhost:3001/films/${id}`, {
        method:"GET",
    })
    .then(response => response.json())
    .then(users => userData = users)
    .then(users => showUsers(users.results))
    let showUsers = (users) => {
        let usersDiv = document.querySelector(`#p${CSS.escape(id)}`);
        userData.forEach(userData => {
            let userElement = document.createElement('img');
            userElement.src = `${userData.poster_url}`;
            usersDiv.append(userElement);
        });
    }
}

//Deskripsi doang
function readFilmDescById(id) {
    var userData;
    // var divId = document.getElementById(id).parentNode.id;
    fetch(`http://localhost:3001/films/${id}`, {
        method:"GET",
        // headers: {
        //     'Content-Type': 'application/json',
        // },
    })
    .then(response => response.json())
    .then(users => userData = users)
    .then(users => showUsers(users.results))
    let showUsers = (users) => {
        let usersDiv = document.querySelector(`#d${CSS.escape(id)}`);
        userData.forEach(userData => {
            let userElement = document.createElement('p');
            userElement.innerText = `${userData.description}`;
            usersDiv.innerText = `${userData.description}`;
        });
    }
}

function readFilmStudioById(id) {
    var userData;
    // var divId = document.getElementById(id).parentNode.id;
    fetch(`http://localhost:3001/films/${id}`, {
        method:"GET",
        // headers: {
        //     'Content-Type': 'application/json',
        // },
    })
    .then(response => response.json())
    .then(users => userData = users)
    .then(users => showUsers(users.results))
    let showUsers = (users) => {
        let usersDiv = document.querySelector(`#st${id}`);
        userData.forEach(userData => {
            usersDiv.innerText = `${userData.studio}`;
        });
    }
}

function hargaId(id) {
    var hargaData;
    // var divId = document.getElementById(id).parentNode.id;
    fetch(`http://localhost:3001/prices/${id}`, {
        method:"GET",
    })
    .then(response => response.json())
    .then(users => hargaData = users)
    .then(users => showHarga(users.results))
    let showHarga = (users) => {
        let hargaDiv = document.querySelector(`#h${id}`);
        hargaData.forEach(hargaData => {
            // let hargaElement = document.createElement('p');
            // hargaElement.innerText = `${hargaData.price}`;
            hargaDiv.innerText = `Rp.${hargaData.price},00`;
        });
    }
}


function accountFirstname(id){
    var accountData;
    fetch(`http://localhost:3001/accounts2/${id}`, {
        method:"GET",
    })
    .then(response => response.json())
    .then(users => accountData = users)
    .then(users => showAccount(users.results))
    let showAccount = (users) => {
        let accountDiv = document.querySelector(`#t${id}`);
        accountData.forEach(accountData => {
            accountDiv.innerText = `${accountData.firstname}`;
        });
    }
}

function accountSurname(id){
    var accountData;
    fetch(`http://localhost:3001/accounts/${id}`, {
        method:"GET",
    })
    .then(response => response.json())
    .then(users => accountData = users)
    .then(users => showAccount(users.results))
    let showAccount = (users) => {
        let accountDiv = document.querySelector(`#${CSS.escape(id)}`);
        accountData.forEach(accountData => {
            accountDiv.innerText = `${accountData.surname}`;
        });
    }
}

function accountEmail(id){
    var accountData;
    fetch(`http://localhost:3001/accounts/${id}`, {
        method:"GET",
    })
    .then(response => response.json())
    .then(users => accountData = users)
    .then(users => showAccount(users.results))
    let showAccount = (users) => {
        let accountDiv = document.querySelector(`#${CSS.escape(id)}`);
        accountData.forEach(accountData => {
            accountDiv.innerText = `${accountData.email}`;
        });
    }
}

function accountWallet(id){
    var accountData;
    fetch(`http://localhost:3001/accounts/${id}`, {
        method:"GET",
    })
    .then(response => response.json())
    .then(users => accountData = users)
    .then(users => showAccount(users.results))
    let showAccount = (users) => {
        let accountDiv = document.querySelector(`#${CSS.escape(id)}`);
        accountData.forEach(accountData => {
            accountDiv.innerText = `${accountData.wallet}`;
        });
    }
}

function accountPassword(id){
    var accountData;
    fetch(`http://localhost:3001/accounts/${id}`, {
        method:"GET",
    })
    .then(response => response.json())
    .then(users => accountData = users)
    .then(users => showAccount(users.results))
    let showAccount = (users) => {
        let accountDiv = document.querySelector(`#${CSS.escape(id)}`);
        accountData.forEach(accountData => {
            accountDiv.innerText = `${accountData.password}`;
        });
    }
}

function readOrders() {
    var orderData;
    fetch("http://localhost:3001/orders", {
        method:"GET",
    })
    .then(response => response.json())
    .then(users => orderData => users)
    .then(users => showOrders(users.results))
    let showOrders = (users) => {
        let ordersDiv = document.querySelector(`#${CSS.escape(id)}`);
        orderData.forEach(orderData => {
            let orderElement = document.createElement('p');
            orderElement.innerText = `Order Id: ${orderData.order_id} Account Id: ${orderData.account_id} Film Id: ${orderData.film_id} amount: ${orderData.amount}`;
            ordersDiv.append(orderElement);
        });
    }
}

function readOrdersById(id) {
    var orderData;
    fetch("http://localhost:3001/orders", {
        method:"GET",
    })
    .then(response => response.json())
    .then(users => orderData => users)
    .then(users => showOrders(users.results))
    let showOrders = (users) => {
        let ordersDiv = document.querySelector(`#${CSS.escape(id)}`);
        orderData.forEach(orderData => {
            let orderElement = document.createElement('p');
            orderElement.innerText = `Order Id: ${orderData.order_id} Account Id: ${orderData.account_id} Film Id: ${orderData.film_id} amount: ${orderData.amount}`;
            ordersDiv.append(orderElement);
        });
    }
}





// function readFilms() {

//     fetch("http://localhost:3001/films", {
//         method:"GET",
//     })
//     .then(response => response.json())
//     .then(users => userData = users)
//     .then(users => showUsers(users.results))
//     showUsers = (users) => {
//         const usersDiv = document.querySelector(`#rickandmorty`);
//         userData.forEach(userData => {
//             const userElement = document.createElement('p');
//             userElement.innerText = `User: ${userData.title}` + `Email!: ${userData.description}`;
//             usersDiv.append(userElement);
//         });
//     }
//   }



  
