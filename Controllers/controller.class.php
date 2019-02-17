<?php
class Controller{
    private $model;

    /**
     * __construct
     *
     * @param  mixed $model
     *
     * @return void
     */
    public function __construct($model) {
        $this->model = $model;
    }

    /**
     * draft
     *
     * @return void
     */
    public function draft(){
        if (isset($_POST['suit_to_select']) && !empty($_POST['suit_to_select'])) {
            $this->model->suit_selected = $_POST['suit_to_select'];
        }

        if (isset($_POST['card_to_select']) && !empty($_POST['card_to_select'])) {
            $this->model->card_selected = $_POST['card_to_select'];
        }

        if( isset($this->model->card_selected) && isset($this->model->suit_selected) ){
            $this->model->card_suit_selected = $this->model->card_selected."|".$this->model->suit_selected;
        }

        if (isset($_POST['cards_appeared']) && !empty($_POST['cards_appeared'])) {
            $this->model->cards_appeared = $_POST['cards_appeared'];
        }

        $this->model->draftCards();
       
    }

    public function win(){
        if($this->model->win){
            header("Location: win.php?p=".$this->model->probability_suit_card);
            die();
        }
    }
}