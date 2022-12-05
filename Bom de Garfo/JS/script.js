//Butão Hamburguer
$(".menu-toggle-btn").click(function(){
    $(this).toggleClass("fa-times");
    $(".navigation-menu").toggleClass("active");
});

// navbar sticky class
window.addEventListener("scroll", function(){
    var header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0)
})

//Dropdown profile
$(document).ready(function () {
    $("#profileclick").click(function () {
      var a = $(".profile").css("display");
  
      if (a == "none") {
        $(".profile").slideDown();
      } else {
        $(".profile").slideUp();
      }
    });
});

//Butao voltar topo
window.addEventListener('scroll', function(){
  let scroll = document.querySelector('.bt-top')
  scroll.classList.toggle('active', window.scrollY > 200)
})

function backtop(){
  window.scrollTo({
    top:0,
    behavior: 'smooth'
  })
}

//Modal adicionar receita
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}