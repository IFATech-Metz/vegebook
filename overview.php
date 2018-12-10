<section id="overview">
    <div class="w3-container">
        <div id="id01" class="w3-modal w3-animate-opacity">
            <div class="w3-modal-content modal-dialog modal-md ">
                <div id ="head-overview" class="w3-container"> 
                    <span onclick="document.getElementById('id01').style.display='none'" 
                          class="w3-button w3-large w3-display-topright" style="color:green;">&times;</span>
                    <h2><?php echo $elements[$id]['name'] ?></h2>
                </div>
                <div class="w3-container">
                    <img id="img-overview" src="images/<?php echo $elements[$id]['img'] ?>">

                    <p class="overview-paragraph">id : <?php echo $elements[$id]['id'] ?></p>
                    <p class="overview-paragraph">Date de plantation : <?php echo $elements[$id]['plantation'] ?></p>
                    <p class="overview-paragraph">Date de récolte : <?php echo $elements[$id]['estimation'] ?></p>
                    <p class="overview-paragraph">Quantité planté : <?php echo $elements[$id]['quantite'] ?></p>
                    <p class="overview-paragraph">Fréquence d'arrosage : <?php echo $elements[$id]['freq_arrosage'] ?></p>
                    <p class="overview-paragraph">Dernier arrosage : <?php echo $elements[$id]['dernier_arrosage'] ?></p>
                    <p class="overview-paragraph" style="margin-bottom: 30px;">Notes : <?php echo $elements[$id]['notes'] ?></p>


                </div>
<!--
                <footer class="w3-container">

                </footer>
-->
            </div>
        </div>
    </div>
    
    


    <script>


        $(document).ready(overView());

        function overView(){
            //on affiche "vive tutoriels en folie"
                    
            document.getElementById('id01').style.display='block';

           
        }


    </script>
</section>   


