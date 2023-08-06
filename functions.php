<?php
    function singleInputField($label, $type, $name, $value, $placeholder) {
        $single_input_col = "
        <div class=\"nwt-single-input\">
            <label for='$name'>$label</label>
            <input type='$type' name='$name' id='$name' value='$value' placeholder='$placeholder'>
        </div>
        ";
        echo $single_input_col;
    }
?>