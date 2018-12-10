<?php

   

    $type_txt = $_GET['type'];  //    Récupération du type végétal par URL


    $nbr_inve = 0; //    compteur de ligne dans le txt


    

        $file_handle = fopen("texte/$type_txt.txt", "r");

        while(!feof($file_handle)) {


            $line_of_text = fgets($file_handle);

            
            $parts = explode('=', $line_of_text);

           

            $elements[] = /*array($parts[1] =>*/
             array(	
                    'id' => $nbr_inve++,
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


//        echo '<pre>';
//        print_r($elements);
//        echo '<pre>';


        for ($i=1; $i < $nbr_inve ; $i++) { 

            $keys = array_keys($elements);
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