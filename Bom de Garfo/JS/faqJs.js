$(document).ready(function () {
    
    $('.dropdownContainer').click(function () {
       $(this).children('.plusFaq').toggleClass("rotated");
       
    
    });


});




let drop = document.getElementsByClassName('dropdownContainer');
let leng = drop.length;



for (i = 0; i < leng; i++) {
    
    drop[i].addEventListener('click', function () {
            
        this.classList.toggle('active');
        let panel = this.nextElementSibling;

        // Is an array of elements matching the selector
        let activee = document.getElementsByClassName('active');

        if (activee.length && activee[0] !== this) {
            activee[0].classList.remove('active');
        }


        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;


        } else{
            panel.style.maxHeight = panel.scrollHeight + 'px';


        }



    });


     
};

  $(document).ready(function(){
    $("#flip").click(function(){
      $("#form_Grupo").slideToggle("slow");
    });
  });





