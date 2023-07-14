<?php
// Get select result
$results = cc_get_select_results();

if ($results) {
    ?>

    <div class="app-table-wrap">
        Tulemusi: <?php echo count($results) ?>
        <table class="app-table">
            <thead class="">
                <tr>
                    <th style="width: 20px;"></th>
                    <th>Aasta</th>
                    <th>Rõngastatud lindude arv aastate lõikes</th>
                    <th>Populaarseim rõngastamise koht</th>

                    <th>Minimaalne tiivpikkus</th>
                    <th>Keskmine tiivpikkus</th>
                    <th>Maksimaalne tiivpikkus</th>

                    <th>Minimaalne kaal</th>
                    <th>Keskmine kaal</th>
                    <th>Maksimaalne kaal</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $max_birds_count = 0;
                $max_birds_count_index = 0;

                foreach ($results as $index => $row) {
                    // Get the birds_count value
                    $birds_count = $row['birds_count'];

                    // Check if the current birds_count is greater than the maximum
                    if ($birds_count > $max_birds_count) {
                        $max_birds_count = $birds_count;
                        $max_birds_count_index = $index;
                    }
                }

                foreach ($results as $index => $row) {
                    // Output the row
                ?>
                    <tr <?php echo ($index === $max_birds_count_index) ? 'style="font-weight:bold;"' : ''; ?>>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo $row['year']; ?></td>
                        <td><?php echo $row['birds_count']; ?></td>
                        <td><?php echo $row['popular_location']; ?></td>
                        <td><?php echo $row['min_wing_length']; ?></td>
                        <td><?php echo $row['avg_wing_length']; ?></td>
                        <td><?php echo $row['max_wing_length']; ?></td>
                        <td><?php echo $row['min_weight']; ?></td>
                        <td><?php echo $row['avg_weight']; ?></td>
                        <td><?php echo $row['max_weight']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    </div>
<?php
}
?>
