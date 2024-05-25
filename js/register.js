const MIN_PASSWORD_LENGTH = 8;
const form = document.querySelector('#form_container form');
const email = document.querySelector('#form_container .email input');
const password = document.querySelector('#form_container .password input');
const password_confirm = document.querySelector(
  '#form_container .password_confirm input',
);

function validate_email(email) {
  const email_re = /^[a-zA-Z0–9._-]+@[a-zA-Z0–9.-]+\.[a-zA-Z]{2,}$/;
  return email_re.test(email.toLowerCase());
}

function validate_password(password) {
  if (password.trim() === '' || password.length < MIN_PASSWORD_LENGTH) {
    return false;
  }

  return true;
}

function check_email(event) {
  const error = document.querySelector('#form_container .email .error');
  const is_email_valid = validate_email(email.value);
  if (!is_email_valid) {
    error.textContent = 'Email non valida!';
    return false;
  } else {
    error.textContent = '';
    return true;
  }
}

function check_password(event) {
  const error = document.querySelector('#form_container .password .error');
  const is_password_valid = validate_password(password.value);
  if (!is_password_valid) {
    error.textContent = 'La password deve contenere almeno 8 caratteri!';
    return false;
  } else {
    error.textContent = '';
    return true;
  }
}

function check_password_confirm(event) {
  const error = document.querySelector(
    '#form_container .password_confirm .error',
  );
  const is_password_confirm_valid = validate_password(password_confirm.value);
  const is_password_confirm_equal_password =
    password_confirm.value === password.value ? true : false;
  if (!is_password_confirm_valid || !is_password_confirm_equal_password) {
    error.textContent =
      'La conferma della password deve essere uguale alla password!';
    return false;
  } else {
    error.textContent = '';
    return true;
  }
}

function onRegistration(event) {
  const is_email_valid = check_email();
  const is_password_valid = check_password();
  const is_password_confirm_valid = check_password_confirm();

  if (!is_email_valid || !is_password_valid || !is_password_confirm_valid) {
    event.preventDefault();
  }
}

email.addEventListener('blur', check_email);
password.addEventListener('blur', check_password);
password_confirm.addEventListener('blur', check_password_confirm);
form.addEventListener('submit', onRegistration);
