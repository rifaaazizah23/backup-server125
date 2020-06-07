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
        <h1 class="h2">Hourly Trend Max MP Load</h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item "><a href="../../rancapman/index.php"><font color="40E0D0">HOME</font></a></li>
          <li class="breadcrumb-item active">Hourly Trend Max MP Load</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="conten">
<div id="1chartBSC"></div>
<div id="2chartBSC"></div>
</div>
<br>
<br>
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
  data.addColumn('number', 'MP LOAD RATE');
  data.addRows([
	<?php 
	$rnc = $_GET['rnc'];
	$day = date("Y/m/d");
	$now = strtotime($day);
	$day1 = date('Ymd', strtotime('- 2 day',$now));
	$tsql1 = "select RNC,dateid,hourid,
				max([MPLoadavgRate]) as [MP Load Rate]
				from [10.23.32.165].[MUtranRncCapacity].[dbo].[MRncLoadControlHour]
				where dateid = '$day1' and RNC='$rnc'
				group by RNC,dateid,hourid
				union
				SELECT [BSC] as RNC,[DateId] as dateid ,hourid,
				max([VsCpuLoadMean]) as [MP Load Rate]
				FROM [10.23.32.165].[MUtranRncCapacity].[dbo].[MCpuLoadHour]
				where bsc like 'RN%' and dateid = '$day1' AND [BSC]='$rnc' and 
				SubSystemName Not like '%UUP' and 
				SubSystemName not like '%NDM' and
				SubSystemName not like '%URSCA' and
				SubSystemName not like '%TRP' and 
				SubSystemName not like '%NIU' and 
				SubSystemName not like '%GRSCM' and
				SubSystemName not like '%URSCM' and
				SubSystemName not like '%POOLOM' and 
				SubSystemName not like '%GCBS'
				group by [BSC],[DateId],hourid
				order by RNC,dateid desc,hourid desc";
	 
	$result1 = sqlsrv_query($conn, $tsql1, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								
	while($data = sqlsrv_fetch_array($result1))
	  { // Ambil semua data dari hasil eksekusi $sql
		$Date = $data['dateid']->format('m/d/y');
		$Hour = $data['hourid'];
		$value = $data['MP Load Rate'];
		?>
		[new Date('<?php echo $Date ;?>'), 'Hour <?php echo $Hour ;?>', <?php echo $value ;?>],
	<?php
	  }
	?>
	
  ]);
   data.addRows([
    <?php 
	$day = date("Y/m/d");
	$now = strtotime($day);
	$day2 = date('Ymd', strtotime('- 1 day',$now));
	$tsql2 = "select RNC,dateid,hourid,
				max([MPLoadavgRate]) as [MP Load Rate]
				from [10.23.32.165].[MUtranRncCapacity].[dbo].[MRncLoadControlHour]
				where dateid = '$day2' and RNC='$rnc'
				group by RNC,dateid,hourid
				union
				SELECT [BSC] as RNC,[DateId] as dateid ,hourid,
				max([VsCpuLoadMean]) as [MP Load Rate]
				FROM [10.23.32.165].[MUtranRncCapacity].[dbo].[MCpuLoadHour]
				where bsc like 'RN%' and dateid = '$day2' AND [BSC] ='$rnc' and 
				SubSystemName Not like '%UUP' and 
				SubSystemName not like '%NDM' and
				SubSystemName not like '%URSCA' and
				SubSystemName not like '%TRP' and 
				SubSystemName not like '%NIU' and 
				SubSystemName not like '%GRSCM' and
				SubSystemName not like '%URSCM' and
				SubSystemName not like '%POOLOM' and 
				SubSystemName not like '%GCBS'
				group by [BSC],[DateId],hourid
				order by RNC,dateid desc,hourid desc";
	 
	$result2 = sqlsrv_query($conn, $tsql2, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								
	while($data2 = sqlsrv_fetch_array($result2))
	  { // Ambil semua data dari hasil eksekusi $sql
		$Date2 = $data2['dateid']->format('m/d/y');
		$Hour2 = $data2['hourid'];
		$value2 = $data2['MP Load Rate'];
		?>
		[new Date('<?php echo $Date2 ;?>'), 'Hour <?php echo $Hour2 ;?>', <?php echo $value2 ;?>],
	<?php
	  }
	?>
  ]);
   data.addRows([
    <?php 
	$day = date("Y/m/d");
	$now = strtotime($day);
	$day3 = date('Ymd', strtotime('+ 0 day',$now));
	$tsql3 = "select RNC,dateid,hourid,
				max([MPLoadavgRate]) as [MP_Load_Rate]
				from [10.23.32.165].[MUtranRncCapacity].[dbo].[MRncLoadControlHour]
				where dateid = '$day3' and RNC='$rnc'
				group by RNC,dateid,hourid
				union
				SELECT [BSC] as RNC,[DateId] as dateid ,hourid,
				max([VsCpuLoadMean]) as [MP_Load_Rate]
				FROM [10.23.32.165].[MUtranRncCapacity].[dbo].[MCpuLoadHour]
				where bsc like 'RN%' and dateid = '$day3' AND [BSC] ='$rnc' and 
				SubSystemName Not like '%UUP' and 
				SubSystemName not like '%NDM' and
				SubSystemName not like '%URSCA' and
				SubSystemName not like '%TRP' and 
				SubSystemName not like '%NIU' and 
				SubSystemName not like '%GRSCM' and
				SubSystemName not like '%URSCM' and
				SubSystemName not like '%POOLOM' and 
				SubSystemName not like '%GCBS'
				group by [BSC],[DateId],hourid
				order by RNC,dateid desc,hourid desc";
	 
	$result3 = sqlsrv_query($conn, $tsql3, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								
	while($data3 = sqlsrv_fetch_array($result3))
	  { // Ambil semua data dari hasil eksekusi $sql
		$Date3 = $data3['dateid']->format('m/d/y');
		$Hour3 = $data3['hourid'];
		$value3 = $data3['MP_Load_Rate'];
		?>
		[new Date('<?php echo $Date3 ;?>'), 'Hour <?php echo $Hour3 ;?>', <?php echo $value3 ;?>],
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

  var container = document.getElementById('1chartBSC');
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
  data.addColumn('number', 'MP LOAD RATE');
  data.addRows([
	<?php 
	$rnc = $_GET['rnc'];
	$day = date("Y/m/d");
	$now = strtotime($day);
	$day1 = date('Ymd', strtotime('- 2 day',$now));
	$tsql1 = "select RNC,dateid,hourid,
				max([MPLoadavgRate]) as [MP Load Rate]
				from [10.23.32.165].[MUtranRncCapacity].[dbo].[MRncLoadControlHour]
				where dateid = '$day1' and RNC='$rnc'
				group by RNC,dateid,hourid
				union
				SELECT [BSC] as RNC,[DateId] as dateid ,hourid,
				max([VsCpuLoadMean]) as [MP Load Rate]
				FROM [10.23.32.165].[MUtranRncCapacity].[dbo].[MCpuLoadHour]
				where bsc like 'RN%' and dateid = '$day1' AND [BSC]='$rnc' and 
				SubSystemName Not like '%UUP' and 
				SubSystemName not like '%NDM' and
				SubSystemName not like '%URSCA' and
				SubSystemName not like '%TRP' and 
				SubSystemName not like '%NIU' and 
				SubSystemName not like '%GRSCM' and
				SubSystemName not like '%URSCM' and
				SubSystemName not like '%POOLOM' and 
				SubSystemName not like '%GCBS'
				group by [BSC],[DateId],hourid
				order by RNC,dateid desc,hourid desc";
	 
	$result1 = sqlsrv_query($conn, $tsql1, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								
	while($data = sqlsrv_fetch_array($result1))
	  { // Ambil semua data dari hasil eksekusi $sql
		$Date = $data['dateid']->format('m/d/y');
		$Hour = $data['hourid'];
		$value = $data['MP Load Rate'];
		?>
		[new Date('<?php echo $Date ;?>'), 'Hour <?php echo $Hour ;?>', <?php echo $value ;?>],
	<?php
	  }
	?>
	
  ]);
   data.addRows([
    <?php 
	$day = date("Y/m/d");
	$now = strtotime($day);
	$day2 = date('Ymd', strtotime('- 1 day',$now));
	$tsql2 = "select RNC,dateid,hourid,
				max([MPLoadavgRate]) as [MP Load Rate]
				from [10.23.32.165].[MUtranRncCapacity].[dbo].[MRncLoadControlHour]
				where dateid = '$day2' and RNC='$rnc'
				group by RNC,dateid,hourid
				union
				SELECT [BSC] as RNC,[DateId] as dateid ,hourid,
				max([VsCpuLoadMean]) as [MP Load Rate]
				FROM [10.23.32.165].[MUtranRncCapacity].[dbo].[MCpuLoadHour]
				where bsc like 'RN%' and dateid = '$day2' AND [BSC] ='$rnc' and 
				SubSystemName Not like '%UUP' and 
				SubSystemName not like '%NDM' and
				SubSystemName not like '%URSCA' and
				SubSystemName not like '%TRP' and 
				SubSystemName not like '%NIU' and 
				SubSystemName not like '%GRSCM' and
				SubSystemName not like '%URSCM' and
				SubSystemName not like '%POOLOM' and 
				SubSystemName not like '%GCBS'
				group by [BSC],[DateId],hourid
				order by RNC,dateid desc,hourid desc";
	 
	$result2 = sqlsrv_query($conn, $tsql2, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								
	while($data2 = sqlsrv_fetch_array($result2))
	  { // Ambil semua data dari hasil eksekusi $sql
		$Date2 = $data2['dateid']->format('m/d/y');
		$Hour2 = $data2['hourid'];
		$value2 = $data2['MP Load Rate'];
		?>
		[new Date('<?php echo $Date2 ;?>'), 'Hour <?php echo $Hour2 ;?>', <?php echo $value2 ;?>],
	<?php
	  }
	?>
  ]);
   data.addRows([
    <?php 
	$day = date("Y/m/d");
	$now = strtotime($day);
	$day3 = date('Ymd', strtotime('+ 0 day',$now));
	$tsql3 = "select RNC,dateid,hourid,
				max([MPLoadavgRate]) as [MP_Load_Rate]
				from [10.23.32.165].[MUtranRncCapacity].[dbo].[MRncLoadControlHour]
				where dateid = '$day3' and RNC='$rnc'
				group by RNC,dateid,hourid
				union
				SELECT [BSC] as RNC,[DateId] as dateid ,hourid,
				max([VsCpuLoadMean]) as [MP_Load_Rate]
				FROM [10.23.32.165].[MUtranRncCapacity].[dbo].[MCpuLoadHour]
				where bsc like 'RN%' and dateid = '$day3' AND [BSC] ='$rnc' and 
				SubSystemName Not like '%UUP' and 
				SubSystemName not like '%NDM' and
				SubSystemName not like '%URSCA' and
				SubSystemName not like '%TRP' and 
				SubSystemName not like '%NIU' and 
				SubSystemName not like '%GRSCM' and
				SubSystemName not like '%URSCM' and
				SubSystemName not like '%POOLOM' and 
				SubSystemName not like '%GCBS'
				group by [BSC],[DateId],hourid
				order by RNC,dateid desc,hourid desc";
	 
	$result3 = sqlsrv_query($conn, $tsql3, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								
	while($data3 = sqlsrv_fetch_array($result3))
	  { // Ambil semua data dari hasil eksekusi $sql
		$Date3 = $data3['dateid']->format('m/d/y');
		$Hour3 = $data3['hourid'];
		$value3 = $data3['MP_Load_Rate'];
		?>
		[new Date('<?php echo $Date3 ;?>'), 'Hour <?php echo $Hour3 ;?>', <?php echo $value3 ;?>],
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

  var container = document.getElementById('2chartBSC');
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
<script src="https://www.gstatic.com/charts/loader.js"></script>

<!---------------------------------------------------------------------------------------------------------------->

<?php
include 'footer.php';
?>