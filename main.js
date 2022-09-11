
// image on click get full screened 
const modal = document.querySelector(".full-img-modal");
const previews = document.querySelectorAll('.gallery img');
const original = document.querySelector('.full-img');

previews.forEach( preview => {
  preview.addEventListener('click', function() {
    modal.classList.add("open");
    original.classList.add("open");
    const originalSrc = preview.getAttribute("data-original");
    original.src = originalSrc;
  });
});

//click outside image close it
modal.addEventListener("click", (e) =>{
    if(e.target.classList.contains("full-img-modal")){
        modal.classList.remove("open");
        original.classList.remove("open");
    }
});

function toggleVisiability(elementId) {
  var password= document.getElementById(elementId);
  if (password.type == "password") {
  password.type = "text";
  } else {
  password.type = "password";
  }
}

