<script>
   function getHTTPObject(){
         
	if (window.ActiveXObject) return new ActiveXObject("Microsoft.XMLHTTP");// trinh duyet ie
	else if (window.XMLHttpRequest) return new XMLHttpRequest(); //trinh duyet chome,fifox...
	else {
	alert("Xin lỗi trình duyệt không hỗ trợ chức năng này!");
	return null;
	}
}
            function load_ajax(get)
            {
			   var malop=document.getElementById("chonmonthi");
                xmlhttp=getHTTPObject();
                xmlhttp.open("GET","../controler/kiemtralichthi.php?mamon="+malop.value+" && idhs="+get+"", true);
                xmlhttp.send();
				
                 xmlhttp.onreadystatechange =setOutput;
				
            }
            function setOutput(){
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){ //gia tri 4 và 200 la mat định
	
	if(xmlhttp.responseText.trim()=="1"){ document.getElementById('True').innerHTML = " <label>Trong thời gian thi, nhấn nút Bắt đầu để thi!!!</label><br><input type='submit' class='btn btn-primary btn-lg' target='_blank' value='Bắt đầu' />  ";}
	if(xmlhttp.responseText.trim()=="0") document.getElementById('True').innerHTML = "   <label>Khóa chưa được mở!!!</label>";
	
            }
			
        }
</script>




<div class=" tab-pane fade  " id="bailamthi" >
                     <h3>Nhập thông tin trước khi bắt đầu thi!</h3> 
                        <form name="MyForm" action="lambaithi.php" method="post">
                          <li class="col-md-2">
                            <label class="control-label"> Tên tài khoản:</label>
                            <div>
                              <input name="MaSoSinhVien" ng-model="MaSoSinhVien" type="text" class="form-control" id="NhapMaSoSinhVien" required>
                               <span class="ChuaNhapValue" ng-show="MyForm.MaSoSinhVien.$touched && MyForm.MaSoSinhVien.$invalid">Chưa nhập mã số sinh viên</span>
                            </div>
                          </li>
                          <li class="col-md-2">
                            <label class="control-label"> Mật khẩu:</label>
                            <div>
                              <input name="SoCMND" ng-model="SoCMND" type="password" class="form-control" id="NhapSoCMND" required>
                              <span class="ChuaNhapValue" ng-show="MyForm.SoCMND.$touched && MyForm.SoCMND.$invalid">Chưa nhập Mật khẩu</span>
                            </div>
                          </li>
						  						                            <br>
						  <br>
						  <br>
						  <br>
						  
                          <li class="col-md-2">
                            <label >Chọn môn:</label>
                            <select class="form-control" name="monselect" id="chonmonthi">
														 <?php include ('../modal/init.php');?>
<?php 
		$tv3= "SELECT * FROM tbl_dethi";
		$tv4 = $db->query($tv3);
		
		while( ($rows3 = $db->lay_rows($tv4))!= NULL)
		{
			
?>
                              <option value="<?php echo $rows3['made']; ?>"><?php echo $rows3['tende']; ?></option>

							  	<?php

}
$db->close()?>
                            </select>
							
                          </li >

                          <li  class="col-md-3 col-md-offset-1"  >
                            <div type="button" id="NutKiemTra" class="btn btn-info btn-lg" onclick="load_ajax(<?php echo $_SESSION['id_hs'] ?>)" >Kiểm tra</div>
                          </li>
                        </ul>
                        
                        <br>
                        <br>
                         <br>
                        <br>
                        <div class="jumbotron text-center phanthi col-md-offset-2" id="True">
                          <label>Trong thời gian thi, nhấn nút Bắt đầu để thi!!!</label>
                          <br>
                          
						   <input type='submit' class='btn btn-primary btn-lg' target='_blank' value='Bắt đầu' /> 
						  
						   
                        </div>
						  </form>
                        <div class="jumbotron text-center phanthi col-md-offset-2" id="NotFull">
                          <label>Chưa điền đầy đủ thông tin. Vui lòng xem lại!!!</label>
                          
                        </div>
                        <div class="jumbotron text-center phanthi col-md-offset-2" id="NotTrue">
                          <label>Không có trong thời gian thi hoặc bạn điền sai thông tin, Vui lòng xem kĩ lại!!!!</label>
                        </div>
                    </div>