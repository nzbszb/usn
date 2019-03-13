<?php
if(!empty($_GET)) {
    $send = $_GET['send'];
    $reci = $_GET['reci'];
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home-USN</title>

    <!--[if lt IE 9]-->
    <script src="../../../../assets/js/html5shiv.min.js"></script>
    <script src="../../../../assets/js/respond.min.js"></script>
    <![endif]-->

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="../../../../assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="../../../../assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../../../../assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
    <link href="../../../../assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
    <link href="../../../../assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="../../../../assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="../../../../assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="../../../../assets/js/core/libraries/jquery.form.js"></script>
    <script type="text/javascript" src="../../../../assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../../../assets/js/plugins/loaders/blockui.min.js"></script>
<!--    <script type="text/javascript" src="../chat/chat.min.js"></script>-->
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="../../../../assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="../../../../assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="../../../../assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="../../../../assets/js/plugins/media/fancybox.min.js"></script>
    <script type="text/javascript" src="../../../../assets/js/plugins/ui/fullcalendar/fullcalendar.min.js"></script>
    <script type="text/javascript" src="../../../../assets/js/plugins/visualization/echarts/echarts.js"></script>
    <script type="text/javascript" src="../../../../assets/js/plugins/uploaders/fileinput.min.js"></script>
    <script type="text/javascript" src="../../../../assets/js/plugins/popover/tether.min.js"></script>

    <script type="text/javascript" src="../../../../assets/js/core/app.js"></script>
    <script type="text/javascript" src="../../../../assets/js/pages/user_pages_profile.js"></script>
    <script type="text/javascript" src="../../../../assets/js/pages/components_thumbnails.js"></script>
    <script type="text/javascript" src="../../../../assets/js/pages/uploader_bootstrap.js"></script>
    <script type="text/javascript" src="../../../../assets/js/pages/user_pages_list.js"></script>
    <!-- /theme JS files -->


</head>
<body>
<!-- Chat modal -->


<form id="chat-form" enctype="multipart/form-data">
    <textarea id="chat-text" name="usn-chat-message" class="form-control content-group" rows="3" cols="1" placeholder="Enter your message..."></textarea>
    <input id="chat_send_username" name="chat_send_username" value="<?php echo $send?>" type="hidden">
    <input id="chat_reci_username" name="chat_reci_username" value="<?php echo $reci?>" type="hidden">
    <input id="chat_type" name="chat_type" value="chat_post" type="hidden">
    <input id="usn_chat_date" name="usn_chat_date" type="hidden">
    <div class="row">
        <div class="col-xs-6">
            <ul class="icons-list icons-list-extended mt-10">
                <li></li>
                <!--                            <li><a href="#" id="chat-image" data-popup="tooltip" title="Send photo" data-container="body"><i class="icon-file-picture"></i></a></li>-->
                <!--                            <li><a href="#" id="chat-file" data-popup="tooltip" title="Send file" data-container="body"><i class="icon-file-plus"></i></a></li>-->

                <li>
                    <input type="file" id="chat-image" class="file-input" accept="image/*" data-container="body" data-popup="tooltip" title="Add photo" name="usn_chat_photo" data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-xs icon-images2" data-remove-class="btn btn-xs icon-images2">
                </li>
                <li>
                    <input type="file" id="chat-file" class="file-input" data-container="body" data-popup="tooltip" title="Add file" name="usn_chat_file" data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-xs icon-file-plus" data-remove-class="btn btn-xs icon-file-plus">
                </li>

            </ul>
        </div>
        <div class="preview"></div>

        <div class="col-xs-6 text-right">
            <button type="submit" id="myChatBtn" class="btn bg-teal-400 btn-labeled btn-labeled-right submitform"><b><i class="icon-circle-right2" ></i></b> Send</button>
        </div>
    </div>
</form>

<!-- /chat modal -->


<script>
    $(document).ready(function()
    {
        $('.submitform').click(function(e) {

            var options = {
                type : 'post',
                url : 'test.php',
                beforeSend: function () {

                },
                success: function () {
                    document.getElementById('chat-form').reset();
                },
                complete: function (response) {

                },
                error: function () {


                }

            };

            $("#chat-form").ajaxForm(options);

        });
    });

    var d = new Date();
    var dateISO = d.toISOString();
    document.getElementById("usn_chat_date").value=(dateISO);

//    $("textarea").keydown(function(e){
//
//        if (e.keyCode == 13 && !e.shiftKey)
//        {
//            document.getElementsByClassName("submitform").click();
//        }
//    });
    var input = document.getElementById("chat-text");
    input.addEventListener("keyup", function(event) {
        event.preventDefault();
        if (event.keyCode === 13 && !event.shiftKey) {
            document.getElementById("myChatBtn").click();
        }
    });

</script>

</body>
</html>