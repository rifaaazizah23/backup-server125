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
<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">Hourly Trend DSP Load </h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item "><a href="../../rancapman/index.php"><font color="40E0D0">HOME</font></a></li>
          <li class="breadcrumb-item active">Hourly DSP Load</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="conten">
<div id="chart1"></div>
</div>
<div class="conten">
<div id="chart2"></div>
</div>
<br>
<br>
<!---------------------------------------------------------------------------------------------------------------->
<script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js">
</script>
<!-- CHART 1 -->
<script type = "text/javascript">
google.charts.load('current', {packages: ['corechart']});     
</script>
<script>
google.charts.load('current', {
  callback: drawChart,
  packages:['corechart']
});

function drawChart() {
  var data = new google.visualization.DataTable();
  data.addColumn('date', '');
  data.addColumn('string', '');
  data.addColumn('number', 'VsDspLoadMean');
  data.addRows([
	<?php 
	$rnc = $_GET['rnc'];
	$day = date("Y/m/d");
	$now = strtotime($day);
	$day1 = date('Ymd', strtotime('- 2 day',$now));
	$tsql1 = "select [BSC],dateid,hourid,
max([VsDspLoadMean]) as [VsDspLoadMean]
from [10.23.32.165].[MUtranRncCapacity].[dbo].[MDspLoadHour]
where dateid ='$day1' and [BSC] ='$rnc'
group by [BSC],dateid,hourid
union
SELECT [BSC] as RNC,[DateId],hourid,
max([VsCpuLoadMean]) as [VsDspLoadMean]
FROM [10.23.32.165].[MUtranRncCapacity].[dbo].[MCpuLoadHour]
where bsc like 'RN%' and dateid ='$day1' and [BSC] ='$rnc' and 
SubSystemName like '%UUP'
group by [BSC],[DateId],hourid
order by [BSC],dateid desc,hourid
 ";
	 
	$result1 = sqlsrv_query($conn, $tsql1, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								
	while($data = sqlsrv_fetch_array($result1))
	  { // Ambil semua data dari hasil eksekusi $sql
		$Date = $data['dateid']->format('m/d/y');
		$Hour = $data['hourid'];
		$value = $data['VsDspLoadMean'];
		
				if($Hour == 0){
			$Dsp = "00:00" ;
		} else if ($Hour == 1){
			$Dsp = "00:01";
		} else if ($Hour == 2){
			$Dsp = "00:02";
		}else if ($Hour == 3){
			$Dsp = "00:03";
		}else if ($Hour == 4){
			$Dsp = "00:04";
		}else if ($Hour == 5){
			$Dsp = "00:05";
		}else if ($Hour == 6){
			$Dsp = "00:06";
		}else if ($Hour == 7){
			$Dsp = "00:07";
		}else if ($Hour == 8){
			$Dsp = "00:08";
		}else if ($Hour == 9){
			$Dsp = "00:09";
		}else if ($Hour == 10){
			$Dsp = "00:10";
		}else if ($Hour == 11){
			$Dsp = "00:11";
		}else if ($Hour == 12){
			$Dsp = "00:12";
		}else if ($Hour == 13){
			$Dsp = "00:13";
		}else if ($Hour == 14){
			$Dsp = "00:14";
		}else if ($Hour == 15){
			$Dsp = "00:15";
		}else if ($Hour == 16){
			$Dsp = "00:16";
		}else if ($Hour == 17){
			$Dsp = "00:17";
		}else if ($Hour == 18){
			$Dsp = "00:18";
		}else if ($Hour == 19){
			$Dsp = "00:19";
		}else if ($Hour == 20){
			$Dsp = "00:20";
		}else if ($Hour == 21){
			$Dsp = "00:21";
		}else if ($Hour == 22){
			$Dsp = "00:22";
		}else if ($Hour == 23){
			$Dsp = "00:23";
		}else {
			$Dsp = "00:00";
		}
		
		?>
		[new Date('<?php echo $Date ;?>'), 'Time <?php echo $Dsp ;?>', <?php echo $value ;?>],
	<?php
	  }
	?>
	
  ]);
   data.addRows([
    <?php 
	$day = date("Y/m/d");
	$rnc = $_GET['rnc'];
	$now = strtotime($day);
	$day2 = date('Ymd', strtotime('- 1 day',$now));
	$tsql2 = "select [BSC],dateid,hourid,
max([VsDspLoadMean]) as [VsDspLoadMean]
from [10.23.32.165].[MUtranRncCapacity].[dbo].[MDspLoadHour]
where dateid ='$day2' and [BSC] ='$rnc'
group by [BSC],dateid,hourid
union
SELECT [BSC] as RNC,[DateId],hourid,
max([VsCpuLoadMean]) as [VsDspLoadMean]
FROM [10.23.32.165].[MUtranRncCapacity].[dbo].[MCpuLoadHour]
where bsc like 'RN%' and dateid ='$day2' and [BSC] ='$rnc' and 
SubSystemName like '%UUP'
group by [BSC],[DateId],hourid
order by [BSC],dateid desc,hourid";
	 
	$result2 = sqlsrv_query($conn, $tsql2, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								
	while($data2 = sqlsrv_fetch_array($result2))
	  { // Ambil semua data dari hasil eksekusi $sql
		$Date2 = $data2['dateid']->format('m/d/y');
		$Hour2 = $data2['hourid'];
		$value2 = $data2['VsDspLoadMean'];
		
				if($Hour2 == 0){
			$Dsp2 = "00:00" ;
		} else if ($Hour2 == 1){
			$Dsp2 = "00:01";
		} else if ($Hour2 == 2){
			$Dsp2 = "00:02";
		}else if ($Hour2 == 3){
			$Dsp2 = "00:03";
		}else if ($Hour2 == 4){
			$Dsp2 = "00:04";
		}else if ($Hour2 == 5){
			$Dsp2 = "00:05";
		}else if ($Hour2 == 6){
			$Dsp2 = "00:06";
		}else if ($Hour2 == 7){
			$Dsp2 = "00:07";
		}else if ($Hour2 == 8){
			$Dsp2 = "00:08";
		}else if ($Hour2 == 9){
			$Dsp2 = "00:09";
		}else if ($Hour2 == 10){
			$Dsp2 = "00:10";
		}else if ($Hour2 == 11){
			$Dsp2 = "00:11";
		}else if ($Hour2 == 12){
			$Dsp2 = "00:12";
		}else if ($Hour2 == 13){
			$Dsp2 = "00:13";
		}else if ($Hour2 == 14){
			$Dsp2 = "00:14";
		}else if ($Hour2 == 15){
			$Dsp2 = "00:15";
		}else if ($Hour2 == 16){
			$Dsp2 = "00:16";
		}else if ($Hour2 == 17){
			$Dsp2 = "00:17";
		}else if ($Hour2 == 18){
			$Dsp2 = "00:18";
		}else if ($Hour2 == 19){
			$Dsp2 = "00:19";
		}else if ($Hour2 == 20){
			$Dsp2 = "00:20";
		}else if ($Hour2 == 21){
			$Dsp2 = "00:21";
		}else if ($Hour2 == 22){
			$Dsp2 = "00:22";
		}else if ($Hour2 == 23){
			$Dsp2 = "00:23";
		}else {
			$Dsp2 = "00:00";
		}
		?>
		[new Date('<?php echo $Date2 ;?>'), 'Time <?php echo $Dsp2 ;?>', <?php echo $value2 ;?>],
	<?php
	  }
	?>
  ]);
   data.addRows([
    <?php 
	$day = date("Y/m/d");
	$now = strtotime($day);
	$day3 = date('Ymd', strtotime('+ 0 day',$now));
	$tsql3 = "select [BSC],dateid,hourid,
max([VsDspLoadMean]) as [VsDspLoadMean]
from [10.23.32.165].[MUtranRncCapacity].[dbo].[MDspLoadHour]
where dateid ='$day3' and [BSC] ='$rnc'
group by [BSC],dateid,hourid
union
SELECT [BSC] as RNC,[DateId],hourid,
max([VsCpuLoadMean]) as [VsDspLoadMean]
FROM [10.23.32.165].[MUtranRncCapacity].[dbo].[MCpuLoadHour]
where bsc like 'RN%' and dateid ='$day3' and [BSC] ='$rnc' and 
SubSystemName like '%UUP'
group by [BSC],[DateId],hourid
order by [BSC],dateid desc,hourid";
	 
	$result3 = sqlsrv_query($conn, $tsql3, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								
	while($data3 = sqlsrv_fetch_array($result3))
	  { // Ambil semua data dari hasil eksekusi $sql
		$Date3 = $data3['dateid']->format('m/d/y');
		$Hour3 = $data3['hourid'];
		$value3 = $data3['VsDspLoadMean'];
		
				if($Hour3 == 0){
			$Dsp3 = "00:00" ;
		} else if ($Hour3 == 1){
			$Dsp3 = "00:01";
		} else if ($Hour3 == 2){
			$Dsp3 = "00:02";
		}else if ($Hour3 == 3){
			$Dsp3 = "00:03";
		}else if ($Hour3 == 4){
			$Dsp3 = "00:04";
		}else if ($Hour3 == 5){
			$Dsp3 = "00:05";
		}else if ($Hour3 == 6){
			$Dsp3 = "00:06";
		}else if ($Hour3 == 7){
			$Dsp3 = "00:07";
		}else if ($Hour3 == 8){
			$Dsp3 = "00:08";
		}else if ($Hour3 == 9){
			$Dsp3 = "00:09";
		}else if ($Hour3 == 10){
			$Dsp3 = "00:10";
		}else if ($Hour3 == 11){
			$Dsp3 = "00:11";
		}else if ($Hour3 == 12){
			$Dsp3 = "00:12";
		}else if ($Hour3 == 13){
			$Dsp3 = "00:13";
		}else if ($Hour3 == 14){
			$Dsp3 = "00:14";
		}else if ($Hour3 == 15){
			$Dsp3 = "00:15";
		}else if ($Hour3 == 16){
			$Dsp3 = "00:16";
		}else if ($Hour3 == 17){
			$Dsp3 = "00:17";
		}else if ($Hour3 == 18){
			$Dsp3 = "00:18";
		}else if ($Hour3 == 19){
			$Dsp3 = "00:19";
		}else if ($Hour3 == 20){
			$Dsp3 = "00:20";
		}else if ($Hour3 == 21){
			$Dsp3 = "00:21";
		}else if ($Hour3 == 22){
			$Dsp3 = "00:22";
		}else if ($Hour3 == 23){
			$Dsp3 = "00:23";
		}else {
			$Dsp3 = "00:00";
		}
		?>
		[new Date('<?php echo $Date3 ;?>'), 'Time <?php echo $Dsp3 ;?>', <?php echo $value3 ;?>],
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
    height: 455,
    legend: {
      position: 'top'
    },
    title: 'Applications status (3 Days) RNC <?php echo $rnc ;?> ',
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
    width: 1350
  };

  var formatDate = new google.visualization.DateFormat({
    pattern: 'dd-MMM-yy'
  });

  var container = document.getElementById('chart1');
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

<script src="https://www.gstatic.com/charts/loader.js"></script>

<!---------------------------------------------------------------------------------------------------------------->

<?php
include 'footer.php';
?>