(function () {
  // buttons
  const prevMonth = document.getElementById('prevMonth');
  const nextMonth = document.getElementById('nextMonth');
  const prevYear = document.getElementById('prevYear');
  const nextYear = document.getElementById('nextYear');

  // inputs
  const monthInput = document.getElementById('month');
  const yearInput = document.getElementById('year');

  // form
  const form = document.getElementsByTagName('form')[0];

  // useful constants
  const first = 1;
  const last = 12;

  //  ------------ listeners -----------
  prevMonth.addEventListener('click', function (e) {
    e.preventDefault();
    if (monthInput.value == 1) {
      monthInput.value = 12;
      yearInput.value--;
    } else {
      monthInput.value--;
    }
    form.submit();
    return false;
  }, false);

  nextMonth.addEventListener('click', function (e) {
    e.preventDefault();
    if (monthInput.value == 12) {
      monthInput.value = 1;
      yearInput.value++;
    } else {
      monthInput.value++;
    }
    form.submit();
    return false;
  }, false);

  nextYear.addEventListener('click', function (e) {
    e.preventDefault();
    yearInput.value++;
    form.submit();
    return false;
  }, false);

  prevYear.addEventListener('click', function (e) {
    e.preventDefault();
    yearInput.value--;
    form.submit();
    return false;
  }, false);
})();