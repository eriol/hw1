export const MIN_PASSWORD_LENGTH = 8;
export const form = document.querySelector('#form_container form');
export const email = document.querySelector('#form_container .email input');
export const password = document.querySelector(
  '#form_container .password input',
);

export function validate_email(email) {
  const email_re = /^[a-zA-Z0–9._-]+@[a-zA-Z0–9.-]+\.[a-zA-Z]{2,}$/;
  return email_re.test(email.toLowerCase());
}

export function validate_password(password) {
  if (password.trim() === '' || password.length < MIN_PASSWORD_LENGTH) {
    return false;
  }

  return true;
}

export function check_email(event) {
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

export function check_password(event) {
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
