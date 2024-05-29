const PROFILE_API_URL = '/profile/api/get/';
const data = document.querySelector('#profile_container .data');

function onGetProfileResponse(response) {
  return response.json();
}

function onProfileJson(json) {
  console.log(json);
  const name = document.querySelector('#name > .content');
  const birthday = document.querySelector('#birthday > .content');
  const bio = document.querySelector('#bio > .content');

  name.textContent = json.name;
  birthday.textContent = json.birthday;
  bio.textContent = json.bio;
}

fetch(PROFILE_API_URL).then(onGetProfileResponse).then(onProfileJson);
