document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('[data-demo-action]').forEach(btn => {
    btn.addEventListener('click', () => alert('Prototype action completed successfully. This button is ready for PHP/MySQL logic.'));
  });
});
