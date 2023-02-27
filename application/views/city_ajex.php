<?php
    echo '<option value="0">City</option>';
    foreach($city as $data)
    {
        echo " <option value=$data->id>$data->city_name</option>";
    }
?>