<!DOCTYPE html>

<html>


    <head>         
        <title>Vegebook</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        
        <!--                **************************** CSS  ***********************-->  
      
        <link href="css/style.css" rel="stylesheet" type="text/css" /> 
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
        
       
        
<?php
$id = $_GET['id'];
$name = $_GET['name'];
$date= $_GET['date'];
$type= $_GET['type'];

echo '<div class="delete-confirmation">' ;
echo '<h1>Souhaitez-vous vraiment supprimer l\'élément <strong>\''.$name.'\' planté le '.$date.'</strong>, de votre liste de légumes ?</h1>';
echo '<br>';
echo '<br>';
 

echo '<p><a href="delete-treatment.php?type='. $type .'&date='. $date .'&name='. $name .'&id='. $id .'"><span class="glyph1 glyphicon glyphicon-ok"></span></a><br>' ;
echo 'OUI, Je confirme !';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<a href="index.php?type='. $type .'"><span class="glyph2 glyphicon glyphicon-remove"></span></a><br>' ;
echo 'NON, revenir à la liste </p>';       
echo '</div>' ;

?>
  
    
    
