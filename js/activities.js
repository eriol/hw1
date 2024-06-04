const SPORTS_API_URL = '/activities/api/get-sports/';

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

fetchSports();
