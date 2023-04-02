<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <title>KemenkeuID</title>
    <link rel="icon" type="image/x-icon" href="https://sso.kemenkeu.go.id//v2-assets/assets/imgs/favicon.ico" />
    <link rel="shortcut icon" type="image/x-icon" href="https://sso.kemenkeu.go.id//v2-assets/assets/imgs/favicon.ico" />
    <link rel="stylesheet" href="https://sso.kemenkeu.go.id//v2-assets/lib/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://sso.kemenkeu.go.id//v2-assets/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://sso.kemenkeu.go.id//v2-assets/css/site.css" />
    <link rel="stylesheet" type="text/css" href="https://sso.kemenkeu.go.id//v2-assets/css/customMain.css">
    <link rel="stylesheet" type="text/css" href="https://sso.kemenkeu.go.id//v2-assets/assets/vendors/jqueryui/jquery-ui.css">
</head>
<body class="bg-color">
    <div class="bg-image">
            <nav class="navbar hidden-xs hidden-sm hidden-md">
                <div class="container-fluid">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="https://www.kemenkeu.go.id" class="black" target="_blank">Portal Kemenkeu</a></li>
                        <li><a href="https://servicedesk.kemenkeu.go.id" class="black" target="_blank">ServiceDesk</a></li>
                        <li><a href="https://hai.kemenkeu.go.id" class="black" target="_blank">Hai Kemenkeu</a></li>
                        <li><a href="mailto:pengaduan.itjen@kemenkeu.go.id" class="black" target="_blank">Pengaduan Inspektorat Jenderal</a></li>
                        <li><a href="https://www.wise.kemenkeu.go.id" class="black" target="_blank">Wise Kemenkeu</a></li>
                    </ul>
                </div>
            </nav>
        <div class="container-fluid body-content">
            



<div class="welcome-page">

    <div class="row">
        <div class="col-lg-8 hidden-xs hidden-sm hidden-md index-panel" align="center" style="background-color: unset;">
        </div>

        <div class="col-lg-4">
            <div class="col-lg-12 fadeIn">
                



