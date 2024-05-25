import { email, form, MIN_PASSWORD_LENGTH, password } from '/js/auth.js';
import {
  check_email,
  check_password,
  validate_email,
  validate_password,
} from '/js/auth.js';

function onLogin(event) {
  const is_email_valid = check_email();
  const is_password_valid = check_password();

  if (!is_email_valid || !is_password_valid) {
    event.preventDefault();
  }
}

email.addEventListener('blur', check_email);
password.addEventListener('blur', check_password);
form.addEventListener('submit', onLogin);
