<?php

function loadModel($modelName){
    //simplify Model loading
    require_once(MODEL_PATH . "/{$modelName}.php");
}

function loadView($viewName, $params = array()){

    if(count($params) > 0){
        foreach($params as $key => $value){
            if(strlen($key) > 0) {
                ${$key} = $value;
            }
        }
    }

    //path load view
    require_once(VIEW_PATH . "/{$viewName}.php");
}