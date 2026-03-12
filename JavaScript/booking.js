/* BOOKING.JS

    - Ensure dates are valid and required options are selected.
*/

const checkinInput = document.getElementById('checkin');
const checkoutInput = document.getElementById('checkout');
const bookingForm = document.getElementById('form');

if (checkinInput && checkoutInput) {
  const today = new Date().toISOString().split('T')[0];
  checkinInput.min = today;
  checkoutInput.min = today;

  checkinInput.addEventListener('change', function () {
    checkoutInput.min = this.value;
    if (checkoutInput.value && checkoutInput.value <= this.value) checkoutInput.value = '';
  });
}

if (bookingForm) {
  bookingForm.addEventListener('submit', function (e) {
    const ci = checkinInput ? checkinInput.value : '';
    const co = checkoutInput ? checkoutInput.value : '';
    const catering = document.querySelector('input[name="catering"]:checked');

    if (!ci || !co) {
      e.preventDefault();
      alert('Please select both check-in and check-out dates.');
      return;
    }
    if (co <= ci) {
      e.preventDefault();
      alert('Check-out must be after check-in.');
      return;
    }
    if (!catering) {
      e.preventDefault();
      alert('Please select a catering option.');
    }
  });
}
