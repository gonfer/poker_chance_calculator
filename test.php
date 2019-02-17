<?php

use PHPUnit\Framework\TestCase;

final class pokerTest extends TestCase{

    /**
     * testBuild
     *
     * @return void
     */
    public function testBuild(){

        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST = array('suit_to_select'=>'h',"card_to_select" => 4); 

        require_once("./Controllers/controller.class.php");
        require_once("./Models/model.class.php");
        require_once("./Views/view.class.php");
        
        $model = new Model();
        $controller = new Controller($model);
        $view = new View($controller, $model);
        
        $controller->draft();

        $this->assertNotNull($model->cards_appeared);
        
        $this->assertNotNull($model->card_suit_selected);
        $this->assertEquals("4|h" ,$model->card_suit_selected);

        $this->assertNotNull($model->card_selected);
        $this->assertEquals("4" ,$model->card_selected);
        
        $this->assertNotNull($model->suit_selected);
        $this->assertEquals("h" ,$model->suit_selected);

        $this->assertNotNull($model->cards_left);

        $expected = array(
            0 => '1|h',
            1 => '2|h',
            2 => '3|h',
            3 => '4|h',
            4 => '5|h',
            5 => '6|h',
            6 => '7|h',
            7 => '8|h',
            8 => '9|h',
            9 => '10|h',
            10 => '11|h',
            11 => '12|h',
            12 => '13|h',
            13 => '1|s',
            14 => '2|s',
            15 => '3|s',
            16 => '4|s',
            17 => '5|s',
            18 => '6|s',
            19 => '7|s',
            20 => '8|s',
            21 => '9|s',
            22 => '10|s',
            23 => '11|s',
            24 => '12|s',
            25 => '13|s',
            26 => '1|d',
            27 => '2|d',
            28 => '3|d',
            29 => '4|d',
            30 => '5|d',
            31 => '6|d',
            32 => '7|d',
            33 => '8|d',
            34 => '9|d',
            35 => '10|d',
            36 => '11|d',
            37 => '12|d',
            38 => '13|d',
            39 => '1|c',
            40 => '2|c',
            41 => '3|c',
            42 => '4|c',
            43 => '5|c',
            44 => '6|c',
            45 => '7|c',
            46 => '8|c',
            47 => '9|c',
            48 => '10|c',
            49 => '11|c',
            50 => '12|c',
            51 => '13|c',
        );

        $this->assertEquals($expected ,$model->cards_left);
    
    }
    

}
