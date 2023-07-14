<?php
// Search form validation
cc_search_from_validation();

?>

<div class="panel">
    <div class="cc-form">

    <form class="" method="POST" action="">

        <div class="cc-form__row">
            <?php cc_ring_code_letters_select(); ?>
        </div>

        <div class="cc-form__row"> 
            <label>Rõngakoodi number</label>
            <input class="" type="text" name="ring_code_number" value="<?php cc_show_post_field_data('ring_code_number'); ?>">
        </div>

        <input class="btn" type="submit" value="Otsi">

    </form>

    </div>
</div>