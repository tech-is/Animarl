﻿<!--
新規カルテ画面
-->

<section class="content">
<div class="container-fluid">
    <div class="row clearfix"></div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card karte_wrapper">
                <div class="header text-center">
                    <h2>カルテ新規登録</h2>
                </div>
                <form action="<?php echo base_url(); ?>Karte_history/update_karute" target="" method="post">
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <h4>受け付け日</h4>
                            <p><?php  echo $karute_created_at; ?></p>
                        </div>
                        <div>
                                <!-- <input type="hidden" name="karute_customer_id" value="<?php  echo $r_karute["karute_customer_id"]; ?>">  -->
                                <input type="hidden" name="karute_id" value="<?php  echo $karute_id; ?>">
                                <input type="text" class="form-control" name="karute_title" placeholder="カルテタイトル">
                           </div>
                               <div>
                                <input type="text" class="form-control" row= "40" name="karute_comment" placeholder="カルテの内容">
                               </div>
                            </div>
                            <div class="wrapper" style="margin-top: 6px">
                                    <button type="submit" class="btn btn-primary waves-effect">登録</button>
                            </div>
                    </form>
                </div>
        </div>
    </div>
</div>
</section>
    
<!-- Jquery Core Js -->
<script src="../assets/cms/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="../assets/cms/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="../assets/cms/plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="../assets/cms/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="../assets/cms/plugins/node-waves/waves.js"></script>


<!--ボタン効果Sweetalert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- flatpickr -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ja.js"></script>

<!-- Custom Js -->
<script src="../assets/cms/js/admin.js"></script>
<script src="../assets/cms/js/pages/total/total.js"></script>

</body>

</html>