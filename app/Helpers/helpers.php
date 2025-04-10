<?php

function whitespace($var){

    return trim($var) == "";
}

function me(){
    return auth()->user();
}


