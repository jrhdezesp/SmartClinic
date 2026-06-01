/* ============================================================
   SmartClinic — contacto.js
   Validación del formulario de contacto + FAQ accordion
   ============================================================ */

document.addEventListener('DOMContentLoaded', () => {

  // ── Formulario de contacto ───────────────────────────────
  const form       = document.getElementById('contactoForm');
  const btnSubmit  = document.getElementById('btnSubmit');
  const alertOk    = document.getElementById('alertSuccess');
  const alertErr   = document.getElementById('alertError');

  function hideAlerts() {
    if (alertOk) alertOk.style.display = 'none';
    if (alertErr) alertErr.style.display = 'none';
  }

  function showAlert(el) {
    if (!el) return;
    el.style.display = 'block';
    el.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
  }

  function validateForm(formEl) {
    let valid = true;
    formEl.querySelectorAll('[required]').forEach(field => {
      field.style.borderColor = '';
      if (!field.value.trim()) {
        field.style.borderColor = '#D63031';
        valid = false;
      }
    });
    // Validación básica de email
    const emailField = formEl.querySelector('#email');
    if (emailField && emailField.value && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailField.value)) {
      emailField.style.borderColor = '#D63031';
      valid = false;
    }
    return valid;
  }

  if (form) {
    // Limpiar errores al escribir
    form.querySelectorAll('input, textarea, select').forEach(field => {
      field.addEventListener('input', () => {
        field.style.borderColor = '';
        hideAlerts();
      });
    });

    form.addEventListener('submit', (e) => {
      e.preventDefault();
      hideAlerts();

      if (!validateForm(form)) {
        showAlert(alertErr);
        return;
      }

      // Simular envío (en producción: fetch al controlador PHP)
      btnSubmit.textContent = 'Enviando...';
      btnSubmit.disabled = true;

      setTimeout(() => {
        showAlert(alertOk);
        form.reset();
        btnSubmit.textContent = 'Enviado ✓';
        setTimeout(() => {
          btnSubmit.textContent = 'Enviar mensaje';
          btnSubmit.disabled = false;
        }, 3000);
      }, 1200);

      /*
        TODO (Persona 1 / BackEnd): reemplazar el setTimeout por:

        fetch('/controllers/ContactoController.php', {
          method: 'POST',
          body: new FormData(form)
        })
        .then(res => res.json())
        .then(data => {
          if (data.success) { showAlert(alertOk); form.reset(); }
          else { showAlert(alertErr); }
        })
        .catch(() => showAlert(alertErr))
        .finally(() => {
          btnSubmit.textContent = 'Enviar mensaje';
          btnSubmit.disabled = false;
        });
      */
    });
  }

  // ── FAQ Accordion ────────────────────────────────────────
  const faqItems = document.querySelectorAll('.faq-item');

  faqItems.forEach(item => {
    const btn = item.querySelector('.faq-question');
    if (!btn) return;

    btn.addEventListener('click', () => {
      const isOpen = item.classList.contains('open');

      // Cerrar todos
      faqItems.forEach(i => i.classList.remove('open'));

      // Abrir el seleccionado si estaba cerrado
      if (!isOpen) item.classList.add('open');
    });
  });

});
