import { email, form, MIN_PASSWORD_LENGTH, password } from '/js/auth.js';
import {
  check_email,
  check_password,
  validate_email,
  validate_password,
} from '/js/auth.js';

const password_confirm = document.querySelector(
  '#form_container .password_confirm input',
);

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
