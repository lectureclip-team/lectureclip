<?php include 'header.php';
?>
<script type="text/javascript">
$(function () {
    $('a[rel*=leanModal]').leanModal({
            top: 80, // モーダルウィンドウの縦位置を指定
            overlay: 0.7, // 背面の透明度 
            // closeButton: ".closeBtn"  // 閉じるボタンのCSS classを指定
        });
});
</script>
<script type="text/javascript">
$(document).ready(function () {
    $('#load_file').load('create_lecture_0.php'); 
        //GET COURSE ID
        var cid = document.getElementById("cidsession").value;
        sessionStorage.course_id = cid; 
    });
</script>
<div id="contents" class="clearfix column1">
    <div class="inner">
        <section class="clWrapper">
            <div class="clTtl table">
                <h2 class="title cell">レクチャー作成</h2>
                <div class="cell align_r">
                    <dl class="lecture_num">
                    <!-- CID = COURSE ID
                    ADD CATEGORY BEFORE UPLOADING FILE -->
                    <input type="hidden" value="<?= $_SESSION['cid']?>" id="cidsession" />                     
                    <dt>レクチャー数</dt>
                    <dd>
                        <?=$obj->count_lecture('tbl_lc_lecture'); ?>
                    </dd>
                </dl>
            </div><!-- /[div.cell] -->
        </div><!-- /[div.stTtl] -->
        <div class="table">
            <div class="cell list">
                <p class="ttl">レクチャータイプを選択</p>
                <ul>
                    <li id="lcm_mashup" class="over">
                        <a href="javascript:loadContents(0);">マッシュアップ</a>
                    </li>
                    <li id="lcm_pdf">
                        <a href="javascript:loadContents(2);">PDF</a>
                    </li>
                    <li id="lcm_ppt">
                        <a href="javascript:loadContents(3);">PowerPoint</a>
                    </li>
                        <!-- <li id="lcm_html">
                            <a href="javascript:lc_uploadContents(4);">HTML</a>
                        </li> -->
                        <li id="lcm_music">
                            <a href="javascript:loadContents(5);">音声</a>
                        </li>
                        <li id="lcm_movie">
                            <a href="javascript:loadContents(6);">動画</a>
                        </li>
                    </ul>
                </div><!-- /[div.cell] -->

                <div id="load_file"></div>

            </div><!-- /[div.table] -->
            <form action="" class="clearfix" id="clLc">
                <p class="float_l btn btn_black"><input type="button" name="btn01" class="fs18 w370 h45" value="作成済のレクチャー一覧" onClick="location.href = 'cl_lecture_list.php'"></p>
                <p id="lcb_create" class="float_r btn btn_red" style="display: none;"><a id="modaltrigger" rel="leanModal" href="#m_createLecture" ></a><input type="submit" onclick="return uploadFile();" class="fs18 w370 h45" name="btn02" value="作成"></p>
                <p id="lcb_next" class="float_r btn btn_red" style="display: block;"><input type="button" name="btn03" class="fs18 w370 h45" value="次へ" onClick="javascript:loadContents(1);"></p>
            </form>
        </section>
    </div><!-- /.inner -->
</div><!-- /#contents -->

<div id="m_createLecture" class="modal">
    <div class="modalHead">
        <strong>レクチャー作成</strong>
        <!-- <a href="#" class="closeBtn btn"><i class="fa fa-times"></i></a> -->
    </div><!-- /[div.modalHead] -->
    <div class="generalMain">
        <p class="align_c">レクチャーが作成されました。受講料金を設定してください。</p>
        <dl class="lcName clearfix">
            <dt>レクチャー名：</dt>
            <dd><span id="filename_data1"</dd>
        </dl>
        <ul class="cl_toggle clearfix">
            <li class="clt_left over"><a href="javascript:displayControl('.lc_select', '.lc_input', '.clt_right', '.clt_left', 3);" onclick="selectPriceOption('fixed');">規定の料金から選択</a></li>
            <li class="clt_right"><a href="javascript:displayControl('.lc_input', '.lc_select', '.clt_left', '.clt_right', 3);" onclick="selectPriceOption('notfixed');">任意の料金を入力</a></li>
        </ul>
        <form class="lcPrice">
            <p>
                <label for="price">受講料</label>
                <span class="lc_select" >
                    <select name="price_sel" id="price_sel">
                        <option class="">受講料を選択してください</option>
                        <option value="2000">2000</option>
                        <option value="3000">3000</option>
                        <option value="4000">4000</option>
                    </select>
                </span>
                <span class="lc_input" style="display: none;"><input type="text" name="price_inp" id="price_inp" value=""></span>
                円
            </p>
            <p class="btn btn_red">
                <input type="button" name="submit" onClick="javascript:savePrice();" value="授業料登録">
            </p>
        </form>
    </div><!-- /[div.generalMain] -->
</div><!-- /[div#modal.modal] -->	
<?php include 'footer.php'; ?>
<script type="text/javascript">
</script> 