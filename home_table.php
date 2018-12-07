<!DOCTYPE html>

<html>


    <head>         
        <title>Vegebook</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        
        <!--                **************************** CSS  ***********************-->  
      
        <link href="css/style.css" rel="stylesheet" type="text/css" /> 
        <link href="css/form.css" rel="stylesheet" type="text/css" /> 
<!--        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<!--
         <link href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />  
        
-->
        <!--                *************************** CSS  ***********************-->
                                        
        
        
        <!--                ************************* Fonts **************************-->
        
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Krub" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Mystery+Quest" rel="stylesheet">
        <!--               ************************* Fonts ****************************-->    
        
        
        <!--                ************************* library **************************-->
   
        
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src='DataTables/media/js/jquery.js'></script>
        
        <script type="text/javascript" src="DataTables/media/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="tableau.js"></script>
                <link rel="stylesheet" type="text/css" href="DataTables/media/css/jquery.dataTables.min.css">
        
        
        
        <!--                ************************* library **************************-->     
    </head>
    
    
    
    <body>
    

        
            
        <header>
            <div class='wrapper'>
                <div id="header_title">
                    <img id="header-img" src="images/ressources/books.png">
                    <h1>vegebook</h1>
                </div>
            </div>
        </header>
        
        
        
        
<!--        BUTTONS SECTION           -->           
        <section id='button_bar'>
            <div class='wrapper'>  
                
                <div id="button_group">
                    <div class="buttons"><a href='home_table.php?type=fruits.txt'>Accueil</a></div>
                    <div class="buttons"><a href='home_table.php?type=all'></a>Tous</div>
                    <div class="buttons"><a href='home_table.php?type=fruits'>Fruits</a></div>
                    <div class="buttons"><a href='home_table.php?type=legums'>Légumes</a></div>
                    <div class="buttons"><a href='home_table.php?type=fruits'>Plantes</a></div>
                    
                </div>
            </div>
            
        </section>
 <!--        BUTTONS SECTION            -->          
        

        
        
<!--         TAB SECTION            -->   
        
        
    <section id="tab-section">
        
        <div class="wrapper">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#home_part">Mes Légumes</a></li>
              <li><a data-toggle="tab" href="#modify_part">Modifier</a></li>
              <li><a data-toggle="tab" href="#add_part">Ajouter</a></li>
              <li><a data-toggle="tab" href="#del_part">Supprimer</a></li>
            </ul>




            <div class="tab-content">

              <div id="home_part" class="tab-pane fade in active">
                    <table id="home_tab" class="tab-resize">
                        <thead>
                              <tr>
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
                            <?php include('view-treatement.php');?>
                        </tbody>
                    </table>
              </div>

              <div id="add_part" class="tab-pane fade">
                <form action=" " method="post">           
                        <fieldset>
                            <legend>Classification</legend>
                            <label for="nom" title="champs requis">* Nouvelle entrée :</label>
                                <input type="text" name="nom" id="nom"><br>

                            <label for="categorie" title="champs requis">* Catégorie :</label>
                                <select name="catégorie" id="categorie">
                                    <option value="legume">Légumes</option>
                                    <option value="fruit">Fruits</option>
                                    <option value="aromatique">Plantes</option>
                                </select><br>

                            <label for="image">Ajouter une photo :</label>
                                <input type="texte" name="image" id="image"><br>
                        </fieldset>

                        <fieldset>
                            <legend>Informations</legend>

                            <label for="plantation">Date de plantation :</label>
                                <input type="date" name="plantation" id="plantation"><br>

                            <label for="recolte">Date de récolte estimée :</label>
                                <input type="date" name="recolte" id="recolte"><br>                    

                            <label for="quantite">Quantité plantée :</label>
                                <input type="number" name="quantite" id="quantite" min=0 ><br>

                            <label for="frequence">Fréquence d'arrosage :</label>
                                <input type="text" name="frequence" id="frequence"><br>

                            <label for="arrosage">Dernier arrosage :</label>
                                <input type="date" name="arrosage" id="arrosage"><br>
                        </fieldset>
                        <fieldset>
                            <legend>Commentaires</legend>

                            <textarea name="notes" id="notes"></textarea><br>
                        </fieldset>

                            <p>Les champs portant une * doivent être renseignés !</p>
                            <input type="submit">
                    </form>
              </div>

              <div id="modify_part" class="tab-pane fade" class="tab-resize">
                    <table id="modify_tab">
                        <thead>
                              <tr>
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
                            <?php include('view-treatement.php');?>
                        </tbody>
                    </table>
              </div>

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
                            <?php include('delete.php'); ?>
                        </tbody>
                   </table>
              </div>

            </div>

        </div>        
    </section>

             
           
      
        
    <footer></footer>
    
    </body>










</html>