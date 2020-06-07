<?php
include '../header2.php';
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
        <h3>3G Congestion Capacity<small><b> Detail</b></small></h3>
    </div>
</div>
<div class="row">
	<div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Applications status SpeechTraffic (3 Days) SiteId : <?php $SiteId = $_GET['SiteId']; echo $SiteId ;?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
				<div id="1chart3G" class="demo-placeholder"></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Applications status HsdpaUser (3 Days) SiteId : <?php $SiteId = $_GET['SiteId']; echo $SiteId ;?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
				<div id="2chart3G" class="demo-placeholder"></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Applications status TotalPayloadGB (3 Days) SiteId : <?php $SiteId = $_GET['SiteId']; echo $SiteId ;?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
				<div id="3chart3G" class="demo-placeholder"></div>
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
  data.addColumn('number', 'SpeechTraffic');
  data.addRows([
	<?php 
	$SiteId = $_GET['SiteId'];
	$day = date("Y/m/d");
	$now = strtotime($day);
	$day1 = date('Ymd', strtotime('- 2 day',$now));
	$tsql1 = "SELECT [System]
      ,[SiteId] 
      ,[DateId] as dateid
      ,[HourId] as hourid
      ,sum([SpeechTraffic] ) as [SpeechTraffic]
      ,sum([HsdpaUser]) as [HsdpaUser]          
      ,sum([TotalPayloadGB]) as [TotalPayloadGB]
FROM [10.23.40.176].[MUtranLink].[dbo].[MCellhourRealtime]
WHERE [DateId] ='$day1' and [SiteId] ='$SiteId'
GROUP BY [System],[SiteId],[DateId],[HourId]
ORDER BY [System],[SiteId],[DateId],[HourId]";
	 
	$result1 = sqlsrv_query($conn, $tsql1, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								
	while($data = sqlsrv_fetch_array($result1))
	  { // Ambil semua data dari hasil eksekusi $sql

		
		$Date = $data['dateid']->format('m/d/y');
		$Hour = $data['hourid'];
		$value = $data['SpeechTraffic'];
				if($Hour == 0){
			$SpeechTraffic = "00:00" ;
		} else if ($Hour == 1){
			$SpeechTraffic = "00:01";
		} else if ($Hour == 2){
			$SpeechTraffic = "00:02";
		}else if ($Hour == 3){
			$SpeechTraffic = "00:03";
		}else if ($Hour == 4){
			$SpeechTraffic = "00:04";
		}else if ($Hour == 5){
			$SpeechTraffic = "00:05";
		}else if ($Hour == 6){
			$SpeechTraffic = "00:06";
		}else if ($Hour == 7){
			$SpeechTraffic = "00:07";
		}else if ($Hour == 8){
			$SpeechTraffic = "00:08";
		}else if ($Hour == 9){
			$SpeechTraffic = "00:09";
		}else if ($Hour == 10){
			$SpeechTraffic = "00:10";
		}else if ($Hour == 11){
			$SpeechTraffic = "00:11";
		}else if ($Hour == 12){
			$SpeechTraffic = "00:12";
		}else if ($Hour == 13){
			$SpeechTraffic = "00:13";
		}else if ($Hour == 14){
			$SpeechTraffic = "00:14";
		}else if ($Hour == 15){
			$SpeechTraffic = "00:15";
		}else if ($Hour == 16){
			$SpeechTraffic = "00:16";
		}else if ($Hour == 17){
			$SpeechTraffic = "00:17";
		}else if ($Hour == 18){
			$SpeechTraffic = "00:18";
		}else if ($Hour == 19){
			$SpeechTraffic = "00:19";
		}else if ($Hour == 20){
			$SpeechTraffic = "00:20";
		}else if ($Hour == 21){
			$SpeechTraffic = "00:21";
		}else if ($Hour == 22){
			$SpeechTraffic = "00:22";
		}else if ($Hour == 23){
			$SpeechTraffic = "00:23";
		}else {
			$SpeechTraffic = "00:00";
		}
		?>
		[new Date('<?php echo $Date ;?>'), 'Time <?php echo $SpeechTraffic ;?>', <?php echo $value ;?>],
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
      ,[SiteId] 
      ,[DateId] as dateid
      ,[HourId] as hourid
      ,sum([SpeechTraffic] ) as [SpeechTraffic]
      ,sum([HsdpaUser]) as [HsdpaUser]          
      ,sum([TotalPayloadGB]) as [TotalPayloadGB]
FROM [10.23.40.176].[MUtranLink].[dbo].[MCellhourRealtime]
WHERE [DateId] ='$day2' and [SiteId] ='$SiteId'
GROUP BY [System],[SiteId],[DateId],[HourId]
ORDER BY [System],[SiteId],[DateId],[HourId]";
	 
	$result2 = sqlsrv_query($conn, $tsql2, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								
	while($data2 = sqlsrv_fetch_array($result2))
	  { // Ambil semua data dari hasil eksekusi $sql
		$Date2 = $data2['dateid']->format('m/d/y');
		$Hour2 = $data2['hourid'];
		$value2 = $data2['SpeechTraffic'];
		
				if($Hour2 == 0){
			$SpeechTraffic2 = "00:00" ;
		} else if ($Hour2 == 1){
			$SpeechTraffic2 = "00:01";
		} else if ($Hour2 == 2){
			$SpeechTraffic2 = "00:02";
		}else if ($Hour2 == 3){
			$SpeechTraffic2 = "00:03";
		}else if ($Hour2 == 4){
			$SpeechTraffic2 = "00:04";
		}else if ($Hour2 == 5){
			$SpeechTraffic2 = "00:05";
		}else if ($Hour2 == 6){
			$SpeechTraffic2 = "00:06";
		}else if ($Hour2 == 7){
			$SpeechTraffic2 = "00:07";
		}else if ($Hour2 == 8){
			$SpeechTraffic2 = "00:08";
		}else if ($Hour2 == 9){
			$SpeechTraffic2 = "00:09";
		}else if ($Hour2 == 10){
			$SpeechTraffic2 = "00:10";
		}else if ($Hour2 == 11){
			$SpeechTraffic2 = "00:11";
		}else if ($Hour2 == 12){
			$SpeechTraffic2 = "00:12";
		}else if ($Hour2 == 13){
			$SpeechTraffic2 = "00:13";
		}else if ($Hour2 == 14){
			$SpeechTraffic2 = "00:14";
		}else if ($Hour2 == 15){
			$SpeechTraffic2 = "00:15";
		}else if ($Hour2 == 16){
			$SpeechTraffic2 = "00:16";
		}else if ($Hour2 == 17){
			$SpeechTraffic2 = "00:17";
		}else if ($Hour2 == 18){
			$SpeechTraffic2 = "00:18";
		}else if ($Hour2 == 19){
			$SpeechTraffic2 = "00:19";
		}else if ($Hour2 == 20){
			$SpeechTraffic2 = "00:20";
		}else if ($Hour2 == 21){
			$SpeechTraffic2 = "00:21";
		}else if ($Hour2 == 22){
			$SpeechTraffic2 = "00:22";
		}else if ($Hour2 == 23){
			$SpeechTraffic2 = "00:23";
		}else {
			$SpeechTraffic2 = "00:00";
		}
		?>
		[new Date('<?php echo $Date2 ;?>'), 'Time <?php echo $SpeechTraffic2 ;?>', <?php echo $value2 ;?>],
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
      ,[SiteId] 
      ,[DateId] as dateid
      ,[HourId] as hourid
      ,sum([SpeechTraffic] ) as [SpeechTraffic]
      ,sum([HsdpaUser]) as [HsdpaUser]          
      ,sum([TotalPayloadGB]) as [TotalPayloadGB]
FROM [10.23.40.176].[MUtranLink].[dbo].[MCellhourRealtime]
WHERE [DateId] ='$day3' and [SiteId] ='$SiteId'
GROUP BY [System],[SiteId],[DateId],[HourId]
ORDER BY [System],[SiteId],[DateId],[HourId]";
	 
	$result3 = sqlsrv_query($conn, $tsql3, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								
	while($data3 = sqlsrv_fetch_array($result3))
	  { // Ambil semua data dari hasil eksekusi $sql
		$Date3 = $data3['dateid']->format('m/d/y');
		$Hour3 = $data3['hourid'];
		$value3 = $data3['SpeechTraffic'];
				if($Hour3 == 0){
			$SpeechTraffic3 = "00:00" ;
		} else if ($Hour3 == 1){
			$SpeechTraffic3 = "00:01";
		} else if ($Hour3 == 2){
			$SpeechTraffic3 = "00:02";
		}else if ($Hour3 == 3){
			$SpeechTraffic3 = "00:03";
		}else if ($Hour3 == 4){
			$SpeechTraffic3 = "00:04";
		}else if ($Hour3 == 5){
			$SpeechTraffic3 = "00:05";
		}else if ($Hour3 == 6){
			$SpeechTraffic3 = "00:06";
		}else if ($Hour3 == 7){
			$SpeechTraffic3 = "00:07";
		}else if ($Hour3 == 8){
			$SpeechTraffic3 = "00:08";
		}else if ($Hour3 == 9){
			$SpeechTraffic3 = "00:09";
		}else if ($Hour3 == 10){
			$SpeechTraffic3 = "00:10";
		}else if ($Hour3 == 11){
			$SpeechTraffic3 = "00:11";
		}else if ($Hour3 == 12){
			$SpeechTraffic3 = "00:12";
		}else if ($Hour3 == 13){
			$SpeechTraffic3 = "00:13";
		}else if ($Hour3 == 14){
			$SpeechTraffic3 = "00:14";
		}else if ($Hour3 == 15){
			$SpeechTraffic3 = "00:15";
		}else if ($Hour3 == 16){
			$SpeechTraffic3 = "00:16";
		}else if ($Hour3 == 17){
			$SpeechTraffic3 = "00:17";
		}else if ($Hour3 == 18){
			$SpeechTraffic3 = "00:18";
		}else if ($Hour3 == 19){
			$SpeechTraffic3 = "00:19";
		}else if ($Hour3 == 20){
			$SpeechTraffic3 = "00:20";
		}else if ($Hour3 == 21){
			$SpeechTraffic3 = "00:21";
		}else if ($Hour3 == 22){
			$SpeechTraffic3 = "00:22";
		}else if ($Hour3 == 23){
			$SpeechTraffic3 = "00:23";
		}else {
			$SpeechTraffic3 = "00:00";
		}
		
		?>
		[new Date('<?php echo $Date3 ;?>'), 'Time <?php echo $SpeechTraffic3 ;?>', <?php echo $value3 ;?>],
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

  var container = document.getElementById('1chart3G');
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
  data.addColumn('number', 'HsdpaUser');
  data.addRows([
	<?php 
	$SiteId = $_GET['SiteId'];
	$day = date("Y/m/d");
	$now = strtotime($day);
	$day1 = date('Ymd', strtotime('- 2 day',$now));
	$tsql1 = "SELECT [System]
      ,[SiteId] 
      ,[DateId] as dateid
      ,[HourId] as hourid
      ,sum([SpeechTraffic] ) as [SpeechTraffic]
      ,sum([HsdpaUser]) as [HsdpaUser]          
      ,sum([TotalPayloadGB]) as [TotalPayloadGB]
FROM [10.23.40.176].[MUtranLink].[dbo].[MCellhourRealtime]
WHERE [DateId] ='$day1' and [SiteId] ='$SiteId'
GROUP BY [System],[SiteId],[DateId],[HourId]
ORDER BY [System],[SiteId],[DateId],[HourId]";
	 
	$result1 = sqlsrv_query($conn, $tsql1, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								
	while($data = sqlsrv_fetch_array($result1))
	  { // Ambil semua data dari hasil eksekusi $sql
		$Date = $data['dateid']->format('m/d/y');
		$Hour = $data['hourid'];
		$value = $data['HsdpaUser'];
		
		if($Hour == 0){
			$HsdpaUser = "00:00" ;
		} else if ($Hour == 1){
			$HsdpaUser = "00:01";
		} else if ($Hour == 2){
			$HsdpaUser = "00:02";
		}else if ($Hour == 3){
			$HsdpaUser = "00:03";
		}else if ($Hour == 4){
			$HsdpaUser = "00:04";
		}else if ($Hour == 5){
			$HsdpaUser = "00:05";
		}else if ($Hour == 6){
			$HsdpaUser = "00:06";
		}else if ($Hour == 7){
			$HsdpaUser = "00:07";
		}else if ($Hour == 8){
			$HsdpaUser = "00:08";
		}else if ($Hour == 9){
			$HsdpaUser = "00:09";
		}else if ($Hour == 10){
			$HsdpaUser = "00:10";
		}else if ($Hour == 11){
			$HsdpaUser = "00:11";
		}else if ($Hour == 12){
			$HsdpaUser = "00:12";
		}else if ($Hour == 13){
			$HsdpaUser = "00:13";
		}else if ($Hour == 14){
			$HsdpaUser = "00:14";
		}else if ($Hour == 15){
			$HsdpaUser = "00:15";
		}else if ($Hour == 16){
			$HsdpaUser = "00:16";
		}else if ($Hour == 17){
			$HsdpaUser = "00:17";
		}else if ($Hour == 18){
			$HsdpaUser = "00:18";
		}else if ($Hour == 19){
			$HsdpaUser = "00:19";
		}else if ($Hour == 20){
			$HsdpaUser = "00:20";
		}else if ($Hour == 21){
			$HsdpaUser = "00:21";
		}else if ($Hour == 22){
			$HsdpaUser = "00:22";
		}else if ($Hour == 23){
			$HsdpaUser = "00:23";
		}else {
			$HsdpaUser = "00:00";
		}
		?>
		[new Date('<?php echo $Date ;?>'), 'Time <?php echo $HsdpaUser ;?>', <?php echo $value ;?>],
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
      ,[SiteId] 
      ,[DateId] as dateid
      ,[HourId] as hourid
      ,sum([SpeechTraffic] ) as [SpeechTraffic]
      ,sum([HsdpaUser]) as [HsdpaUser]          
      ,sum([TotalPayloadGB]) as [TotalPayloadGB]
FROM [10.23.40.176].[MUtranLink].[dbo].[MCellhourRealtime]
WHERE [DateId] ='$day2' and [SiteId] ='$SiteId'
GROUP BY [System],[SiteId],[DateId],[HourId]
ORDER BY [System],[SiteId],[DateId],[HourId]";
	 
	$result2 = sqlsrv_query($conn, $tsql2, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								
	while($data2 = sqlsrv_fetch_array($result2))
	  { // Ambil semua data dari hasil eksekusi $sql
		$Date2 = $data2['dateid']->format('m/d/y');
		$Hour2 = $data2['hourid'];
		$value2 = $data2['HsdpaUser'];
		
				if($Hour2 == 0){
			$HsdpaUser2 = "00:00" ;
		} else if ($Hour2 == 1){
			$HsdpaUser2 = "00:01";
		} else if ($Hour2 == 2){
			$HsdpaUser2 = "00:02";
		}else if ($Hour2 == 3){
			$HsdpaUser2 = "00:03";
		}else if ($Hour2 == 4){
			$HsdpaUser2 = "00:04";
		}else if ($Hour2 == 5){
			$HsdpaUser2 = "00:05";
		}else if ($Hour2 == 6){
			$HsdpaUser2 = "00:06";
		}else if ($Hour2 == 7){
			$HsdpaUser2 = "00:07";
		}else if ($Hour2 == 8){
			$HsdpaUser2 = "00:08";
		}else if ($Hour2 == 9){
			$HsdpaUser2 = "00:09";
		}else if ($Hour2 == 10){
			$HsdpaUser2 = "00:10";
		}else if ($Hour2 == 11){
			$HsdpaUser2 = "00:11";
		}else if ($Hour2 == 12){
			$HsdpaUser2 = "00:12";
		}else if ($Hour2 == 13){
			$HsdpaUser2 = "00:13";
		}else if ($Hour2 == 14){
			$HsdpaUser2 = "00:14";
		}else if ($Hour2 == 15){
			$HsdpaUser2 = "00:15";
		}else if ($Hour2 == 16){
			$HsdpaUser2 = "00:16";
		}else if ($Hour2 == 17){
			$HsdpaUser2 = "00:17";
		}else if ($Hour2 == 18){
			$HsdpaUser2 = "00:18";
		}else if ($Hour2 == 19){
			$HsdpaUser2 = "00:19";
		}else if ($Hour2 == 20){
			$HsdpaUser2 = "00:20";
		}else if ($Hour2 == 21){
			$HsdpaUser2 = "00:21";
		}else if ($Hour2 == 22){
			$HsdpaUser2 = "00:22";
		}else if ($Hour2 == 23){
			$HsdpaUser2 = "00:23";
		}else {
			$HsdpaUser2 = "00:00";
		}
		?>
		[new Date('<?php echo $Date2 ;?>'), 'Time <?php echo $HsdpaUser2 ;?>', <?php echo $value2 ;?>],
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
      ,[SiteId] 
      ,[DateId] as dateid
      ,[HourId] as hourid
      ,sum([SpeechTraffic] ) as [SpeechTraffic]
      ,sum([HsdpaUser]) as [HsdpaUser]          
      ,sum([TotalPayloadGB]) as [TotalPayloadGB]
FROM [10.23.40.176].[MUtranLink].[dbo].[MCellhourRealtime]
WHERE [DateId] ='$day3' and [SiteId] ='$SiteId'
GROUP BY [System],[SiteId],[DateId],[HourId]
ORDER BY [System],[SiteId],[DateId],[HourId]";
	 
	$result3 = sqlsrv_query($conn, $tsql3, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								
	while($data3 = sqlsrv_fetch_array($result3))
	  { // Ambil semua data dari hasil eksekusi $sql
		$Date3 = $data3['dateid']->format('m/d/y');
		$Hour3 = $data3['hourid'];
		$value3 = $data3['HsdpaUser'];
		
				if($Hour3 == 0){
			$HsdpaUser3 = "00:00" ;
		} else if ($Hour3 == 1){
			$HsdpaUser3 = "00:01";
		} else if ($Hour3 == 2){
			$HsdpaUser3 = "00:02";
		}else if ($Hour3 == 3){
			$HsdpaUser3 = "00:03";
		}else if ($Hour3 == 4){
			$HsdpaUser3 = "00:04";
		}else if ($Hour3 == 5){
			$HsdpaUser3 = "00:05";
		}else if ($Hour3 == 6){
			$HsdpaUser3 = "00:06";
		}else if ($Hour3 == 7){
			$HsdpaUser3 = "00:07";
		}else if ($Hour3 == 8){
			$HsdpaUser3 = "00:08";
		}else if ($Hour3 == 9){
			$HsdpaUser3 = "00:09";
		}else if ($Hour3 == 10){
			$HsdpaUser3 = "00:10";
		}else if ($Hour3 == 11){
			$HsdpaUser3 = "00:11";
		}else if ($Hour3 == 12){
			$HsdpaUser3 = "00:12";
		}else if ($Hour3 == 13){
			$HsdpaUser3 = "00:13";
		}else if ($Hour3 == 14){
			$HsdpaUser3 = "00:14";
		}else if ($Hour3 == 15){
			$HsdpaUser3 = "00:15";
		}else if ($Hour3 == 16){
			$HsdpaUser3 = "00:16";
		}else if ($Hour3 == 17){
			$HsdpaUser3 = "00:17";
		}else if ($Hour3 == 18){
			$HsdpaUser3 = "00:18";
		}else if ($Hour3 == 19){
			$HsdpaUser3 = "00:19";
		}else if ($Hour3 == 20){
			$HsdpaUser3 = "00:20";
		}else if ($Hour3 == 21){
			$HsdpaUser3 = "00:21";
		}else if ($Hour3 == 22){
			$HsdpaUser3 = "00:22";
		}else if ($Hour3 == 23){
			$HsdpaUser3 = "00:23";
		}else {
			$HsdpaUser3 = "00:00";
		}
		?>
		[new Date('<?php echo $Date3 ;?>'), 'Time <?php echo $HsdpaUser3 ;?>', <?php echo $value3 ;?>],
	<?php
	  }
	?>
  ]);

  var view = new google.visualization.DataView(data);
  view.hideColumns([0]);

  var options = {
    chartArea: {
      height: 200,
      top: 60
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

  var container = document.getElementById('2chart3G');
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
  data.addColumn('number', 'TotalPayloadGB');
  data.addRows([
	<?php 
	$SiteId = $_GET['SiteId'];
	$day = date("Y/m/d");
	$now = strtotime($day);
	$day1 = date('Ymd', strtotime('- 2 day',$now));
	$tsql1 = "SELECT [System]
      ,[SiteId] 
      ,[DateId] as dateid
      ,[HourId] as hourid
      ,sum([SpeechTraffic] ) as [SpeechTraffic]
      ,sum([HsdpaUser]) as [HsdpaUser]          
      ,sum([TotalPayloadGB]) as [TotalPayloadGB]
FROM [10.23.40.176].[MUtranLink].[dbo].[MCellhourRealtime]
WHERE [DateId] ='$day1' and [SiteId] ='$SiteId'
GROUP BY [System],[SiteId],[DateId],[HourId]
ORDER BY [System],[SiteId],[DateId],[HourId]";
	 
	$result1 = sqlsrv_query($conn, $tsql1, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								
	while($data = sqlsrv_fetch_array($result1))
	  { // Ambil semua data dari hasil eksekusi $sql
		$Date = $data['dateid']->format('m/d/y');
		$Hour = $data['hourid'];
		$value = $data['TotalPayloadGB'];
		
				if($Hour == 0){
			$HourPayload = "00:00" ;
		} else if ($Hour == 1){
			$HourPayload = "00:01";
		} else if ($Hour == 2){
			$HourPayload = "00:02";
		}else if ($Hour == 3){
			$HourPayload = "00:03";
		}else if ($Hour == 4){
			$HourPayload = "00:04";
		}else if ($Hour == 5){
			$HourPayload = "00:05";
		}else if ($Hour == 6){
			$HourPayload = "00:06";
		}else if ($Hour == 7){
			$HourPayload = "00:07";
		}else if ($Hour == 8){
			$HourPayload = "00:08";
		}else if ($Hour == 9){
			$HourPayload = "00:09";
		}else if ($Hour == 10){
			$HourPayload = "00:10";
		}else if ($Hour == 11){
			$HourPayload = "00:11";
		}else if ($Hour == 12){
			$HourPayload = "00:12";
		}else if ($Hour == 13){
			$HourPayload = "00:13";
		}else if ($Hour == 14){
			$HourPayload = "00:14";
		}else if ($Hour == 15){
			$HourPayload = "00:15";
		}else if ($Hour == 16){
			$HourPayload = "00:16";
		}else if ($Hour == 17){
			$HourPayload = "00:17";
		}else if ($Hour == 18){
			$HourPayload = "00:18";
		}else if ($Hour == 19){
			$HourPayload = "00:19";
		}else if ($Hour == 20){
			$HourPayload = "00:20";
		}else if ($Hour == 21){
			$HourPayload = "00:21";
		}else if ($Hour == 22){
			$HourPayload = "00:22";
		}else if ($Hour == 23){
			$HourPayload = "00:23";
		}else {
			$HourPayload = "00:00";
		}
		?>
		[new Date('<?php echo $Date ;?>'), 'Time <?php echo $HourPayload ;?>', <?php echo $value ;?>],
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
      ,[SiteId] 
      ,[DateId] as dateid
      ,[HourId] as hourid
      ,sum([SpeechTraffic] ) as [SpeechTraffic]
      ,sum([HsdpaUser]) as [HsdpaUser]          
      ,sum([TotalPayloadGB]) as [TotalPayloadGB]
FROM [10.23.40.176].[MUtranLink].[dbo].[MCellhourRealtime]
WHERE [DateId] ='$day2' and [SiteId] ='$SiteId'
GROUP BY [System],[SiteId],[DateId],[HourId]
ORDER BY [System],[SiteId],[DateId],[HourId]";
	 
	$result2 = sqlsrv_query($conn, $tsql2, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								
	while($data2 = sqlsrv_fetch_array($result2))
	  { // Ambil semua data dari hasil eksekusi $sql
		$Date2 = $data2['dateid']->format('m/d/y');
		$Hour2 = $data2['hourid'];
		$value2 = $data2['TotalPayloadGB'];
				if($Hour2 == 0){
			$HourPayload2 = "00:00" ;
		} else if ($Hour2 == 1){
			$HourPayload2 = "00:01";
		} else if ($Hour2 == 2){
			$HourPayload2 = "00:02";
		}else if ($Hour2 == 3){
			$HourPayload2 = "00:03";
		}else if ($Hour2 == 4){
			$HourPayload2 = "00:04";
		}else if ($Hour2 == 5){
			$HourPayload2 = "00:05";
		}else if ($Hour2 == 6){
			$HourPayload2 = "00:06";
		}else if ($Hour2 == 7){
			$HourPayload2 = "00:07";
		}else if ($Hour2 == 8){
			$HourPayload2 = "00:08";
		}else if ($Hour2 == 9){
			$HourPayload2 = "00:09";
		}else if ($Hour2 == 10){
			$HourPayload2 = "00:10";
		}else if ($Hour2 == 11){
			$HourPayload2 = "00:11";
		}else if ($Hour2 == 12){
			$HourPayload2 = "00:12";
		}else if ($Hour2 == 13){
			$HourPayload2 = "00:13";
		}else if ($Hour2 == 14){
			$HourPayload2 = "00:14";
		}else if ($Hour2 == 15){
			$HourPayload2 = "00:15";
		}else if ($Hour2 == 16){
			$HourPayload2 = "00:16";
		}else if ($Hour2 == 17){
			$HourPayload2 = "00:17";
		}else if ($Hour2 == 18){
			$HourPayload2 = "00:18";
		}else if ($Hour2 == 19){
			$HourPayload2 = "00:19";
		}else if ($Hour2 == 20){
			$HourPayload2 = "00:20";
		}else if ($Hour2 == 21){
			$HourPayload2 = "00:21";
		}else if ($Hour2 == 22){
			$HourPayload2 = "00:22";
		}else if ($Hour2 == 23){
			$HourPayload2 = "00:23";
		}else {
			$HourPayload2 = "00:00";
		}
		?>
		[new Date('<?php echo $Date2 ;?>'), 'Time <?php echo $HourPayload2 ;?>', <?php echo $value2 ;?>],
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
      ,[SiteId] 
      ,[DateId] as dateid
      ,[HourId] as hourid
      ,sum([SpeechTraffic] ) as [SpeechTraffic]
      ,sum([HsdpaUser]) as [HsdpaUser]          
      ,sum([TotalPayloadGB]) as [TotalPayloadGB]
FROM [10.23.40.176].[MUtranLink].[dbo].[MCellhourRealtime]
WHERE [DateId] ='$day3' and [SiteId] ='$SiteId'
GROUP BY [System],[SiteId],[DateId],[HourId]
ORDER BY [System],[SiteId],[DateId],[HourId]";
	 
	$result3 = sqlsrv_query($conn, $tsql3, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								
	while($data3 = sqlsrv_fetch_array($result3))
	  { // Ambil semua data dari hasil eksekusi $sql
		
		$Date3 = $data3['dateid']->format('m/d/y');
		$Hour3 = $data3['hourid'];
		$value3 = $data3['TotalPayloadGB'];
		
		if($Hour3 == 0){
			$Hour4 = "00:00" ;
		} else if ($Hour3 == 1){
			$Hour4 = "00:01";
		} else if ($Hour3 == 2){
			$Hour4 = "00:02";
		}else if ($Hour3 == 3){
			$Hour4 = "00:03";
		}else if ($Hour3 == 4){
			$Hour4 = "00:04";
		}else if ($Hour3 == 5){
			$Hour4 = "00:05";
		}else if ($Hour3 == 6){
			$Hour4 = "00:06";
		}else if ($Hour3 == 7){
			$Hour4 = "00:07";
		}else if ($Hour3 == 8){
			$Hour4 = "00:08";
		}else if ($Hour3 == 9){
			$Hour4 = "00:09";
		}else if ($Hour3 == 10){
			$Hour4 = "00:10";
		}else if ($Hour3 == 11){
			$Hour4 = "00:11";
		}else if ($Hour3 == 12){
			$Hour4 = "00:12";
		}else if ($Hour3 == 13){
			$Hour4 = "00:13";
		}else if ($Hour3 == 14){
			$Hour4 = "00:14";
		}else if ($Hour3 == 15){
			$Hour4 = "00:15";
		}else if ($Hour3 == 16){
			$Hour4 = "00:16";
		}else if ($Hour3 == 17){
			$Hour4 = "00:17";
		}else if ($Hour3 == 18){
			$Hour4 = "00:18";
		}else if ($Hour3 == 19){
			$Hour4 = "00:19";
		}else if ($Hour3 == 20){
			$Hour4 = "00:20";
		}else if ($Hour3 == 21){
			$Hour4 = "00:21";
		}else if ($Hour3 == 22){
			$Hour4 = "00:22";
		}else if ($Hour3 == 23){
			$Hour4 = "00:23";
		}else {
			$Hour4 = "00:00";
		}
		?>
		[new Date('<?php echo $Date3 ;?>'), 'Time <?php echo $Hour4 ;?>', <?php echo $value3 ;?>],
	<?php
	  }
	?>
  ]);

  var view = new google.visualization.DataView(data);
  view.hideColumns([0]);

  var options = {
    chartArea: {
      height: 200,
      top: 60
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

  var container = document.getElementById('3chart3G');
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