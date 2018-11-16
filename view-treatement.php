<?php

   

    $type_txt = $_GET['type'];  //    Récupération du type végétal par URL

//    $type_txt = $type;


//echo   $type_txt;



    $nbr_inve = 0; //    compteur de ligne dans le txt

    $file_handle = fopen("texte/$type_txt.txt", "r");

    while(!feof($file_handle)) {

        fgets($file_handle);
        
        $nbr_inve ++;      
        
    }
    




    $file_handle = fopen("texte/$type_txt.txt", "r");

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






for ($i=0; $i < $nbr_inve ; $i++) { 
	 	echo 
            '<td>'  . $elements[$i]['id'] . '</td>' .
            '<td>'  . $elements[$i]['name'] . '</td>' .
             '<td> ' . '<img class="content_img" src="images/' . $elements[$i]['img'] . '"/>' . '</td>' .
             '<td> ' . $elements[$i]['plantation'] . '</td>' .
             '<td> ' . $elements[$i]['quantite'] . '</td>' .
			'<td>  ' . $elements[$i]['estimation'] . '</td>' .
			'<td>  ' . $elements[$i]['freq_arrosage'] . '</td>' .
			'<td>  ' . $elements[$i]['dernier_arrosage'] . '</td>' .
			'<td>  ' . $elements[$i]['notes'] . '</td></tr>'
            
	;
}



?>