<?php
/**
 * Get data from data base and print rongakood_tahed_select
 */
function cc_ring_code_letters_select() {
    global $wpdb;

    // Declare names
    $table_name = $wpdb->prefix . 'cc_birds';
    $column_name = 'rongakood_tahed';
    
    // Query
    $query = "SELECT DISTINCT {$column_name} FROM {$table_name}";
    $results = $wpdb->get_col($query);
    
    ?>
    <label>Rõngakoodi tähed</label>
    <select name="ring_code_letters">
        <option value="-">-</option>
        <?php foreach ($results as $value) : ?>
            <?php $selected = isset($_POST['ring_code_letters']) && $_POST['ring_code_letters'] === $value ? 'selected' : ''; ?>
            <option value="<?php echo esc_attr($value); ?>" <?php echo $selected; ?>><?php echo esc_html($value); ?></option>
        <?php endforeach; ?>
    </select>
    <?php
	
}

/**
 * Search form validation
 */
function cc_search_from_validation() {
    // Is POST
    if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {

        // Check that at least one of the fields have value
        if ( ( $_POST["ring_code_letters"] == '-' ) && empty($_POST["ring_code_number"]) ) {
            echo 'Palun sisetage vähemalt 1 otsingu väärtus';
        }
    }	
}

/**
 * Get search result
 */
function cc_get_search_results() {
    // Is POST
    if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'cc_birds';

        // Check that at least one of the fields has a value
        if ( ( $_POST["ring_code_letters"] != '-' ) && !empty($_POST["ring_code_number"]) ) {
            $ring_code_letters = $_POST["ring_code_letters"];
            $ring_code_number = $_POST["ring_code_number"];

            // Query
            $query = $wpdb->prepare(
                "SELECT * FROM {$table_name} WHERE rongakood_tahed = %s AND rongakood_numbrid LIKE %s",
                $ring_code_letters,
                "%{$ring_code_number}%"
            );
            $results = $wpdb->get_results($query);

            return $results;
        }

        // Check that ring_code_letters has a value
        if ( $_POST["ring_code_letters"] != '-' ) {
            $ring_code_letters = $_POST["ring_code_letters"];

            // Query
            $query = $wpdb->prepare(
                "SELECT * FROM {$table_name} WHERE rongakood_tahed = %s OR rongakood_numbrid LIKE %s",
                $ring_code_letters,
                "%{$_POST['ring_code_number']}%"
            );
            $results = $wpdb->get_results($query);

            return $results;
        }

        // Check that ring_code_number has a value
        if ( $_POST["ring_code_number"] != '-' ) {
            $ring_code_number = $_POST["ring_code_number"];

            // Query
            $query = $wpdb->prepare(
                "SELECT * FROM {$table_name} WHERE rongakood_numbrid LIKE %s",
                "%{$ring_code_number}%"
            );
            $results = $wpdb->get_results($query);

            return $results;
        }
    }
}

