<?php
    include('constants.php');
    include('connect.php');

    $step = isset($_POST['step']) ? $_POST['step'] : 1;
    $caller = isset($_POST['caller']) ? $_POST['caller'] : false;
    $returnVal = isset($_POST['returnVal']) ? $_POST['returnVal'] : false;

    switch($step){
        case 1:
            $answer = [
                "bfxm" => ["version" => 1],
                "seq" => [
                    [
                        "action" => "play",
                        "args" => ["url" => ".$ngrok$soundWelcome."]
                    ],
                    [
                        "action" => "gather",
                        "args" => [
                            "min_digits" => 1,
                            "max_digits" => 1,
                            "max_attempts" => 3,
                            "ask" => ".$ngrok$soundDecralation.",
                            "play_on_error"  => ".$ngrok$soundWrongKey.",
                            "variable_name" => "returnVal"
                        ]
                    ]

                ]
            ];
            header('Content-Type: application/json');
            echo json_encode($answer);
            break;

        case 2:
            $answer = [
                "bfxm" => ["version" => 1],
                "seq" => [
                    [
                        "action" => "play",
                        "args" => ["url" => ".$ngrok$soundClosing."]
                    ],
                    [
                        "action" => "dial",
                        "args" => ["destination" => 10]
                    ]

                ]
            ];

            header('Content-Type: application/json');
            echo json_encode($answer);

            $connect = new connect($servername, $dbname, $username, $password);
            $connect->insert($caller, $returnVal);
            break;

        default:
            die("Unexpected Error!!");
            break;

    }