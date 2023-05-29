const themeToggler = document.querySelector(".theme-toggler");

// Change Theme
themeToggler.addEventListener('click', () => {
    document.body.classList.toggle('dark-theme-variables');

    themeToggler.querySelector('i:nth-child(1)').classList.toggle('active');
    themeToggler.querySelector('i:nth-child(2)').classList.toggle('active');
})

// Open pop-up Form
function openForm() {
    document.getElementById("myForm").style.display = "block";
  }

// Close pop-up Form
function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }