//product  toggle
function productToggle() {
    var element = document.getElementById("product");
    var plus = document.getElementById("plus");
    var minus = document.getElementById("minus");
    element.classList.toggle("hidden");
    plus.classList.toggle("hidden");
    minus.classList.toggle("hidden");
  }
  
  function userToggleFunction(){
    var element = document.getElementById("user");
    element.classList.toggle("hidden");
  }
  function categoroyToggle(){
    var element = document.getElementById("catToggleId");
    var plus = document.getElementById("catplus");
    var minus = document.getElementById("catminus");
    element.classList.toggle("hidden");
    catplus.classList.toggle("hidden");
    catminus.classList.toggle("hidden");
  }
  //brand toggle
  function BrandToggle(){
    var element = document.getElementById("BrandId");
    var plus = document.getElementById("brandplus");
    var minus = document.getElementById("brandminus");
    element.classList.toggle("hidden");
    brandplus.classList.toggle("hidden");
    brandminus.classList.toggle("hidden");

  }