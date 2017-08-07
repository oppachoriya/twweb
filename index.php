<?php
	//define('DV_URL', 'tw1.dv.dev');
    define('DV_URL', 'twsso.dealvector.com');


    include_once 'user-data.php';
    $data = getUserData();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<div style="height: 100px;margin-top: 50px;">
    <h3>This Page is being rendered from Tradeweb Web Server</h3>
    Logged In USer Email: <?php echo $data->email;?>
</div>

<script>
    var DV_URL = window.location.protocol + "<?php echo DV_URL?>";

    //IDENTITY_REQUEST
    var receiveMessage = function(msg) {
        //alert(msg);
        console.log(msg.data);
        var childMessage = JSON.parse(msg.data);
        var msgType = childMessage.type;
        console.log(msgType);

        switch(msgType) {
            case "IDENTITY_REQUEST" : indetityReq(childMessage);
        }
    }

    window.addEventListener("message", receiveMessage, false);

    function indetityReq(childMessage){

        $.ajax(
            "/identity_req.php",
            {
                type: "GET",
                data: {
                    "randomData" : childMessage.randomData
                },
                timeout: 15000,
                success: function (response) {
                    // normalizeCommmandResult('credentials',response,callback);

                    var message = response;

                    var dvFrame = window.frames[0];
                    dvFrame.window.postMessage(message, DV_URL);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    // ajaxFailed(ajaxOptions,callback);
                }
            });



/*
        var message = {
            "type":"IDENTITY_RESPONSE",
            "signature":"R38h9lx1LGjyumC6a5hI0Skgt28Gl1woPcDL56SYYfBQb/0MGxrKumWXIvbHbvHSHc1fQGPzEFxmsM738m6d2VIlOdy9rPFXlpUEpLIx7LkYsYdW+sb5ClHa8QFi0Qr8OcVkYzivfg+BA7SM3QW+k3ez5bgIkIvLctStCDM60a1uDogrV6h1T/GHrKQACsN3kk/nUN8WhYyfZA+aEB/MttkFjiRuYXcuYUJl0iPiYA3QzSzhkKbjy7VQ8mMmk1dnnLsq0a9rYGBZ0DrS6YuVEU6tWtkJBedRQUT4VEIDoHHaGURmRN2auLJNbA5mPoJ0GqWq6YKwVhalg7I4aSiw3Q==",
            "plaintext": "{\"guid\":\"{BA2B9813-7FE4-4A87-ABFF-33026DD43545}\",\"userid\":\"mark\",\"company\":\"Tradeweb\",\"email\":\"\",\"randomData\":\"0.16760659\"}"
        };
*/

    }

</script>

<iframe src="//<?php echo DV_URL?>/sso/tw" height="600" width="90%">

</iframe>