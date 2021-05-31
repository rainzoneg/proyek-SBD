var userData;

function readUsers() {
    // fetch("http://localhost:3001/users", {method:"GET"})
    // .then(function(tutorials){
    //   tutorials.forEach(function(tutorial) {
    //     const div = document.createElement("div");
    //     div.innerHTML = tutorial.name;
    //     container.appendChild(div);
    //   });
    // });
    fetch("http://localhost:3001/users", {
        method:"GET",
        // headers: {
        //     'Content-Type': 'application/json',
        // },

    })
    
    .then(response => response.json())
    .then(users => userData = users)
    .then(users => showUsers(users.results))
    showUsers = (users) => {
        const usersDiv = document.querySelector(`#rickandmorty`);
        userData.forEach(userData => {
            const userElement = document.createElement('p');
            userElement.innerText = `User: ${userData.name}` + `Email!: ${userData.email}`;
            usersDiv.append(userElement);
        });
    }
  }
  readUsers();
