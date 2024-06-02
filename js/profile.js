const PROFILE_API_URL = '/profile/api/get/';
const PROFILE_EDIT_API_URL = '/profile/api/update/';
const PROFILE_FAVORITE_ATHLETE_EDIT_API_URL =
  '/profile/api/update-favorite-athlete/';
const ATHLETES_EXTERNAL_API_URL = 'https://wp24-athletes.colca.mornie.org';
const ATHLETES_SEARCH_API_URL = '/search-athletes/?q=';
const ATHLETES_GET_API_URL = '/athletes/?q=';
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
const searchResults = document.getElementById('search_results');

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

function onAthleteResponse(response) {
  return response.json();
}

function onAthleteJson(json) {
  console.log(json);
  const athleteContainer = document.getElementById('athlete_container');
  athleteContainer.innerHTML = '';

  const name = document.createElement('div');
  name.textContent = json.name;
  name.classList.add('name');
  athleteContainer.appendChild(name);
  const image = document.createElement('img');
  image.src = ATHLETES_EXTERNAL_API_URL + '/images/' + json.slug
    + '?size=M';
  athleteContainer.appendChild(image);
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

  if (json.favorite_athlete !== '') {
    console.log(json);

    fetch(ATHLETES_GET_API_URL + encodeURIComponent(json.favorite_athlete))
      .then(
        onAthleteResponse,
      ).then(onAthleteJson);
  }
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

function onUpdateProfileAthleteJson(json) {
  overlay.classList.add('hidden');
  fetchProfile();
}

function onCardClicked(event) {
  const slug = event.currentTarget.dataset.slug.trim();

  if (slug !== '') {
    const data = new FormData();
    data.append('athlete', slug);
    const formData = { method: 'POST', body: data };

    fetch(PROFILE_FAVORITE_ATHLETE_EDIT_API_URL, formData).then(
      onUpdateProfileResponse,
    ).then(onUpdateProfileAthleteJson);
  }
}

function onEditAthleteButtonClicked(event) {
  overlay.classList.remove('hidden');
}

function onSearchAthleteResponse(response) {
  return response.json();
}

function onSearchAthleteJson(athletes) {
  console.log(athletes);
  searchResults.innerHTML = '';
  for (let i in athletes) {
    console.log(athletes[i].slug);
    const card = document.createElement('div');
    card.dataset.slug = athletes[i].slug;
    card.classList.add('card');

    const name = document.createElement('div');
    name.classList.add('name');
    name.textContent = athletes[i].name;

    card.appendChild(name);
    const image = document.createElement('img');
    image.src = ATHLETES_EXTERNAL_API_URL + '/images/' + athletes[i].slug
      + '?size=S';
    card.appendChild(image);

    searchResults.appendChild(card);
    card.addEventListener('click', onCardClicked);
  }
}

function onSearchAthleteButtonClicked(event) {
  event.preventDefault();

  const athlete = document.querySelector('.athlete');

  const toSearch = athlete.value.trim();
  if (toSearch !== '') {
    fetch(ATHLETES_SEARCH_API_URL + encodeURIComponent(toSearch)).then(
      onSearchAthleteResponse,
    ).then(onSearchAthleteJson);
  }
}

nameInput.addEventListener('blur', check_name);
ageInput.addEventListener('blur', check_age);
bioInput.addEventListener('blur', check_bio);
editButton.addEventListener('click', onEditButtonClicked);
form.addEventListener('submit', onProfileUpdate);
editAthleteButton.addEventListener('click', onEditAthleteButtonClicked);
searchAthleteButton.addEventListener('click', onSearchAthleteButtonClicked);

fetchProfile();
