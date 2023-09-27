"use strict";

const chatMessages = document.getElementById("chat-messages");
fetch("http://chat.test/index.php?controller=message&action=APIfindAllMsg")
    .then((response) => {
        return response.json();
    })
    .then((data) => {
        data.forEach((element) => {
            console.log(element.pseudo  );
            const messageBubble = document.createElement("div");
            messageBubble.classList.add("message-bubble");
            messageBubble.textContent = `${element.pseudo}: ${element.contenu}`;
            chatMessages.appendChild(messageBubble);
        });
    })
    .catch((error) => {
        console.error("Erreur lors de la requête fetch :", error);
    });


    
window.addEventListener("DOMContentLoaded", (event) => {
    let submitBtn = document.querySelector("input[type='submit']");
    submitBtn.addEventListener("click", (evt) => {
        evt.preventDefault();

        const data = new FormData();
        data.append('user_id', 4);
        data.append('mess', document.querySelector("form #msg").value);
        fetch("http://chat.test/index.php?controller=message&action=submit", {
            method: "POST", headers: {
                'Accept': 'applicaiton/json',
                'Content-Type': 'Application/json'
            },
            mode: "no-cors",
            body: data,
        }).then(response => {
            console.log(response);
            if (response) {
                console.log(response);
                const newParag = document.createElement("div");
                newParag.classList.add("message-bubble");
                newParag.innerHTML = "<span>Vous avez dit: </span>" + document.querySelector('#msg').value
                chatMessages.appendChild(newParag);
            }
        })
    })
})