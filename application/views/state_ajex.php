<?php
    echo '<option value="0">State</option>';
    foreach($state as $data)
    {
        echo " <option value='$data->id'";
        if($this->session->state_id==$data->id)
        {
            echo "selected";
        }
        echo ">$data->state_name</option>";
    }
?>