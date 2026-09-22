(function () {
  const openBtn = document.getElementById('downloadBtn');
  const modal = document.getElementById('downloadModal');
  const closeBtn = document.getElementById('modalClose');
  const form = document.getElementById('downloadForm');
  const emailInput = document.getElementById('downloadEmail');
  const errorEl = document.getElementById('modalError');
  const stepForm = document.getElementById('modalStepForm');
  const stepSent = document.getElementById('modalStepSent');
  const sentEmailEl = document.getElementById('sentEmail');

  if (!openBtn || !modal) return;

  function openModal() {
    modal.hidden = false;
    stepForm.hidden = false;
    stepSent.hidden = true;
    errorEl.hidden = true;
    emailInput.focus();
  }

  function closeModal() {
    modal.hidden = true;
  }

  openBtn.addEventListener('click', openModal);
  closeBtn.addEventListener('click', closeModal);
  modal.addEventListener('click', function (e) {
    if (e.target === modal) closeModal();
  });

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    errorEl.hidden = true;

    const submitBtn = form.querySelector('button[type="submit"]');
    submitBtn.disabled = true;
    submitBtn.textContent = 'Sending...';

    fetch('request-download.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: 'email=' + encodeURIComponent(emailInput.value)
    })
      .then(function (res) { return res.json().then(function (data) { return { ok: res.ok, data: data }; }); })
      .then(function (result) {
        if (!result.ok) throw new Error(result.data.error || 'Something went wrong.');
        sentEmailEl.textContent = emailInput.value;
        stepForm.hidden = true;
        stepSent.hidden = false;
      })
      .catch(function (err) {
        errorEl.textContent = err.message;
        errorEl.hidden = false;
      })
      .finally(function () {
        submitBtn.disabled = false;
        submitBtn.textContent = 'Send verification email';
      });
  });
})();
