<?php
/**
 * Get data from data base and print species_select
 */
function cc_species_select_select() {
    global $wpdb;

    // Declare names
    $table_name = $wpdb->prefix . 'cc_birds';
    $column_name = 'liik';
    
    // Query
    $query = "SELECT DISTINCT {$column_name} FROM {$table_name}";
    $results = $wpdb->get_col($query);
    
    ?>
    <label>Liik</label>
    <select name="species">
        <option value="-">-</option>
        <?php foreach ($results as $value) : ?>
            <?php $selected = isset($_POST['species']) && $_POST['species'] === $value ? 'selected' : ''; ?>
            <option value="<?php echo esc_attr($value); ?>" <?php echo $selected; ?>><?php echo esc_html($value); ?></option>
        <?php endforeach; ?>
    </select>
    <?php
	
}

/**
 *  Select species form validation
 */
function cc_select_species_from_validation() {
    // Is POST
    if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {

        // Check that at least one of the fields have value
        if ( ( $_POST["species"] == '-' ) ) echo 'Palun valige linnuliik';

    }
	
}

/**
 * Get select result
 */
function cc_get_select_results() {
    // Is POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $results = array();

        // Check that at least one of the fields has a value
        if ($_POST["species"] != '-') {
            // Get POST data
            $species = $_POST["species"];

            // Get years from table
            $years = cc_get_years_from_table();

            foreach ($years as $year) {
                // Declare variables 
                $min_wing_length = '';
                $avg_wing_length = '';
                $max_wing_length = '';
                $min_weight = '';
                $avg_weight = '';
                $max_weight = '';

                // Get the count of birds per year for a specific species
                $birds_count = cc_get_birds_count_from_table($year, $species);

                // Get the most common location for a specific year and species
                $location = cc_get_most_common_location($year, $species);

                // Get filtered wing length values
                $wing_length = cc_get_filtered_wing_length($year, $species);

                // Get filtered weight values
                $weight = cc_get_filtered_weight($year, $species);

                // Push year, birds_count, and location into the results array
                $results[] = array(
                    'year' => $year,
                    'birds_count' => $birds_count,
                    'popular_location' => $location,
                    'min_wing_length' => $wing_length['min'],
                    'avg_wing_length' => $wing_length['avg'],
                    'max_wing_length' => $wing_length['max'],
                    'min_weight' => $weight['min'],
                    'avg_weight' => $weight['avg'],
                    'max_weight' => $weight['max']
                );
            }
        }

        return $results;
    }
}

/**
 * Filtered wing length
 */
function cc_get_filtered_wing_length($year, $species) {
    $wing_length = cc_get_wing_length_data($year, $species);
    $filtered_wing_length = array();

    // Has $wing_length array value
    if ($wing_length) {
        // Filter out non-numeric and empty values, and zeros
        $filtered_wing_length = array_filter($wing_length, function($value) {
            return is_numeric($value) && $value != 0;
        });
    }

    return cc_calculate_stats($filtered_wing_length);
}

/**
 * Filtered weight
 */
function cc_get_filtered_weight($year, $species) {
    $weight = cc_get_weight_data($year, $species);
    $filtered_weight = array();

    // Has $weight array value
    if ($weight) {
        // Filter out non-numeric and empty values, and zeros
        $filtered_weight = array_filter($weight, function($value) {
            return is_numeric($value) && $value != 0;
        });
    }

    return cc_calculate_stats($filtered_weight);
}

/**
 * Calculate stats
 */
function cc_calculate_stats($data) {
    $stats = array(
        'min' => '-',
        'avg' => '-',
        'max' => '-'
    );

    if (!empty($data)) {
        $stats['min'] = min($data);
        $stats['avg'] = round(array_sum($data) / count($data));
        $stats['max'] = max($data);
    }

    return $stats;
}

/**
 * Get years from table
 */
function cc_get_years_from_table() {
    global $wpdb;

    // Declare table name
    $table_name = $wpdb->prefix . 'cc_birds';

    // Query
    $results = $wpdb->get_col(
        $wpdb->prepare(
            "SELECT DISTINCT YEAR(kuupaev) FROM $table_name"
        )
    );

    return $results;
}

/**
 * Get the count of birds per year for a specific species
 */
function cc_get_birds_count_from_table($year, $species) {
    global $wpdb;

    // Declare table name
    $table_name = $wpdb->prefix . 'cc_birds';

    // Query
    $count = $wpdb->get_var(
        $wpdb->prepare(
            "SELECT COUNT(*) FROM $table_name WHERE YEAR(kuupaev) = %d AND liik = %s",
            $year,
            $species
        )
    );

    return $count;
}

/**
 * Get the most common location for a specific year and species
 */
function cc_get_most_common_location($year, $species) {
    global $wpdb;

    // Declare table name
    $table_name = $wpdb->prefix . 'cc_birds';

    // Query
    $location = $wpdb->get_var(
        $wpdb->prepare(
            "SELECT asukoht FROM $table_name WHERE YEAR(kuupaev) = %d AND liik = %s GROUP BY asukoht ORDER BY COUNT(*) DESC LIMIT 1",
            $year,
            $species
        )
    );

    return $location;
}

/**
 * Get wing_length data for a specific year and species
 */
function cc_get_wing_length_data($year, $species) {
    global $wpdb;

    // Declare table name
    $table_name = $wpdb->prefix . 'cc_birds';

    // Query
    $results = $wpdb->get_col(
        $wpdb->prepare(
            "SELECT tiiva_pikkus FROM $table_name WHERE YEAR(kuupaev) = %d AND liik = %s",
            $year,
            $species
        )
    );

    return $results;
}

/**
 * Get weight data for a specific year and species
 */
function cc_get_weight_data($year, $species) {
    global $wpdb;

    // Declare table name
    $table_name = $wpdb->prefix . 'cc_birds';

    // Query
    $results = $wpdb->get_col(
        $wpdb->prepare(
            "SELECT mass FROM $table_name WHERE YEAR(kuupaev) = %d AND liik = %s",
            $year,
            $species
        )
    );

    return $results;
}