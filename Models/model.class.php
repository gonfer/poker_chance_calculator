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

    public $cards_appeared = "";

    //If card matches then win true
    public $win = false;

    //Probability of suit and card
    public $probability_suit_card = 0;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(){}

    /**
     * draftCards
     *
     * @return void
     */
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

        $this->calculateProbability();

        $this->actual_card_drafted = $this->cards_left[$key_card_drafted];

        if($this->actual_card_drafted == $this->card_suit_selected){
            $this->win = true;
        }

        $cards_appeared[] = $this->actual_card_drafted;

        $this->cards_appeared = implode(";", $cards_appeared);

    }

    /**
     * calculateProbability
     *
     * @return void
     */
    private function calculateProbability(){
        
        $probability_suit = 1/4;

        $h_count = 0;
        $s_count = 0;
        $c_count = 0;
        $d_count = 0;

        foreach( $this->cards_left as $k_left => $v_left ){
            $card = explode("|", $v_left);
            ${$card[1].'_count'} += 1;
        }

        $probability_card = 1/${$this->suit_selected .'_count'};
        
        $this->probability_suit_card = $probability_suit * $probability_card;
        
    }

}