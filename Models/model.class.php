<?php 

class Model
{
    public $string;
    public $hearts_id = "h";
    public $spades_id = "s";
    public $diamonds_id = "d";
    public $clubs_id = "c";

    private $suits = array("h","s","d","c");

    public $suit_selected = null;
    public $card_selected = null;
    public $card_suit_selected = null;
    
    public $cards_left = "";

    public $actual_card_drafted = "";

    public $cards_appeared = array();

    //If card matches then win true
    public $win = false;

    public function __construct(){
        //$cards_list = array()
        $this->string = "MVC + PHP = Awesome!";
    }

    public function draftCards(){
        $cards_appeared = explode(";", $this->cards_appeared);

        $cars_list = array();

        foreach( $this->suits as $s_key => $s_value ){

            for( $i = 1; $i <= 13 ; $i++ ){
                $cars_list[] = $i."|".$s_value;
             }

        }

        if(is_array($cards_appeared) && (count($cards_appeared)) ){
            $this->cards_left = array_diff($cars_list, $cards_appeared);
        }else{
            $this->cards_left = $cars_list;
        }
        
        $key_card_drafted = array_rand($this->cards_left);
        $this->actual_card_drafted = $this->cards_left[$key_card_drafted];

        if($this->actual_card_drafted == $this->card_suit_selected){
            $this->win = true;
        }

        $cards_appeared[] = $this->actual_card_drafted;

        $this->cards_appeared = implode(";", $cards_appeared);


    }

    /*
    public function calculateCardsLeft(){
        $cards_left_arr = explode($thi);
        //foreach
    }}*/
}