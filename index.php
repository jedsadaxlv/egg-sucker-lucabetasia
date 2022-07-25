<?php
$Root = $_SERVER['DOCUMENT_ROOT'];
include_once('config.inc.php');
include_once('class.mysql.pdo.php');
session_start();
header('Content-Type: text/html; charset=utf-8');
$eventname = 'เปิดไข่ลุ้นโชค';

$headname='<span class="badge badge-warning">กิจกรรม</span> '.$eventname;
$headnametxt='"Lucabetasia" '.$eventname;

$debugmode = 0;
$maxeggcount = 1;

$startdate = '2021-10-01 00:00:00';		//เริ่มกิจกรรม
$eventendtime = '2030-10-31 23:59:59';		//สิ้นสุดกิจกรรม
$recvendtime = '2080-01-01 23:59:59';		//กดรับก่อนวันที่
$img_banner = 'event_202103_506.jpg';

$ItemPicUrl = "https://central--management.s3.ap-southeast-1.amazonaws.com/lucabetasiaundefined/1625261534452";

$accessToken = $_SESSION["accessToken"] ?? null;
$playerGame = $_SESSION["playerGame"] ?? null;
$username = $_SESSION["username"] ?? null;

if(strtotime("now") <= strtotime($recvendtime) && strtotime("now") >= strtotime($startdate)){
$getitem = $_GET['getitem'] ?? 0;
if(!$getitem){
	if(empty($accessToken) || empty($playerGame)){
		header("Location: login.php");
		exit;
	}else{
		$db = new PDO_MySQLConnect($db_user, $db_pwd, $AUwebservice_db, $db_host, 2);
?>
<!doctype html>
<html lang="th" class="no-focus">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>กิจกรรมเปิดไข่ลุ้นรับเครดิตฟรี กับ Lucabetasia</title>
    <link rel="icon" type="image/x-icon"
        href="https://assetservice.b-cdn.net/Logo-Lucabetasia/lucabetasia_logo75x75px.png">
    <meta property="og:description" content="" />
    <meta property="og:image" content="" />
    <link href='https://fonts.googleapis.com/css?family=Prompt:400italic,300,400,600,700,800' rel='stylesheet'
        type='text/css' />
    <link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">
    <link rel="stylesheet" href="assets/js/plugins/sweetalert2/sweetalert2.min.css">
    <style type="text/css">
    .block.block-themed>.block-header {
        border-bottom: none;
        color: #fff;
        background: #fe2d2d;
    }

    .btn-info-check {
        color: #fff;
        background-color: #fe2d2d;
        border-color: #fe2d2d;
    }

    .object {
        -webkit-animation: action 1.5s infinite  alternate;
        animation: action 1.5s infinite  alternate;
    }
    @-webkit-keyframes action {
        0% { transform: translateY(0); }
        100% { transform: translateY(-5px); }
    }
    @keyframes action {
        0% { transform: translateY(0); }
        100% { transform: translateY(-5px); }
    }

    .h-grow {
        transition: .5s, color .10s;
    }

    .h-grow:hover {
        transform: scale3d(1.05, 1.05, 0.09);
    }

    .bg-sec-main {
        background: url('https://assetservice.b-cdn.net/Project-mini-game-888/BG.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        padding-bottom: 2px
            /* background: rgb(0, 0, 0);
        background: linear-gradient(90deg, rgba(0, 0, 0, 1) 0%, rgba(167, 12, 27, 1) 50%, rgba(0, 0, 0, 1) 100%); */
    }

    @media only screen and (max-width: 768px) {
        .bg-sec-main {
            background: url('https://assetservice.b-cdn.net/Project-mini-game-888/BG.jpg');
            background-repeat: no-repeat;
            background-size: auto;
            padding-bottom: 5px
        }
    }

    .pdx {
        padding: 40px 10px 30px 10px;
    }

    @media only screen and (max-width: 768px) {
        .pdx {
            padding: 10px 5px 10px 5px;
        }
    }

    .branner {
        width: 100%;
        height: auto;
        padding: 0;
        margin: 0 auto;
        text-align: center;
    }

    .branner img {
        width: 250px;
        height: auto;
        margin: 0 auto;
    }

    @media only screen and (max-width: 768px) {
        .branner {
            width: 100%;
            height: auto;
            padding: 0;
            margin: 0 auto;
            text-align: center;
        }

        .branner img {
            width: 250px;
            height: auto;
            margin: 0 auto;
        }
    }

    .contain-sm {
        max-width: 1920px;
        margin-left: auto;
        margin-right: auto;
    }

    .parallax-background {
        width: 100%;
        background: #000;
    }

    .parallax-background img.bg {
        width: 100%;
        height: auto;
    }

    .parallax-background.parallax-active .filter {
        background: rgba(0, 0, 0, 0) linear-gradient(to top, #000 40%, rgba(255, 255, 255, 0) 70%) repeat scroll 0 0 / 100% 100%;
        content: "";
        display: block;
        height: 100%;
        left: 0;
        opacity: 1;
        position: absolute;
        top: 0;
        width: 100%;
        z-index: 4;
    }

    @media (max-width: 491px) {
        .parallax-background.parallax-active .filter {
            background: rgba(0, 0, 0, 0) linear-gradient(to top, #000 55%, rgba(255, 255, 255, 0) 70%) repeat scroll 0 0 / 100% 100%;
        }
    }

    .stick-top-left,
    .stick-bottom-left,
    .stick-top-left-right,
    .stick-bottom-left-right {
        left: 0;
    }

    .stick-bottom-left,
    .stick-bottom-right,
    .stick-bottom-left-right {
        position: absolute;
        bottom: 0;
    }

    .text-shadow {
        text-shadow: 0 1px 2px #000000;
    }

    .opacity-50 {
        opacity: 0.5;
        filter: alpha(opacity=50);
    }

    dd,
    dt,
    pre {
        line-height: 1.846153846;
    }

    .modal-dialog .imgchar {
        top: -27px;
        height: 83px;
        width: 110px;
        position: absolute;
    }

    .modal-dialog .char1 {
        background: url(assets/img/img_char1.png) left top no-repeat;
    }

    .modal-dialog .char2 {
        background: url(assets/img/img_char2.png) left top no-repeat;
    }

    .modal-dialog .char3 {
        background: url(assets/img/img_char3.png) left top no-repeat;
    }

    .modal-dialog .char4 {
        background: url(assets/img/img_char4.png) left top no-repeat;
    }

    .glass_deco {
        width: 678px;
        height: 135px;
        position: relative;
        left: 50%;
        transform: translateX(-50%);
        margin-top: 150px;
    }

    .egg_content1 {
        width: 450px !important;
        height: 40px !important;
        margin-top: 0 !important;
        margin-right: auto !important;
        margin-bottom: 0 !important;
        margin-left: auto !important;
        padding-left: 40px !important;
        display: flex !important;
    }

    @media only screen and (max-width: 768px) {
        .egg_content1 {
            width: 450px !important;
            height: 40px !important;
            margin-top: 0 !important;
            margin-right: auto !important;
            margin-bottom: 0 !important;
            margin-left: auto !important;
            padding-left: 8px !important;
            display: flex !important;
        }
    }

    .egg_content2 {
        width: 450px !important;
        height: 40px !important;
        margin-top: 0 !important;
        margin-right: auto !important;
        margin-bottom: 0 !important;
        margin-left: auto !important;
        padding-left: 40px !important;
        display: flex !important;
    }

    @media only screen and (max-width: 768px) {
        .egg_content2 {
            width: 450px !important;
            height: 40px !important;
            margin-top: 0 !important;
            margin-right: auto !important;
            margin-bottom: 0 !important;
            margin-left: auto !important;
            padding-left: 1px !important;
            display: flex !important;
        }
    }

    .close1 {
        -webkit-transform-origin: 100% 75%;
        -moz-transform-origin: 100% 80%;
        -ms-transform-origin: 100% 75%;
        -o-transform-origin: 100% 75%;
        transform-origin: 100% 75%;
        -webkit-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
        -webkit-transition: all 0.8s ease-out;
        -moz-transition: all 0.8s ease-out;
        -ms-transition: all 0.8s ease-out;
        -o-transition: all 0.8s ease-out;
        transition: all 0.8s ease-out;
    }

    .close2 {
        -webkit-transform-origin: 100% 86%;
        -moz-transform-origin: 100% 86%;
        -ms-transform-origin: 100% 86%;
        -o-transform-origin: 100% 86%;
        transform-origin: 100% 86%;

        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
        -webkit-transition: all 0.8s ease-out;
        transition: all 0.8s ease-out;
    }

    .openegg {
        -webkit-transform: rotate(35deg);
        -moz-transform: rotate(35deg);
        -ms-transform: rotate(35deg);
        -o-transform: rotate(35deg);
        transform: rotate(35deg);
        -webkit-transition: all 0.8s ease-out;
        -moz-transition: all 0.8s ease-out;
        -ms-transition: all 0.8s ease-out;
        -o-transition: all 0.8s ease-out;
        transition: all 0.8s ease-out;
    }

    .rung_over {
        -webkit-transform-origin: 50% 90%;
        -moz-transform-origin: 50% 90%;
        -ms-transform-origin: 50% 90%;
        transform-origin: 50% 90%;
        -webkit-animation: shake 1.2s 0.2s infinite alternate cubic-bezier(0.455, 0.03, 0.515, 0.955);
        -moz-animation: shake 1.2s 0.2s infinite alternate cubic-bezier(0.455, 0.03, 0.515, 0.955);
        -ms-animation: shake 1.2s 0.2s infinite alternate cubic-bezier(0.455, 0.03, 0.515, 0.955);
        animation: shake 1.2s 0.2s infinite alternate cubic-bezier(0.455, 0.03, 0.515, 0.955);
    }

    @-webkit-keyframes shake {
        0% {
            -webkit-transform: rotate(0deg);
        }

        10% {
            -webkit-transform: rotate(-2deg);
        }

        20% {
            -webkit-transform: rotate(4deg);
        }

        30% {
            -webkit-transform: rotate(0deg);
        }

        40% {
            -webkit-transform: rotate(4deg);
        }

        50% {
            -webkit-transform: rotate(-2deg);
        }

        60% {
            -webkit-transform: rotate(0deg);
        }

        70% {
            -webkit-transform: rotate(-2deg);
        }

        80% {
            -webkit-transform: rotate(4deg);
        }

        90% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(-2deg);
        }
    }

    @-moz-keyframes shake {
        0% {
            -moz-transform: rotate(0deg);
        }

        10% {
            -moz-transform: rotate(-2deg);
        }

        20% {
            -moz-transform: rotate(4deg);
        }

        30% {
            -moz-transform: rotate(0deg);
        }

        40% {
            -moz-transform: rotate(4deg);
        }

        50% {
            -moz-transform: rotate(-2deg);
        }

        60% {
            -moz-transform: rotate(0deg);
        }

        70% {
            -moz-transform: rotate(-2deg);
        }

        80% {
            -moz-transform: rotate(4deg);
        }

        90% {
            -moz-transform: rotate(0deg);
        }

        100% {
            -moz-transform: rotate(-2deg);
        }
    }

    @-ms-keyframes shake {
        0% {
            -ms-transform: rotate(0deg);
        }

        10% {
            -ms-transform: rotate(-2deg);
        }

        20% {
            -ms-transform: rotate(4deg);
        }

        30% {
            -ms-transform: rotate(0deg);
        }

        40% {
            -ms-transform: rotate(4deg);
        }

        50% {
            -ms-transform: rotate(-2deg);
        }

        60% {
            -ms-transform: rotate(0deg);
        }

        70% {
            -ms-transform: rotate(-2deg);
        }

        80% {
            -ms-transform: rotate(4deg);
        }

        90% {
            -ms-transform: rotate(0deg);
        }

        100% {
            -ms-transform: rotate(-2deg);
        }
    }

    @keyframes shake {
        0% {
            transform: rotate(0deg);
        }

        10% {
            transform: rotate(-2deg);
        }

        20% {
            transform: rotate(4deg);
        }

        30% {
            transform: rotate(0deg);
        }

        40% {
            transform: rotate(4deg);
        }

        50% {
            transform: rotate(-2deg);
        }

        60% {
            transform: rotate(0deg);
        }

        70% {
            transform: rotate(-2deg);
        }

        80% {
            transform: rotate(4deg);
        }

        90% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(-2deg);
        }
    }

    .img-responsive {
        display: block;
        max-width: 100%;
        height: auto;
    }

    .item_inner {
        display: table;
        position: relative;
        margin: 0 auto;
        width: 150px;
        height: 182px;
        padding: 25px 0px 0px 0px;
    }

    .item_inner img {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        margin-bottom: 6px;
        padding: 40px;
        border: 4px solid #fe2d2d;
        background-color: #ffffff;
    }
    </style>
    <!--[if IE 9]>
    <link href="assets/css/bootstrap-ie9.min.css" rel="stylesheet">
<![endif]-->
    <!--[if lte IE 8]>
	<script src="assets/js/core/html5shiv@3.7.3.js"></script>
	<script src="assets/js/core/respond.min.js"></script>
    <link href="assets/css/bootstrap-ie8.min.css" rel="stylesheet">
<![endif]-->
</head>

<body>
    <div id="page-container" class="main-content-boxed">
        <div class="modal fade" id="ModalInfo" tabindex="-1" role="dialog" aria-labelledby="formModalLabel">
        </div>
        <div class="modal fade" id="ModalRecvList" tabindex="-1" role="dialog" aria-labelledby="formModalLabel">
        </div>
        <main id="main-container">
            <div class="bg-body-dark bg-pattern"
                style="background-image: url('assets/img/various/bg-pattern-inverse.png');">
                <div class="row mx-0 justify-content-center" style="display:block">
                    <div class="col-12 contain-sm p-0">
                        <div class="content-full overflow-hidden">
                            <div class="row">
                                <div class="col-12">
                                    <div class="block-content block-themed block-shadow bg-sec-main text-center">
                                        <div class="col logobranner object">
                                            <img src="https://central--management.s3.ap-southeast-1.amazonaws.com/lucabetasiaundefined/1625261534452"
                                                style="width:350px; height:75px;" alt="">
                                        </div>
                                        <h3 class="text-white">เลือกไข่นำโชค</h3>
                                        <div class="egg_content1">
                                            <div class="row">
                                                <div onClick="javascript:GetReward(1,this);"
                                                    style="background: url('https://assetservice.b-cdn.net/Project-mini-game-888/eggbtm_1.png') no-repeat bottom center; width: 183px; height: 240px; margin: 0 10px; cursor: pointer; float: left;"
                                                    class="rung" id="eggContainer1">
                                                    <div class="close1" id="egg1">
                                                        <img src="https://assetservice.b-cdn.net/Project-mini-game-888/egg_1.png"
                                                            width="181">
                                                    </div>
                                                </div>
                                            </div>
                                            <div onClick="javascript:GetReward(2,this);"
                                                style="background: url('https://assetservice.b-cdn.net/Project-mini-game-888/eggbtm_2.png') no-repeat bottom center; width: 191px; height: 246px; margin: 0 10px; cursor: pointer; float: left"
                                                class="rung" id="eggContainer2">
                                                <div class="close2" id="egg2">
                                                    <img src="https://assetservice.b-cdn.net/Project-mini-game-888/egg_2.png"
                                                        width="191">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="glass_deco"
                                            style="background: url('https://assetservice.b-cdn.net/Project-mini-game-888/glassdeco2.png') center no-repeat;">
                                        </div>

                                        <div class="egg_content2">
                                            <div class="row">
                                                <div onClick="javascript:GetReward(3,this);"
                                                    style="background: url('https://assetservice.b-cdn.net/Project-mini-game-888/eggbtm_1.png') no-repeat bottom center; width: 183px; height: 240px; margin: 0 10px; cursor: pointer; float: left;"
                                                    class="rung" id="eggContainer3">
                                                    <div class="close1" id="egg3">
                                                        <img src="https://assetservice.b-cdn.net/Project-mini-game-888/egg_1.png"
                                                            width="181">
                                                    </div>
                                                </div>
                                                <div onClick="javascript:GetReward(4,this);"
                                                    style="background: url('https://assetservice.b-cdn.net/Project-mini-game-888/eggbtm_2.png') no-repeat bottom center; width: 191px; height: 246px; margin: 0 10px; cursor: pointer; float: left"
                                                    class="rung" id="eggContainer4">
                                                    <div class="close2" id="egg4">
                                                        <img src="https://assetservice.b-cdn.net/Project-mini-game-888/egg_2.png"
                                                            width="191">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="glass_deco"
                                            style="background: url('https://assetservice.b-cdn.net/Project-mini-game-888/glassdeco.png') center no-repeat;">
                                        </div>
                                        <div class="row justify-content-center"
                                            style="background:#000000b0; margin-top: 58px;">
                                            <div class="col-12 col-md-2">
                                                <div class="block-content text-white">
                                                    <button type="button" onclick="RecvList(this)"
                                                        class="btn btn-lg btn-danger h-grow btn-block">รายการของรางวัลที่ได้รับ</button>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-2">
                                                <div class="block-content text-white pb-20">
                                                    <button type="button" onclick="doLogout()"
                                                        class="btn btn-lg btn-danger h-grow btn-block">log out</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Blog and Sidebar -->
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->
    </div>
    <!--[if gte IE 9]><!-->
    <script src="assets/js/core/jquery.min.js"></script>
    <script src="assets/js/core/bootstrap.bundle.min.js"></script>
    <!--<![endif]-->
    <!--[if IE 9]>
    <script src="assets/js/core/bootstrap-ie9.min.js"></script>
  <![endif]-->
    <!--[if lte IE 8]>
    <script src="assets/js/core/jquery-1.12.4.min.js"></script>
    <script src="assets/js/core/bootstrap-ie8.min.js"></script>
    <script src="assets/js/core/bootstrap.js"></script>
  <![endif]-->
    <script src="assets/js/plugins/sweetalert2/es6-promise.auto.min.js"></script>
    <script src="assets/js/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="assets/js/core/jquery.scrollLock.min.js"></script>
    <script src="assets/js/core/jquery.appear.min.js"></script>
    <script src="assets/js/codebase.js"></script>
    <script src="event.init.js"></script>
    <script type="text/javascript">
    var redirect = "<?php echo $redirect_url ?? null; ?>";

    function RecvList(btn) {
        $.get('index.php', {
            getitem: "RecvList"
        }, function(data) {
            if (data.status == "1") {
                toast.fire('แจ้งเตือน', data.msg, 'warning');
            } else if (data.status == "0") {
                $("#ModalRecvList").html(data.htmloutput).modal("show");
            }
        }, "json");
    }

    function ShakeEgg(btn) {
        $(btn).addClass('rung_over');
    }

    function StopShakeEgg(btn) {
        $(btn).removeClass('rung_over');
    }

    function openEgg(i) {
        $('#egg' + i).addClass('openegg');
        $('#eggContainer' + i).removeClass('rung_over');
    }

    function closeEgg() {
        $('#egg1').removeClass('openegg');
        $('#egg2').removeClass('openegg');
        $('#egg3').removeClass('openegg');
        $('#egg4').removeClass('openegg');
    }

    function GetReward(i, btn) {
        toast.fire({
            title: 'ยืนยัน',
            text: 'เลือกไข่ใบนี้ใช่หรือไม่?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d26a5c',
            confirmButtonText: 'ยืนยัน',
            html: false,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    setTimeout(function() {
                        resolve();
                    }, 50);
                });
            }
        }).then(function(result) {
            if (result.value) {
                IniGetReward(i, btn);
            }
        });
    }

    function IniGetReward(i, btn) {
        ShakeEgg(btn);
        var timer = setTimeout(function() {
            var req = $.post('index.php?getitem=Y', {
                egg: i
            }, 0, "json");
            req.fail(function() {
                toast.fire('แจ้งเตือน',
                    "เกิดปัญหาการเชื่อมต่อไปยังเซิร์ฟเวอร์ กรุณาตรวจสอบการเชื่อมต่ออินเตอร์เน็ต",
                    'error');
            });
            req.done(function(data) {
                if (["1", "2", "3", "4"].indexOf(data.status) != -1) {
                    toast.fire('แจ้งเตือน', data.msg, 'error');
                } else if (["5", "6", "7", "8", "9", "10", "11", "12", "13", "14"].indexOf(data
                        .status) != -1) {
                    StopShakeEgg(btn);
                    toast.fire('แจ้งเตือน', data.msg, 'warning');
                } else if (data.status == "0") {
                    openEgg(i);
                    $("#ModalInfo").html(data.htmloutput).modal("show");
                }
                clearTimeout(timer);
            });
        }, 2000);
    }
    $('#ModalInfo').on('hidden.bs.modal', function(e) {
        closeEgg();
    });
    $('#eggContainer1').mouseover(function() {
        $('#eggContainer1').addClass('rung_over');
    }).mouseout(function() {
        $('#eggContainer1').removeClass('rung_over');
    });
    $('#eggContainer2').mouseover(function() {
        $('#eggContainer2').addClass('rung_over');
    }).mouseout(function() {
        $('#eggContainer2').removeClass('rung_over');
    });
    $('#eggContainer3').mouseover(function() {
        $('#eggContainer3').addClass('rung_over');
    }).mouseout(function() {
        $('#eggContainer3').removeClass('rung_over');
    });
    $('#eggContainer4').mouseover(function() {
        $('#eggContainer4').addClass('rung_over');
    }).mouseout(function() {
        $('#eggContainer4').removeClass('rung_over');
    });
    </script>
</body>

</html>
<?php }}else if($getitem === "Y"){
if(strtotime("now") <= strtotime($recvendtime) && strtotime("now") >= strtotime($startdate)){
if(empty($playerGame)){
	echo json_encode(array("status" => "1", "msg" => "ยังไม่ได้ Login"));
}else{
	$egg = intval($_POST['egg'] ?? 0);
	$db = new PDO_MySQLConnect($db_user, $db_pwd, $AUwebservice_db, $db_host, 1);
		$receive_api = json_validate(receive_api($receive_api_url,$playerGame,$brands_id,$accessToken));
		$status = $receive_api->status ?? null;
		if($status == "2"){
			echo json_encode(array("status" => "5", "msg" => "[api json error] ".$receive_api->msg));
			exit;
		}
		$code = $receive_api->errors->code ?? null;
		if(!empty($code)){
			if($code == "002"){
				echo json_encode(array("status" => "5", "msg" => $receive_api->message));
				exit;
			}else{
				echo json_encode(array("status" => "5", "msg" => $receive_api->message));
				exit;
			}
		}
		$free_credit = $receive_api->free_credit;
		if(empty($free_credit)){
			echo json_encode(array("status" => "5", "msg" => "[api connect error] free_credit is empty"));
			exit;
		}
		$query = $db->query("INSERT INTO $AUwebservice_db.event_info 
		(`UserName`,`AccountAPI`, `Reward`, `RecvDate`) 
		VALUES 
		(:username, :playerGame, :free_credit, now())
		");
		$db->bind($query, ':username', $username);
		$db->bind($query, ':playerGame', $playerGame);
		$db->bind($query, ':free_credit', $free_credit);
		$db->execute($query);
ob_start();
?>
<div class="modal-dialog modal-dialog-popin">
    <div class="modal-content">
        <div class="block block-themed block-transparent mb-0">
            <div class="block-header bg-gd-pulse">
                <h3 class="block-title text-center font-size-xl">ยินดีด้วย</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                        <i class="si si-close"></i>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div class="item_inner"><span><img class="img-responsive" src="<?php echo $ItemPicUrl; ?>"></span>
                    </div>
                    <div class="font-size-md">ได้รับรางวัล</div>
                    <div class="font-size-md text-info">Free Credit</div>
                    <div class="text-danger font-size-xl">จำนวน <?php echo $free_credit; ?></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal"><i class="fa fa-close"></i>
                    ปิด</button>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<?php
$htmloutput=str_replace("\t","",ob_get_clean());
echo json_encode(array("status" => "0", "msg" => "SUCCESS", "Reward" => $free_credit, "htmloutput" => $htmloutput));
//echo json_encode(array("status" => "0", "_0xba9e" => $postval));
}}else{
echo json_encode(array("status" => "1", "msg" => "หมดเวลากิจกรรมแล้ว ติดตามกิจกรรมใหม่ๆ ได้ในโอกาสต่อไป"));
			}
}else if($getitem === "RecvList"){
	if(empty($playerGame)){
		echo json_encode(array("status" => "1", "msg" => "ยังไม่ได้ Login"));
	}else{
		$db = new PDO_MySQLConnect($db_user, $db_pwd, $AUwebservice_db, $db_host, 1);
		$query = $db->query("SELECT * FROM $AUwebservice_db.`event_info` where AccountAPI = :playerGame order by InfoSN desc limit 20");
		$db->bind($query, ':playerGame', $playerGame);
		$db->execute($query);
		$count = $db->rowCount($query);
	if($count<1){
		echo json_encode(array("status" => "1", "msg" => "ยังไม่พบประวัติ"));
	}else{
	ob_start();
	?>
<div class="modal-dialog modal-dialog-popin">
    <div class="modal-content">
        <div class="block block-themed block-transparent mb-0">
            <div class="block-header bg-gd-pulse">
                <h3 class="block-title text-center font-size-xl"><i class="fa fa-history"></i> ประวัติการรับของรางวัล
                </h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                        <i class="si si-close"></i>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">เครดิตที่ได้รับ</th>
                                <th scope="col">วันที่ได้รับ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($result = $db->fetch($query)){
	$Reward = $result ['Reward'];
	$RecvDate = thai_date_mini($result ['RecvDate']);
	?>
                            <tr>
                                <td><?php echo $Reward; ?>&nbsp; &nbsp;เครดิต</td>
                                <td><?php echo $RecvDate; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal"><i class="fa fa-close"></i>
                    ปิด</button>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<?php
$htmloutput=str_replace("\t","",ob_get_clean());
echo json_encode(array("status" => "0", "htmloutput" => $htmloutput));
	}
	}
}}else{ ?>
<script type="text/javascript">
alert('กิจกรรมได้สิ้นสุดลงแล้ว ติดตามกิจกรรมอื่นๆได้จากหน้าเว็บไซต์');
window.close();
</script>
<?php
} ?>