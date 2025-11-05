function validateForm() {
  const f = document.forms["regForm"];
  if (
    !f.username.value ||
    !f.password.value ||
    !f.email.value ||
    !f.fullname.value ||
    !f.contact.value
  ) {
    alert("All fields must be filled!");
    return false;
  }
  return true;
}
