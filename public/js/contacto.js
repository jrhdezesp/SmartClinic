document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('contactoForm');
  const success = document.getElementById('alertSuccess');
  const error = document.getElementById('alertError');
  const faqItems = document.querySelectorAll('.faq-item');

  faqItems.forEach((item) => {
    const button = item.querySelector('.faq-question');
    if (!button) return;
    button.addEventListener('click', () => item.classList.toggle('open'));
  });

  if (!form) return;
  form.addEventListener('submit', (event) => {
    event.preventDefault();
    const required = ['nombre', 'email', 'asunto', 'mensaje'];
    const isValid = required.every((name) => {
      const field = form.elements.namedItem(name);
      return field && String(field.value || '').trim() !== '';
    });

    if (isValid) {
      success.style.display = 'block';
      error.style.display = 'none';
      form.reset();
    } else {
      success.style.display = 'none';
      error.style.display = 'block';
    }
  });
});
