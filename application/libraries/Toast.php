<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Toast {

    function alert($text, $type){
        if($type=="success"){
            $color = "green";
            $icon = "fa fa-check-circle";
        }else if($type == "alert"){
            $color = "red";
            $icon = "fa fa-times-circle";
        }else{
            $color = "#c8bc00";
            $icon = "fa fa-exclamation-circle";
        }

        $modal = "<script>        
                    window.onload = function() { 
                        const notyf = new Notyf({
                            duration: 6000,
                            position: {
                                x: 'right',
                                y: 'top',
                            },
                            types: [
                                {
                                    type: 'info',
                                    background: '".$color."',
                                    icon: {
                                        className: '".$icon."',
                                        tagName: 'span',
                                        color: '#fff'
                                    },
                                    dismissible: false
                                }
                            ]
                        });
                        notyf.open({
                            type: 'info',
                            message: '".$text."'
                        });
                    }                
                </script>";

        return $modal;
    }
}