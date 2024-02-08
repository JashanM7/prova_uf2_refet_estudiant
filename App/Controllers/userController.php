<?php 

    class userController extends Controller{
            
            public function login(){
                
                
            }

            public function logout(){

                unset($_SESSION["username_logged"]);
                header("Location: /main/index");
                die();

            }

    }

?>