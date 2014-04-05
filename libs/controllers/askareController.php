<?php

require_once '../libs/common.php';
require_once '../libs/models/Askare.php';
$askareet = Askare::etsiKaikkiAskareet();

    naytaNakyma('../views/askarelistaus.php', array(
        'askareet' => $askareet
    ));

