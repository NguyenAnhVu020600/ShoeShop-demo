<?php
session_start();
require '../config.php';
if (isset($_POST['data_id_province'])) {
    $id_province = $_POST['data_id_province'];
    $querydistrict = "SELECT * FROM district
    WHERE id_province = '$id_province'";
    $resultdistrict = $conn->query($querydistrict);
    if ($resultdistrict->num_rows > 0) {
    ?>
        <select class="field-input district" id="customer_shipping_district " name="district">
            <?php
            while ($rowdistrict = $resultdistrict->fetch_assoc()) {
                $id_district = $rowdistrict['id_district'];
                $name_district = $rowdistrict['name'];
                ?>
                <option value="<?= $id_district ?>"> <?= $name_district ?> </option>
                <?php
            }
            ?>
        </select>
    <?php
    }
}
?>