<?php
include 'header.php';
ini_set('max_execution_time', 0);
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
$day = date("Y/m/d");
$now = strtotime($day);
$day1 = date('Ymd', strtotime('+ 0 day',$now));
$day2 = date('Ymd', strtotime('- 1 day',$now));
$day3 = date('Ymd', strtotime('- 2 day',$now));
?>
<div class="right_col" role="main">
<div class="page-title">
    <div class="title_left">
        <h3>3Payload PRB & CU<small><b> Detail</b></small></h3>
    </div>
</div>
<div class="row">
	<div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Applications status (3 Days) eNodebId <?php $eNodebId = $_GET['eNodebId']; echo $eNodebId ;?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
				<div id="1chart4G" class="demo-placeholder"></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Applications status (3 Days) eNodebId <?php $eNodebId = $_GET['eNodebId']; echo $eNodebId ;?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
				<div id="2chart4G" class="demo-placeholder"></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Applications status (3 Days) eNodebId <?php $eNodebId = $_GET['eNodebId']; echo $eNodebId ;?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
				<div id="3chart4G" class="demo-placeholder"></div>
            </div>
        </div>
    </div>
</div>
</div>
<!---------------------------------------------------------------------------------------------------------------->
<script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js">
</script>
<script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js">
</script>
<script type = "text/javascript">
google.charts.load('current', {packages: ['corechart']});     
</script>
<!----------------------------------------------------Chart 1--------------------------------------------------------->
<script>
google.charts.load('current', {
  callback: drawChart,
  packages:['corechart']
});

