
<div class="in-curpage-wrap">
    <a href="#">常规</a> —>
    <a href="#">消息</a> —>
    <a href="#" class="in-curpage-active">消息列表</a>
</div>
<!-- module section start -->
<div class="in-content-wrap">
    <!-- 搜索条件  -->
    <div class="in-search-box clearfix">
        <form action="<?php echo e(route('_messageList')); ?>" method="get">
            <select class="in-search-sel" name="type">
                <option value="title">标题</option>
                <option value="created_by">管理员</option>
            </select>
            <input type="text" value="<?php echo e($keywords); ?>" name="keywords" class="in-search-input">
            <div class="in-datachoose-box">
                <input name="start_time"  value="<?php echo e($startTime); ?>" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" class="laydate-icon">-
                <input name="end_time" value="<?php echo e($endTime); ?>"  onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" class="laydate-icon">
            </div>

            <select class="in-search-sel" name="limit" >
                <option value="15" <?php if($page == 15): ?> selected="selected" <?php endif; ?>>每15条</option>
                <option value="30" <?php if($page == 30): ?> selected="selected" <?php endif; ?>>每页30条</option>
                <option value="50" <?php if($page == 50): ?> selected="selected" <?php endif; ?>>每页50条</option>
                <option value="100" <?php if($page == 100): ?> selected="selected" <?php endif; ?>>每页100条</option>
            </select>
            <button type="submit" class="com-searchbtn com-btn-color01 in-search-btn">确认</button>
            <a href="javascript:;" class="com-searchbtn com-btn-color02 in-search-btn  ml5 addmessage">添加</a>
        </form>
    </div>
    <script>


        $('form').ajaxForm(function ($message) {
            $("#include-page").html($message);
        });

    </script>
    <!-- //搜索条件 -->
    <!-- 列表数据  -->
    <table id="myTable" class="tablesorter table  table-bordered ">
        <thead>
        <tr>
            <th align="center">ID</th>
            <th align="center">标题</th>
            <th align="center">添加时间</th>
            <th align="center">管理员</th>
            <th align="center">发送类型</th>
            <th align="center">操作</th>
        </tr>
        </thead>
        <tbody id="trJson">
        <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
            <tr id="row_<?php echo e($d->id); ?>">
                <td align="center" id="<?php echo e($d->id); ?>"><?php echo e($d->id); ?></td>
                <td align="center" id="title<?php echo e($d->id); ?>"><?php echo e($d->title); ?></td>
                <td align="center" id="created_at<?php echo e($d->id); ?>"><?php echo e($d->created_at); ?></td>
                <td align="center" id="created_by<?php echo e($d->id); ?>"><?php echo e($d->created_by); ?></td>
                <td align="center" id="send_to<?php echo e($d->id); ?>"><?php echo e($send_to_arr[$d->send_to]); ?></td>
                <td align="center">
                    <a href="javascript:;" class="com-smallbtn com-btn-color01 editer-btn" editid="<?php echo e($d->id); ?>">编辑</a>
                    <a href="javascript:;" class="com-smallbtn com-btn-color02 ml5 del-btn" delid="<?php echo e($d->id); ?>">删除</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>

            <tr align="center" id="no_data">
                <td align="center" colspan="11">没有数据</td>
            </tr>

        <?php endif; ?>
        </tbody>
    </table>
    <!-- //列表数据  -->
    <!-- 分页按钮 -->
    <div id="pagenation">

    </div>
    
            <!-- //分页按钮 -->
    <!-- 编辑弹框 -->
    <div  class="notice-editorbox" id="edit_message-box" style="display:none;">
        <div class="notice-con-box">
            <form>
                <div class="com-form-wrap">
                    <!-- input -->
                    <div class="com-form-group clearfix">
                        <label class="com-form-l com-fl com-lh">标题：</label>
                        <div class="com-form-r com-fl">
                            <input type="text" id="fm_title" name="data[title]" class="com-input-text">
                        </div>
                    </div>
                    <!-- //input -->
                    <!-- textarea -->
                    <div class="com-form-group clearfix">
                        <label class="com-form-l com-fl com-lh">内容：</label>
                        <div class="com-form-r com-fl">
                            <textarea id="fm_content" class="com-textarea" name="data[content]"></textarea>
                        </div>
                    </div>
                    <!-- //textarea -->
                    <!-- input -->
                    <div class="com-form-group clearfix">
                        <label class="com-form-l com-fl com-lh">链接地址：</label>
                        <div class="com-form-r com-fl">
                            <input type="text" id="fm_url" name="data[url]" class="com-input-text">
                        </div>
                    </div>
                    <!-- //input -->
                    <!-- select -->
                    <div class="com-form-group clearfix">
                        <label class="com-form-l com-fl com-lh">类型：</label>
                        <div class="com-form-r com-fl">
                            <select class="com-select" id="fm_send_to" name="data[send_to]" >
                                <option value="all" >全部</option>
                                <option value="grade" >等级</option>
                                <option value="level" >层级</option>
                                <option value="username" >会员帐号</option>
                            </select>
                        </div>
                    </div>
                    <!-- //select -->
                    <!-- select -->
                    <div class="com-form-group clearfix">
                        <label class="com-form-l com-fl com-lh">id：</label>
                        <div class="com-form-r com-fl">
                            <input type="text" id="fm_send_to_id" name="data[send_to_id]" class="com-input-text">
                        </div>
                    </div>
                    <!-- //select -->
                    <input type="hidden" name="data[id]" id="fm_id">
                    <!-- button -->
                    <div class="com-form-group clearfix">
                        <label class="com-form-l com-fl"></label>
                        <div class="com-form-r com-fl">
                            <button onclick="return fm_submit()" class="com-bigbtn com-btn-color02 ">确认</button>
                        </div>
                    </div>
                    <!-- //button -->
                </div>
            </form>
        </div>
    </div>
    <!-- //编辑弹框 -->
    <!-- 添加弹框 start -->
    <div  class="notice-editorbox" id="add_message-box" style="display:none">
        <div class="notice-con-box">
            <form>
                <div class="com-form-wrap">
                    <!-- input -->
                    <div class="com-form-group clearfix">
                        <label class="com-form-l com-fl com-lh">标题：</label>
                        <div class="com-form-r com-fl">
                            <input type="text"  id="fma_title" name="data[title]" class="com-input-text">
                        </div>
                    </div>
                    <!-- //input -->
                    <!-- textarea -->
                    <div class="com-form-group clearfix">
                        <label class="com-form-l com-fl com-lh">内容：</label>
                        <div class="com-form-r com-fl">
                            <textarea id="fma_content" class="com-textarea" name="data[content]"></textarea>
                        </div>
                    </div>
                    <!-- //textarea -->
                    <!-- input -->
                    <div class="com-form-group clearfix">
                        <label class="com-form-l com-fl com-lh">链接地址：</label>
                        <div class="com-form-r com-fl">
                            <input type="text" id="fma_url" name="data[url]" class="com-input-text">
                        </div>
                    </div>
                    <!-- //input -->
                    <!-- select -->
                    <div class="com-form-group clearfix" >
                        <label class="com-form-l com-fl com-lh">类型：</label>
                        <div class="com-form-r com-fl">
                            <select class="com-select" id="fma_send_to" name="data[send_to]" onchange="smsSendBy()" >
                                <option value="all" >全部</option>
                                <option value="grade" >等级</option>
                                <option value="level" >层级</option>
                                <option value="username" >会员帐号</option>
                            </select>
                        </div>
                    </div>
                    <!-- //select -->
                    <!-- select -->
                    <div class="com-form-group clearfix" style="display: none" id="send_to_id">
                        <label class="com-form-l com-fl com-lh" id="send_label">发送id：</label>
                        <div class="com-form-r com-fl" id="send_input">
                            <input type="text" id="fma_send_to_id" name="data[send_to_id]" class="com-input-text">
                        </div>
                    </div>
                    <!-- //select -->
                    <!-- input -->
                    <div class="com-form-group clearfix" style="display: none" id="send_to_id">
                            <label class="com-form-l com-fl com-lh" id="send_label">发送id：</label>
                            <div class="com-form-r com-fl" id="send_input">
                                <input type="text" id="fma_send_to_id" name="data[send_to_id]" class="com-input-text">
                            </div>
                    </div>
                    <!-- //input -->
                    <input type="hidden" name="data[id]" id="fma_id">
                    <!-- button -->
                    <div class="com-form-group clearfix">
                        <label class="com-form-l com-fl"></label>
                        <div class="com-form-r com-fl">
                            <button class="com-bigbtn com-btn-color02 " onclick="return fm_add()">确认</button>
                        </div>
                    </div>
                    <!-- //button -->
                </div>
            </form>
        </div>
    </div>
    <!-- //添加弹框 end -->
