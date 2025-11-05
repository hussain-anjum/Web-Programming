document
  .getElementById("studentForm")
  .addEventListener("submit", function (event) {
    const form = document.forms["studentForm"];
    if (form["sName"].value.trim() === "") {
      alert("Please enter the student's name.");
      event.preventDefault();
      return;
    }
    if (form["fatherName"].value.trim() === "") {
      alert("Please enter the father's name.");
      event.preventDefault();
      return;
    }
    if (form["motherName"].value.trim() === "") {
      alert("Please enter the mother's name.");
      event.preventDefault();
      return;
    }
    if (form["dob"].value === "") {
      alert("Please enter a valid date of birth.");
      event.preventDefault();
      return;
    }
    const dob = new Date(form["dob"].value);
    const today = new Date();
    const minDate = new Date();
    minDate.setFullYear(today.getFullYear() - 3);
    if (dob > minDate) {
      alert("You must be at least 3 years old.");
      event.preventDefault();
      return;
    }
    if (form["sex"].value === "") {
      alert("Please select a gender.");
      event.preventDefault();
      return;
    }
    const phonePattern = /^01[3-9][0-9]{8}$/;
    if (!phonePattern.test(form["phone"].value)) {
      alert("Please enter a valid 11-digit phone number.");
      event.preventDefault();
      return;
    }
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(form["email"].value)) {
      alert("Please enter a valid email address.");
      event.preventDefault();
      return;
    }
    if (form["pAddress"].value.trim() === "") {
      alert("Please enter your present address.");
      event.preventDefault();
      return;
    }
    if (form["permAddress"].value.trim() === "") {
      alert("Please enter your permanent address.");
      event.preventDefault();
      return;
    }
  });
