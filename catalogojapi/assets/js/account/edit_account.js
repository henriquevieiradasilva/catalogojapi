document.addEventListener('DOMContentLoaded', () => {
  initPopupClose();
  initImagePreview();
  initFormValidation();
  initDeleteAccount();
});

function initPopupClose() {
  const overlay = document.getElementById('overlay');
  const closeBtn = overlay && overlay.querySelector('#closeBtn');
  if (closeBtn && overlay) {
    closeBtn.addEventListener('click', () => overlay.style.display = 'none');
    overlay.addEventListener('click', (e) => {
      if (e.target === overlay) overlay.style.display = 'none';
    });
  }
}

function initImagePreview() {
  const photoInput = document.getElementById('photo');
  const previewImg = document.getElementById('preview');
  if (photoInput && previewImg) {
    photoInput.addEventListener('change', () => {
      const file = photoInput.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = (e) => { previewImg.src = e.target.result; };
        reader.readAsDataURL(file);
      }
    });
  }
}

function initFormValidation() {
  const form           = document.getElementById('registerForm');
  if (!form) return;

  const photoInput      = document.getElementById('photo');
  const usernameField   = form.querySelector('[name="username"]');
  const useridField     = form.querySelector('[name="userid"]');
  const useremailField  = form.querySelector('[name="useremail"]');
  const newPassword     = document.getElementById('userpassword_new');
  const confirmPassword = document.getElementById('userconfirmpassword_new');
  const container       = document.getElementById('jsErrorContainer');

  const origUsername   = usernameField.value;
  const origUserid     = useridField.value;
  const origUseremail  = useremailField.value;

  form.addEventListener('submit', (e) => {
    if (container) container.innerHTML = '';

    const currUsername  = usernameField.value.trim();
    const currUserid    = useridField.value.trim();
    const currUseremail = useremailField.value.trim();
    const newPwdVal     = newPassword.value.trim();
    const confPwdVal    = confirmPassword.value.trim();
    const photoChanged  = photoInput && photoInput.files.length > 0;

    // Validate new password match
    if ((newPwdVal || confPwdVal) && newPwdVal !== confPwdVal) {
      e.preventDefault();
      const msg = 'As senhas não coincidem. Por favor, tente novamente.';
      showBootstrapAlert(msg);
      showPopup(msg);
      return;
    }

    // Check if nothing changed (include photo)
    const noChanges =
      origUsername  === currUsername  &&
      origUserid    === currUserid    &&
      origUseremail === currUseremail &&
      newPwdVal === '' &&
      confPwdVal === '' &&
      !photoChanged;

    if (noChanges) {
      e.preventDefault();
      const msg = 'Nenhuma alteração foi feita.';
      showBootstrapAlert(msg);
      showPopup(msg);
      return;
    }

    // If email or password changed, prompt for current password
    const emailChanged   = origUseremail !== currUseremail;
    const passwordChange = newPwdVal !== '';
    if (emailChanged || passwordChange) {
      e.preventDefault();
      promptPasswordThenSubmit(form);
      return;
    }
    // Otherwise, submit normally (covering photo change)
  });
}

function promptPasswordThenSubmit(form) {
  clearGenericOverlay();
  const overlay = document.createElement('div');
  overlay.id = 'overlay';
  overlay.innerHTML = `
    <div id="popup" class="px-4 py-3">
      <p>Por favor, digite sua senha atual para confirmar alterações:</p>
      <input type="password" id="confirmPasswordInput" class="form-control mb-3" />
      <div class="text-end">
        <button id="pwdCancel" type="button" class="btn btn-secondary me-2">Cancelar</button>
        <button id="pwdSubmit" type="button" class="btn btn-primary">Confirmar</button>
      </div>
    </div>
  `;
  document.body.appendChild(overlay);

  document.getElementById('pwdCancel').onclick = () => overlay.remove();
  document.getElementById('pwdSubmit').onclick = () => {
    const pwd = document.getElementById('confirmPasswordInput').value.trim();
    if (!pwd) {
      alert('Senha vazia!');
      return;
    }
    let hidden = form.querySelector('[name="userpassword"]');
    if (!hidden) {
      hidden = document.createElement('input');
      hidden.type = 'hidden';
      hidden.name = 'userpassword';
      form.appendChild(hidden);
    }
    hidden.value = pwd;
    form.action = '../assets/php/account/update_account_check.php';
    form.submit();
  };
}

function initDeleteAccount() {
  const deleteBtn = document.getElementById('deleteAccountBtn');
  if (!deleteBtn) return;
  deleteBtn.addEventListener('click', (e) => {
    e.preventDefault();
    showDeleteConfirmPopup();
  });
}

function showDeleteConfirmPopup() {
  clearGenericOverlay();
  const overlay = document.createElement('div');
  overlay.id = 'overlay';
  overlay.innerHTML = `
    <div id="popup" class="px-4 py-3 text-center">
      <p>Tem certeza que deseja excluir sua conta?</p>
      <button id="confirmNo" type="button" class="btn btn-secondary me-2">Não</button>
      <button id="confirmYes" type="button" class="btn btn-danger">Sim</button>
    </div>
  `;
  document.body.appendChild(overlay);
  document.getElementById('confirmNo').onclick = () => overlay.remove();
  document.getElementById('confirmYes').onclick = () => {
    overlay.remove();
    showDeletePasswordPopup();
  };
}

function showDeletePasswordPopup() {
  clearGenericOverlay();
  const overlay = document.createElement('div');
  overlay.id = 'overlay';
  overlay.innerHTML = `
    <div id="popup" class="px-4 py-3">
      <p>Por favor, digite sua senha para confirmar:</p>
      <input type="password" id="delPassword" class="form-control mb-3" />
      <div class="text-end">
        <button id="delCancel" type="button" class="btn btn-secondary me-2">Cancelar</button>
        <button id="delSubmit" type="button" class="btn btn-danger">Excluir</button>
      </div>
    </div>
  `;
  document.body.appendChild(overlay);

  document.getElementById('delCancel').onclick = () => overlay.remove();
  document.getElementById('delSubmit').onclick = () => {
    const pwd = document.getElementById('delPassword').value.trim();
    if (!pwd) { alert('Senha vazia!'); return; }
    const form = document.createElement('form');
    form.method = 'post';
    form.action = '../assets/php/account/delete_account.php';
    form.style.display = 'none';
    const inputPwd = document.createElement('input');
    inputPwd.type = 'hidden';
    inputPwd.name = 'password';
    inputPwd.value = pwd;
    form.appendChild(inputPwd);
    document.body.appendChild(form);
    form.submit();
  };
}

function clearGenericOverlay() {
  const existing = document.getElementById('overlay');
  if (existing) existing.remove();
}

function showBootstrapAlert(message) {
  const container = document.getElementById('jsErrorContainer');
  if (container) {
    container.innerHTML = `<div class="alert alert-danger text-center">${message}</div>`;
  }
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
