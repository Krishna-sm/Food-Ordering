
<button
        type="button"
        class="btn btn-danger btn-floating btn-lg"
        id="btn-back-to-top"
        >
  <i class="fa fa-arrow-up"></i>
</button>


<div class="container border-1 my-3 py-2 Item" style="background: aliceblue;">

<h1 class="text-center h3">
    &copy;FoodieMeal - <span id="time"></span>
</h1>

<p class="text-center">
<a href="https://www.instagram.com/krishna_agrawal_____/" target="_blank">
<i id="insta" class="fa fa-instagram h1 mx-3"></i>
</a>
<a href="https://youtube.com/@dkrishna" target="_blank">
<i class="fa fa-youtube h1 text-danger mx-3"></i>
</a>
<a href="https://github.com/krishna-sm" target="_blank">
<i class="fa fa-github h1 text-secondary mx-3"></i>
</a>
</p>
</div>
<script>
  //Get the button
let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

<style>
  #btn-back-to-top {
  position: fixed;
  bottom: 20px;
  border-radius: 50%;
  right: 20px;
  display: none;
}
#insta {
  background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
  -webkit-background-clip: text;
          /* Also define standard property for compatibility */
          background-clip: text;
  -webkit-text-fill-color: transparent;
  
  /* font-size: 200px; /change this to change the size */
  
}
</style>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> 
</body>
</html>

<script>
  document.getElementById("time").innerHTML=new Date().toLocaleTimeString();
  setInterval(()=>{
    document.getElementById("time").innerHTML=new Date().toLocaleTimeString();

  },1000)
</script>