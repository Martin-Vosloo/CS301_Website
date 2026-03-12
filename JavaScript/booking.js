/* BOOKING.JS

    - this function is created so that specific dates picked must be submitted
    - The form will show a message once completed and successfully inptted.
    - the function makes sure that catering is selected.

*/

const today = new Date().toISOString().split('T')[0];
  document.getElementById('checkin').min = today;
  document.getElementById('checkout').min = today;

  document.getElementById('checkin').addEventListener('change', function () {
    const co = document.getElementById('checkout');
    co.min = this.value;
    if (co.value && co.value <= this.value) co.value = '';
  });

  function handleSubmit(e) {
    e.preventDefault();
    const ci = document.getElementById('checkin').value;
    const co = document.getElementById('checkout').value;
    const catering = document.querySelector('input[name="catering"]:checked');

    if (!ci || !co)  { alert('Please select both check-in and check-out dates.'); return; }
    if (co <= ci)    { alert('Check-out must be after check-in.'); return; }
    if (!catering)   { alert('Please select a catering option.'); return; }

    document.getElementById('form').style.display = 'none';
    const s = document.getElementById('success');
    s.classList.add('show');
    s.scrollIntoView({ behavior: 'smooth', block: 'center' });
  }