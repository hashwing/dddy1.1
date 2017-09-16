var wid=new Array();
var yss=0;
//验证
function checkreg(){
    var inputobj= document.getElementById('tj');
    eval("inputobj.style.display=\"none\"");
    var inputobj1= document.getElementById('wjxx');
    eval("inputobj1.style.display=\"none\"");
    var dsm=document.ddf.dsm.value;
    var jb=document.ddf.jb.value;
	var sys=document.ddf.sys.value;
    var mys=document.ddf.mys.value;
    var fs=document.ddf.fs.value;
    //var size=document.ddf.size.value;
    //var color=document.ddf.color.value;
    
     if(sys==""||sys==0)
   {
    alert("开始页码不能为空或0！");
    ddf.sys.focus();
    eval("inputobj.style.display=\"\"");
    eval("inputobj1.style.display=\"\"");
    return false;
   }
   if(mys==""||mys==0)
   {
    alert("结束页码不能为空或0！");
    ddf.mys.focus();
    eval("inputobj.style.display=\"\"");
    eval("inputobj1.style.display=\"\"");
    return false;
   }
    var obj = document.getElementById('wd');  
    if(obj.value=='') 
    { 
        alert('请选择要打印的文档文件');
        eval("inputobj.style.display=\"\"");
        eval("inputobj1.style.display=\"\"");
        return false; 
    }
    var FileName=new String(obj.value);//文件名 
     var stuff=new String (FileName.substring(FileName.lastIndexOf(".")+1,FileName.length));//文件扩展名
    if(stuff=='doc'||stuff=='docx'||stuff=='pdf'||stuff=='jpg'||stuff=='png') 
    { 
        //alert(FileName);
        var obj = document.getElementById('wd');  
         var fileSize = obj.files[0].size;//文件的大小，单位为字节B
        if((fileSize/1024/1024)>30)
        {
        alert('文件大小不能超过30M');
        eval("inputobj.style.display=\"\"");
        eval("inputobj1.style.display=\"\"");
        return false; 
        }
        else{
        return true; 
        }
         
    } 
    else{
        alert('文件类型不正确，请选择doc、docx、pdf、jpg、png文件'); 
        eval("inputobj.style.display=\"\"");
        eval("inputobj1.style.display=\"\"");
        return false;
    }
   
  
}
//
    var xhr;
    
    function createXMLHttpRequest()
    {
        if(window.ActiveXObject)
        {
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
        else if(window.XMLHttpRequest)
        {
            xhr = new XMLHttpRequest();
        }
    }
    function UpladFile()
    {
        if(checkreg())
        {
            $("#tjz").html("上传文档中...");
           var fileObj = document.getElementById("wd").files[0];
            var FileController = '1.php';
            var form = new FormData();
            form.append("myfile", fileObj);
            createXMLHttpRequest();
            xhr.onreadystatechange = handleStateChange;
            xhr.open("post", FileController, true);
            xhr.send(form); 
        }
        
    }
    function handleStateChange()
    {
        if(xhr.readyState == 4)
        {
            if (xhr.status == 200 || xhr.status == 0)
            {
                var result = xhr.responseText;
                var json = eval("(" + result + ")");
                //alert(fileName);
                //alert('图片链接:'+json.file);
                //alert('图片链接:'+json.ofile);
                var dsm=document.ddf.dsm.value;
                var jb=document.ddf.jb.value;
                var sys=document.ddf.sys.value;
                var mys=document.ddf.mys.value;
                var fs=document.ddf.fs.value;
                //var size=document.ddf.size.value;
                //var color=document.ddf.color.value;
                $.ajax({
			type:"post",
			data: { "dsm":dsm,"jb":jb,"fs":fs,"sys":sys,"mys":mys,"doc":json.file,"ofilename":json.ofile},
			url:"wjtj.php",
			beforeSend:function(){
				$("#tjz").html("提交订单信息中...");
		    },
		    success:function(msg){	
                    if(msg!=0)
                    {
                    	wid[yss]=msg;
                    	yss++;
                    	//alert(wid.length);
                        $("#tjz").html("完成");
                        document.getElementById("ddf").reset();
                        var inputobj= document.getElementById('qd');
                        eval("inputobj.style.display=\"\"");
                        showwj();
                        
                        //$("#confirm").html("登录成功");
                     //window.location.href="wfdd.php"; 
                    }
                    else{
                    	var inputobj= document.getElementById('tjz');
                        //eval("inputobj.style.font-size=\"12px\"");
                        $("#tjz").html("提交出错");    
                        var inputobj= document.getElementById('wjxx');
                        eval("inputobj.style.display=\"\"");
                        var inputobj= document.getElementById('tj');
                        eval("inputobj.style.display=\"\"");
                        eval("inputobj.value=\"重新提交\"");
                    }
                    	
                    //confirm.innerHTML="11"
                    //
                    	
			  }
		})
            }
        }
    }
    
   //
    function qdb()
    {
    	showwj();
    	var inputobj= document.getElementById('wjxx');
        eval("inputobj.style.display=\"\"");
        var inputobj= document.getElementById('qd');
        eval("inputobj.style.display=\"none\"");
        var inputobj= document.getElementById('tj');
        eval("inputobj.style.display=\"\"");
        $("#tjz").html("");
    }
    function showwj()
    {
    	var json = {};
    	  var j=0;
    	  for (var i = 0; i < wid.length; i++) {
    	      json[j]=wid[i];
    	      j++;
    	  }
    	 // alert(wid.length);
    	  $.ajax({
  			type:"post",
  			data: {"wid":JSON.stringify(json) },
  			url:"wjlist.php",
  			beforeSend:function(){
  				//$("#wjlist").html(m);
  		    },
  		    success:function(msg){
                      if(msg){
  		              $("#wjlist").html(msg);
  		              //alert(msg);
  		            }
                      else{
                          $("#wjlist").html('暂无文件，请添加');
                         
                      }
                     
  			  }
  		});
    	  price();
    	  
    }
    //
    
    function clear1(swid)
    {
    	//alert(swid);
    	$.ajax({
  			type:"post",
  			data: {"swid":swid },
  			url:"clean.php",
  			beforeSend:function(){
  				//$("#wjlist").html(m);
  		    },
  		    success:function(msg){
                      if(msg){

  		              alert(msg);
  		            Array.prototype.indexOf = function(val) {
  		              for (var i = 0; i < this.length; i++) {
  		                  if (this[i] == val) return i;
  		              }
  		              return -1;
  		          };
  		          Array.prototype.remove = function(val) {
  		              var index = this.indexOf(val);
  		              if (index > -1) {
  		                  this.splice(index, 1);
  		              }
  		          };
  		          wid.remove(swid);
  		          yss--;
  		          //alert(wid.length);
  		        showwj();
  		            }
                      else{
                          
                    	  alert("网络错误");
                      }
                     
  			  }
  		});
    	return false;
    }
    //
  function issh()
  {
    if(document.getElementById("sh").checked){
                  var shobj= document.getElementById('sht');
                    eval("psdz.style.display=\"\"");
                }
                else{
                   var shobj= document.getElementById('sht');
                    eval("psdz.style.display=\"none\"");
                }
  }
  
  //
    function price()
        {
    	shtime();
    		var sid=document.jbxxf.dyadr.value;
    		var json = {};
  	  		var j=0;
  	  		for (var i = 0; i < wid.length; i++) {
  	  			json[j]=wid[i];
  	  			j++;
  	  		}
  	 //alert(wid.length);
  	  		$.ajax({
  	  				type:"post",
  	  				data: {"wid":JSON.stringify(json),"sid":sid},
  	  				url:"price.php",
  	  				beforeSend:function(){
  	  				//$("#wjlist").html(m);
  	  			},
  	  			success:function(msg){
                    if(msg){
                    	var obj=eval("("+msg+")");
		              $("#dprice").html(obj.dprice);
		              $("#sprice").html(obj.sprice);
		              $("#dsl").html(obj.dsl);
		              $("#ssl").html(obj.ssl);
		              $("#dtotal").html(obj.dtotal);
		              $("#stotal").html(obj.stotal);
		              $("#total").html(obj.total);
		            }
                    else{
                        //$("#wjlist").html('暂无文件，请添加');
                        //alert(msg);
                    }
                   
			  }
		});
        }
        function shtime()
        {
             var dyadr=$('#dyadr').val();
            $.ajax({
			type:"post",
			data: { "dyadr":dyadr},
			url:"shtime.php",
			beforeSend:function(){
				$("#shtime").html("加载中...");
		    },
		    success:function(msg){	
                    $("#shtime").html(msg);
			  }
		});
        } 
        function ddtj()
        {
        	var inputobj= document.getElementById('ddtj');
            eval("inputobj.style.display=\"none\"");
            var dyadr=document.jbxxf.dyadr.value;
            var ssq=document.jbxxf.ssq.value;
        	var ssh=document.jbxxf.ssh.value; 
        	if(dyadr==0)
            {
             alert("请选择打印地点！");
             jbxxf.dyadr.focus();
             eval("inputobj.style.display=\"\"");
             return false;
            }
        	if(wid.length==0)
            {
             alert("请添加要打印的文档！");
             eval("inputobj.style.display=\"\"");
             return false;
            }
        	if(document.getElementById("sh").checked){
                var sh=1;
                if(ssq==0)
                {
                 alert("请选择配送宿舍区！");
                 jbxxf.ssq.focus();
                 eval("inputobj.style.display=\"\"");
                 return false;
                }
                if(ssh=="")
                {
                 alert("请填写配送宿舍号！");
                 jbxxf.ssh.focus();
                 eval("inputobj.style.display=\"\"");
                 return false;
                }
              }
              else{
            	  var sh=0;
            	  ssq=0;
            	  ssh=0;
            	  
                
              }
        	var json = {};
  	  		var j=0;
  	  		for (var i = 0; i < wid.length; i++) {
  	  			json[j]=wid[i];
  	  			j++;
  	  		}
        	
        	$.ajax({
    			type:"post",
    			data: { "wid":JSON.stringify(json),"sid":dyadr,"sh":sh,"ssq":ssq,"ssh":ssh },
    			url:"dd.php",
    			beforeSend:function(){
    				$("#ddtjtip").html("提交中……");
    		    },
    		    success:function(msg){	
                        $("#ddtjtip").html("完成");
                        var obj=eval("("+msg+")");
                        $("#wds").html(obj.wds);
                        $("#zfprice").html(obj.price);
                        document.getElementById("ddh").value =obj.ddh;
                        document.getElementById("zongjia").value =obj.price;
                        document.getElementById("spxq").value =obj.wds+"份打印文档打印";
                        EV_modeAlert('envon');
                         
    			  }
    		});
             
        }
        
        
