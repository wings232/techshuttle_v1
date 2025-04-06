<?php

$dataPoints = array(
    array("y" => 6, "label" => "Apple"),
    array("y" => 4, "label" => "Mango"),
    array("y" => 5, "label" => "Orange"),
    array("y" => 7, "label" => "Banana"),
    array("y" => 4, "label" => "Pineapple"),
    array("y" => 6, "label" => "Pears"),
    array("y" => 7, "label" => "Grapes"),
    array("y" => 5, "label" => "Lychee"),
    array("y" => 4, "label" => "Jackfruit")
);

?>
<!DOCTYPE HTML>
<html>
<head>  
<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script type="text/javascript">

    $(function () {
        var chart = new CanvasJS.Chart("chartContainer", {
            theme: "light2",
            animationEnabled: true,
            title: {
                text: "Monthly Downloads",
                fontSize: 25
            },
            axisX: {
                valueFormatString: "MMM",
                interval: 1,
                intervalType: "month"

            },
            axisY: {
                title: "Downloads"
            },

            data: [
            {
                type: "area",
                xValueType: "dateTime",
                dataPoints: <?php echo json_encode($dataPoints); ?>
            }
            ]
        });

        chart.render();
    });
</script>
<script type="text/javascript">

    $(function () {
        var chart = new CanvasJS.Chart("chartContainer1", {
            theme: "light2",
            animationEnabled: true,
            title: {
                text: "Column Chart in PHP using CanvasJS"
            },
            data: [
            {
                type: "column",                
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }
            ]
        });
        chart.render();
    });
</script>
<?php
    $dataPoints = array(
	array("y" => 72.48, "legendText" => "Google", "label" => "Google"),
	array("y" => 10.39, "legendText" => "Bing", "label" => "Bing"),
	array("y" => 7.78, "legendText" => "Yahoo!", "label" => "Yahoo!"),
	array("y" => 7.14, "legendText" => "Baidu", "label" => "Baidu"),
	array("y" => 0.22, "legendText" => "Ask", "label" => "Ask"),
	array("y" => 0.15, "legendText" => "AOL", "label" => "AOL"),
	array("y" => 1.84, "legendText" => "Others", "label" => "Others")
    );
?>

<script type="text/javascript">
    $(function () {
        var chart = new CanvasJS.Chart("chartContainer2", {
            title: {
                text: "Desktop Search Engine Market Share, Jul-2016"
            },
            animationEnabled: true,
            legend: {
                verticalAlign: "center",
                horizontalAlign: "left",
                fontSize: 20,
                fontFamily: "Helvetica"
            },
            theme: "light2",
            data: [
            {
                type: "pie",
                indexLabelFontFamily: "Garamond",
                indexLabelFontSize: 20,
                indexLabel: "{label} {y}%",
                startAngle: -20,
                showInLegend: true,
                toolTipContent: "{legendText} {y}%",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }
            ]
        });
        chart.render();
    });
</script>
<?php
    $dataPoints = array(
        array("y" => 72.48, "legendText" => "Google", "label" => "Google"),
        array("y" => 10.39, "legendText" => "Bing", "label" => "Bing"),
        array("y" => 7.78, "legendText" => "Yahoo!", "label" => "Yahoo!"),
        array("y" => 7.14, "legendText" => "Baidu", "label" => "Baidu"),
        array("y" => 0.22, "legendText" => "Ask", "label" => "Ask"),
        array("y" => 0.15, "legendText" => "AOL", "label" => "AOL"),
        array("y" => 1.84, "legendText" => "Others", "label" => "Others")
    );
?>

<script type="text/javascript">
    $(function () {
        var chart = new CanvasJS.Chart("chartContainer3", {
            title: {
                text: "Desktop Search Engine Market Share, Jul-2016"
            },
            animationEnabled: true,
            legend: {
                fontSize: 20,
                fontFamily: "Helvetica"
            },
            theme: "light2",
            data: [
            {
                type: "doughnut",
                indexLabelFontFamily: "Garamond",
                indexLabelFontSize: 20,
                indexLabel: "{label} {y}%",
                startAngle: -20,
                showInLegend: true,
                toolTipContent: "{legendText} {y}%",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }
            ]
        });
        chart.render();
    });
</script>
<?php
    $dataPoints = array(
	array("x" => 10, "y" => 71),
	array("x" => 20, "y" => 55),
	array("x" => 30, "y" => 50),
	array("x" => 40, "y" => 65),
	array("x" => 50, "y" => 95),
	array("x" => 60, "y" => 68),
	array("x" => 70, "y" => 28),
	array("x" => 80, "y" => 34),
	array("x" => 90, "y" => 14),
	array("x" => 100, "y" => 33),
	array("x" => 110, "y" => 42),
	array("x" => 120, "y" => 62),
	array("x" => 130, "y" => 70),
	array("x" => 140, "y" => 85),
	array("x" => 150, "y" => 58),
	array("x" => 160, "y" => 34),
	array("x" => 170, "y" => 24),
	array("x" => 180, "y" => 33),
	array("x" => 190, "y" => 28),
	array("x" => 200, "y" => 42)
    );
?>

