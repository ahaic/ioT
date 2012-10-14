<footer class="footer">
        <p class="pull-right"><a href="#">回到顶部</a></p>
       <p>© Copyright 2008 - 2011 <a href="http://www.q-cms.cn" target="_blank">QCMS</a> v1.7.0 版权所有<br>By downloading QCMS you agree to the terms of the license.</p>
      </footer>
</div>
<div id="reg" class="modal hide fade" style="display: none;">
<div class="modal-header">
  <button class="close" data-dismiss="modal">×</button>
  <h3>用户注册</h3>
</div>
<fieldset class="form-horizontal">
<div class="control-group">
    <label class="control-label" for="input01">用户名</label>
    <div class="controls">
      <input name="username" type="text" class="input" id="username">
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="input01">密码</label>
    <div class="controls">
      <input type="password" class="input" id="password" name="password">
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="input01">性别</label>
    <div class="controls">
      <select name="sex">
        <option value="0">男</option>
        <option value="1">女</option>
      </select>
    </div>
</div>   
<div class="control-group">         
    <label class="control-label" for="input01">email</label>
    <div class="controls">
       <input name="email" type="text" class="input" id="email">
    </div>
</div>    
<div class="control-group">         
    <label class="control-label" for="input01">QQ</label>
    <div class="controls">
       <input name="qq" type="text" class="input" id="qq">
    </div>
</div>  
<div class="control-group">         
    <label class="control-label" for="input01">电话</label>
    <div class="controls">
       <input name="tel" type="text" class="input" id="tel">
    </div>
</div> 
<div class="control-group">         
    <label class="control-label" for="input01">地址</label>
    <div class="controls">
       <input name="address" type="text" class="input" id="address">
    </div>
</div> 
<div class="form-actions">
            <button type="submit" class="btn btn-primary btn-large" id="regAction">注册</button>
            <button class="btn btn-large qClose">取消</button>
</div>         
    </fieldset>
</div>
<div id="login" class="modal hide fade" style="display: none;">
<div class="modal-header">
  <button class="close" data-dismiss="modal">×</button>
  <h3>用户登录</h3>
</div>
<fieldset class="form-horizontal">
<div class="control-group">
    <label class="control-label" for="input01">用户名</label>
    <div class="controls">
      <input name="login_username" type="text" class="input" id="login_username">
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="input01">密码</label>
    <div class="controls">
      <input type="password" class="input" id="login_password" name="login_password">
    </div>
</div>
<div class="form-actions">
            <button type="submit" class="btn btn-primary btn-large" id="loginAction">登录</button>
            <button class="btn btn-large qClose">取消</button>
</div>  
</fieldset>
</div>
<script type='text/javascript' charset='utf-8' src='<?=JS_PATH?>jquery.js'></script>
<script type='text/javascript' charset='utf-8' src='<?=JS_PATH?>bootstrap-dropdown.js'></script>
<script type='text/javascript' charset='utf-8' src='<?=JS_PATH?>bootstrap-carousel.js'></script>
<script type='text/javascript' charset='utf-8' src='<?=JS_PATH?>bootstrap-modal.js'></script>
<script type='text/javascript' charset='utf-8' src='<?=JS_PATH?>bootstrap-transition.js'></script>
<script>
$('.dropdown-toggle').dropdown();
$('.carousel').carousel();
$(function(){
	isLogin();
	$('#regAction').click(function(){
		$.post('<?=url(array('home', 'ajaxreg'))?>', {'username' : $('#username').val(), 'password' : $('#password').val(), 'sex' : $('#sex').val(), 'email' : $('#email').val(), 'qq' : $('#qq').val(), 'tel' : $('#tel').val(), 'address' : $('#address').val()}, function(data){
			switch(data){
				case '1':
					alert('注册成功');	
					$('#reg').modal('hide');
					break;
				case '2':
					alert('用户名和密码不能为空');	break;
				case '3':
					alert('用户已存在');	break;	
				default:	
					alert('注册失败');	break;		
			}
		})
	});
	$('#loginAction').click(function(){		
		$.post('<?=url(array('home', 'login_ajax'))?>', {'username':$('#login_username').val(), 'password':$('#login_password').val()}, function(data){
			if(data == '0'){
				alert('用户名和密码不能为空');	return;
			}
			if(data == '-1'){
				alert('登录失败');return;
			}
			isLogin();
			$('.modal').modal('hide');
			return;	
		})
	})
	$('#search').click(function(){
		window.location.href='<?=url(array('home', 'search'))?>&keyword='+ $('#search_txt').val();
	})	
	$('.qClose').click(function(){
		$('.modal').modal('hide');
	})
})
function isLogin(){
	$.get("<?=url(array('home', 'cookie_ajax'))?>&r="+ Math.random() +")",function(data){
		if(data == '0'){
			$('#loginStr').html('<li><a href="#login" data-toggle="modal">登录</a></li><li class="divider-vertical"></li><li><a href="#reg" data-toggle="modal">注册 </a></li>');
		}else{
			$('#loginStr').html('<li><a href="{qcms:path}user" >欢迎：'+ data +'</a></li><li class="divider-vertical"></li><li><a href="#" onclick="logout()" >退出 </a></li>');
		}	  
	});	
}
function logout(){
	$.get('<?=url(array('home', 'ajax_logout'))?>&r="+ Math.random()', function(data){
		window.location.href="<?=url(array('index'))?>";
	})	
}
</script>
