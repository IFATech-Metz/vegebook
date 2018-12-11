 <form action="traitement_modif.php" method="post"  enctype="multipart/form-data">           
                                <fieldset>
                                    <legend>Classification</legend>
                                    <label for="nom" title="champs requis">Nouvelle entrée :</label>
                                        <input type="text" name="nom" id="nom"><br>

                                        <label for="image">Modifier la photo :</label>
                                        <input type="file" name="file_img" id="image"/><br>
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

                                    <input name="add_creation" title="Modifier" type="submit">
                            </form>