<script type="text/javascript">

    $(function () {
        var chart = new CanvasJS.Chart("chartContainer4", {
            theme: "light2",
            zoomEnabled: true,
            animationEnabled: true,
            title: {
                text: "Line Chart in PHP using CanvasJS"
            },
            subtitles: [
                {
                    text: "Try Zooming and Panning"
                }
            ],
            data: [
            {
                type: "line",

                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }
            ]
        });
        chart.render();
    });
</script>
<?php
    $dataPoints = array(
	array("y" => 72.48, "legendText" => "Google", "label" => "Google"),
	array("y" => 10.39, "legendText" => "Bing", "label" => "Bing"),
	array("y" => 7.78, "legendText" => "Yahoo!", "label" => "Yahoo!"),
	array("y" => 7.14, "legendText" => "Baidu", "label" => "Baidu"),
	array("y" => 0.22, "legendText" => "Ask", "label" => "Ask"),
	array("y" => 0.15, "legendText" => "AOL", "label" => "AOL"),
	array("y" => 1.84, "legendText" => "Others", "label" => "Others")
    );
?>

<script type="text/javascript">
    $(function () {
        var chart = new CanvasJS.Chart("chartContainer5", {
            title: {
                text: "Desktop Search Engine Market Share, Jul-2016"
            },
            animationEnabled: true,
            legend: {
                verticalAlign: "center",
                horizontalAlign: "left",
                fontSize: 20,
                fontFamily: "Helvetica"
            },
            theme: "light2",
            data: [
            {
                type: "pie",
                indexLabelFontFamily: "Garamond",
                indexLabelFontSize: 20,
                indexLabel: "{label} {y}%",
                startAngle: -20,
                showInLegend: true,
                toolTipContent: "{legendText} {y}%",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }
            ]
        });
        chart.render();
    });
</script>

<?php
    $dataPoints = array(
	array("x" => 800, "y" => 350),
	array("x" => 900, "y" => 450),
	array("x" => 850, "y" => 450),
	array("x" => 1250, "y" => 700),
	array("x" => 1100, "y" => 650),
	array("x" => 1350, "y" => 850),
	array("x" => 1200, "y" => 900),
	array("x" => 1410, "y" => 1250),
	array("x" => 1250, "y" => 1100),
	array("x" => 1400, "y" => 1150),
	array("x" => 1500, "y" => 1050),
	array("x" => 1330, "y" => 1120),
	array("x" => 1580, "y" => 1220),
	array("x" => 1620, "y" => 1400),
	array("x" => 1250, "y" => 1450),
	array("x" => 1350, "y" => 1600),
	array("x" => 1650, "y" => 1300),
	array("x" => 1700, "y" => 1620),
	array("x" => 1750, "y" => 1700),
	array("x" => 1830, "y" => 1800),
	array("x" => 1900, "y" => 2000),
	array("x" => 2050, "y" => 2200),
	array("x" => 2150, "y" => 1960),
	array("x" => 2250, "y" => 1990)
    );
?>

<script type="text/javascript">

    $(function () {
        var chart = new CanvasJS.Chart("chartContainer6", {
            zoomEnabled: true,
            zoomType: "xy",
            title: {
                text: "Real Estate Rates"
            },
            subtitles: [
                {
                    text: "Try Zooming and Panning"
                }
            ],
            animationEnabled: true,
            axisX: {
                title: "Square Feets"
            },
            axisY: {
                title: "Prices in USD",
                valueFormatString: "$#,##0k",
                lineThickness: 2,
                includeZero: false
            },
            data: [
			{
			    type: "scatter",
			    toolTipContent: "<span style='\"'color: {color};'\"'><strong>Area: </strong></span>{x} sq.ft<br/><span style='\"'color: {color};'\"'><strong>Price: </strong></span>{y} $ ",

			    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
			}]
        });

        chart.render();
    });
</script>

<?php
    $dataPoints = array(
	array("y" => 17363, "label" => "2005-06"),
	array("y" => 28726, "label" => "2006-07"),
	array("y" => 35000, "label" => "2007-08"),
	array("y" => 25250, "label" => "2008-09"),
	array("y" => 19750, "label" => "2009-10"),
	array("y" => 18850, "label" => "2010-11"),
	array("y" => 26700, "label" => "2011-12"),
	array("y" => 16000, "label" => "2012-13"),
	array("y" => 19000, "label" => "2013-14"),
	array("y" => 18000, "label" => "2014-15")
    );
?>

<script type="text/javascript">

    $(function () {
        var chart = new CanvasJS.Chart("chartContainer7", {
            theme: "light2",
            animationEnabled: true,
            title: {
                text: "Analysis of Pepper Export - India"
            },
            axisX: {
                title: "Year"
            },
            axisY: {
                title: "In Tonnes"
            },

            data: [
            {
                type: "spline",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }
            ]
        });

        chart.render();
    });
</script>

</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<div id="chartContainer1" style="height: 370px; width: 100%;"></div>
<div id="chartContainer2" style="height: 370px; width: 100%;"></div>
<div id="chartContainer3" style="height: 370px; width: 100%;"></div>
<div id="chartContainer4" style="height: 370px; width: 100%;"></div>
<div id="chartContainer5" style="height: 370px; width: 100%;"></div>
<div id="chartContainer6" style="height: 370px; width: 100%;"></div>
<div id="chartContainer7" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>                              