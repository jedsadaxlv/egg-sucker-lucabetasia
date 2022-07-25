<?php
$Root = $_SERVER['DOCUMENT_ROOT'];
include_once('config.inc.php');
session_start();
header('Content-Type: text/html; charset=utf-8');
$postdata = $_GET['act'] ?? 0;
if(!$postdata){
?>
<!doctype html>
<html lang="th" class="no-focus">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
    <link href='https://fonts.googleapis.com/css?family=Prompt:400italic,300,400,600,700,800' rel='stylesheet'
        type='text/css' />
    <link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">
    <link rel="stylesheet" href="assets/js/plugins/sweetalert2/sweetalert2.min.css">
    <title>กิจกรรมเปิดไข่ลุ้นรับเครดิตฟรี กับ Lucabetasia</title>
    <link rel="icon" type="image/x-icon"
        href="https://assetservice.b-cdn.net/Logo-Lucabetasia/lucabetasia_logo75x75px.png">
    <meta property="og:description" content="" />
    <meta property="og:image" content="" />
    <style>
    @media(min-width: 769px) {
        body {
            background-position: center;
            background-size: cover;
            background-image: url(https://assetservice.b-cdn.net/Project-mini-game-888/BG_V2.jpg);
            background-repeat: no-repeat;
        }
    }

    @media(max-width: 768px) {
        body {
            background-size: cover;
            background-image: url(https://assetservice.b-cdn.net/Project-mini-game-888/BG_W800xH1000.jpg);
            background-repeat: no-repeat;
        }
    }

    .logobranner {
        text-align: center;
        padding-top: 20px;
        background: #0000007d;
    }

    .container-sub {
        margin-bottom: 200px;
    }

    @media(max-width: 768px) {
        .container-sub {
            margin-bottom: 250px;
        }
    }

    #main-container {
        background: #0000007d;
    }

    .h-grow {
        transition: .5s, color .10s;
    }

    .h-grow:hover {
        transform: scale3d(1.05, 1.05, 0.09);
    }

    .object {
        -webkit-animation: action 1.5s infinite alternate;
        animation: action 1.5s infinite alternate;
    }

    @-webkit-keyframes action {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-5px);
        }
    }

    @keyframes action {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-5px);
        }
    }
    </style>
</head>

