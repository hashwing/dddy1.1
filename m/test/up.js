/**
 * 
 */
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


function up()
{
            $("#tip").html("<a href='#'>上传文档中...</a>");
           var fileObj = document.getElementById("img").files[0];
            var FileController = '1.php';
            var form = new FormData();
            form.append("myfile", fileObj);
            createXMLHttpRequest();
            xhr.onreadystatechange = handleStateChange;
            xhr.open("post", FileController, true);
            xhr.send(form); 
        
    }
    function handleStateChange()
    {
        if(xhr.readyState == 4)
        {
            if (xhr.status == 200 || xhr.status == 0)
            {
            	//文件上传成功json.file(重命名后）json.ofile（原来）
                var result = xhr.responseText;
                var json = eval("(" + result + ")");
                var name=$('#name').val();
            $.ajax({
			type:"post",
			data: { "file":json.file,"ofilename":json.ofile,"name":name},
			url:"2.php",
			beforeSend:function(){
				//$("#tip").html("提交订单信息中...");
		    },
		    success:function(msg){	
                    if(msg!=0)
                    {
                    	alert("eee");
                    	$('#name').val('');
                    	
                    	//$("#tip").html(msg);
                    }
                    else{
                    	
                    }
                    	
                   
			  }
		});
            }
        }
    }