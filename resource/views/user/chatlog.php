<!DOCTYPE html>
<html>
<head>
  <style>
    body .layim-chat-main{height: auto;}
  </style>
</head>
<?= $this->include('chat/header', ['title' => '聊天记录'])  ?>=
<body>

<div class="layim-chat-main">
  <ul id="LAY_view"></ul>
</div>

<div id="LAY_page" style="margin: 0 10px;"></div>


<textarea title="消息模版" id="LAY_tpl" style="display:none;">
{{# layui.each(d.data, function(index, item){
  if(item.id == parent.layui.layim.cache().mine.id){ }}
    <li class="layim-chat-mine"><div class="layim-chat-user"><img src="{{ item.avatar }}"><cite><i>{{ layui.data.date(item.timestamp) }}</i>{{ item.username }}</cite></div><div class="layim-chat-text">{{ layui.layim.content(item.content) }}</div></li>
  {{# } else { }}
    <li><div class="layim-chat-user"><img src="{{ item.avatar }}"><cite>{{ item.username }}<i>{{ layui.data.date(item.timestamp) }}</i></cite></div><div class="layim-chat-text">{{ layui.layim.content(item.content) }}</div></li>
  {{# }
}); }}
</textarea>

<!--
上述模版采用了 laytpl 语法，不了解的同学可以去看下文档：http://www.layui.com/doc/modules/laytpl.html

-->

<?= $this->include('chat/footer') ?>

<script>
  layui.use(['layim', 'laypage'], function(){
    var layim = layui.layim
      ,layer = layui.layer
      ,laytpl = layui.laytpl
      ,$ = layui.jquery
      ,laypage = layui.laypage;

    //聊天记录的分页此处不做演示，你可以采用laypage，不了解的同学见文档：http://www.layui.com/doc/modules/laypage.html


    //开始请求聊天记录
    var param =  location.search //获得URL参数。该窗口url会携带会话id和type，他们是你请求聊天记录的重要凭据

      //实际使用时，下述的res一般是通过Ajax获得，而此处仅仅只是演示数据格式
      ,res = {
        code: 0
        ,msg: ''
        ,data: [{
          username: '纸飞机'
          ,id: 100000
          ,avatar: 'http://tva3.sinaimg.cn/crop.0.0.512.512.180/8693225ajw8f2rt20ptykj20e80e8weu.jpg'
          ,timestamp: 1480897882000
          ,content: 'face[抱抱] face[心] 你好啊小美女'
        }, {
          username: 'Z_子晴'
          ,id: 108101
          ,avatar: 'http://tva3.sinaimg.cn/crop.0.0.512.512.180/8693225ajw8f2rt20ptykj20e80e8weu.jpg'
          ,timestamp: 1480897892000
          ,content: '你没发错吧？face[微笑]'
        },{
          username: 'Z_子晴'
          ,id: 108101
          ,avatar: 'http://tva3.sinaimg.cn/crop.0.0.512.512.180/8693225ajw8f2rt20ptykj20e80e8weu.jpg'
          ,timestamp: 1480897898000
          ,content: '你是谁呀亲。。我爱的是贤心！我爱的是贤心！我爱的是贤心！重要的事情要说三遍~'
        },{
          username: 'Z_子晴'
          ,id: 108101
          ,avatar: 'http://tva3.sinaimg.cn/crop.0.0.512.512.180/8693225ajw8f2rt20ptykj20e80e8weu.jpg'
          ,timestamp: 1480897908000
          ,content: '注意：这些都是模拟数据，实际使用时，需将其中的模拟接口改为你的项目真实接口。\n该模版文件所在目录（相对于layui.js）：\n/css/modules/layim/html/chatlog.html'
        }]
      }

    //console.log(param)

    var html = laytpl(LAY_tpl.value).render({
      data: res.data
    });
    $('#LAY_view').html(html);

  });
</script>
</body>
</html>
