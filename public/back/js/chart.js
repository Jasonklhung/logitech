google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart1);
function drawChart1() {
  var data = google.visualization.arrayToDataTable([
    ['Month', 'Video', 'Article'],
    ['Jan',  50,    90,         ],
    ['Mar',  95,      60,       ],
    ['May',  50,       45,      ],
    ['Jul',  100,      80,      ]
  ]);

  var options = {
    title: '',
    hAxis: {title: '', titleTextStyle: {color: 'red'}} ,
    colors: ['#E5813D', '#5D62B9'],

 };

var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
  chart.draw(data, options);
}

google.load("visualization", "1", {packages:["corechart"]});

google.setOnLoadCallback(drawChart2);

function drawChart2() {
  var data = google.visualization.arrayToDataTable([
    ['Content', 'Size'],
    ['Google',     22],
    ['Baidu',      9],
    ['Yahoo',  10]
  ]);

  var options = {
    title: "",
    pieHole: 0.5,
    pieSliceBorderColor: "none",
     colors: ['#5D62B9', '#E5813D', '#62B8EA' ],
    legend: {
      position: "none"  
    },
    pieSliceText: "none",
    tooltip: {
      //trigger: "none"
    }
  };

  var chart = new google.visualization
      .PieChart(document.getElementById('chart_div2'));
        
  chart.draw(data, options); 
}

google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart3);
function drawChart3() {
  var data = google.visualization.arrayToDataTable([
    ['Month', '網站流量'],
    ['4月',  110,  ],
    ['5月',  80,  ],
    ['6月',  60,   ],
    ['7月',  100,  ],
    ['8月',  110,  ],
    ['9月',  80,  ],
    ['10月',  60,   ],
    ['11月',  100,  ],
    ['12月',  110,  ],
    ['1月',  80,  ],
    ['2月',  60,   ],
    ['3月',  100,  ],        
  ]);

  var options = {
    title: '',
    hAxis: {title: '',  titleTextStyle: {color: '#333'}},
    vAxis: {minValue: 0},
    colors: ['#5D62B9'],
  };

  var chart = new google.visualization.AreaChart(document.getElementById('chart_div3'));
  chart.draw(data, options);
}


google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart4);
function drawChart4() {
  var data = google.visualization.arrayToDataTable([
    ['Task', 'Hours per Day'],
    ['Work',     11],
    ['Eat',      2],
    ['Commute',  2],
    ['Watch TV', 2],
    ['Sleep',    7]
  ]);

  var chart = new google.visualization.PieChart(document.getElementById('chart_div4'));
  chart.draw(data, {
    //title: '2D pie chart',
    is3D: false,
    legend: 'true',
    backgroundColor: 'transparent',
    pieSliceBorderColor: 'transparent',
    pieSliceText: 'none',
    pieHole: 0.5,
    colors: ['#5D62B9', '#E5813D', '#62B8EA', '#7CCE65', '#492247'],
    tooltip: {textStyle: {color: 'black'}, showColorCode: true}
  });
}

$(window).resize(function(){
  drawChart1();
  drawChart2();
  drawChart3();
  drawChart4();
});

// Reminder: you need to put https://www.google.com/jsapi in the head of your document or as an external resource on codepen //