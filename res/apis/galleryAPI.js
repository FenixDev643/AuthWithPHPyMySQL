window.onload = function() {
   GaleryDisplayFunction();
   CarouselFunction();
 };
 
function GaleryDisplayFunction(){
   var Galery_Display = document.getElementsByClassName("GaleryDisplay")[0];
   if(Galery_Display){
      var GaleryWidth = 90;
      Galery_Display.style.width = GaleryWidth + "%";

      var MiddleImage_float = Galery_Display.children.length / 2;
      var MiddleImage = parseInt(MiddleImage_float);

      var Images = Galery_Display.getElementsByTagName("img");
      function DisplayImages(){
         for (let index = 0; index < Images.length; index++) {
            const element = Images[index];
            element.style.width = GaleryWidth / Images.length + "%"; 
   
            element.style.animationName = "ImageFade_Max";
            element.style.animationDuration = "1s";
            element.style.opacity = "1";
            if(index != MiddleImage){
               element.style.animationName = "ImageFade_Medium";
               element.style.animationDuration = "1s";
               element.style.opacity = "0.3";
               if(index == 0 || index == (Images.length - 1)){
                  element.style.animationName = "ImageFade_Min";
                  element.style.animationDuration = "1s";
                  element.style.opacity = "0.1";
               }
            }
         }
      }
      DisplayImages();

      var Arrow_Right = document.getElementById("Arrow-right");
      Arrow_Right.addEventListener('click', function(e){
         if(MiddleImage < Galery_Display.children.length - 1){
            MiddleImage += 1;
            DisplayImages();
         }
      });

      var Arrow_Left = document.getElementById("Arrow-left");
      Arrow_Left.addEventListener('click', function(e){
         if(MiddleImage > 0){
            MiddleImage -= 1;
            DisplayImages();
         }
      });
   }
}

function CarouselFunction(){
   var comprobate = document.getElementsByClassName("carousel")[0];
   if(comprobate){
      let slidePosition = 0;
      const slides = document.getElementsByClassName('carousel__item');
      const totalSlides = slides.length;

      document.getElementById('carousel__button--next')
      .addEventListener('click', function(){
         moveToNextSlide();
      });

      document.getElementById('carousel__button--prev')
      .addEventListener('click', function(){
         moveToPrevSlide();
      });

      function updateSlidePosition(){
         for(let slide of slides){
            slide.classList.remove('carousel__item--visible');
            slide.classList.add('carousel__item--hidden');
         }

         slides[slidePosition].classList.add('carousel__item--visible');
      }

      function moveToNextSlide(){
         if(slidePosition == totalSlides - 1){
            slidePosition = 0;
         }else{
            slidePosition++;
         }

         updateSlidePosition();
      }

      function moveToPrevSlide(){
         if(slidePosition == 0){
            slidePosition = totalSlides - 1;
         }else{
            slidePosition--;
         }

         updateSlidePosition();
      }
   }
}