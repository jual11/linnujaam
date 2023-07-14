<?php
/**
 * Show user form err message
 */
function cc_user_form_err($field) {
	// PHP form valitation
    if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
        // Check is first_name field filled
        if ( empty($_POST["first_name"]) && $field == "first_name" ) {
            echo "<span class='cc-form__mandatory'>Vajalik väli</span>";
        }  

        // Check is last_name field filled
        if ( empty($_POST["last_name"]) && $field == "last_name" ) {
            echo "<span class='cc-form__mandatory'>Vajalik väli</span>";
        } 

        // Check if date_of_birth field is filled and is in correct format
        if (empty($_POST["date_of_birth"]) && $field == "date_of_birth") {
            echo "<span class='cc-form__mandatory'>Vajalik väli</span>";
        } elseif (!empty($_POST["date_of_birth"]) && $field == "date_of_birth") {
            // Check if the filled value is a correct date format
            $date_of_birth = $_POST["date_of_birth"];
            $date_format = 'd.m.Y';
            $date_obj = DateTime::createFromFormat($date_format, $date_of_birth);
            $is_valid_date = $date_obj && $date_obj->format($date_format) === $date_of_birth;

            if (!$is_valid_date) {
                echo "<span class='cc-form__mandatory'>Palun sisestage korrektne kuupäev</span>";
            }
        }
 
        // Check if mail field is filled, is it correct or is it taken by other user
        if (empty($_POST["mail"]) && $field == "mail") {
            echo "<span class='cc-form__mandatory'>Vajalik väli</span>";
        } elseif (!empty($_POST["mail"]) && $field == "mail") {
            // Check if the filled value is a valid email address
            if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
                echo "<span class='cc-form__mandatory'>Palun sisestage korrektne email</span>";
            } elseif (email_exists($_POST["mail"])) {
                echo "<span class='cc-form__mandatory'>Email on juba kasutusel</span>";
            }
        } 

        // Check if phone field is filled and is in correct format
        if (empty($_POST["phone"]) && $field == "phone") {
            echo "<span class='cc-form__mandatory'>Vajalik väli</span>";
        } elseif (!empty($_POST["phone"]) && $field == "phone") {
            // Check if the filled value is at least 6 characters long
            $phone = $_POST["phone"];
            if (strlen($phone) < 6) {
                echo "<span class='cc-form__mandatory'>Telefoninumber peab olema vähemalt 6 tähemärki pikk</span>";
            } else {
                // Check if the filled value is a correct phone number format
                $phone_pattern = '/^\+?\d{1,3}[-.\s]?\(?\d{1,4}\)?[-.\s]?\d{1,4}[-.\s]?\d{1,9}$/';
                if (!preg_match($phone_pattern, $phone)) {
                    echo "<span class='cc-form__mandatory'>Palun sisestage korrektne telefoninumber</span>";
                }
            }
        }

        // Check if user_name field is filled
        if (empty($_POST["user_name"]) && $field == "user_name") {
            echo "<span class='cc-form__mandatory'>Vajalik väli</span>";
        } elseif (!empty($_POST["user_name"]) && $field == "user_name") {
            // Check if a user with the same username already exists
            $username = $_POST["user_name"];
            if (username_exists($username)) {
                echo "<span class='cc-form__mandatory'>Kasutajanimi on juba kasutusel</span>";
            }
        }

        // Check if "pw" field is empty or less than 12 characters long
        if ( empty($_POST["pw"]) && $field == "pw" ) {
            echo "<span class='cc-form__mandatory'>Vajalik väli</span>";
        } elseif ( strlen($_POST["pw"]) < 12 && $field == "pw" ) {
            echo "<span class='cc-form__mandatory'>Peab olema vähemalt 12 tähemärki pikk</span>";
        }
    
    }
}

/**
 * Create new user
 */
function cc_create_new_user() {
	// If there was POST 
    if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {

        // Check are all the fields filled
        if ( !empty($_POST["first_name"]) && !empty($_POST["last_name"]) ) {
            
            // Check if mail field is filled, is it correct or is it taken by other user
            if ( empty($_POST["mail"]) ) {
                return;
            } elseif ( !empty($_POST["mail"]) ) {
                // Check if the filled value is a valid email address
                if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
                    return;
                } elseif (email_exists($_POST["mail"])) {
                    return;
                }
            }

            // Check if phone field is filled and is it correct phone format
            if ( empty($_POST["phone"]) ) {
                return;
            } elseif ( !empty($_POST["phone"]) ) {
                // Check if the filled value is at least 6 characters long
                $phone = $_POST["phone"];
                if (strlen($phone) < 6) {
                    return;
                } else {
                    // Check if the filled value is a correct phone number format
                    $phone_pattern = '/^\+?\d{1,3}[-.\s]?\(?\d{1,4}\)?[-.\s]?\d{1,4}[-.\s]?\d{1,9}$/';
                    if (!preg_match($phone_pattern, $phone)) {
                        return;
                    }
                }
            }

            // Check if date_of_birth field is filled
            if ( empty($_POST["date_of_birth"]) ) {
                return;
            } elseif ( !empty($_POST["date_of_birth"]) ) {
                // Check if the filled value is a correct date format
                $date_of_birth = $_POST["date_of_birth"];
                $date_format = 'd.m.Y';
                $date_obj = DateTime::createFromFormat($date_format, $date_of_birth);
                $is_valid_date = $date_obj && $date_obj->format($date_format) === $date_of_birth;

                if (!$is_valid_date) return; 
            }

            // Check if user_name field is filled 
            if ( empty($_POST["user_name"]) ) {
                return;
            } elseif ( !empty($_POST["user_name"]) ) {
                // Check if a user with the same username already exists
                $username = $_POST["user_name"];

                if (username_exists($username)) return;   
            }

             // Check if "pw" field is empty or less than 12 characters long
            if ( empty($_POST["pw"]) ) {
                return;
            } elseif ( strlen($_POST["pw"]) < 12 ) {
                return;
            }

            // Include the WordPress core file
            require_once('wp-load.php');

            // Create user data array
            $user_data = array(
                'user_login' => $_POST["user_name"],
                'user_pass'  => $_POST["pw"],
                'user_email' => $_POST["mail"],
                'role'       => 'subscriber',
                'user_nicename' => $_POST["first_name"] . ' ' . $_POST["last_name"], 
                'display_name' => $_POST["first_name"] . ' ' . $_POST["last_name"],
                'first_name'   => $_POST["first_name"],    
                'last_name'    => $_POST["last_name"],
                'user_pass'    => $_POST["pw"],
            );

            // Create the user
            $user_id = wp_insert_user($user_data);

            // Add custom fields to user metadata
            if (!is_wp_error($user_id)) {
                add_user_meta($user_id, 'date_of_birth', $_POST["date_of_birth"]);
                add_user_meta($user_id, 'phone', $_POST["phone"]);
                echo 'Uus kasutaja loodud';
                echo '<br>';
                echo 'Kasutajanimi: ' . $_POST["user_name"];
                echo '<br>';
                echo 'Parool: ' . $_POST["pw"];
                exit;
            } else {
                echo 'Error creating user: ' . $user_id->get_error_message();
            }


        }
    
    }
}

