const ACTIVITIES_API_URL = '/activities/api/get/';
const homeContainer = document.getElementById('home_container');

function onGetActivitisResponse(response) {
  return response.json();
}

function onActivitiesJson(activities) {
  homeContainer.innerHTML = '';

  for (const i in activities) {
    const activityContainer = document.createElement('div');
    activityContainer.classList.add('activity');

    const header = document.createElement('div');
    header.classList.add('header');
    const who = document.createElement('div');
    const when = document.createElement('div');
    who.textContent = activities[i].email;
    when.textContent = activities[i].created_at;
    header.appendChild(who);
    header.appendChild(when);
    activityContainer.appendChild(header);

    const title = document.createElement('div');
    title.classList.add('title');
    title.textContent = activities[i].title;
    activityContainer.appendChild(title);

    const description = document.createElement('div');
    description.classList.add('description');
    description.textContent = activities[i].description;
    activityContainer.appendChild(description);

    const footer = document.createElement('div');
    footer.classList.add('footer');
    const performance = document.createElement('div');
    const deity = document.createElement('div');
    const updatedPerforance = activities[i].performance
      * activities[i].deity_influence;
    performance.textContent = updatedPerforance.toPrecision(3);
    deity.textContent = activities[i].deity;
    footer.appendChild(performance);
    footer.appendChild(deity);
    activityContainer.appendChild(footer);

    homeContainer.appendChild(activityContainer);
  }
}

function fetchActivities() {
  fetch(ACTIVITIES_API_URL).then(onGetActivitisResponse).then(onActivitiesJson);
}

fetchActivities();
