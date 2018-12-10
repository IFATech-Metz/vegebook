<section id="delete-confirmation">

    <?php

    $id = $_GET['id'];
    $name = $_GET['name'];
    $date= $_GET['date'];
    $type= $_GET['type'];

    ?>

    <p id="confirmation-delete-question">
        Souhaitez-vous vraiment supprimer l'élément <strong> <?php echo $name ?> planté le <?php echo $date ?></strong>, de votre liste de légumes ?
    </p>



    <div id="confirmation-choice">

        <div id="yes-confirm">
            <a 
               href="index.php?type=<?php echo $type ?>&date=<?php echo $date ?>&name=<?php echo $name ?>&id=<?php echo $id ?>&status=deleted"><span class="glyph1 glyphicon glyphicon-ok"></span>
            </a>  

            <p id="yes-text">
                OUI, Je confirme !
            </p>

        </div>


        <div id="no-confirm">
            <a 
               href="index.php?type=<?php echo $type ?>&status=view"><span class="glyph2 glyphicon glyphicon-remove">                       </span>
            </a>  
            <p>
                NON, revenir à la liste
            </p>  
        </div>

    </div>
</section>