</div>

<!-- module section end  -->
<script type="text/javascript">
    //关闭弹出窗口用
    var index;
    var _add;
    //填出表单提交事件
    function fm_submit() {
        var _title = $("#fm_title").val(),
                _content = $("#fm_content").val(),
                _url = $("#fm_url").val(),
                _send_to = $("#fm_send_to").val(),
                _send_to_id = $("#fm_send_to_id").val(),
                _id = $("#fm_id").val();
        var data = {
            "title": _title,
            "content": _content,
            "url": _url,
            "send_to": _send_to,
            "send_to_id": _send_to_id,
            "id": _id
        };
        var _data = JSON.stringify(data);
        if (!_title || !_content) {
            layer.alert('标题,内容不能为空');
            return false;
        }
        var urls = "<?php echo e(route('_changeMessage')); ?>";
        $.ajax({
            type: 'get',
            url: urls,
            data: {"data": _data},
            dataType: "json",
            success: function (data) {
                if (data.status == 1) {
                    $("#title" + data.id).text(data.title);
                    $("#content" + data.id).text(data.content);
                    $("#url" + data.id).text(data.url);
                    $("#send_to" + data.id).text(data.send_to);
                    $("#send_to_id" + data.id).text(data.send_to_id);
                    $("#id" + data.id).text(data.id);
                    setTimeout(function () {
                        layer.close(index);
                    }, 500);
                }
            }
        });
        return false;
    }

    // laypage 添加分页功能
    <?php if($page!=1): ?>
    getPage(<?php echo e($page); ?>);
    <?php else: ?>
    page_init();
    <?php endif; ?>
    function page_init(){
        var counts =<?php echo e(isset($count) ? $count : 0); ?>;
        laypage({
            cont: 'pagenation', //容器。值支持id名、原生dom对象，jquery对象。【如该容器为】：<div id="page1"></div>
            pages: counts, //通过后台拿到的总页数
            curr:  1, //当前页
            skip: false,
            skin: '#393d49',
            jump: function (obj, first) { //触发分页后的回调
                if (!first) { //点击跳页触发函数自身，并传递当前页：obj.curr
                    getPage(obj.curr);
                }
            }
        });
    }
    //layer分页函数
    function getPage(curr) {
        var page = curr || 1;
//        获取服务器传过来的第几页
        var getPages =<?php echo e(isset($page) ? $page : 1); ?>;
        var first =<?php echo e(isset($first) ? $first : 0); ?>;
        var counts =<?php echo e($count); ?>;
        var urls = "<?php echo e(route('_messageList')); ?>";
        if (page != getPages) {
            $.ajax({
                type: 'get',
                url: urls,
                data: {'p': curr},
                dataType: "html",
                success: function (data) {
                    $("#include-page").html(data);
                    laypage({
                        cont: 'pagenation', //容器。值支持id名、原生dom对象，jquery对象。【如该容器为】：<div id="page1"></div>
                        pages: counts, //通过后台拿到的总页数
                        curr: curr || 1, //当前页
                        skip: false,
                        skin: '#393d49',
                        jump: function (obj, first) { //触发分页后的回调
                            if (!first) { //点击跳页触发函数自身，并传递当前页：obj.curr
                                getPage(obj.curr);
                            }
                        }
                    });
                }
            });
        } else if (getPages == 1 && first == 0) {
            $.ajax({
                type: 'get',
                url: urls,
                data: {'p': 1, 'first': 1},
                dataType: "html",
                success: function (data) {
                    $("#include-page").html(data);
                    laypage({
                        cont: 'pagenation', //容器。值支持id名、原生dom对象，jquery对象。【如该容器为】：<div id="page1"></div>
                        pages: counts, //通过后台拿到的总页数
                        skip: false,
                        skin: '#393d49',
                        curr: curr || 1, //当前页
                        jump: function (obj, first) { //触发分页后的回调
                            if (!first) { //点击跳页触发函数自身，并传递当前页：obj.curr
                                getPage(obj.curr);
                            }
                        }
                    });
                }
            });
        }
    }

    //tablesorter的初始化
    $(document).ready(function () {
                //没有对应插件
                $("#myTable").tablesorter();
            }
    );

    //编辑弹框
    $(".editer-btn").on("click", function () {
        var editid = $(this).attr('editid');
        var urls = "<?php echo e(route('_selectMessage')); ?>";
        $.ajax({
            type: 'get',
            url: urls,
            data: {'editid': editid},
            dataType: "json",
            success: function (data) {
                $("#fm_title").val(data.title);
                $("#fm_content").val(data.content);
                $("#fm_url").val(data.url);
                $("#fm_send_to").val(data.send_to);
                $("#fm_send_to_id").val(data.send_to_id);
                $("#fm_id").val(data.id);
            }
        });

        index = layer.open({
            type: 1,
            title: '修改',
            shadeClose: true,
            shade: 0.5,
            area: ['600px', '70%'],
            content: $("#edit_message-box")    //iframe的url
        });
    });
    //删除弹框
    $(".del-btn").on("click", function () {
        var _that = $(this);
        var delid = $(this).attr('delid');
        var urls = "<?php echo e(route('_delMessage')); ?>";
        layer.confirm('确认删除？', {
            btn: ['确认', '取消'] //按钮
        }, function () {
            $.ajax({
                type: 'get',
                url: urls,
                data: {'delid': delid},
                dataType: "json",
                success: function (data) {
                    if (data.status == 1) {
                        $("#row_"+ delid).hide();
                        layer.msg('删除成功', {icon: 1});
                    } else {
                        layer.msg('请勿重新操作', {icon: 2});
                    }
                }
            });
        }, function () {

        });

    });

    //添加弹框
    $(".addmessage").on("click", function () {
        _add = layer.open({
            type: 1,
            title: '新增公告',
            shadeClose: true,
            shade: 0.5,
            area: ['600px', '70%'],
            content: $("#add_message-box")  //iframe的url
        });
    });
    function fm_add() {
        var _title = $("#fma_title").val(),
                _content = $("#fma_content").val(),
                _url = $("#fma_url").val(),
                _send_to = $("#fma_send_to").val(),
                _send_to_id = $("#fma_send_to_id").val();
        var data = {
            "title": _title,
            "content": _content,
            "url": _url,
            "send_to": _send_to,
            "send_to_id": _send_to_id

        };
        var _data = JSON.stringify(data);
        if (!_title || !_content) {
            layer.alert('标题,内容不能为空');
            return false;
        }
        var urls = "<?php echo e(route('_addMessage')); ?>";
        $.ajax({
            type: 'post',
            url: urls,
            data: {"data": _data, "_token": "<?php echo e(csrf_token()); ?>"},
            dataType: "json",
            success: function (data) {
                if (data.status == 1) {
                    layer.close(_add);
                    $.get(
                            '<?php echo e(route('_messageList')); ?>','',function(d){
                                $("#include-page").html(d);
                            }
                    );
                }
                if (data.status == 2) {
                    layer.alert(data.message);
                }
            }
        });
        return false;
    }

    function smsSendBy(){
        var val =  $('#fma_send_to').val();
        switch(val){
            case 'all':
                   $('#send_to_id').hide();
                break;
            case 'grade':
                $('#send_to_id').show();
                $('#send_label').text('等级：');
                break;
            case 'level':
                $('#send_to_id').show();
                $.ajax()
                $('#send_label').text('层级：');
                break;
            case 'username':
                $('#send_to_id').show();
                $('#send_label').text('会员账号：');
                break;
        }

    }
</script>
