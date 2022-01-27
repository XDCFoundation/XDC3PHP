<?php


// Configure all paths in single file if User needs sdk just configure this Path in his project file.
include "vendor/autoload.php";
include "src/common/constant.php";
include "src/modules/xrc20/xrc20Sdk.php";
include "src/modules/xrc721/xrc721Sdk.php";
include "src/modules/createXdcWallet/createXdcWallet.php";
include "src/config/env.php";
include "vendor/xdc3base/php/src/Token721.php";
include "vendor/xdc3base/php/src/Token20.php";

//configure .env file for URL
use env\dotEnv;
(new dotEnv(__DIR__ . '/.env'))->load();





?>