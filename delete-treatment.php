

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

        <div class="delete-confirmation">
            
            <?php

            $id = $_GET['id'];
            $name = $_GET['name'];
            $date = $_GET['date'];
            $type = $_GET['type'];


               $nbr_inve = 0;

                $file_handle = fopen("texte/$type.txt", "r");

                while(!feof($file_handle)) {

                    fgets($file_handle);

                    $nbr_inve ++;


                }


                $file_handle = fopen("texte/$type.txt", "r");

                while(!feof($file_handle)) {


                    $line_of_text = fgets($file_handle);


                    $parts = explode('=', $line_of_text);



                    $elements[] = /*array($parts[1] =>*/
                     array(	
                            'id' => $parts[0],
                            'name' => $parts[1],
                            'img' => $parts[2],
                            'name_fr' => $parts[3],
                            'plantation' => $parts[4],
                            'quantite' => $parts[5],
                            'estimation' => $parts[6],
                            'freq_arrosage' => $parts[7],
                            'dernier_arrosage' => $parts[8],
                            'notes' => $parts[9]);


                            }

                fclose($file_handle);




            unlink("texte/$type.txt");   //suppression du fichier txt contenant les infos avant suppression
            fopen("texte/$type.txt", "w+"); //création d'un nouveau fichier texte





            for($i=0; $i>$nbr_inve; $i++){
                $elements[$i];    
            }

            unset($elements["$id"]);

            //echo '<pre>';
            //print_r($elements);
            //echo '<pre>';


            $elements = array_values($elements);

            //echo '<pre>';
            //print_r($elements);
            //echo '<pre>';


            //echo implode("=", $elements[1]);

            $file_handle = fopen("texte/$type.txt", "a");

            for($i=0; $i<$nbr_inve-1; $i++){
              $file_content = implode("=", $elements[$i]);
              fwrite($file_handle, $file_content);
            }

            fclose($file_handle);

            echo 'L\'élément '. $name .' planté le '. $date .' a bien été supprimé ! ';
            echo '<br>';
            echo '<a href="home_table.php?type='. $type .'"><span class="glyph3 glyphicon glyphicon-arrow-left"></span></a><br>' ;


            //ecrire dans fichier
            //
            //$handle ----> le pointeur du fichier
            //$file_content ----> ce que lon veut écrire dans le fichier
            //
            //$file_handle = fopen('test_file.txt', 'w');
            //$file_content = 'hello ! How are you?';
            //
            //fwrite($file_handle, $file_content);
            //fclose($file_handle);
            //
            //echo 'first file created !';
            //
            //
            //$az = $_GET['id'];
            //var_dump($az) ;
            //


            ?>
            </div>        
    </body>
    
</html>