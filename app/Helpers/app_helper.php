<?php

function check_error($field, $errors)
{
    if(!empty($errors) && key_exists($field, $errors)){
        return '<div class="alert alert-danger p-1 mt-1">'.$errors[$field].'</div>';
    }

    return '';
}