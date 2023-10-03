"use strict";

const suppr = document.getElementsByClassName("article-suppression");
const del = Array.prototype.slice.call(suppr);

del.forEach(dele => {
    dele.addEventListener("click", (e) => {
        confirm("êtes vous sur de vouloir supprimer cette article ?");
    })
});