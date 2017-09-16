
//验证
function checkreg(){
    var inputobj= document.getElementById('tj');
    eval("inputobj.style.display=\"none\"");
    var name=document.ddf.name.value;
    var phone=document.ddf.phone.value;
    var adr=document.ddf.adr.value;
    var dsm=document.ddf.dsm.value;
    var dyadr=document.ddf.dyadr.value;
    var jb=document.ddf.jb.value;
    var ys=document.ddf.ys.value;
    var fs=document.ddf.fs.value;
    var fw=document.ddf.fw.value;
    var bz=document.ddf.bz.value;
    var size=document.ddf.size.value;
    var color=document.ddf.color.value;
    
     if(name=="")
   {
    alert("姓名不能为空!");
    ddf.name.focus();
    eval("inputobj.style.display=\"\"");
    return false;
   }
   if(phone==""||phone.length!=11)
   {
    alert("填写正确的手机号!");
    ddf.phone.focus();
    eval("inputobj.style.display=\"\"");
    return false;
   }
   if(document.ddf.adr.value=="")
   {
    alert("地址不能为空!");
    ddf.adr.focus();
    eval("inputobj.style.display=\"\"");
    return false;
   }
    var obj = document.getElementById('wd');  
    if(obj.value=='') 
    { 
        alert('请选择要打印的文档文件');
        eval("inputobj.style.display=\"\""); 
        return false; 
    }
    var FileName=new String(obj.value);//文件名 
     var stuff=new String (FileName.substring(FileName.lastIndexOf(".")+1,FileName.length));//文件扩展名
    if(stuff=='doc'||stuff=='docx'||stuff=='pdf'||stuff=='xls'||stuff=='xlsx') 
    { 
        //alert(FileName);
        var obj = document.getElementById('wd');  
         var fileSize = obj.files[0].size;//文件的大小，单位为字节B
        if((fileSize/1024/1024)>30)
        {
        alert('文件大小不能超过30M');
        eval("inputobj.style.display=\"\""); 
        return false; 
        }
        else{
        return true; 
        }
         
    } 
    else{
        alert('文件类型不正确，请选择doc、docx、pdf、xls、xlsx文件'); 
        eval("inputobj.style.display=\"\"");
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
                var name=document.ddf.name.value;
                var phone=document.ddf.phone.value;
                var adr=document.ddf.adr.value;
                var dsm=document.ddf.dsm.value;
                var dyadr=document.ddf.dyadr.value;
                var jb=document.ddf.jb.value;
                var ys=document.ddf.ys.value;
                var fs=document.ddf.fs.value;
                var fw=document.ddf.fw.value;
                var sh=document.ddf.sh.value;
                var bz=document.ddf.bz.value;
                var size=document.ddf.size.value;
                var color=document.ddf.color.value;
                var sh;
                if(document.getElementById("sh").checked){
                   sh=1;
                }
                else{
                    sh=0;
                }
                $.ajax({
			type:"post",
			data: { "name": name, "phone": phone,"adr":adr,"dsm":dsm,"dyadr":dyadr,"jb":jb,"ys":ys,"fs":fs,"fw":fw,"bz":bz,"doc":json.file,"size":size,"color":color ,"ofilename":json.ofile,"sh":sh},
			url:"ddtj.php",
			beforeSend:function(){
				$("#tjz").html("提交订单信息中...");
		    },
		    success:function(msg){	
                    if(msg==1)
                    {
                        $("#tjz").html("完成");
                        //$("#confirm").html("登录成功");
                     window.location.href="wfdd.php"; 
                    }
                    else{
                        $("#tjz").html("提交出错");
                        var inputobj= document.getElementById('tj');
                        eval("inputobj.style.display=\"\"");
                    }
                    	
                    //confirm.innerHTML="11"
                    //
                    	
			  }
		})
            }
        }
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
            var dsm=document.ddf.dsm.value;
            var dyadr=document.ddf.dyadr.value;
            var ys=document.ddf.ys.value;
            var fs=document.ddf.fs.value;
            var size=document.ddf.size.value;
            var color=document.ddf.color.value;
            $.ajax({
			type:"post",
			data: { "dsm":dsm,"ys":ys,"fs":fs,"size":size,"color":color,"dyadr":dyadr,"price":1},
			url:"price.php",
			beforeSend:function(){
				$("#price").html("计算中...");
		    },
		    success:function(msg){	
                    $("#price").html(msg);
			  }
		});
        }
        function shtime()
        {
             var dyadr=document.ddf.dyadr.value;
             price();
            $.ajax({
			type:"post",
			data: { "dyadr":dyadr,"shtime":1 },
			url:"price.php",
			beforeSend:function(){
				$("#shtime").html("加载中...");
		    },
		    success:function(msg){	
                    $("#shtime").html(msg);
			  }
		});
        } 
