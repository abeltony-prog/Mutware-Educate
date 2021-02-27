<?php
 $conn=mysqli_connect('localhost','root','','mutware');
$result=mysqli_query($conn,"SELECT * FROM addschool" );
$data =array();
while ($row=mysqli_fetch_assoc($result)) {
	 $data[]=$row;
    

}
echo json_encode($data);



  <script type="text/javascript">$(function(){
            $.ajax({
                    url:"data.php",
                    type:"get",
                    success:function(d){
                        var table=$('#table').DataTable().clear().draw();
                        console.log(d);
                       $.each(d,function(key,value){
                           table.row.add(
                                [
                                    value.sname,
                                    value.sid,
                                    value.stype,
                                    value.email,
                                    value.district,
                                    value.department

                                ]
                                ).draw();
                    });
                       
                }
            });
          });
</script>

?>