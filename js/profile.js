const PROFILE_API_URL = '/profile/api/get/';
const PROFILE_EDIT_API_URL = '/profile/api/update/';
const ATHLETES_SEARCH_API_URL = '/search-athletes/?q=';
const editButton = document.querySelector('#edit-profile');
const formContainer = document.querySelector('#form-profile');
const form = document.querySelector('#form-profile form');
const data = document.querySelector('#profile_container .data');
const nameInput = document.querySelector('form input[name="name"]');
const bioInput = document.querySelector('form input[name="bio"]');
const ageInput = document.querySelector('form input[name="age"]');
const editAthleteButton = document.querySelector('#edit-athlete');
const overlay = document.querySelector('#overlay');
const searchAthleteButton = document.querySelector(
  '#search_athlete input[type="submit"]',
);

function validate_empty(value) {
  if (value.trim() === '') {
    return false;
  }

  return true;
}

function validate_age(value) {
  const age = parseInt(value);
  if (isNaN(age) || age < 1) {
    return false;
  }

  return true;
}

function check_name(event) {
  const error = document.querySelector(
    '#form-profile .name .error',
  );
  const is_name_valid = validate_empty(nameInput.value);
  if (!is_name_valid) {
    error.textContent = 'Il nome non può essere vuoto.';
    return false;
  } else {
    error.textContent = '';
    return true;
  }
}

function check_age(event) {
  const error = document.querySelector(
    '#form-profile .age .error',
  );
  const is_age_valid = validate_age(ageInput.value);
  if (!is_age_valid) {
    error.textContent = 'L\'età deve essere > 1.';
    return false;
  } else {
    error.textContent = '';
    return true;
  }
}

function check_bio(event) {
  const error = document.querySelector(
    '#form-profile .bio .error',
  );
  const is_bio_valid = validate_empty(bioInput.value);
  if (!is_bio_valid) {
    error.textContent = 'La biografia non può essere vuota.';
    return false;
  } else {
    error.textContent = '';
    return true;
  }
}

function onGetProfileResponse(response) {
  return response.json();
}

function onProfileJson(json) {
  const name = document.querySelector('#name > .content');
  const age = document.querySelector('#age > .content');
  const bio = document.querySelector('#bio > .content');

  name.textContent = json.name;
  nameInput.value = json.name;
  age.textContent = json.age;
  ageInput.value = json.age;
  bio.textContent = json.bio;
  bioInput.value = json.bio;
}

function fetchProfile() {
  fetch(PROFILE_API_URL).then(onGetProfileResponse).then(onProfileJson);
}

function onEditButtonClicked(event) {
  formContainer.classList.remove('hidden');
  data.classList.add('hidden');
}

function onUpdateProfileResponse(response) {
  return response.json();
}

function onUpdateProfileJson(json) {
  fetchProfile();

  formContainer.classList.add('hidden');
  data.classList.remove('hidden');
}

function onProfileUpdate(event) {
  event.preventDefault();

  const is_name_valid = check_name();
  const is_age_valid = check_age();
  const is_bio_valid = check_bio();

  if (is_name_valid && is_age_valid && is_bio_valid) {
    const formData = { method: 'POST', body: new FormData(form) };

    fetch(PROFILE_EDIT_API_URL, formData).then(onUpdateProfileResponse).then(
      onUpdateProfileJson,
    );
  }
}

function onEditAthleteButtonClicked(event) {
  overlay.classList.remove('hidden');
}

function onSearchAthleteResponse(response) {
  return response.json();
}

function onSearchAthleteJson(json) {
  console.log(json);
}

function onSearchAthleteButtonClicked(event) {
  event.preventDefault();

  const athlete = document.querySelector('.athlete');

  fetch(ATHLETES_SEARCH_API_URL + encodeURIComponent(athlete.value)).then(
    onSearchAthleteResponse,
  ).then(onSearchAthleteJson);
}

nameInput.addEventListener('blur', check_name);
ageInput.addEventListener('blur', check_age);
bioInput.addEventListener('blur', check_bio);
editButton.addEventListener('click', onEditButtonClicked);
form.addEventListener('submit', onProfileUpdate);
editAthleteButton.addEventListener('click', onEditAthleteButtonClicked);
searchAthleteButton.addEventListener('click', onSearchAthleteButtonClicked);

fetchProfile();
