<!-- Chat modal -->
<div id="chat" class="modal fade" data-backdrop="false">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <a href="" class="mychat mychat_tlbr"><button onclick="stop()" type="button" class="close clrchat" data-dismiss="modal">&times;</button></a>
                <!--                                <span id="chat_stat"></span>-->
                <h6 id="chat-info" class="chat-info modal-title"></h6>
            </div>

            <div class="modal-body">
                <div class="chat-box">
                <ul id="chat-content" class="media-list chat-list content-group">
                    <li class="media date-step">
                        <span>Monday, Feb 10</span>
                    </li>
                    <!--                                    <li class="media date-step">-->
                    <!--                                        <span>Yesterday</span>-->
                    <!--                                    </li>-->
                    <!--                                    <li class="media date-step">-->
                    <!--                                        <span>Today</span>-->
                    <!--                                    </li>-->


                </ul>
                </div>
                <div class="chat-post">
                <form id="chat-form" enctype="multipart/form-data">
                    <textarea id="chat-text" name="usn-chat-message" class="form-control content-group" rows="1" cols="1" placeholder="Press Enter to send your message..."></textarea>
                    <input id="chat_send_username" name="chat_send_username" type="hidden">
                    <input id="chat_reci_username" name="chat_reci_username" type="hidden">
                    <input id="chat_type" name="chat_type" value="chat_post" type="hidden">
                    <input id="usn_chat_date" name="usn_chat_date" type="hidden">
                    <div class="row">
                        <div class="col-xs-6">
                            <ul class="icons-list icons-list-extended mt-10">

                                <li>
                                    <input type="file" id="chat-image" class="file-input" accept=".jpeg, .jpg, .png, .gif" data-container="body" data-popup="tooltip" title="Add photo" name="usn_chat_photo" data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-xs icon-images2" data-remove-class="btn btn-xs icon-images2">
                                </li>
                                <li>
                                    <input type="file" id="chat-file" class="file-input" accept=".doc, .docx, .pdf, .txt, .xls, .xlsx, .ppt, .pptx, .zip, .rar, .sql, .ini, .java, .c, .cpp, .m" data-container="body" data-popup="tooltip" title="Add file" name="usn_chat_file" data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-xs icon-file-plus" data-remove-class="btn btn-xs icon-file-plus">
                                </li>

                            </ul>
                        </div>
                        <div class="col-xs-6 text-right">
                            <button type="submit" id="myChatBtn" class="btn bg-teal-400 btn-labeled btn-labeled-right submitform"><b><i class="icon-circle-right2" ></i></b> Send</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var ajaxFn;
    var ajaxFnTl;
    var trigger_chat = true;
    var trigger_chat_tlbr = true;
    function stop() {
            clearInterval(ajaxFn);
            trigger_chat=false;
            console.log(trigger_chat);
            clearInterval(ajaxFnTl);
            trigger_chat_tlbr=false;
            console.log(trigger_chat_tlbr);

    }
</script>