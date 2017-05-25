<?php
	session_destroy();

        include 'Vue/vueDeconnexion.php';

        echo"<script> alert ('Vous avez été déconnecté !');</script>";

?>