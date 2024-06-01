const PROFILE_API_URL = '/profile/api/get/';
const PROFILE_EDIT_API_URL = '/profile/api/update/';
const editButton = document.querySelector('#edit-profile');
const formConteiner = document.querySelector('#form-profile');
const form = document.querySelector('#form-profile form');
const data = document.querySelector('#profile_container .data');

function onGetProfileResponse(response) {
  return response.json();
}

function onProfileJson(json) {
  const name = document.querySelector('#name > .content');
  const nameInput = document.querySelector('form input[name="name"]');
  const age = document.querySelector('#age > .content');
  const ageInput = document.querySelector('form input[name="age"]');
  const bio = document.querySelector('#bio > .content');
  const bioInput = document.querySelector('form input[name="bio"]');

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
  formConteiner.classList.remove('hidden');
  data.classList.add('hidden');
}

function onUpdateProfileResponse(response) {
  return response.json();
}

function onUpdateProfileJson(json) {
  fetchProfile();

  formConteiner.classList.add('hidden');
  data.classList.remove('hidden');
}

function onProfileUpdate(event) {
  event.preventDefault();

  const formData = { method: 'POST', body: new FormData(form) };

  fetch(PROFILE_EDIT_API_URL, formData).then(onUpdateProfileResponse).then(
    onUpdateProfileJson,
  );
}

editButton.addEventListener('click', onEditButtonClicked);
form.addEventListener('submit', onProfileUpdate);

fetchProfile();
