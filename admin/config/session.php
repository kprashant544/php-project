<?php
                if(isset($_SESSION['message'])){
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
                if(isset($_SESSION['query-mistake'])){
                    echo $_SESSION['query-mistake'];
                    unset($_SESSION['query-mistake']);
                }
?>
