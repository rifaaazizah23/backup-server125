<?php
include 'header.php';
ini_set('max_execution_time', 0);
ini_set('memory_limit', '1024M');
$serverName = "10.17.6.125"; //serverName\instanceName
$connectionInfo1 = array("UID"=>"web-dev", "PWD"=>"Password*1");
$conn = sqlsrv_connect( $serverName, $connectionInfo1);
if( $conn ) {
     echo "";
}else{
     echo "Connection could not be established.<br />";
     echo
     die( print_r( sqlsrv_errors(), true));
}
    $Week = $_GET['Week'];
    $Year = $_GET['Year'];
?>
	<script type = "text/javascript" src ="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
	<script type = "text/javascript" src ="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
	<script type = "text/javascript" src ="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type = "text/javascript" src ="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script type = "text/javascript" src ="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script type = "text/javascript" src ="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
	<script type = "text/javascript" src ="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
	<script type = "text/javascript" src ="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type = "text/javascript" src ="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type = "text/javascript" src ="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

<!-- Eksperimental -->
<!-- table7 -->
<div class="outer-w3-agile mt-3">
    <table id="example" class="display responsive nowrap table table-hover" style="width:100%">
        <thead>
            <tr>
                <th>System</th>
				<th>CellName</th>
				<th>EnodebId</th>
				<th>TowerId</th>
				<th>BW Mimo</th>
				<th>Payload Capability</th>
				<th>Region</th>
				<th>Kabupaten</th>
				<th>Week</th>
				<th>Year</th>
				<th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
				$Year = $_GET['Year'];
				$tsql = "SELECT [System]
					,[CellName]
					,[eNodebId]
					,[TowerId]
					,[BW Mimo]
					,[Payload Capability]
					,[Region]
					,[Kabupaten]
					,[$Year/$Week] FROM [WebDashboard].[dbo].[Remark_Forecast]
					where [$Year/$Week] = 'Need Upgrade' ";
				$result = sqlsrv_query($conn, $tsql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
						while($data = sqlsrv_fetch_array($result))
                        { // Ambil semua data dari hasil eksekusi $sql 
                    echo' 
                        <tr>
							<td align="center">'.$data['System'].'</td>
							<td align="center">'.$data['CellName'].'</td>
							<td align="center">'.$data['eNodebId'].'</td>
							<td align="center">'.$data['TowerId'].'</td>
							<td align="center">'.$data['BW Mimo'].'</td>
							<td align="center">'.$data['Payload Capability'].'</td>
							<td align="center">'.$data['Region'].'</td>
							<td align="center">'.$data['Kabupaten'].'</td>
							<td align="center">'.$Week.'</td>
							<td align="center">'.$Year.'</td>
							<td>
								<a href="Payload.php?cn='.$data['TowerId'].'" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Payload Trendlines</a>
							</td>
						</tr>'
                        ;}
            ?>
        </tbody>
    </table>     
</div>
<script>
$(document).ready(function() {
    $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
            { extend:'copy', attr: { id: 'allan' } }, 'csv', 'excel', 'pdf', 'print'
        ]
    });
} );
</script>
<!--// table7 -->
<!-- End Eksperimental -->
<?php 
include 'footer.php';
?>