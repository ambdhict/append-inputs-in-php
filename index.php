<html>
  <form id="frmP">
    <div class="row mt-1">
      <div class="col-lg-12">
        <div class="card-body" id="divnames">
          
        </div>
      </div>
      <div class="col-lg-12 ">
        <a href="#" class="ml-3 text-bold text-sm-right" id="add-section"><i class="fa fa-plus"></i> Add Section</a>
      </div>
    </div>
  </form>
</html>


$('#add-section').on('click', function(){
    var appendrow = "";
    var count = $('#divnames #paramnames').length;
    appendrow =  `<div class="col-lg-12" id="paramnames">
                        <div class="row">
                            <label>Name</label>
                            <input class="form-control form-control-sm" type="text" id="paramName[${count}]" name="paramName[${count}]" style="text-transform: uppercase;">
                        </div>
                    </div>`;
    $('#divnames').append(appendrow);
});

<?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $area = $_POST['paramArea'];
    
    $i = 0; 
    foreach($_POST['paramName'] as $desc){
        $sql = "INSERT INTO parameter 
                (areaId, sucId, deptId, accId, progId, paramDesc) 
                VALUES 
                (:area, :suc, :dept, :acc, :prog, :desc)";
        $stmnt = $pdo->prepare($sql);
        $stmnt->bindParam(':suc', $suc);
        $stmnt->bindParam(':dept', $dept);
        $stmnt->bindParam(':prog', $prog);
        $stmnt->bindParam(':acc', $acc);
        $stmnt->bindParam(':area', $area);
        $stmnt->bindParam(':desc', $desc);
        $result = $stmnt->execute();
        $i++;
    }
  }
?>
