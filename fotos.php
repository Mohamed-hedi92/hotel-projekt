<?php 
 $page = "fotos";
 require "bootstrap.php";
 include "header.php";

?>
<div class="pos2">
<div   id ="wrap" class="flex container" >
<article >
<div class="cssSlider">
 
    <!-- die inputs um den Slider zu Steuern -->
    <input type="radio" name="slider" id="slide01" checked="checked">
    <input type="radio" name="slider" id="slide02">
    <input type="radio" name="slider" id="slide03">
    <input type="radio" name="slider" id="slide04">
   
    <!-- die einzelnen Slides, hier als Liste angelegt -->
    <ul class="sliderElements">
        <li>
            <figure>
                <img id="img-1" src="images/view4.jpg" alt="" width="1200" height="400">
                <figcaption>Schöne Aussicht.</figcaption>
            </figure>
        </li>
        <li>
            <figure>
                <img id="img-2" src="images/view.jpg" alt="" width="1200" height="400">
                <figcaption>Schwimmbad</figcaption>
            </figure>
        </li>
        <li>
            <figure>
                <img id="img-3" src="images/view2.jpg" alt="" width="1200" height="400">
                <figcaption>Eine Paradise</figcaption>
            </figure>
        </li>
        <li>
            <figure>
                <img id="img-4" src="images/spa.jpg" alt="" width="1200" height="400">
                <figcaption> Hier finden Sie die besten Leistungen</figcaption>
            </figure>
        </li>

    
    </ul>
 
    <!-- Eine Steuerung -->
    <ul class="sliderControls">
        <li><label for="slide01">1</label></li>
        <li><label for="slide02">2</label></li>
        <li><label for="slide03">3</label></li>
        <li><label for="slide04">4</label></li>
      
    </ul>
</div>

</article>
</div>




<div class="container flex col-100">
  
<article>
<h4 id="fotos-h4"> Unsere Sehenwürdigkeiten </h4>
<div id="indextext" class="col-25">

</div> 

        <div class="col-25">

            <figure>
                <img  id="img-5" src="images/besteview.jpg" alt="view1" width="500">
            </figure>
        </div>


        <div class="col-25">
            <figure>
                <img id="img-6" src="images/view2.jpg" alt="view2" width="500">
            </figure>
        </div>
    </article>
</div>

<div class="container flex col-100">
    <article>

        <div id="indextext" class="col-25">

        </div>

        <div class="col-25">

            <figure>
                <img   id="img-7" src="images/paradise1.jpg" alt="paradise" width="500">
            </figure>
        </div>


        <div class="col-25">
            <figure>
                <img  id="img-8" src="images/paradise.jpg" alt="zimmer" width="500">
            </figure>
        </div>
    </article>

</div>

</article>



</div>






<?php include "footer.php";?>