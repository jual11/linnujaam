<?php
// Get search result
$results = cc_get_search_results();

if ( $results ) {
    ?>
    <div class="app-table-wrap">
        <table class="app-table">
            <thead class="">
                <tr>
                    <th style="width: 20px;"></th>
                    <th>Eesnimi</th>
                    <th>Perekonnanimi</th>
                    <th>Rõngakood tähed</th>
                    <th>Rõngakood numbrid</th>

                    <th>Liik</th>
                    <th>Sugu</th>
                    <th>Vanus</th>
                    <th>Asukoht</th>
                    <th>Kuupäev</th>

                    <th>Kellaaeg</th>
                    <th>Muud märgised</th>
                    <th>Metallrõnga info</th>
                    <th>Värvirõnga kood</th>
                    <th>Pesakonna suurus</th>

                    <th>Poja vanus</th>
                    <th>Poja vanuse täpsus</th>
                    <th>Püügimeetod</th>
                    <th>Meelitusvahend</th>
                    <th>Kasti/võrgu/pesa nr</th>

                    <th>Staatus</th>
                    <th>Tiiva pikkus</th>
                    <th>Mass</th>
                    <th>Rasvasus</th>
                    <th>Rasvasusskaala</th>

                    <th>Jooksme pikkus</th>
                    <th>Jooksme pikkuse meetod</th>
                    <th>Noka pikkus</th>
                    <th>Noka pikkuse meetod</th>
                    <th>Pea üldpikkus</th>

                    <th>Tagaküünise pikkus</th>
                    <th>Sulestiku kood</th>
                    <th>Sulgimine</th>
                    <th>Laba-hoosulgede sulgimine</th>
                    <th>3. laba-hoosule pikkus</th>

                    <th>Laba-hoosule tipu seisund</th>
                    <th>Saba pikkus</th>
                    <th>Sabasulgede vahe</th>
                    <th>Karpaalhoosulg</th>
                    <th>Vanad kattesuled</th>

                    <th>Haudelaik</th>
                    <th>Nukktiib</th>
                    <th>Rinnalihas</th>
                    <th>Soomääramismeetod</th>
                    <th>Biotoop</th>

                    <th>Märkused</th>
                    <th>Korduspüügid</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $i = 0;

                foreach ( $results as $row ) :
                    //Add index
                    $i++; 

                    // Get data
                    $date = cc_format_date_est($row->kuupaev);

                    ?>
                    <tr>
                        <td>
                            <?php echo $i; ?>
                        </td>

                        <td> 
                            <?php echo $row->eesnimi; ?>
                        </td>

                        <td>
                            <?php echo $row->perekonnanimi; ?>
                        </td>

                        <td>
                            <?php echo $row->rongakood_tahed; ?>
                        </td>

                        <td>
                            <?php echo $row->rongakood_numbrid; ?>
                        </td>
                        <td> 
                            <?php echo $row->liik; ?>
                        </td>

                        <td>
                            <?php echo $row->sugu; ?>
                        </td>

                        <td>
                            <?php echo $row->vanus; ?>
                        </td>

                        <td>
                            <?php echo $row->asukoht; ?>
                        </td>
                        <td> 
                            <?php echo $date; ?>
                        </td>

                        <td>
                            <?php echo $row->kellaaeg; ?>
                        </td>

                        <td>
                            <?php echo $row->muud_margised; ?>
                        </td>

                        <td>
                            <?php echo $row->metallronga_info; ?>
                        </td>
                        <td> 
                            <?php echo $row->varvironga_kood; ?>
                        </td>

                        <td>
                            <?php echo $row->pesakonna_suurus; ?>
                        </td>

                        <td>
                            <?php echo $row->poja_vanus; ?>
                        </td>

                        <td>
                            <?php echo $row->poja_vanuse_tapsus; ?>
                        </td>
                        <td> 
                            <?php echo $row->puugimeetod; ?>
                        </td>

                        <td>
                            <?php echo $row->meelitusvahend; ?>
                        </td>

                        <td>
                            <?php echo $row->kasti_vorgu_pesa_nr; ?>
                        </td>

                        <td>
                            <?php echo $row->staatus; ?>
                        </td>
                        <td> 
                            <?php echo $row->tiiva_pikkus; ?>
                        </td>

                        <td>
                            <?php echo $row->mass; ?>
                        </td>

                        <td>
                            <?php echo $row->rasvasus; ?>
                        </td>

                        <td>
                            <?php echo $row->rasvasus_skaala; ?>
                        </td>
                        <td> 
                            <?php echo $row->jooksme_pikkus; ?>
                        </td>

                        <td>
                            <?php echo $row->jooksme_pikkuse_meetod; ?>
                        </td>

                        <td>
                            <?php echo $row->noka_pikkus; ?>
                        </td>

                        <td>
                            <?php echo $row->noka_pikkuse_meetod; ?>
                        </td>
                        <td> 
                            <?php echo $row->pea_uldpikkus; ?>
                        </td>

                        <td>
                            <?php echo $row->tagakuunise_pikkus; ?>
                        </td>

                        <td>
                            <?php echo $row->sulestiku_kood; ?>
                        </td>

                        <td>
                            <?php echo $row->sulgimine; ?>
                        </td>

                        <td>
                            <?php echo $row->labahoosulgede_sulgimine; ?>
                        </td>

                        <td>
                            <?php echo $row->labahoosule_pikkus; ?>
                        </td>
                        <td> 
                            <?php echo $row->labahoosule_tipu_seisund; ?>
                        </td>

                        <td>
                            <?php echo $row->saba_pikkus; ?>
                        </td>

                        <td>
                            <?php echo $row->sabasulgede_vahe; ?>
                        </td>

                        <td>
                            <?php echo $row->karpaalhoosulg; ?>
                        </td>

                        <td>
                            <?php echo $row->vanad_kattesuled; ?>
                        </td>

                        <td>
                            <?php echo $row->haudelaik; ?>
                        </td>
                        <td> 
                            <?php echo $row->nukktiib; ?>
                        </td>

                        <td>
                            <?php echo $row->rinnalihas; ?>
                        </td>

                        <td>
                            <?php echo $row->soomaaramismeetod; ?>
                        </td>

                        <td>
                            <?php echo $row->biotoop; ?>
                        </td>

                        <td>
                            <?php echo $row->markused; ?>
                        </td>

                        <td>
                            <?php echo $row->korduspuugid; ?>
                        </td>

                      

                        
                    </tr>
                    <?php
                endforeach;

                ?>
            </tbody>
        </table>

    </div>
    <?php
}
?>