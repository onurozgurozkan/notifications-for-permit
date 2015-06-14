<?php
    include('connect.php');

    $step = isset($_POST['step']) ? $_POST['step'] : 1;
    $caller = isset($_POST['caller']) ? $_POST['caller'] : false;
    $returnVal = isset($_POST['returnVal']) ? $_POST['returnVal'] : false;

    switch($step){
        case 1:
            $cevap = [
                "bfxm" => ["version" => 1],
                "seq" => [
                    [
                        "action" => "play",
                        "args" => ["url" => "http://6e419855.ngrok.io/odev3/karsilama.mp3"]
                    ],
                    [
                        "action" => "gather",
                        "args" => [
                            "min_digits" => 1,
                            "max_digits" => 1,
                            "max_attempts" => 3,
                            "ask" => "http://6e419855.ngrok.io/odev3/bildirim_sorusu.mp3",
                            "play_on_error"  => "http://6e419855.ngrok.io/odev3/hatali_tuslama.mp3",
                            "variable_name" => "returnVal"
                        ]
                    ]

                ]
            ];
            header('Content-Type: application/json');
            echo json_encode($cevap);
            break;
        case 2:
            $cevap = [
                "bfxm" => ["version" => 1],
                "seq" => [
                    [
                        "action" => "gather",
                        "args" => [
                            "url" => "http://6e419855.ngrok.io/odev3/kapanis.mp3"
                        ]
                    ],
                    [
                        "action" => "hangup"
                    ]
                ]
            ];
            header('Content-Type: application/json');
            echo json_encode($cevap);

            $connect = new connect();
            $connect->insert($caller, $returnVal);
            break;
        default:
            die("Uygulamadan Sonlandi");
            break;

    }



    /*$blacklist = array("905342663556");

    if(isset($_POST['caller'])){
        $caller = $_POST['caller'];

        if(in_array($caller,$blacklist)){
            $ret_val = array(
                "bfxm" => array("version" => 1),
                "seq" => array(
                    array(
                        "action" => "reject"
                    )
                )
            );
        }else {
            $ret_val = array(
                "bfxm" => array("version"=>1),
                "seq" => array(
                    array(
                        "action" => "dial",
                        "args" => array("destination"=> 10)
                    )
                )
            );
        }

        header('Content-Type: application/json');
        die(json_encode($ret_val));
    }*/