<?php
// Declare variables
$first_name = '';
$last_name = '';
$date_of_birth ='';
$mail ='';
$phone ='';
$user_name ='';

// Generate a random password
$pw = wp_generate_password(12); // Generate a 12-character password

// Create new user
cc_create_new_user();

?>
<div class="panel">
    <div class="cc-form">

        <form class="js-add-new-user-form" method="POST" action="">

            <div class="cc-form__section">
                <h3>Teie andmed</h3>
 
                    <div  class="cc-form__column">

                        <div class="cc-form__row">          
                            <label>Eesnimi</label>
                            <input type="text" name="first_name" value="<?php cc_show_post_field_data('first_name'); ?>">
                            <?php cc_user_form_err('first_name'); ?>
                        </div> 

                        <div class="cc-form__row">
                            <label>Perekonnanimi</label> 
                            <input type="text" name="last_name" value="<?php cc_show_post_field_data('last_name'); ?>">
                            <?php cc_user_form_err('last_name'); ?>
                        </div>
                        
                    </div>

                    <div  class="cc-form__column">

                        <div class="cc-form__row">          
                            <label>Sünniaeg</label>
                            <input type="text" name="date_of_birth" value="<?php cc_show_post_field_data('date_of_birth'); ?>" placeholder="Nt. 25.10.1988">
                            <?php cc_user_form_err('date_of_birth'); ?>
                        </div> 

                        <div class="cc-form__row">
                            <label>E-post</label> 
                            <input type="text" name="mail" value="<?php cc_show_post_field_data('mail'); ?>">
                            <?php cc_user_form_err('mail'); ?>
                        </div>
                        
                    </div>

                    <div  class="cc-form__column">

                        <div class="cc-form__row">          
                            <label>Telefon</label>
                            <input type="text" name="phone" value="<?php cc_show_post_field_data('phone'); ?>">
                            <?php cc_user_form_err('phone'); ?>
                        </div> 

                        <div class="cc-form__row">
                            <label>Kasutajatunnus</label> 
                            <input type="text" name="user_name" value="<?php echo cc_show_post_field_data('user_name'); ?>">
                            <?php cc_user_form_err('user_name'); ?>
                        </div>
                        
                    </div>

                    <div class="cc-form__row">
                        <label>Parool</label> 
                        <input type="text" name="pw" value="<?php echo $pw; ?>">
                        <?php cc_user_form_err('pw'); ?>
                    </div>
                
            </div>  

            <input class="btn" type="submit" value="Loo konto">

        </form>

    </div>
</div>

