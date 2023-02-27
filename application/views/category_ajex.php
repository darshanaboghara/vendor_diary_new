<?php
    echo " <option value='0'>Category</option>";
    foreach($category as $data)
    {
        echo " <option value=$data->id>$data->category_name	</option>";
    }
?>