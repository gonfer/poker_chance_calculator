<?php

class View
{
    private $model;
    private $controller;

    /**
     * __construct
     *
     * @param  mixed $controller
     * @param  mixed $model
     *
     * @return void
     */
    public function __construct($controller,$model) {
        $this->controller = $controller;
        $this->model = $model;
    }
	
    /**
     * output
     *
     * @return void
     */
    public function output(){
        $output = $this->outputHeader();

        if( !is_null($this->model->suit_selected) && !is_null($this->model->card_selected) ){
            $output .= $this->outputBodyNext();
        }else{
            $output .= $this->outputBodyStart();
        }
        
        $output .= $this->outputFooter();
        return $output;
    }

    /**
     * outputHeader
     *
     * @return void
     */
    private function outputHeader(){
        $output = "<html><head></head>";
        return $output;
    }

    /**
     * outputBodyStart
     *
     * @return void
     */
    private function outputBodyStart(){
        $output = "<body>";
        $output .= "<h1>Poker Chance Calculator</h1>";
        $output .= "<div><img src='/assets/img/cards.PNG'></div><br>";

        $output .= "<form method='post'>";
        $suit_options = array( $this->model->hearts_id => "Hearts", $this->model->spades_id => "Spades", $this->model->diamonds_id => "Diamonds", $this->model->clubs_id => "Clubs");
        $option = "";
        foreach( $suit_options as $suit_k => $suit_v){
            $option .= "<option value='$suit_k'>$suit_v</option>";
        }

        $output .= "<label for='suit_to_select'>Suit:</label><select id='suit_to_select' name='suit_to_select'><option value='Please Select...'>Select</option>$option</select>";

        $option = "";
        for( $i = 1; $i <= 13 ; $i++ ){
           $option .= "<option value='$i'>$i</option>";
        }

        $output .= "<label for='card_to_select'>Card:</label><select id='card_to_select' name='card_to_select'><option value='Please Select...'>Select</option>$option</select>";
        $output .= "<input type='submit' value='Draft'></form>";
        $output .= "</body>";
        return $output;
    }

    /**
     * outputBodyNext
     *
     * @return void
     */
    private function outputBodyNext(){
        $output = "<body>";
        $output .= "<h1>Poker Chance Calculator</h1>";
        $output .= "<div><img src='/assets/img/cards.PNG'></div><br>";
        $output .= "Suit: ".$this->model->suit_selected." Card: ".$this->model->card_selected;
        $output .= "<form method='post'>";
        $output .= "<input type='hidden' id='suit_to_select' name='suit_to_select' value='".$this->model->suit_selected."'>";
        $output .= "<input type='hidden' id='card_to_select' name='card_to_select' value='".$this->model->card_selected."'>";
        $output .= "<input type='text' id='cards_appeared' name='cards_appeared' value='".$this->model->cards_appeared."'>";
        $output .= "<input type='submit' value='Draft Again'></form>";
        $output .= "Probability: ".$this->model->probability_suit_card."<br>";
        $output .= "Cards Left: ".print_r($this->model->cards_left, true);
        $output .= "</body>";
        return $output;
    }

    /**
     * outputFooter
     *
     * @return void
     */
    private function outputFooter(){
        $output = "</html>";
        return $output;
    }
}