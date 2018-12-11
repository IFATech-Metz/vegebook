<!DOCTYPE html>

<html>


    <head>         
        <title>Vegebook</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <!--                **************************** CSS  ***********************-->  

        <link href="css/style.css" rel="stylesheet" type="text/css" /> 
        <link href="css/form.css" rel="stylesheet" type="text/css" /> 
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">



        <!--                ************************* Fonts **************************-->

        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Krub" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Mystery+Quest" rel="stylesheet">



        <!--                ************************* library **************************-->
        <!--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">    

        <!--        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

        <script type="text/javascript" src='DataTables/media/js/jquery.js'></script>
        <script type="text/javascript" src="DataTables/media/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="tableau.js"></script>
        <link rel="stylesheet" type="text/css" href="DataTables/media/css/jquery.dataTables.min.css">



    </head>



    <body>

        <!--        library           -->    
        <script src="/jquery/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>







        <div class="wrapper">     


            <!--        Bannière           -->           

            <header>
                <div id="header_title">
                    <img id="header-img" src="images/ressources/books2.png">
                    <h1>vegebook</h1>
                </div>
            </header>






            <!--        Menu SECTION           -->           
            <nav id="menu">
                <ul>
                    <li><a href='index.php'>Accueil</a></li>
                    <li><a href='index.php?type=all'>Tous</a></li>
                    <li><a href='index.php?type=fruits&status=view'>Fruits</a></li>
                    <li><a href='index.php?type=legumes&status=view'>Légumes</a></li>
                    <li><a href='index.php?type=plantes&status=view'>Plantes</a></li>
                </ul>
            </nav>







            <!--                titre des éléments (mes legumes, mes fruits ect ...) -->    

            <section id="title-content-section"> 


                <?php  if(isset($_GET['type'])){ ?>

                <?php $type = $_GET['type']; ?>

                <img src='images/ressources/<?php echo $type;?>.png'>             
                <p>
                    Mes 

                    <?php 

                                                if($_GET['type'] == 'legumes'){

                                                    echo "légumes";

                                                }   
                                                else{

                                                    echo $_GET['type'];
                                                }

                    ?>


                </p>

                <?php } ?>


            </section>




            <!--                conteneur du tableau des élément-->  
            <div id="container-content-section">


                <!--                affichage du tableau des élément-->           
                <section id="element-content-section">

                    <?php if(isset($_GET['type']) && isset($_GET['status']) && ($_GET['status'] == 'view' OR $_GET['status'] == 'overview')) { ?>

                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home_part">Mes Légumes</a></li>
                        <li><a data-toggle="tab" href="#modify_part">Modifier</a></li>
                        <li><a data-toggle="tab" href="#add_part">Ajouter</a></li>
                        <li><a data-toggle="tab" href="#del_part">Supprimer</a></li>
                    </ul>
                    <div class="tab-content">



                        <!--                aperçu des éléments-->                   

                        <div id="home_part" class="tab-pane fade in active">
                            <table id="home_tab" class="tab-resize">
                                <thead>
                                    <tr id="salut">
                                        <th class="table_title_id">id</th>
                                        <th class="table_title_nom">Nom</th>
                                        <th class="table_title_photo">Photo</th>
                                        <th class="table_title_plantation">Date<br>Plantation</th>
                                        <th class="table_title_notes">Date<br>Récolte</th>
                                        <th class="table_title_arrosage">Quantité<br>Planté</th>
                                        <th class="table_title_frequence">Fréquence<br>d'Arrosage</th>
                                        <th class="table_title_quantite">Dernier<br>Arrosage</th>
                                        <th class="table_title_recolte">Commentaire</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php 

    include('view-item.php')

        ;?>
                                </tbody>
                            </table>
                        </div>               




                        <!--                ajouter éléments-->                               

                        <div id="add_part" class="tab-pane fade">
                            <form action="traitement_add.php" method="post"  enctype="multipart/form-data">           
                                <fieldset>
                                    <legend>Classification</legend>
                                    <label for="nom" title="champs requis">Nouvelle entrée :</label>
                                    <input type="text" name="nom" id="nom" required><br>

                                    <label for="categorie" title="champs requis">Catégorie :</label>
                                    <select name="catégorie" id="categorie"  required>
                                        <option value="legumes">Légumes</option>
                                        <option value="fruits">Fruits</option>
                                        <option value="aromatiques">Plantes</option>
                                    </select><br>

                                    <label for="image">Ajouter une photo :</label>
                                        <input type="file" name="file_img" id="image" required/><br>
                                </fieldset>

                                <fieldset>
                                    <legend>Informations</legend>   

                                    <label for="plantation">Date de plantation :</label>
                                    <input type="date" name="plantation" id="plantation"  required><br>

                                    <label for="recolte">Date de récolte estimée :</label>
                                    <input type="date" name="recolte" id="recolte"  required><br>                    

                                    <label for="quantite">Quantité plantée :</label>
                                    <input type="number" name="quantite" id="quantite" min=0  required><br>

                                    <label for="frequence">Fréquence d'arrosage :</label>
                                    <input type="text" name="frequence" id="frequence"  required><br>

                                    <label for="arrosage">Dernier arrosage :</label>
                                    <input type="date" name="arrosage" id="arrosage"  required><br>
                                </fieldset>
                                <fieldset>
                                    <legend>Commentaires</legend>

                                    <textarea name="notes" id="notes"  required></textarea><br>
                                </fieldset>

                                <p>Tous les champs sont obligatoires</p>
                                <input type="submit" name="add_creation">
                            </form>
                        </div>




                        <!--                modifier éléments-->                                         

                        <div id="modify_part" class="tab-pane fade" class="tab-resize">
                            <table id="modify_tab">
                                <thead>
                                    <tr>
                                        <th class="table_title_delete"></th>
                                        <th class="table_title_id">id</th>
                                        <th class="table_title_nom">Nom</th>
                                        <th class="table_title_photo">Photo</th>
                                        <th class="table_title_plantation">Date<br>Plantation</th>
                                        <th class="table_title_notes">Quantité<br>Planté</th>
                                        <th class="table_title_arrosage">Récolte<br>Estimé</th>
                                        <th class="table_title_frequence">Fréquence<br>d'Arrosage</th>
                                        <th class="table_title_quantite">Dernier<br>Arrosage</th>
                                        <th class="table_title_recolte">Commentaire</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php

    if (isset($_GET['type']))

    {
        include('modify-view.php');
    }                                    
                                    ?>

                                </tbody>
                            </table>
                        </div>




                        <!--               supprimer éléments-->     

                        <div id="del_part" class="tab-pane fade" class="tab-resize">
                            <table id='delete_tab'>
                                <thead>
                                    <tr>
                                        <th class="table_title_delete"></th>
                                        <th class="table_title_id">id</th>
                                        <th class="table_title_nom">Nom</th>
                                        <th class="table_title_photo">Photo</th>
                                        <th class="table_title_plantation">Date<br>Plantation</th>
                                        <th class="table_title_notes">Quantité<br>Planté</th>
                                        <th class="table_title_arrosage">Récolte<br>Estimé</th>
                                        <th class="table_title_frequence">Fréquence<br>d'Arrosage</th>
                                        <th class="table_title_quantite">Dernier<br>Arrosage</th>
                                        <th class="table_title_recolte">Commentaires</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php

    if (isset($_GET['type']))

    {
        include('delete-view.php');
    }                                    
                                    ?>

                                </tbody>
                            </table>
                        </div>

                    </div>


                </section>

            </div>

            <?php }?>






            <!--        HOME MESSAGE            -->   






            <?php if(!isset($_GET['type'])){?>   


            <section id="home-message">


                <h1>Bienvenue chez Vegebook, votre jardin connecté !</h1>
                <p>La gestion de votre jardin devient un jeu d'enfant :
                    Date de plantation, quantité planté, fréquence d'arrosage, ect... sont autant de paramètres qu'il sera possible de suivre afin de surveiller votre jardin pour optimiser son rendement.</p>

                 <p>Pour utiliser le vegebook, rien de plus simple:<br>
                 	<b>Première étape:</b> Se rendre sur la catégorie voulue (plantes, fruits, légumes),<br>
                 	<b>Seconde étape:</b> Ajouter/Modifier/Supprimer l'élément,<br>
                 	<b>Troisième étape:</b> Mettre à jour régulièrement son book.
                 </p>


            </section>


            <?php } ?>    







            <!--              modify traitement -->   


            <?php 

if (isset($_GET['type']) && isset($_GET['status']) && isset($_GET['id']) && $_GET['status'] == 'modify')

{
    include 'modify-treatment.php';
}

            ?>






            <!--              confirmation delete -->   



            <?php

if (isset($_GET['type']) && isset($_GET['status']) && isset($_GET['id']) && $_GET['status'] == 'delete')

{
    include 'delete-confirmation.php';
}

            ?>






            <!--              confirmation delete traitement -->   



            <?php

if (isset($_GET['type']) && isset($_GET['status']) && isset($_GET['id']) && $_GET['status'] == 'deleted')

{
    include 'delete-treatment.php';
}

            ?>



            <!--              overview (popup détails fiche) -->   


            <!--              overview (popup détails fiche) -->   



            <?php

if (isset($_GET['status']) && isset($_GET['id']) && $_GET['status'] == 'overview')

{
    include 'overview.php';
}

            ?>







        </div> 









        <!--        FOOTER            -->   

        <footer>
        </footer>     












    </body>






</html>