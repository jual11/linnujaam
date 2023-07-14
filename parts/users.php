<?php
// Get all users
$users = get_users();

if ( $users ) {
    ?>
    <div class="app-table-wrap">
        <table class="app-table">
            <thead class="">
                <tr>
                    <th style="width: 20px;"></th>
                    <th>Eesnimi</th>
                    <th>Perekonnanimi</th>
                    <th>Sünniaeg</th>
                    <th>E-mail</th>
                    <th>Telefon</th>
                    <th>Kasutajatunnus</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $i = 0;

                foreach ( $users as $user ) :
                    //Add index
                    $i++; 

                    // Get user data
                    $user_id = $user->ID;
                    $first_name = get_user_meta($user_id, 'first_name', true);
                    $last_name = get_user_meta($user_id, 'last_name', true);
                    $email = $user->user_email;
                    $username = $user->user_login;
                    $phone = get_user_meta($user_id, 'phone', true);
                    $date_of_birth = get_user_meta($user_id, 'date_of_birth', true);

                    ?>
                    <tr>
                        <td>
                            <?php echo $i; ?>
                        </td>

                        <td> 
                            <?php echo $first_name; ?>
                        </td>

                        <td>
                            <?php echo $last_name; ?>
                        </td>                     
           
                        <td>
                            <?php echo $date_of_birth; ?>
                        </td>

                        <td>
                            <?php echo $email; ?>
                        </td>

                        <td>
                            <?php echo $phone; ?>
                        </td>

                        <td>
                            <?php echo $username; ?>
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