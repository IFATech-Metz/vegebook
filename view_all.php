<?php

   
    $type_txt = $_GET['type'];  //    Récupération du type végétal par URL

//    $type_txt = $type;


//echo   $type_txt;


/******* fichier legumes.txt ********/


    $nbr_inve = 0; //    compteur de ligne dans le txt

    $file_handle = fopen("texte/legumes.txt", "r");


    while(!feof($file_handle)) {
        

        $line_of_text = fgets($file_handle);
        
        $parts = explode('=', $line_of_text);
        
        

        $elements[] = /*array($parts[1] =>*/
         array(	
         		'id' =>  $nbr_inve++,
         		'name' => $parts[1],
         		'img' => $parts[2],
         		'plantation' => $parts[3],
         		'quantite' => $parts[4],
         		'estimation' => $parts[5],
         		'freq_arrosage' => $parts[6],
         		'dernier_arrosage' => $parts[7],
                'notes' => $parts[8]);
                }
  
    fclose($file_handle);


/******* fichier fruits.txt ********/


    $nbr_inve_1 = 0; //    compteur de ligne dans le txt

    $file_handle = fopen("texte/fruits.txt", "r");


    while(!feof($file_handle)) {
        

        $line_of_text = fgets($file_handle);
        
        $parts = explode('=', $line_of_text);
        

        $elements_1[] = /*array($parts[1] =>*/
         array(	
         		'id' => $nbr_inve_1++,
         		'name' => $parts[1],
         		'img' => $parts[2],
         		'plantation' => $parts[3],
         		'quantite' => $parts[4],
         		'estimation' => $parts[5],
         		'freq_arrosage' => $parts[6],
         		'dernier_arrosage' => $parts[7],
                'notes' => $parts[8]);
                }


    fclose($file_handle);


/******* fichier plantes.txt ********/


    $nbr_inve_2 = 0; //    compteur de ligne dans le txt

    $file_handle = fopen("texte/plantes.txt", "r");


    while(!feof($file_handle)) {
        

        $line_of_text = fgets($file_handle);
        
        $parts = explode('=', $line_of_text);
        
        

        $elements_2[] = /*array($parts[1] =>*/
         array(	
         		'id' => $nbr_inve_2++,
         		'name' => $parts[1],
         		'img' => $parts[2],
         		'plantation' => $parts[3],
         		'quantite' => $parts[4],
         		'estimation' => $parts[5],
         		'freq_arrosage' => $parts[6],
         		'dernier_arrosage' => $parts[7],
                'notes' => $parts[8]);
                }
  
    fclose($file_handle);

    


/******* affichage de tous les éléments ********/

    for ($i=1; $i < $nbr_inve ; $i++) { 

            if($i < 10){
            $elements[$i]['id'] = "0" . $elements[$i]['id'];
            }

    	 	echo 
                '<td>' . "L". $elements[$i]['id'] . '</td>' .
                '<td>' . $elements[$i]['name'] . '</td>' .
                '<td>' . '<img class="content_img" src="images/' . $elements[$i]['img'] . '"/>' . '</td>' .
                '<td>' . $elements[$i]['plantation'] . '</td>' .
                '<td>' . $elements[$i]['quantite'] . '</td>' .
    			'<td>' . $elements[$i]['estimation'] . '</td>' .
    			'<td>' . $elements[$i]['freq_arrosage'] . '</td>' .
    			'<td>' . $elements[$i]['dernier_arrosage'] . '</td>' .
                '<td>' . $elements[$i]['notes'] . '</td></tr>'
                ;

    }

    for ($i=1; $i < $nbr_inve_1 ; $i++) { 

            if($i < 10){
            $elements_1[$i]['id'] = "0" . $elements_1[$i]['id'];
            }

    	 	echo 
                '<td>' . "F" . $elements_1[$i]['id'] . '</td>' .
                '<td>' . $elements_1[$i]['name'] . '</td>' .
                '<td>' . '<img class="content_img" src="images/' . $elements_1[$i]['img'] . '"/>' . '</td>' .
                '<td>' . $elements_1[$i]['plantation'] . '</td>' .
                '<td>' . $elements_1[$i]['quantite'] . '</td>' .
    			'<td>' . $elements_1[$i]['estimation'] . '</td>' .
    			'<td>' . $elements_1[$i]['freq_arrosage'] . '</td>' .
    			'<td>' . $elements_1[$i]['dernier_arrosage'] . '</td>' .
                '<td>' . $elements_1[$i]['notes'] . '</td></tr>'
                ;

    }

    for ($i=1; $i < $nbr_inve_2 ; $i++) { 

            if($i < 10){
            $elements_2[$i]['id'] = "0" . $elements_2[$i]['id'];
            }

    	 	echo 
                '<td>' . "P" . $elements_2[$i]['id'] .'</td>' .
                '<td>' . $elements_2[$i]['name'] . '</td>' .
                '<td>' . '<img class="content_img" src="images/' . $elements_2[$i]['img'] . '"/>' . '</td>' .
                '<td>' . $elements_2[$i]['plantation'] . '</td>' .
                '<td>' . $elements_2[$i]['quantite'] . '</td>' .
    			'<td>' . $elements_2[$i]['estimation'] . '</td>' .
    			'<td>' . $elements_2[$i]['freq_arrosage'] . '</td>' .
    			'<td>' . $elements_2[$i]['dernier_arrosage'] . '</td>' .
                '<td>' . $elements_2[$i]['notes'] . '</td></tr>'
                ;

    }

?>