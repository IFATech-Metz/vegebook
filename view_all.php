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


    $nbr_inve_1 = $nbr_inve; //    compteur de ligne dans le txt

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


    $nbr_inve_2 = $nbr_inve_1; //    compteur de ligne dans le txt

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


    $elements_total = array_merge($elements, $elements_1, $elements_2);

    /*echo "<pre>";
    print_r($elements_total);
    echo "</pre>";*/


/******* affichage de tous les éléments ********/



for ($i=1; $i < $nbr_inve_2 ; $i++) { 
	 	echo 
            '<td>'  . $elements_total[$i]['id'] . '</td>' .
            '<td>'  . $elements_total[$i]['name'] . '</td>' .
            '<td> ' . '<img class="content_img" src="images/' . $elements_total[$i]['img'] . '"/>' . '</td>' .
            '<td> ' . $elements_total[$i]['plantation'] . '</td>' .
            '<td> ' . $elements_total[$i]['quantite'] . '</td>' .
			'<td>  ' . $elements_total[$i]['estimation'] . '</td>' .
			'<td>  ' . $elements_total[$i]['freq_arrosage'] . '</td>' .
			'<td>  ' . $elements_total[$i]['dernier_arrosage'] . '</td>' .
			'<td>  ' . $elements_total[$i]['notes'] . '</td></tr>'
            
	;
}



?>