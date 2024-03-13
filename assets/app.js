
import './styles/app.scss';

import './bootstrap.js';
require('bootstrap');
// -----------------------agrandissement du certificat----------------
const viewImageButton = document.getElementById("view-image-button");
viewImageButton.addEventListener("click", function () {
    const img = document.getElementById("my_image");
    const modal = document.createElement("div");
    modal.setAttribute("class", "modal");
    const modalContent = document.createElement("img");
    modalContent.setAttribute("class", "modal-content");
    modalContent.src = img.src; // Utilisez l'attribut src de votre image
    const closeSpan = document.createElement("span");
    closeSpan.setAttribute("class", "close");
    closeSpan.innerHTML = "&times;";
    modal.appendChild(closeSpan);
    modal.appendChild(modalContent);
    document.body.appendChild(modal);

    modal.style.display = "block";

    closeSpan.onclick = () => {
        modal.style.display = "none";
        document.body.removeChild(modal);
    };

    window.onclick = (event) => {
        if (event.target == modal) {
            modal.style.display = "none";
            document.body.removeChild(modal);
        }
    };
});