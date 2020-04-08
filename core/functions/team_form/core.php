<?php
//kaip galetu atrodyti jau irasytas masyvas, success atveju


//jei forma atitinka visas reikiamas validacijas nauja komanda isiraso i
//faila app/data/teams.json
//faile saugosim daug komandu. todėl naujos komandos irasymas
//negali ! panaikinti jau esanciu ++?

function team_form_success($form, $safe_input){
    if(in_array($safe_input['Raganosiai'], $form)){

    }
}

define ('DB_TEAMS_FILE', 'app/data/teams.json');


//patikrinti ar tokiu pavadinimu komanda jau nera registruota
function validate_team(){

}