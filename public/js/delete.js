"use strict";

const suppr = document.getElementsByClassName("article-suppression");

[...suppr].forEach(item => {
    item.addEventListener("click", elem => {
        let confirmation = confirm("êtes vous sur de vouloir supprimer cette article ?");
        
        if(confirmation) {
            let idItem = elem.target.getAttribute('idItem');
            elem.target.href ="DeleteArticle/"+ idItem;
        }
    });
});
