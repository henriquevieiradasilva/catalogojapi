document.addEventListener('DOMContentLoaded', function () {
    const closeBtn = document.getElementById('closeBtn');
    const overlay = document.getElementById('overlay');

    if (closeBtn && overlay) {
        closeBtn.addEventListener('click', () => {
            overlay.style.display = 'none';
        });

        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) {
                overlay.style.display = 'none';
            }
        });
    }

    // Atualiza preview da imagem de perfil
    const photoInput = document.getElementById('photo');
    const previewImg = document.getElementById('preview');

    if (photoInput && previewImg) {
        photoInput.addEventListener('change', function (event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImg.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
    }

    // Verifica se as novas senhas coincidem ao submeter
    const form = document.getElementById("registerForm");
    const newPassword = document.getElementById("userpassword_new");
    const confirmPassword = document.getElementById("userconfirmpassword_new");
    const container = document.getElementById("jsErrorContainer");

    if (form && newPassword && confirmPassword) {
        form.addEventListener("submit", (e) => {
            if (container) container.innerHTML = "";

            if (newPassword.value || confirmPassword.value) {
                if (newPassword.value !== confirmPassword.value) {
                    e.preventDefault();

                    const message = "As senhas não coincidem. Por favor, tente novamente.";
                    showPopup(message);
                    showBootstrapAlert(message);
                }
            }
        });
    }

    function showPopup(message) {
        let popup = document.getElementById("popup");
        let overlay = document.getElementById("overlay");

        if (!popup || !overlay) {
            overlay = document.createElement("div");
            overlay.id = "overlay";
            document.body.appendChild(overlay);

            popup = document.createElement("div");
            popup.id = "popup";
            overlay.appendChild(popup);
        }

        popup.innerHTML = `
            <button id="closeBtn">&times;</button>
            <p>${message}</p>
        `;

        overlay.style.display = "flex";

        document.getElementById("closeBtn").addEventListener("click", () => {
            overlay.style.display = "none";
        });

        overlay.addEventListener("click", (e) => {
            if (e.target === overlay) {
                overlay.style.display = "none";
            }
        });
    }

    function showBootstrapAlert(message) {
        const container = document.getElementById("jsErrorContainer");
        if (container) {
            container.innerHTML = `
                <div class="alert alert-danger text-center">${message}</div>
            `;
        }
    }
});