function drawChart() {
  var data = new google.visualization.DataTable();
  data.addColumn('date', '');
  data.addColumn('string', '');
  data.addColumn('number', '4GTotalPayloadGB');
  data.addRows([
	<?php 
	$eNodebId = $_GET['eNodebId'];
	$day = date("Y/m/d");
	$now = strtotime($day);
	$day1 = date('Ymd', strtotime('- 2 day',$now));
	$tsql1 = "SELECT [System]
      ,[eNodebId]
      ,[eNodebName]
      ,[DateId] as dateid
      ,[HourId] as hourid
	  ,sum([LDLTrafficVolumeGB]+[LULTrafficVolumeGB]) as [4GTotalPayloadGB]
	  ,max([LDLResourceBlockUtilizingRate]) as [LDLResourceBlockUtilizingRate]
      ,max([LAVGSimultaneousRRCConnectedUEs]) as [LAVGSimultaneousRRCConnectedUEs]
  FROM [10.23.40.176].[MLRanLink].[dbo].[MCellHour]
  where dateid ='$day1' and [eNodebId] = '$eNodebId'
  group by [System],[eNodebId],[eNodebName],[DateId],[HourId]
  order by [System],[eNodebId],[eNodebName],[DateId] desc,[HourId]";
	 
	$result1 = sqlsrv_query($conn, $tsql1, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								
	while($data = sqlsrv_fetch_array($result1))
	  { // Ambil semua data dari hasil eksekusi $sql
		$Date = $data['dateid']->format('m/d/y');
		$Hour = $data['hourid'];
		$value = $data['4GTotalPayloadGB'];
		
				if($Hour == 0){
			$Payload = "00:00" ;
		} else if ($Hour == 1){
			$Payload = "00:01";
		} else if ($Hour == 2){
			$Payload = "00:02";
		}else if ($Hour == 3){
			$Payload = "00:03";
		}else if ($Hour == 4){
			$Payload = "00:04";
		}else if ($Hour == 5){
			$Payload = "00:05";
		}else if ($Hour == 6){
			$Payload = "00:06";
		}else if ($Hour == 7){
			$Payload = "00:07";
		}else if ($Hour == 8){
			$Payload = "00:08";
		}else if ($Hour == 9){
			$Payload = "00:09";
		}else if ($Hour == 10){
			$Payload = "00:10";
		}else if ($Hour == 11){
			$Payload = "00:11";
		}else if ($Hour == 12){
			$Payload = "00:12";
		}else if ($Hour == 13){
			$Payload = "00:13";
		}else if ($Hour == 14){
			$Payload = "00:14";
		}else if ($Hour == 15){
			$Payload = "00:15";
		}else if ($Hour == 16){
			$Payload = "00:16";
		}else if ($Hour == 17){
			$Payload = "00:17";
		}else if ($Hour == 18){
			$Payload = "00:18";
		}else if ($Hour == 19){
			$Payload = "00:19";
		}else if ($Hour == 20){
			$Payload = "00:20";
		}else if ($Hour == 21){
			$Payload = "00:21";
		}else if ($Hour == 22){
			$Payload = "00:22";
		}else if ($Hour == 23){
			$Payload = "00:23";
		}else {
			$Payload = "00:00";
		}
		?>
		[new Date('<?php echo $Date ;?>'), ' Time <?php echo $Payload ;?>', <?php echo $value ;?>],
	<?php
	  }
	?>
	
  ]);
   data.addRows([
    <?php 
	$day = date("Y/m/d");
	$now = strtotime($day);
	$day2 = date('Ymd', strtotime('- 1 day',$now));
	$tsql2 = "SELECT [System]
      ,[eNodebId]
      ,[eNodebName]
      ,[DateId] as dateid
      ,[HourId] as hourid
	  ,sum([LDLTrafficVolumeGB]+[LULTrafficVolumeGB]) as [4GTotalPayloadGB]
	  ,max([LDLResourceBlockUtilizingRate]) as [LDLResourceBlockUtilizingRate]
      ,max([LAVGSimultaneousRRCConnectedUEs]) as [LAVGSimultaneousRRCConnectedUEs]
  FROM [10.23.40.176].[MLRanLink].[dbo].[MCellHour]
  where dateid ='$day2' and [eNodebId] = '$eNodebId'
  group by [System],[eNodebId],[eNodebName],[DateId],[HourId]
  order by [System],[eNodebId],[eNodebName],[DateId] desc,[HourId]";
	 
	$result2 = sqlsrv_query($conn, $tsql2, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								
	while($data2 = sqlsrv_fetch_array($result2))
	  { // Ambil semua data dari hasil eksekusi $sql
		$Date2 = $data2['dateid']->format('m/d/y');
		$Hour2 = $data2['hourid'];
		$value2 = $data2['4GTotalPayloadGB'];
		
				if($Hour2 == 0){
			$Payload2 = "00:00" ;
		} else if ($Hour2 == 1){
			$Payload2 = "00:01";
		} else if ($Hour2 == 2){
			$Payload2 = "00:02";
		}else if ($Hour2 == 3){
			$Payload2 = "00:03";
		}else if ($Hour2 == 4){
			$Payload2 = "00:04";
		}else if ($Hour2 == 5){
			$Payload2 = "00:05";
		}else if ($Hour2 == 6){
			$Payload2 = "00:06";
		}else if ($Hour2 == 7){
			$Payload2 = "00:07";
		}else if ($Hour2 == 8){
			$Payload2 = "00:08";
		}else if ($Hour2 == 9){
			$Payload2 = "00:09";
		}else if ($Hour2 == 10){
			$Payload2 = "00:10";
		}else if ($Hour2 == 11){
			$Payload2 = "00:11";
		}else if ($Hour2 == 12){
			$Payload2 = "00:12";
		}else if ($Hour2 == 13){
			$Payload2 = "00:13";
		}else if ($Hour2 == 14){
			$Payload2 = "00:14";
		}else if ($Hour2 == 15){
			$Payload2 = "00:15";
		}else if ($Hour2 == 16){
			$Payload2 = "00:16";
		}else if ($Hour2 == 17){
			$Payload2 = "00:17";
		}else if ($Hour2 == 18){
			$Payload2 = "00:18";
		}else if ($Hour2 == 19){
			$Payload2 = "00:19";
		}else if ($Hour2 == 20){
			$Payload2 = "00:20";
		}else if ($Hour2 == 21){
			$Payload2 = "00:21";
		}else if ($Hour2 == 22){
			$Payload2 = "00:22";
		}else if ($Hour2 == 23){
			$Payload2 = "00:23";
		}else {
			$Payload2 = "00:00";
		}
		?>
		[new Date('<?php echo $Date2 ;?>'), 'Time <?php echo $Payload2 ;?>', <?php echo $value2 ;?>],
	<?php
	  }
	?>
  ]);
   data.addRows([
    <?php 
	$day = date("Y/m/d");
	$now = strtotime($day);
	$day3 = date('Ymd', strtotime('+ 0 day',$now));
	$tsql3 = "SELECT [System]
      ,[eNodebId]
      ,[eNodebName]
      ,[DateId] as dateid
      ,[HourId] as hourid
	  ,sum([LDLTrafficVolumeGB]+[LULTrafficVolumeGB]) as [4GTotalPayloadGB]
	  ,max([LDLResourceBlockUtilizingRate]) as [LDLResourceBlockUtilizingRate]
      ,max([LAVGSimultaneousRRCConnectedUEs]) as [LAVGSimultaneousRRCConnectedUEs]
  FROM [10.23.40.176].[MLRanLink].[dbo].[MCellHour]
  where dateid ='$day3' and [eNodebId] = '$eNodebId'
  group by [System],[eNodebId],[eNodebName],[DateId],[HourId]
  order by [System],[eNodebId],[eNodebName],[DateId] desc,[HourId]";
	 
	$result3 = sqlsrv_query($conn, $tsql3, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								
	while($data3 = sqlsrv_fetch_array($result3))
	  { // Ambil semua data dari hasil eksekusi $sql
		$Date3 = $data3['dateid']->format('m/d/y');
		$Hour3 = $data3['hourid'];
		$value3 = $data3['4GTotalPayloadGB'];
		
				if($Hour3 == 0){
			$Payload3 = "00:00" ;
		} else if ($Hour3 == 1){
			$Payload3 = "00:01";
		} else if ($Hour3 == 2){
			$Payload3 = "00:02";
		}else if ($Hour3 == 3){
			$Payload3 = "00:03";
		}else if ($Hour3 == 4){
			$Payload3 = "00:04";
		}else if ($Hour3 == 5){
			$Payload3 = "00:05";
		}else if ($Hour3 == 6){
			$Payload3 = "00:06";
		}else if ($Hour3 == 7){
			$Payload3 = "00:07";
		}else if ($Hour3 == 8){
			$Payload3 = "00:08";
		}else if ($Hour3 == 9){
			$Payload3 = "00:09";
		}else if ($Hour3 == 10){
			$Payload3 = "00:10";
		}else if ($Hour3 == 11){
			$Payload3 = "00:11";
		}else if ($Hour3 == 12){
			$Payload3 = "00:12";
		}else if ($Hour3 == 13){
			$Payload3 = "00:13";
		}else if ($Hour3 == 14){
			$Payload3 = "00:14";
		}else if ($Hour3 == 15){
			$Payload3 = "00:15";
		}else if ($Hour3 == 16){
			$Payload3 = "00:16";
		}else if ($Hour3 == 17){
			$Payload3 = "00:17";
		}else if ($Hour3 == 18){
			$Payload3 = "00:18";
		}else if ($Hour3 == 19){
			$Payload3 = "00:19";
		}else if ($Hour3 == 20){
			$Payload3 = "00:20";
		}else if ($Hour3 == 21){
			$Payload3 = "00:21";
		}else if ($Hour3 == 22){
			$Payload3 = "00:22";
		}else if ($Hour3 == 23){
			$Payload3 = "00:23";
		}else {
			$Payload3 = "00:00";
		}
		?>
		[new Date('<?php echo $Date3 ;?>'), 'Time <?php echo $Payload3 ;?>', <?php echo $value3 ;?>],
	<?php
	  }
	?>
  ]);

  var view = new google.visualization.DataView(data);
  view.hideColumns([0]);

  var options = {
    chartArea: {
      height: 200,
    },
    colors: ['#00ff00', '#ff0000','#ffe102'],
    hAxis: {
      title: '',
      textStyle: {
        color: '#01579b',
        fontSize: 10,
        fontName: 'Arial',
        bold: true,
        italic: true
      },
      titleTextStyle: {
        color: '#01579b',
        fontSize: 12,
        fontName: 'Arial',
        bold: false,
        italic: true
      },
      slantedTextAngle: 90
    },
    height: 295,
    legend: {
      position: 'top'
    },
    vAxis: {
      title: '',
      textStyle: {
        color: '#1a237e',
        fontSize: 12,
        bold: true
      },
      titleTextStyle: {
        color: '#1a237e',
        fontSize: 12,
        bold: true
      }
    },
    width: 1050
  };

  var formatDate = new google.visualization.DateFormat({
    pattern: 'dd-MMM-yy'
  });

  var container = document.getElementById('1chart4G');
  var chart = new google.visualization.LineChart(container);

  google.visualization.events.addListener(chart, 'ready', function () {
    var rowIndex = -1;
    var dateValue = null;
    var svgParent = container.getElementsByTagName('svg')[0];
    var labels = [];
    Array.prototype.forEach.call(container.getElementsByTagName('text'), function(text) {
      var groupLabel;
      // find hAxis labels
      if (text.hasAttribute('transform')) {
        rowIndex++;
        if (dateValue !== formatDate.formatValue(data.getValue(rowIndex, 0))) {
          dateValue = formatDate.formatValue(data.getValue(rowIndex, 0));
          groupLabel = text.cloneNode(true);
          groupLabel.removeAttribute('transform');
          groupLabel.removeAttribute('font-style');
          groupLabel.setAttribute('fill', '#333333');
          groupLabel.setAttribute('y', parseFloat(text.getAttribute('y')) + 132);
          groupLabel.textContent = dateValue;
          text.parentNode.appendChild(groupLabel);
          if (labels.length > 0) {
            setLabelX(labels[labels.length - 1], text, 0);
          }
          labels.push(groupLabel);
          addGroupLine(groupLabel, -24, -144);
        }
        if (rowIndex === (data.getNumberOfRows() - 1)) {
          if (labels.length > 0) {
            setLabelX(labels[labels.length - 1], text, 16);
          }
          addGroupLine(text, 18, -12);
        }
      }
    });

    // center group label
    function setLabelX(prevLabel, curLabel, xOffset) {
      prevLabel.setAttribute('x',
        parseFloat(prevLabel.getAttribute('x')) + xOffset +
        ((parseFloat(curLabel.getAttribute('x')) - parseFloat(prevLabel.getAttribute('x'))) / 2)
      );
    }

    // add group line
    function addGroupLine(text, xOffset, yOffset) {
      var parent = container.getElementsByTagName('g')[0];
      var groupLine = container.getElementsByTagName('rect')[0].cloneNode(true);
      groupLine.setAttribute('x', parseFloat(text.getAttribute('x')) + xOffset);
      groupLine.setAttribute('y', parseFloat(text.getAttribute('y')) + yOffset);
      groupLine.setAttribute('width', '0.8');
      groupLine.setAttribute('height', '188');
      groupLine.setAttribute('stroke', '#333333');
      groupLine.setAttribute('stroke-width', '1');
      groupLine.setAttribute('fill', '#333333');
      groupLine.setAttribute('fill-opacity', '1');
      parent.appendChild(groupLine);
    }
  });

  chart.draw(view, options);
}
</script>
<!----------------------------------------------------End Chart 1--------------------------------------------------------->

<!----------------------------------------------------Chart 2--------------------------------------------------------->
<script>
google.charts.load('current', {
  callback: drawChart,
  packages:['corechart']
});

function drawChart() {
  var data = new google.visualization.DataTable();
  data.addColumn('date', '');
  data.addColumn('string', '');
  data.addColumn('number', '[LDLResourceBlockUtilizingRate]');
  data.addRows([
	<?php 
	$eNodebId = $_GET['eNodebId'];
	$day = date("Y/m/d");
	$now = strtotime($day);
	$day1 = date('Ymd', strtotime('- 2 day',$now));
	$tsql1 = "SELECT [System]
      ,[eNodebId]
      ,[eNodebName]
      ,[DateId] as dateid
      ,[HourId] as hourid
	  ,sum([LDLTrafficVolumeGB]+[LULTrafficVolumeGB]) as [4GTotalPayloadGB]
	  ,max([LDLResourceBlockUtilizingRate]) as [LDLResourceBlockUtilizingRate]
      ,max([LAVGSimultaneousRRCConnectedUEs]) as [LAVGSimultaneousRRCConnectedUEs]
  FROM [10.23.40.176].[MLRanLink].[dbo].[MCellHour]
  where dateid ='$day1' and [eNodebId] = '$eNodebId'
  group by [System],[eNodebId],[eNodebName],[DateId],[HourId]
  order by [System],[eNodebId],[eNodebName],[DateId] desc,[HourId]";
	 
	$result1 = sqlsrv_query($conn, $tsql1, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								
	while($data = sqlsrv_fetch_array($result1))
	  { // Ambil semua data dari hasil eksekusi $sql
		$Date = $data['dateid']->format('m/d/y');
		$Hour = $data['hourid'];
		$value = $data['LDLResourceBlockUtilizingRate'];
		
				if($Hour == 0){
			$LDL = "00:00" ;
		} else if ($Hour == 1){
			$LDL = "00:01";
		} else if ($Hour == 2){
			$LDL = "00:02";
		}else if ($Hour == 3){
			$LDL = "00:03";
		}else if ($Hour == 4){
			$LDL = "00:04";
		}else if ($Hour == 5){
			$LDL = "00:05";
		}else if ($Hour == 6){
			$LDL = "00:06";
		}else if ($Hour == 7){
			$LDL = "00:07";
		}else if ($Hour == 8){
			$LDL = "00:08";
		}else if ($Hour == 9){
			$LDL = "00:09";
		}else if ($Hour == 10){
			$LDL = "00:10";
		}else if ($Hour == 11){
			$LDL = "00:11";
		}else if ($Hour == 12){
			$LDL = "00:12";
		}else if ($Hour == 13){
			$LDL = "00:13";
		}else if ($Hour == 14){
			$LDL = "00:14";
		}else if ($Hour == 15){
			$LDL = "00:15";
		}else if ($Hour == 16){
			$LDL = "00:16";
		}else if ($Hour == 17){
			$LDL = "00:17";
		}else if ($Hour == 18){
			$LDL = "00:18";
		}else if ($Hour == 19){
			$LDL = "00:19";
		}else if ($Hour == 20){
			$LDL = "00:20";
		}else if ($Hour == 21){
			$LDL = "00:21";
		}else if ($Hour == 22){
			$LDL = "00:22";
		}else if ($Hour == 23){
			$LDL = "00:23";
		}else {
			$LDL = "00:00";
		}
		?>
		[new Date('<?php echo $Date ;?>'), 'Time <?php echo $LDL ;?>', <?php echo $value ;?>],
	<?php
	  }
	?>
	
  ]);
   data.addRows([
    <?php 
	$day = date("Y/m/d");
	$now = strtotime($day);
	$day2 = date('Ymd', strtotime('- 1 day',$now));
	$tsql2 = "SELECT [System]
      ,[eNodebId]
      ,[eNodebName]
      ,[DateId] as dateid
      ,[HourId] as hourid
	  ,sum([LDLTrafficVolumeGB]+[LULTrafficVolumeGB]) as [4GTotalPayloadGB]
	  ,max([LDLResourceBlockUtilizingRate]) as [LDLResourceBlockUtilizingRate]
      ,max([LAVGSimultaneousRRCConnectedUEs]) as [LAVGSimultaneousRRCConnectedUEs]
  FROM [10.23.40.176].[MLRanLink].[dbo].[MCellHour]
  where dateid ='$day2' and [eNodebId] = '$eNodebId'
  group by [System],[eNodebId],[eNodebName],[DateId],[HourId]
  order by [System],[eNodebId],[eNodebName],[DateId] desc,[HourId]";
	 
	$result2 = sqlsrv_query($conn, $tsql2, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								
	while($data2 = sqlsrv_fetch_array($result2))
	  { // Ambil semua data dari hasil eksekusi $sql
		$Date2 = $data2['dateid']->format('m/d/y');
		$Hour2 = $data2['hourid'];
		$value2 = $data2['LDLResourceBlockUtilizingRate'];
		
				if($Hour2 == 0){
			$LDL2 = "00:00" ;
		} else if ($Hour2 == 1){
			$LDL2 = "00:01";
		} else if ($Hour2 == 2){
			$LDL2 = "00:02";
		}else if ($Hour2 == 3){
			$LDL2 = "00:03";
		}else if ($Hour2 == 4){
			$LDL2 = "00:04";
		}else if ($Hour2 == 5){
			$LDL2 = "00:05";
		}else if ($Hour2 == 6){
			$LDL2 = "00:06";
		}else if ($Hour2 == 7){
			$LDL2 = "00:07";
		}else if ($Hour2 == 8){
			$LDL2 = "00:08";
		}else if ($Hour2 == 9){
			$LDL2 = "00:09";
		}else if ($Hour2 == 10){
			$LDL2 = "00:10";
		}else if ($Hour2 == 11){
			$LDL2 = "00:11";
		}else if ($Hour2 == 12){
			$LDL2 = "00:12";
		}else if ($Hour2 == 13){
			$LDL2 = "00:13";
		}else if ($Hour2 == 14){
			$LDL2 = "00:14";
		}else if ($Hour2 == 15){
			$LDL2 = "00:15";
		}else if ($Hour2 == 16){
			$LDL2 = "00:16";
		}else if ($Hour2 == 17){
			$LDL2 = "00:17";
		}else if ($Hour2 == 18){
			$LDL2 = "00:18";
		}else if ($Hour2 == 19){
			$LDL2 = "00:19";
		}else if ($Hour2 == 20){
			$LDL2 = "00:20";
		}else if ($Hour2 == 21){
			$LDL2 = "00:21";
		}else if ($Hour2 == 22){
			$LDL2 = "00:22";
		}else if ($Hour2 == 23){
			$LDL2 = "00:23";
		}else {
			$LDL2 = "00:00";
		}
		?>
		[new Date('<?php echo $Date2 ;?>'), 'Time <?php echo $LDL2 ;?>', <?php echo $value2 ;?>],
	<?php
	  }
	?>
  ]);
   data.addRows([
    <?php 
	$day = date("Y/m/d");
	$now = strtotime($day);
	$day3 = date('Ymd', strtotime('+ 0 day',$now));
	$tsql3 = "SELECT [System]
      ,[eNodebId]
      ,[eNodebName]
      ,[DateId] as dateid
      ,[HourId] as hourid
	  ,sum([LDLTrafficVolumeGB]+[LULTrafficVolumeGB]) as [4GTotalPayloadGB]
	  ,max([LDLResourceBlockUtilizingRate]) as [LDLResourceBlockUtilizingRate]
      ,max([LAVGSimultaneousRRCConnectedUEs]) as [LAVGSimultaneousRRCConnectedUEs]
  FROM [10.23.40.176].[MLRanLink].[dbo].[MCellHour]
  where dateid ='$day3' and [eNodebId] = '$eNodebId'
  group by [System],[eNodebId],[eNodebName],[DateId],[HourId]
  order by [System],[eNodebId],[eNodebName],[DateId] desc,[HourId]";
	 
	$result3 = sqlsrv_query($conn, $tsql3, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								
	while($data3 = sqlsrv_fetch_array($result3))
	  { // Ambil semua data dari hasil eksekusi $sql
		$Date3 = $data3['dateid']->format('m/d/y');
		$Hour3 = $data3['hourid'];
		$value3 = $data3['LDLResourceBlockUtilizingRate'];
		
				if($Hour3 == 0){
			$LDL3 = "00:00" ;
		} else if ($Hour3 == 1){
			$LDL3 = "00:01";
		} else if ($Hour3 == 2){
			$LDL3 = "00:02";
		}else if ($Hour3 == 3){
			$LDL3 = "00:03";
		}else if ($Hour3 == 4){
			$LDL3 = "00:04";
		}else if ($Hour3 == 5){
			$LDL3 = "00:05";
		}else if ($Hour3 == 6){
			$LDL3 = "00:06";
		}else if ($Hour3 == 7){
			$LDL3 = "00:07";
		}else if ($Hour3 == 8){
			$LDL3 = "00:08";
		}else if ($Hour3 == 9){
			$LDL3 = "00:09";
		}else if ($Hour3 == 10){
			$LDL3 = "00:10";
		}else if ($Hour3 == 11){
			$LDL3 = "00:11";
		}else if ($Hour3 == 12){
			$LDL3 = "00:12";
		}else if ($Hour3 == 13){
			$LDL3 = "00:13";
		}else if ($Hour3 == 14){
			$LDL3 = "00:14";
		}else if ($Hour3 == 15){
			$LDL3 = "00:15";
		}else if ($Hour3 == 16){
			$LDL3 = "00:16";
		}else if ($Hour3 == 17){
			$LDL3 = "00:17";
		}else if ($Hour3 == 18){
			$LDL3 = "00:18";
		}else if ($Hour3 == 19){
			$LDL3 = "00:19";
		}else if ($Hour3 == 20){
			$LDL3 = "00:20";
		}else if ($Hour3 == 21){
			$LDL3 = "00:21";
		}else if ($Hour3 == 22){
			$LDL3 = "00:22";
		}else if ($Hour3 == 23){
			$LDL3 = "00:23";
		}else {
			$LDL3 = "00:00";
		}
		?>
		[new Date('<?php echo $Date3 ;?>'), 'Time<?php echo $LDL3 ;?>', <?php echo $value3 ;?>],
	<?php
	  }
	?>
  ]);

  var view = new google.visualization.DataView(data);
  view.hideColumns([0]);

  var options = {
    chartArea: {
      height: 200,
    },
    colors: ['#00ff00', '#ff0000','#ffe102'],
    hAxis: {
      title: '',
      textStyle: {
        color: '#01579b',
        fontSize: 10,
        fontName: 'Arial',
        bold: true,
        italic: true
      },
      titleTextStyle: {
        color: '#01579b',
        fontSize: 12,
        fontName: 'Arial',
        bold: false,
        italic: true
      },
      slantedTextAngle: 90
    },
    height: 295,
    legend: {
      position: 'top'
    },
    vAxis: {
      title: '',
      textStyle: {
        color: '#1a237e',
        fontSize: 12,
        bold: true
      },
      titleTextStyle: {
        color: '#1a237e',
        fontSize: 12,
        bold: true
      }
    },
    width: 1050
  };

  var formatDate = new google.visualization.DateFormat({
    pattern: 'dd-MMM-yy'
  });

  var container = document.getElementById('2chart4G');
  var chart = new google.visualization.LineChart(container);

  google.visualization.events.addListener(chart, 'ready', function () {
    var rowIndex = -1;
    var dateValue = null;
    var svgParent = container.getElementsByTagName('svg')[0];
    var labels = [];
    Array.prototype.forEach.call(container.getElementsByTagName('text'), function(text) {
      var groupLabel;
      // find hAxis labels
      if (text.hasAttribute('transform')) {
        rowIndex++;
        if (dateValue !== formatDate.formatValue(data.getValue(rowIndex, 0))) {
          dateValue = formatDate.formatValue(data.getValue(rowIndex, 0));
          groupLabel = text.cloneNode(true);
          groupLabel.removeAttribute('transform');
          groupLabel.removeAttribute('font-style');
          groupLabel.setAttribute('fill', '#333333');
          groupLabel.setAttribute('y', parseFloat(text.getAttribute('y')) + 132);
          groupLabel.textContent = dateValue;
          text.parentNode.appendChild(groupLabel);
          if (labels.length > 0) {
            setLabelX(labels[labels.length - 1], text, 0);
          }
          labels.push(groupLabel);
          addGroupLine(groupLabel, -24, -144);
        }
        if (rowIndex === (data.getNumberOfRows() - 1)) {
          if (labels.length > 0) {
            setLabelX(labels[labels.length - 1], text, 16);
          }
          addGroupLine(text, 18, -12);
        }
      }
    });

    // center group label
    function setLabelX(prevLabel, curLabel, xOffset) {
      prevLabel.setAttribute('x',
        parseFloat(prevLabel.getAttribute('x')) + xOffset +
        ((parseFloat(curLabel.getAttribute('x')) - parseFloat(prevLabel.getAttribute('x'))) / 2)
      );
    }

    // add group line
    function addGroupLine(text, xOffset, yOffset) {
      var parent = container.getElementsByTagName('g')[0];
      var groupLine = container.getElementsByTagName('rect')[0].cloneNode(true);
      groupLine.setAttribute('x', parseFloat(text.getAttribute('x')) + xOffset);
      groupLine.setAttribute('y', parseFloat(text.getAttribute('y')) + yOffset);
      groupLine.setAttribute('width', '0.8');
      groupLine.setAttribute('height', '188');
      groupLine.setAttribute('stroke', '#333333');
      groupLine.setAttribute('stroke-width', '1');
      groupLine.setAttribute('fill', '#333333');
      groupLine.setAttribute('fill-opacity', '1');
      parent.appendChild(groupLine);
    }
  });

  chart.draw(view, options);
}
</script>
<!----------------------------------------------------End Chart 2--------------------------------------------------------->
<!----------------------------------------------------Chart 1--------------------------------------------------------->
<script>
google.charts.load('current', {
  callback: drawChart,
  packages:['corechart']
});

function drawChart() {
  var data = new google.visualization.DataTable();
  data.addColumn('date', '');
  data.addColumn('string', '');
  data.addColumn('number', 'LAVGSimultaneousRRCConnectedUEs');
  data.addRows([
	<?php 
	$eNodebId = $_GET['eNodebId'];
	$day = date("Y/m/d");
	$now = strtotime($day);
	$day1 = date('Ymd', strtotime('- 2 day',$now));
	$tsql1 = "SELECT [System]
      ,[eNodebId]
      ,[eNodebName]
      ,[DateId] as dateid
      ,[HourId] as hourid
	  ,sum([LDLTrafficVolumeGB]+[LULTrafficVolumeGB]) as [4GTotalPayloadGB]
	  ,max([LDLResourceBlockUtilizingRate]) as [LDLResourceBlockUtilizingRate]
      ,max([LAVGSimultaneousRRCConnectedUEs]) as [LAVGSimultaneousRRCConnectedUEs]
  FROM [10.23.40.176].[MLRanLink].[dbo].[MCellHour]
  where dateid ='$day1' and [eNodebId] = '$eNodebId'
  group by [System],[eNodebId],[eNodebName],[DateId],[HourId]
  order by [System],[eNodebId],[eNodebName],[DateId] desc,[HourId]";
	 
	$result1 = sqlsrv_query($conn, $tsql1, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								
	while($data = sqlsrv_fetch_array($result1))
	  { // Ambil semua data dari hasil eksekusi $sql
		$Date = $data['dateid']->format('m/d/y');
		$Hour = $data['hourid'];
		$value = $data['LAVGSimultaneousRRCConnectedUEs'];
		
				if($Hour == 0){
			$CU = "00:00" ;
		} else if ($Hour == 1){
			$CU = "00:01";
		} else if ($Hour == 2){
			$CU = "00:02";
		}else if ($Hour == 3){
			$CU = "00:03";
		}else if ($Hour == 4){
			$CU = "00:04";
		}else if ($Hour == 5){
			$CU = "00:05";
		}else if ($Hour == 6){
			$CU = "00:06";
		}else if ($Hour == 7){
			$CU = "00:07";
		}else if ($Hour == 8){
			$CU = "00:08";
		}else if ($Hour == 9){
			$CU = "00:09";
		}else if ($Hour == 10){
			$CU = "00:10";
		}else if ($Hour == 11){
			$CU = "00:11";
		}else if ($Hour == 12){
			$CU = "00:12";
		}else if ($Hour == 13){
			$CU = "00:13";
		}else if ($Hour == 14){
			$CU = "00:14";
		}else if ($Hour == 15){
			$CU = "00:15";
		}else if ($Hour == 16){
			$CU = "00:16";
		}else if ($Hour == 17){
			$CU = "00:17";
		}else if ($Hour == 18){
			$CU = "00:18";
		}else if ($Hour == 19){
			$CU = "00:19";
		}else if ($Hour == 20){
			$CU = "00:20";
		}else if ($Hour == 21){
			$CU = "00:21";
		}else if ($Hour == 22){
			$CU = "00:22";
		}else if ($Hour == 23){
			$CU = "00:23";
		}else {
			$CU = "00:00";
		}
		?>
		[new Date('<?php echo $Date ;?>'), 'Time <?php echo $CU ;?>', <?php echo $value ;?>],
	<?php
	  }
	?>
	
  ]);
   data.addRows([
    <?php 
	$day = date("Y/m/d");
	$now = strtotime($day);
	$day2 = date('Ymd', strtotime('- 1 day',$now));
	$tsql2 = "SELECT [System]
      ,[eNodebId]
      ,[eNodebName]
      ,[DateId] as dateid
      ,[HourId] as hourid
	  ,sum([LDLTrafficVolumeGB]+[LULTrafficVolumeGB]) as [4GTotalPayloadGB]
	  ,max([LDLResourceBlockUtilizingRate]) as [LDLResourceBlockUtilizingRate]
      ,max([LAVGSimultaneousRRCConnectedUEs]) as [LAVGSimultaneousRRCConnectedUEs]
  FROM [10.23.40.176].[MLRanLink].[dbo].[MCellHour]
  where dateid ='$day2' and [eNodebId] = '$eNodebId'
  group by [System],[eNodebId],[eNodebName],[DateId],[HourId]
  order by [System],[eNodebId],[eNodebName],[DateId] desc,[HourId]";
	 
	$result2 = sqlsrv_query($conn, $tsql2, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								
	while($data2 = sqlsrv_fetch_array($result2))
	  { // Ambil semua data dari hasil eksekusi $sql
		$Date2 = $data2['dateid']->format('m/d/y');
		$Hour2 = $data2['hourid'];
		$value2 = $data2['LAVGSimultaneousRRCConnectedUEs'];
		
				if($Hour2 == 0){
			$CU2 = "00:00" ;
		} else if ($Hour2 == 1){
			$CU2 = "00:01";
		} else if ($Hour2 == 2){
			$CU2 = "00:02";
		}else if ($Hour2 == 3){
			$CU2 = "00:03";
		}else if ($Hour2 == 4){
			$CU2 = "00:04";
		}else if ($Hour2 == 5){
			$CU2 = "00:05";
		}else if ($Hour2 == 6){
			$CU2 = "00:06";
		}else if ($Hour2 == 7){
			$CU2 = "00:07";
		}else if ($Hour2 == 8){
			$CU2 = "00:08";
		}else if ($Hour2 == 9){
			$CU2 = "00:09";
		}else if ($Hour2 == 10){
			$CU2 = "00:10";
		}else if ($Hour2 == 11){
			$CU2 = "00:11";
		}else if ($Hour2 == 12){
			$CU2 = "00:12";
		}else if ($Hour2 == 13){
			$CU2 = "00:13";
		}else if ($Hour2 == 14){
			$CU2 = "00:14";
		}else if ($Hour2 == 15){
			$CU2 = "00:15";
		}else if ($Hour2 == 16){
			$CU2 = "00:16";
		}else if ($Hour2 == 17){
			$CU2 = "00:17";
		}else if ($Hour2 == 18){
			$CU2 = "00:18";
		}else if ($Hour2 == 19){
			$CU2 = "00:19";
		}else if ($Hour2 == 20){
			$CU2 = "00:20";
		}else if ($Hour2 == 21){
			$CU2 = "00:21";
		}else if ($Hour2 == 22){
			$CU2 = "00:22";
		}else if ($Hour2 == 23){
			$CU2 = "00:23";
		}else {
			$CU2 = "00:00";
		}
		?>
		[new Date('<?php echo $Date2 ;?>'), 'Time <?php echo $CU2 ;?>', <?php echo $value2 ;?>],
	<?php
	  }
	?>
  ]);
   data.addRows([
    <?php 
	$day = date("Y/m/d");
	$now = strtotime($day);
	$day3 = date('Ymd', strtotime('+ 0 day',$now));
	$tsql3 = "SELECT [System]
      ,[eNodebId]
      ,[eNodebName]
      ,[DateId] as dateid
      ,[HourId] as hourid
	  ,sum([LDLTrafficVolumeGB]+[LULTrafficVolumeGB]) as [4GTotalPayloadGB]
	  ,max([LDLResourceBlockUtilizingRate]) as [LDLResourceBlockUtilizingRate]
      ,max([LAVGSimultaneousRRCConnectedUEs]) as [LAVGSimultaneousRRCConnectedUEs]
  FROM [10.23.40.176].[MLRanLink].[dbo].[MCellHour]
  where dateid ='$day3' and [eNodebId] = '$eNodebId'
  group by [System],[eNodebId],[eNodebName],[DateId],[HourId]
  order by [System],[eNodebId],[eNodebName],[DateId] desc,[HourId]";
	 
	$result3 = sqlsrv_query($conn, $tsql3, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								
	while($data3 = sqlsrv_fetch_array($result3))
	  { // Ambil semua data dari hasil eksekusi $sql
		$Date3 = $data3['dateid']->format('m/d/y');
		$Hour3 = $data3['hourid'];
		$value3 = $data3['LAVGSimultaneousRRCConnectedUEs'];
		
				if($Hour3 == 0){
			$CU3 = "00:00" ;
		} else if ($Hour3 == 1){
			$CU3 = "00:01";
		} else if ($Hour3 == 2){
			$CU3 = "00:02";
		}else if ($Hour3 == 3){
			$CU3 = "00:03";
		}else if ($Hour3 == 4){
			$CU3 = "00:04";
		}else if ($Hour3 == 5){
			$CU3 = "00:05";
		}else if ($Hour3 == 6){
			$CU3 = "00:06";
		}else if ($Hour3 == 7){
			$CU3 = "00:07";
		}else if ($Hour3 == 8){
			$CU3 = "00:08";
		}else if ($Hour3 == 9){
			$CU3 = "00:09";
		}else if ($Hour3 == 10){
			$CU3 = "00:10";
		}else if ($Hour3 == 11){
			$CU3 = "00:11";
		}else if ($Hour3 == 12){
			$CU3 = "00:12";
		}else if ($Hour3 == 13){
			$CU3 = "00:13";
		}else if ($Hour3 == 14){
			$CU3 = "00:14";
		}else if ($Hour3 == 15){
			$CU3 = "00:15";
		}else if ($Hour3 == 16){
			$CU3 = "00:16";
		}else if ($Hour3 == 17){
			$CU3 = "00:17";
		}else if ($Hour3 == 18){
			$CU3 = "00:18";
		}else if ($Hour3 == 19){
			$CU3 = "00:19";
		}else if ($Hour3 == 20){
			$CU3 = "00:20";
		}else if ($Hour3 == 21){
			$CU3 = "00:21";
		}else if ($Hour3 == 22){
			$CU3 = "00:22";
		}else if ($Hour3 == 23){
			$CU3 = "00:23";
		}else {
			$CU3 = "00:00";
		}
		?>
		[new Date('<?php echo $Date3 ;?>'), 'Time <?php echo $CU3 ;?>', <?php echo $value3 ;?>],
	<?php
	  }
	?>
  ]);

  var view = new google.visualization.DataView(data);
  view.hideColumns([0]);

  var options = {
    chartArea: {
      height: 200,
    },
    colors: ['#00ff00', '#ff0000','#ffe102'],
    hAxis: {
      title: '',
      textStyle: {
        color: '#01579b',
        fontSize: 10,
        fontName: 'Arial',
        bold: true,
        italic: true
      },
      titleTextStyle: {
        color: '#01579b',
        fontSize: 12,
        fontName: 'Arial',
        bold: false,
        italic: true
      },
      slantedTextAngle: 90
    },
    height: 295,
    legend: {
      position: 'top'
    },
    title: 'Applications status (3 Days) eNodebId <?php echo $eNodebId ;?> ',
    vAxis: {
      title: '',
      textStyle: {
        color: '#1a237e',
        fontSize: 12,
        bold: true
      },
      titleTextStyle: {
        color: '#1a237e',
        fontSize: 12,
        bold: true
      }
    },
    width: 1050
  };

  var formatDate = new google.visualization.DateFormat({
    pattern: 'dd-MMM-yy'
  });

  var container = document.getElementById('3chart4G');
  var chart = new google.visualization.LineChart(container);

  google.visualization.events.addListener(chart, 'ready', function () {
    var rowIndex = -1;
    var dateValue = null;
    var svgParent = container.getElementsByTagName('svg')[0];
    var labels = [];
    Array.prototype.forEach.call(container.getElementsByTagName('text'), function(text) {
      var groupLabel;
      // find hAxis labels
      if (text.hasAttribute('transform')) {
        rowIndex++;
        if (dateValue !== formatDate.formatValue(data.getValue(rowIndex, 0))) {
          dateValue = formatDate.formatValue(data.getValue(rowIndex, 0));
          groupLabel = text.cloneNode(true);
          groupLabel.removeAttribute('transform');
          groupLabel.removeAttribute('font-style');
          groupLabel.setAttribute('fill', '#333333');
          groupLabel.setAttribute('y', parseFloat(text.getAttribute('y')) + 132);
          groupLabel.textContent = dateValue;
          text.parentNode.appendChild(groupLabel);
          if (labels.length > 0) {
            setLabelX(labels[labels.length - 1], text, 0);
          }
          labels.push(groupLabel);
          addGroupLine(groupLabel, -24, -144);
        }
        if (rowIndex === (data.getNumberOfRows() - 1)) {
          if (labels.length > 0) {
            setLabelX(labels[labels.length - 1], text, 16);
          }
          addGroupLine(text, 18, -12);
        }
      }
    });

    // center group label
    function setLabelX(prevLabel, curLabel, xOffset) {
      prevLabel.setAttribute('x',
        parseFloat(prevLabel.getAttribute('x')) + xOffset +
        ((parseFloat(curLabel.getAttribute('x')) - parseFloat(prevLabel.getAttribute('x'))) / 2)
      );
    }

    // add group line
    function addGroupLine(text, xOffset, yOffset) {
      var parent = container.getElementsByTagName('g')[0];
      var groupLine = container.getElementsByTagName('rect')[0].cloneNode(true);
      groupLine.setAttribute('x', parseFloat(text.getAttribute('x')) + xOffset);
      groupLine.setAttribute('y', parseFloat(text.getAttribute('y')) + yOffset);
      groupLine.setAttribute('width', '0.8');
      groupLine.setAttribute('height', '188');
      groupLine.setAttribute('stroke', '#333333');
      groupLine.setAttribute('stroke-width', '1');
      groupLine.setAttribute('fill', '#333333');
      groupLine.setAttribute('fill-opacity', '1');
      parent.appendChild(groupLine);
    }
  });

  chart.draw(view, options);
}
</script>
<!----------------------------------------------------End Chart 3--------------------------------------------------------->

<script src="https://www.gstatic.com/charts/loader.js"></script>

<!---------------------------------------------------------------------------------------------------------------->

<?php
include 'footer.php';
?>