const fileInput = document.getElementById("fileInput");
const profileImage = document.getElementById("profileImage");
const profilePic = document.getElementById("profilePic");
const initials = document.getElementById("initials");
const deleteBtn = document.getElementById("deleteBtn");

const loadFile = (event) => {
  const image = event.target.files[0];
  if (image) {
    const reader = new FileReader();
    reader.onload = () => {
      profileImage.src = reader.result;
      profileImage.style.display = "block";
      initials.style.display = "none";
    };
    reader.readAsDataURL(image);
  }
};

deleteBtn.addEventListener("click", () => {
  profileImage.src = "";
  profileImage.style.display = "none";
  initials.style.display = "block";
  fileInput.value = ""; // reset file input
});
