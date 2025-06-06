document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("lattesForm");

    form.addEventListener("submit", function (event) {
        const lattesInput = document.getElementById("userlattes").value.trim();
        const padraoLattes = /^https?:\/\/lattes\.cnpq\.br\/\d{16}$/;

        if (!padraoLattes.test(lattesInput)) {
            event.preventDefault(); // Impede o envio

            const message = "O link do Currículo Lattes deve estar no formato:<br><strong>http://lattes.cnpq.br/00000000...</strong>";
            showPopup(message);
        }
    });

    function showPopup(message) {
        let overlay = document.getElementById("overlay");
        let popup = document.getElementById("popup");

        if (!overlay) {
            overlay = document.createElement("div");
            overlay.id = "overlay";
            overlay.style.display = "flex"; // garante exibição

            popup = document.createElement("div");
            popup.id = "popup";

            const closeBtn = document.createElement("button");
            closeBtn.id = "closeBtn";
            closeBtn.innerHTML = "&times;";
            closeBtn.addEventListener("click", () => overlay.remove());

            const messageP = document.createElement("p");
            messageP.innerHTML = message;

            popup.appendChild(closeBtn);
            popup.appendChild(messageP);
            overlay.appendChild(popup);
            document.body.appendChild(overlay);

            // Fecha se clicar fora do popup
            overlay.addEventListener("click", (e) => {
                if (e.target === overlay) {
                    overlay.remove();
                }
            });
        } else {
            popup.querySelector("p").innerHTML = message;
            overlay.style.display = "flex";
        }
    }
});
