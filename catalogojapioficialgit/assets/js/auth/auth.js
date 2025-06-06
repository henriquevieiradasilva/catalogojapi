function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
    const icon = document.getElementById('toggleIcon');

    const isPassword = passwordInput.type === 'password';
    passwordInput.type = isPassword ? 'text' : 'password';
    icon.className = isPassword ? 'bi bi-eye' : 'bi bi-eye-slash';
}

// Nova função para alternar visibilidade dos dois campos de senha do registro
function togglePasswordVisibilityRegister() {
    const senhaField = document.getElementById('password');
    const confirmaField = document.getElementById('confirm_password');
    const iconReg = document.getElementById('toggleIconRegister');

    // Verifica se atualmente é tipo "password" (basta checar um dos dois campos)
    const isPassword = senhaField.type === 'password';

    // Altera ambos campos para text <-> password
    senhaField.type = isPassword ? 'text' : 'password';
    confirmaField.type = isPassword ? 'text' : 'password';

    // Altera o ícone do botão (mesma lógica que no toggle de login)
    iconReg.className = isPassword ? 'bi bi-eye' : 'bi bi-eye-slash';
}

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

    // Preview da foto
    const photoInput = document.getElementById('photo');
    if (photoInput) {
        photoInput.addEventListener('change', function (event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('preview').src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
    }

    // Validação de senha no registro
    const form = document.getElementById("registerForm");
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("confirm_password");
    const container = document.getElementById("jsErrorContainer");

    if (form && password && confirmPassword) {
        form.addEventListener("submit", (e) => {
            if (container) container.innerHTML = "";

            if (password.value !== confirmPassword.value) {
                e.preventDefault();

                const message = "As senhas não coincidem. Por favor, tente novamente.";

                showPopup(message);
                showBootstrapAlert(message);
            }
        });
    }

    // Funções auxiliares para mostrar mensagens
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

            const btn = document.createElement("button");
            btn.id = "closeBtn";
            btn.innerHTML = "&times;";
            popup.appendChild(btn);

            btn.addEventListener("click", () => overlay.style.display = "none");
            overlay.addEventListener("click", (e) => {
                if (e.target === overlay) overlay.style.display = "none";
            });
        }

        popup.innerHTML = `<button id="closeBtn">&times;</button><p>${message}</p>`;
        overlay.style.display = "flex";

        document.getElementById("closeBtn").addEventListener("click", () => overlay.style.display = "none");
    }

    function showBootstrapAlert(message) {
        const container = document.getElementById("jsErrorContainer");
        if (container) {
            container.innerHTML = `
                <div class="alert alert-danger text-center">
                    ${message}
                </div>`;
        }
    }
});
