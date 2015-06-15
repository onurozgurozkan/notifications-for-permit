<?php
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
                        "args" => ["url" => "http://4541f91d.ngrok.io/odev3/sounds/welcome.mp3"]
                    ],
                    [
                        "action" => "gather",
                        "args" => [
                            "min_digits" => 1,
                            "max_digits" => 1,
                            "max_attempts" => 3,
                            "ask" => "http://4541f91d.ngrok.io/odev3/sounds/decralation_question.mp3",
                            "play_on_error"  => "http://4541f91d.ngrok.io/odev3/sounds/wrong_keying.mp3",
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
                        "args" => ["url" => "http://4541f91d.ngrok.io/odev3/sounds/closing.mp3"]
                    ],
                    [
                        "action" => "dial",
                        "args" => ["destination" => 10]
                    ]

                ]
            ];

            header('Content-Type: application/json');
            echo json_encode($answer);

            $connect = new connect();
            $connect->insert($caller, $returnVal);
            break;

        default:
            die("Unexpected Error!!");
            break;

    }