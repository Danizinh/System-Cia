function toggleLogo() {
  const logo = document.querySelector(".sidebar .logo-details");
  if (logo.style.display === "none") {
    logo.style.display = "block";
  } else {
    logo.style.display = "none";
  }
}
