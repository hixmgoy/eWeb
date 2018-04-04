<?php
/**
 * Created by PhpStorm.
 * User: edu
 * Date: 2018/3/20
 * Time: 16:06
 */
?>
<div class="row">
    <div class="col-lg-12">
        <ul class="breadcrumb">
            <li><i class="fa fa-print"></i>eDesk Demo
            </li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <div class="panel-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="checkbox-inline">
                            设备IP：
                        </label>
                        <label class="checkbox-inline">
                            <input type="text" class="form-control" style="width: 468px;" id="filter_device_ip"
                                   value="192.168.32.56" placeholder="设备的IP地址">
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="checkbox-inline">
                            用户名：
                        </label>
                        <label class="checkbox-inline">
                            <input type="text" class="form-control" style="width: 200px;" id="filter_username"
                                   value="ruijie" placeholder="ruijie">
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="checkbox-inline">
                            密码&nbsp&nbsp&nbsp：
                        </label>
                        <label class="checkbox-inline">
                            <input type="text" class="form-control" style="width: 200px;" id="filter_pwd"
                                   value="ruijie" placeholder="ruijie">
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="checkbox-inline">
                            命令&nbsp&nbsp&nbsp：
                        </label>
                        <label class="checkbox-inline">
                            <input type="text" class="form-control" style="width: 200px;" id="filter_cmd"
                                   value="show exception" placeholder="show exception">
                        </label>
                    </div>



                    <br/>
                    <button type="button" id="btn_exec" class="btn btn-success" onclick="inspectDevice()">巡检</button>
                </form>
            </div>
        </section>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <ul class="breadcrumb">
            <li><i class="fa fa-print"></i>巡检结果
            </li>
        </ul>
    </div>
</div>
<textarea rows="1" cols="100" disabled="disabled" id="textarea_result" style= "overflow:hidden; ">

</textarea>
<div class="row">
    <div class="col-lg-12">
        <ul class="breadcrumb">
            <li><i class="fa fa-print"></i>详细
            </li>
        </ul>
    </div>
</div>
<textarea rows="10" cols="100" disabled="disabled" id="textarea_detail" >

</textarea>

</textarea>
<div class="row">
    <div class="col-lg-12">
        <ul class="breadcrumb">
            <li><i class="fa fa-print"></i>修复建议
            </li>
        </ul>
    </div>
</div>
<textarea rows="3" cols="100" disabled="disabled" id="textarea_suggest" >

</textarea>
<script type="text/javascript">

    function inspectDevice(){
        var $host = $('#filter_device_ip').val();
        var $user = $('#filter_username').val();
        var $pwd = $('#filter_pwd').val();
        var $cmd = $('#filter_cmd').val();
        $.ajax({
            type: "GET",
            url: "?r=v1/edesk/inspect-device&host=" + $host + "&user=" + $user + "&pwd=" + $pwd + "&cmd=" + $cmd,
            success: function (msg) {
                $("#textarea_result").val("巡检完成！共巡检1项。其中pass 0 项，fail 1 项。");
                $result = JSON.parse(msg);

                for (var i=0;i<$result.length;i++)
                {
                    $("#textarea_detail").append($result[i]+"\n");
                }
                $("#textarea_suggest").val("设备存在异常堆栈，请及时确认！");

            }
        });
    }


</script>











