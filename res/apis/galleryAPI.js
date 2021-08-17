window.onload = function(){
   GaleryDisplayFunction();
}

function GaleryDisplayFunction(){
   var Galery_Display = document.getElementById("GaleryDisplay");
   if(Galery_Display){
      Galery_Display.style = "width: 50%; display: flex;";
      var GaleryWidth = Galery_Display.style.width;

      var Images = Galery_Display.getElementsByTagName("img");
      for (let index = 0; index < Images.length; index++) {
         const element = Images[index];
         element.style.width = GaleryWidth; 
      }
   }
}