<body>
    <div id="page-container" class="main-content-boxed">
        <div class="col logobranner">
            <div class="object">
                <img src="https://central--management.s3.ap-southeast-1.amazonaws.com/lucabetasiaundefined/1625261534452"
                    style="width:350px; height:75px;" alt="">
            </div>
        </div>
        <main id="main-container" class=" d-flex align-items-center justify-content-center">
            <div class="row justify-content-center container-sub">
                <div class="col-12">
                    <div class="py-30 px-5 text-center">
                        <h1 class="h2 font-w700 mb-10 text-white">เข้าสู่ระบบสมาชิก</h1>
                    </div>
                </div>
                <div class="col-12">
                    <form class="js-validation-signin px-30" action="login.php?act=1" method="post">
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="form-group floating text-white">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control px-2" id="username" name="username"
                                        autocomplete="off">

                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="form-group floating text-white">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control px-2" id="password" name="password">

                                </div>
                            </div>
                        </div>
                        <div class="form-group row gutters-tiny">
                            <div class="col-12 col-md-6 mb-10">
                                <button type="submit"
                                    class="btn btn-block btn-hero btn-noborder btn-rounded btn-alt-success h-grow">
                                    <i class="si si-login mr-10"></i> เข้าสู่ระบบ
                                </button>
                            </div>
                            <div class="col-12 col-md-6 mb-10">
                                <a href="https://lucabetasia.co"
                                    class="btn btn-block btn-hero btn-noborder btn-rounded btn-alt-success h-grow">
                                    <i class="fa fa-tv mr-10"></i> เข้าสู่เว็บไซต์
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
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
    <script type="text/javascript">
    let toast = Swal.mixin({
        buttonsStyling: false,
        customClass: {
            confirmButton: 'btn btn-alt-success m-5',
            cancelButton: 'btn btn-alt-danger m-5',
            input: 'form-control'
        }
    });
    var OpAuthSignIn = function() {
        var initValidationSignIn = function() {
            jQuery('.js-validation-signin').validate({
                errorClass: 'invalid-feedback animated fadeInDown',
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    jQuery(e).parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    jQuery(e).closest('.form-group').removeClass('is-invalid').addClass(
                        'is-invalid');
                },
                success: function(e) {
                    jQuery(e).closest('.form-group').removeClass('is-invalid');
                    jQuery(e).remove();
                },
                rules: {
                    'username': {
                        required: true,
                        minlength: 4,
                        maxlength: 16
                    },
                    'password': {
                        required: true,
                        minlength: 4,
                        maxlength: 16
                    }
                },
                messages: {
                    'username': {
                        required: 'กรุณาระบุ Username',
                        minlength: 'Username ต้องมีอักษรอย่างน้อย 4 ตัวอักษร'
                    },
                    'password': {
                        required: 'กรุณาระบุรหัสผ่าน',
                        minlength: 'Password ต้องมีอักษรอย่างน้อย 4 ตัวอักษร'
                    }
                },
                submitHandler: function(form) {
                    var btn = $('.js-validation-signin button:submit');
                    //btn.button('loading');
                    btn.attr("disabled", "disabled");
                    var req = $.post('login.php?act=1', $('.js-validation-signin').serialize(), 0,
                        "json");
                    req.fail(function() {
                        toast.fire('แจ้งเตือน',
                            "เกิดปัญหาการเชื่อมต่อไปยังเซิร์ฟเวอร์ กรุณาตรวจสอบการเชื่อมต่ออินเตอร์เน็ต",
                            'error');
                    });
                    req.always(function() {});
                    req.done(function(data) {
                        if (data.status == "15") {
                            if (document.all && !document.querySelector) {} else {
                                sessionStorage.removeItem("password");
                            }
                            if (GetSecretkey.init()) {
                                btn.removeAttr("disabled");
                            }
                        } else if (data.status == "3" || data.status == "4" || data
                            .status == "2" || data.status == "1") {
                            toast.fire('แจ้งเตือน', data.msg, 'error');
                            btn.removeAttr("disabled");
                        } else if (data.status == "0") {
                            document.location = "index.php";
                        }
                    });
                }
            });
        };

        return {
            init: function() {
                initValidationSignIn();
            }
        };
    }();
    jQuery(function() {
        OpAuthSignIn.init();
    });
    </script>
</body>

</html>
<?php }else{
	if($postdata == 1){
		$username = $_POST['username'] ?? null;
		$password = $_POST['password'] ?? null;
		$playerauth_api = json_validate(playerauth_api($playerauth_api_url,$username,$password,$brands_id));
		$status = $playerauth_api->status ?? null;
		if($status == "2"){
			echo json_encode(array("status" => "1", "msg" => "[api json error] ".$playerauth_api->msg));
			exit;
		}
		$code = $playerauth_api->code ?? null;
		if(!empty($code)){
			echo json_encode(array("status" => "1", "msg" => $playerauth_api->message));
			exit;
		}
		$codeEXP = $playerauth_api->codeEXP ?? null;
		if($codeEXP == "001"){
			$accesstoken = $playerauth_api->accessToken ?? null;
			if(empty($accesstoken)){
				echo json_encode(array("status" => "1", "msg" => "[api connect error] accessToken is not found"));
				exit;
			}else{
				$_SESSION["accessToken"] = $accesstoken;
				$checkuser_api = json_validate(checkuser_api($checkuser_api_url,$username,$_SESSION["accessToken"]));
				$status = $checkuser_api->status ?? null;
				if($status == "2"){
					echo json_encode(array("status" => "1", "msg" => "[api json error] ".$checkuser_api->msg));
					exit;
				}
				$playerGame = $checkuser_api->playerGame ?? null;
				if(empty($playerGame)){
					echo json_encode(array("status" => "1", "msg" => "[api connect error] playerGame is not found"));
					exit;
				}else if($playerGame == "empty"){
					echo json_encode(array("status" => "1", "msg" => "[api connect error] playerGame is empty"));
					exit;
				}else{
					$_SESSION["playerGame"] = $playerGame;
					$_SESSION["username"] = $username;
					echo json_encode(array("status" => "0", "msg" => "SUCCESS"));
				}
			}
		}else{
			echo "[api connect error] codeEXP is unknown";
			exit;
		}
	}else if($postdata == 2){
		unset($_SESSION["accessToken"]);
		unset($_SESSION["playerGame"]);
		unset($_SESSION["username"]);
		echo json_encode(array("status" => "0", "msg" => "SUCCESS"));
	}
} ?>