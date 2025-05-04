function validateForm() {
  const firstName = document.getElementById('first_name').value;
  const firstNameNotification = document.getElementById('first_name_notification');

  const lastName = document.getElementById('last_name').value;
  const lastNameNotification = document.getElementById('last_name_notification');

  const email = document.getElementById('email').value;
  const emailNotification = document.getElementById('email_notification');

  const phone = document.getElementById('phone_number').value;
  const phoneNotification = document.getElementById('phone_number_notification');

  const altPhone = document.getElementById('alt_phone_number').value;
  const altPhoneNotification = document.getElementById('alt_phone_notification');

  const dob = document.getElementById('dob').value;
  const dobNotification = document.getElementById('dob_notification');

  const genderNotification = document.getElementById('gender_notification');
  const genderMale = document.getElementById('male').checked;
  const genderFemale = document.getElementById('female').checked;
  const genderOther = document.getElementById('other').checked;

  const username = document.getElementById('username').value;
  const usernameNotification = document.getElementById('username');

  const password = document.getElementById('password').value;
  const passwordNotification = document.getElementById('password_notification');

  const confirmPassword = document.getElementById('confirm_password').value;
  const confirmPasswordNotification = document.getElementById('confirm_password_notification');

  const profilePictureNotification = document.getElementById('profile_picture');

  const shippingAddress = document.getElementById('shipping_address').value;
  const shippingAddressNotification = document.getElementById('shipping_address');

  const billingAddress = document.getElementById('billing_address').value;
  const billingAddressNotification = document.getElementById('shipping_address');

  const city = document.getElementById('city').value;
  const cityNotification = document.getElementById('city_notification');

  const state = document.getElementById('state').value;
  const stateNotification = document.getElementById('state_notification');

  const zipCode = document.getElementById('zip_code').value;
  const zipCodeNotification = document.getElementById('zip_code_notification');

  const country = document.getElementById('country').value;
  const countryNotification = document.getElementById('country_notification');

  const paymentMethod = document.getElementById('payment_method').value;
  const paymentNotification = document.getElementById('payment_method_notification');

  const favoriteCategory = document.getElementById('favorite_category').value;
  const favoriteCategoryNotification = document.getElementById('favorite_category_notification');

  const referral = document.getElementById('referral').value;
  const referralNotification = document.getElementById('referral_notification');

  const termsAgree = document.getElementById('termsAgree').checked;
  const termsPartially = document.getElementById('termsPartially').checked;
  const termsStrongly = document.getElementById('termsStrongly').checked;
  const termsNot = document.getElementById('termsNot').checked;
  const termsNotification = document.getElementById('terms_notification');

  firstNameNotification.innerHTML = '';
  lastNameNotification.innerHTML = '';
  emailNotification.innerHTML = '';
  phoneNotification.innerHTML = '';
  altPhoneNotification.innerHTML = '';
  dobNotification.innerHTML = '';
  genderNotification.innerHTML = '';
  usernameNotification.innerHTML = '';
  passwordNotification.innerHTML = '';
  confirmPasswordNotification.innerHTML = '';
  profilePictureNotification.innerHTML = '';
  shippingAddressNotification.innerHTML = '';
  billingAddressNotification.innerHTML = '';
  cityNotification.innerHTML = '';
  stateNotification.innerHTML = '';
  zipCodeNotification.innerHTML = '';
  countryNotification.innerHTML = '';
  paymentNotification.innerHTML = '';
  favoriteCategoryNotification.innerHTML = '';
  referralNotification.innerHTML = '';
  termsNotification.innerHTML = '';

  if (!firstName) {
    firstNameNotification.innerHTML = 'Please enter your first name.';
    return false;
  }
  if (/\d/.test(firstName)) {
    firstNameNotification.innerHTML = 'First name cannot contain numbers.';
    return false;
  }

  if (!lastName) {
    lastNameNotification.innerHTML = 'Please enter your last name.';
    return false;
  }
  if (/\d/.test(lastName)) {
    lastNameNotification.innerHTML = 'Last name cannot contain numbers.';
    return false;
  }

  if (!email) {
    emailNotification.innerHTML = 'Please enter your email.';
    return false;
  }
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailPattern.test(email)) {
    emailNotification.innerHTML = 'Invalid email format.';
    return false;
  }

  if (!phone) {
    phoneNotification.innerHTML = 'Please enter your phone number.';
    return false;
  }
  if (!/^\d{11,}$/.test(phone)) {
    phoneNotification.innerHTML = 'Phone must be at least 11 digits and numbers only.';
    return false;
  }

  if (altPhone && !/^\d{11,}$/.test(altPhone)) {
    altPhoneNotification.innerHTML = 'Alternate phone must be at least 11 digits and numbers only.';
    return false;
  }

  if (!dob) {
    dobNotification.innerHTML = 'Please enter your date of birth.';
    return false;
  }

  if (!(genderMale || genderFemale || genderOther)) {
    genderNotification.innerHTML = 'Please select your gender.';
    return false;
  }

  if (!username) {
    usernameNotification.innerHTML = 'Please enter your username.';
    return false;
  }

  if (!password) {
    passwordNotification.innerHTML = 'Please enter your password.';
    return false;
  }
  if (
    password.length < 8 ||
    !/[A-Z]/.test(password) ||
    !/[a-z]/.test(password) ||
    !/[0-9]/.test(password)
  ) {
    passwordNotification.innerHTML = 'Password must be at least 8 characters, contain uppercase, lowercase, and a number.';
    return false;
  }

  if (!confirmPassword) {
    confirmPasswordNotification.innerHTML = 'Please confirm your password.';
    return false;
  }
  if (password !== confirmPassword) {
    confirmPasswordNotification.innerHTML = 'Passwords do not match.';
    return false;
  }

  if (!shippingAddress) {
    shippingAddressNotification.innerHTML = 'Please enter your shipping address.';
    return false;
  }

  if (!billingAddress) {
    billingAddressNotification.innerHTML = 'Please enter your billing address.';
    return false;
  }

  if (!city) {
    cityNotification.innerHTML = 'Please enter your city.';
    return false;
  }

  if (!state) {
    stateNotification.innerHTML = 'Please enter your state.';
    return false;
  }

  if (!zipCode) {
    zipCodeNotification.innerHTML = 'Please enter your zip code.';
    return false;
  }

  if (!country) {
    countryNotification.innerHTML = 'Please select your country.';
    return false;
  }

  if (!paymentMethod) {
    paymentNotification.innerHTML = 'Please select a payment method.';
    return false;
  }

  if (!favoriteCategory) {
    favoriteCategoryNotification.innerHTML = 'Please select a favorite category.';
    return false;
  }

  if (!referral) {
    referralNotification.innerHTML = 'Please select a referral source.';
    return false;
  }

  if (!(termsAgree || termsPartially || termsStrongly) || termsNot) {
    termsNotification.innerHTML = 'You must agree to the terms (not disagree).';
    return false;
  }

  return true;
}
