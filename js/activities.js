const SPORTS_API_URL = '/activities/api/get-sports/';
const NEW_ACTIVITY_API_URL = '/activities/api/create/';

const title = document.querySelector('form input[name="title"]');
const description = document.querySelector('form textarea[name="description"]');
const performance = document.querySelector('form input[name="performance"]');
const saveButton = document.querySelector('form input[name="save_activity"]');
const form = document.querySelector('form');

function onSportsResponse(response) {
  return response.json();
}

function onSportsJson(json) {
  console.log(json);
  const s = document.getElementById('sports-select');
  for (let key in json) {
    const opt = document.createElement('option');
    opt.value = key;
    opt.text = json[key];
    s.add(opt);
  }
}

function fetchSports() {
  fetch(SPORTS_API_URL).then(onSportsResponse).then(onSportsJson);
}

function validate_empty(value) {
  if (value.trim() === '') {
    return false;
  }

  return true;
}

function checkNotEmpty(errorId, field, errorMessage) {
  function check_field(event) {
    const error = document.getElementById(errorId);
    const is_field_valid = validate_empty(field.value);
    if (!is_field_valid) {
      error.textContent = errorMessage;
      return false;
    } else {
      error.textContent = '';
      return true;
    }
  }

  return check_field;
}

const check_title = checkNotEmpty(
  'error-title',
  title,
  'Il titolo non può essere vuoto.',
);
const check_description = checkNotEmpty(
  'error-description',
  description,
  'La descrizione non può essere vuota.',
);

function validate_performance(f) {
  const n = parseFloat(f);
  const is_performance_valid = n <= 10 && n >= 1;
  if (!is_performance_valid) {
    return false;
  } else {
    return true;
  }
}

function check_performance(event) {
  const error = document.getElementById('error-performance');
  const is_performance_valid = validate_performance(performance.value);
  if (!is_performance_valid) {
    error.textContent = 'Performance deve essere compreso tra 1 e 10.';
    return false;
  } else {
    error.textContent = '';
    return true;
  }
}

function onNewActivityResponse(response) {
  return response.json();
}

function onNewActivityJson(json) {
  console.log(json);
}

function onSaveButtonClicked(event) {
  event.preventDefault();

  const is_title_valid = check_title();
  const is_description_valid = check_description();
  const is_performance_valid = check_performance();

  if (is_title_valid && is_performance_valid && is_description_valid) {
    const formData = { method: 'POST', body: new FormData(form) };

    fetch(NEW_ACTIVITY_API_URL, formData).then(onNewActivityResponse).then(
      onNewActivityJson,
    );
  }
}

saveButton.addEventListener('click', onSaveButtonClicked);
title.addEventListener('blur', check_title);
performance.addEventListener('blur', check_performance);
description.addEventListener('blur', check_description);

fetchSports();