<div class="container-login100">
    <div class="wrap-login100">


        <form method = "POST" class="login100-form validate-form" >
            <img class="imgicon" src="https://sso.kemenkeu.go.id//v2-assets/assets/imgs/kemenkeuid.png">
            <input type="hidden" id="ReturnUrl" name="ReturnUrl" value="/connect/authorize/callback?client_id=new-nadine-satu&amp;redirect_uri=https%3A%2F%2Fsatu.kemenkeu.go.id&amp;response_type=code&amp;scope=openid%20profile%20frontend.nadine%20organisasi.hris%20profil.hris%20jabatan.hris%20pegawai.ekemenkeu%20agenda.ekemenkeu%20agenda.ekemenkeu%20notification.ekemenkeu%20kehumasan&amp;nonce=083f07bf4232fa9287727840e291545262feYe2Yg&amp;state=d4266d4e197fc0c90e8295bdc76704f093QI0QCNA&amp;code_challenge=5JTdjNzy4A-oAuk60KliaK31UwPXNmz4kEiK1Ni2rDQ&amp;code_challenge_method=S256" />
            <fieldset>
                <div class="container-dataprofil">
                    <div class="gambar">
                        <p style="font-size:12px">KemenkeuID adalah akun tunggal digital <br />(<i>Single Identity Login</i>) Anda di Kementerian Keuangan.</p>
                        <p style="font-size:10px"> Gunakan secara bijak dan <b>JANGAN</b> bagi pakai akun Anda kepada orang lain.</p>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="nip" placeholder="Enter NIP"  name="nip" value="langsung klik">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="password" placeholder="Enter Password" name="password" value="login aja">
                </div>

                <!-- <div class="g-recaptcha" data-sitekey="6LcXwJYUAAAAAAJS7MOIfoqPeFP-OuckuPJlBoB8"></div>  -->
                <div class="flex-sb-m w-full p-t-3 p-b-32">
                    <div class="form-group">
                        <center>
                            <a href="https://sso.kemenkeu.go.id//NewAccount/ForgotPassword?ReturnUrl=%2Fconnect%2Fauthorize%2Fcallback%3Fclient_id%3Dnew-nadine-satu%26redirect_uri%3Dhttps%253A%252F%252Fsatu.kemenkeu.go.id%26response_type%3Dcode%26scope%3Dopenid%2520profile%2520frontend.nadine%2520organisasi.hris%2520profil.hris%2520jabatan.hris%2520pegawai.ekemenkeu%2520agenda.ekemenkeu%2520agenda.ekemenkeu%2520notification.ekemenkeu%2520kehumasan%26nonce%3D083f07bf4232fa9287727840e291545262feYe2Yg%26state%3Dd4266d4e197fc0c90e8295bdc76704f093QI0QCNA%26code_challenge%3D5JTdjNzy4A-oAuk60KliaK31UwPXNmz4kEiK1Ni2rDQ%26code_challenge_method%3DS256" class="txt3">
                                Lupa Password?
                            </a>
                        </center>
                    </div>
                </div>
                <br />
                <div class="container-login100-form-btn slideBottom">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button type="submit" name="login" class="login100-form-btn" name="button" value="Login">
                            LOGIN
                        </button>
                    </div>
                </div>

            </fieldset>

            <div class="text-center p-t-115">
                <span class="form-text text-muted">
                    Belum memiliki KemenkeuID?
                </span>
                <br />
                <a href="https://sso.kemenkeu.go.id//NewAccount/ExternalRegistration?ReturnUrl=%2Fconnect%2Fauthorize%2Fcallback%3Fclient_id%3Dnew-nadine-satu%26redirect_uri%3Dhttps%253A%252F%252Fsatu.kemenkeu.go.id%26response_type%3Dcode%26scope%3Dopenid%2520profile%2520frontend.nadine%2520organisasi.hris%2520profil.hris%2520jabatan.hris%2520pegawai.ekemenkeu%2520agenda.ekemenkeu%2520agenda.ekemenkeu%2520notification.ekemenkeu%2520kehumasan%26nonce%3D083f07bf4232fa9287727840e291545262feYe2Yg%26state%3Dd4266d4e197fc0c90e8295bdc76704f093QI0QCNA%26code_challenge%3D5JTdjNzy4A-oAuk60KliaK31UwPXNmz4kEiK1Ni2rDQ%26code_challenge_method%3DS256" class="txt3">
                    Daftar Sekarang!
                </a>
            </div>
            <div class="text-center p-t-115">
                <span class="form-text text-muted">
                    Aktivasi Akun Gagal?
                </span>
                <br />
                <a href="https://sso.kemenkeu.go.id//NewAccount/ResendActivationLink?ReturnUrl=%2Fconnect%2Fauthorize%2Fcallback%3Fclient_id%3Dnew-nadine-satu%26redirect_uri%3Dhttps%253A%252F%252Fsatu.kemenkeu.go.id%26response_type%3Dcode%26scope%3Dopenid%2520profile%2520frontend.nadine%2520organisasi.hris%2520profil.hris%2520jabatan.hris%2520pegawai.ekemenkeu%2520agenda.ekemenkeu%2520agenda.ekemenkeu%2520notification.ekemenkeu%2520kehumasan%26nonce%3D083f07bf4232fa9287727840e291545262feYe2Yg%26state%3Dd4266d4e197fc0c90e8295bdc76704f093QI0QCNA%26code_challenge%3D5JTdjNzy4A-oAuk60KliaK31UwPXNmz4kEiK1Ni2rDQ%26code_challenge_method%3DS256" class="txt3">
                    Kirim Ulang Link Aktivasi!
                </a>
            </div>
        <input name="__RequestVerificationToken" type="hidden" value="CfDJ8Ml0xjnxkNVNiJwegcS3g8Y6wj_WtuRqibqczJ-xk8MQn5tvdmsIm5JcEN_SCPJMlO8iYyxVoDVCjI8Cba63PUoHBiAvoC3uE4zuIxBGaLo5yPOr7Hh9NlRLV2wW_viHXyIi685uxjs72cGeXWJfaPI" /></form>
    </div>
</div>

<br />
<div class="google-captha">
    cuman mockup
</div>


            </div>
        </div>
    </div>
</div>


        </div>


   

    </div>
</body>
</html>
