<?php 
/* 
Template Name: Import data
*/

get_header(); 

global $wpdb;

// Is POST set
if (isset( $_POST['birds_import'] ) ) {
    // Get POST data
    $json_string = $_POST['birds_import'];

    // Strip characters and decode JSON
    $decoded_array = json_decode(stripslashes($json_string), true);

    // If decode was success
    if ($decoded_array === null) {
        echo "Failed to decode JSON.";
    } else {
        $index = 0;

        // Loop decode JSON array
        foreach($decoded_array as $row) {
            $index++;

            // Format date - Start date
            $date = cc_format_date($row['kuupaev']);

            // Add cert data to table
            $wpdb->insert('wp_cc_birds', 
                array('eesnimi' => $row['eesnimi'], 
                    'perekonnanimi' => $row['perekonnanimi'], 
                    'rongakood_tahed'   => $row['rongakood_tahed'], 
                    'rongakood_numbrid' => $row['rongakood_numbrid'], 
                    'liik'   => $row['liik'], 
                    'sugu' => $row['sugu'], 
                    'vanus'   => $row['vanus'], 
                    'asukoht' => $row['asukoht'], 
                    'kuupaev'   => $date, 
                    'kellaaeg' => $row['kellaaeg'], 
                    'muud_margised'   => $row['muud_margised'], 
                    'metallronga_info' => $row['metallronga_info'], 
                    'pesakonna_suurus'   => $row['pesakonna_suurus'], 
                    'poja_vanus' => $row['poja_vanus'], 
                    'poja_vanuse_tapsus'   => $row['poja_vanuse_tapsus'], 
                    'puugimeetod' => $row['puugimeetod'], 
                    'meelitusvahend'   => $row['meelitusvahend'], 
                    'kasti_vorgu_pesa_nr'   => $row['kasti_vorgu_pesa_nr'], 
                    'staatus' => $row['staatus'], 
                    'tiiva_pikkus'   => $row['tiiva_pikkus'], 
                    'mass' => $row['mass'], 
                    'rasvasus'   => $row['rasvasus'], 
                    'rasvasus_skaala' => $row['rasvasus_skaala'], 
                    'jooksme_pikkus'   => $row['jooksme_pikkus'], 
                    'jooksme_pikkuse_meetod' => $row['jooksme_pikkuse_meetod'], 
                    'noka_pikkus'   => $row['noka_pikkus'], 
                    'noka_pikkuse_meetod' => $row['noka_pikkuse_meetod'], 
                    'pea_uldpikkus'   => $row['pea_uldpikkus'], 
                    'tagakuunise_pikkus' => $row['tagakuunise_pikkus'], 
                    'sulestiku_kood'   => $row['sulestiku_kood'], 
                    'sulgimine'   => $row['sulgimine'], 
                    'labahoosulgede_sulgimine' => $row['labahoosulgede_sulgimine'], 
                    'labahoosule_pikkus'   => $row['labahoosule_pikkus'], 
                    'labahoosule_tipu_seisund' => $row['labahoosule_tipu_seisund'], 
                    'saba_pikkus'   => $row['saba_pikkus'], 
                    'sabasulgede_vahe' => $row['sabasulgede_vahe'], 
                    'karpaalhoosulg'   => $row['karpaalhoosulg'], 
                    'vanad_kattesuled' => $row['vanad_kattesuled'], 
                    'haudelaik'   => $row['haudelaik'], 
                    'nukktiib' => $row['nukktiib'], 
                    'rinnalihas'   => $row['rinnalihas'], 
                    'soomaaramismeetod'   => $row['soomaaramismeetod'], 
                    'biotoop' => $row['biotoop'], 
                    'markused'   => $row['markused'], 
                    'korduspuugid' => $row['korduspuugid'], 
                )); 
      
        }

        echo $index . ' lindu lisatud';
    }

echo '<br>';
   
}

?>

<div class="page-content">
	<div class="page-content__inner">

        <form class="" method="POST" action="">
            <textarea style="display: block; width: 100%; margin-bottom:30px;" name="birds_import" rows="20" cols="40"></textarea>
            <button class="btn">Import</button>
        </form>

	</div>
</div>


