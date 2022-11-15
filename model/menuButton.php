<?php
    class menuButton {
        public $buttonLink;
        public $buttonPic;
        public $buttonName;

        function showButton(){
            echo $twig->render('parts/menuButton.twig', [
                'buttonLink' => $this->buttonLink,
                'buttonPic' => $this->buttonPic,
                'buttonPic' => $this->buttonName
            ]);
        }
    }
?>