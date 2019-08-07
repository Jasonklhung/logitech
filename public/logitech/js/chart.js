AmCharts.makeChart("chartdiv1",
			{
				"type": "pie",
				"hideCredits": "true",
				"angle": 12,
				"balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
				"depth3D": 15,
				"color": "#2f3132",
				"maxLabelWidth": 50,
				"percentPrecision": 0,
				"autoMarginOffset": -50,
				"marginLeft": -100,
				"marginRight": -100,
				"marginTop": -50,
				"marginBottom": 0,
				"pullOutRadius": "20%",
				"colors": [
					"#00b8fc",
					"#ff2947"
				],
				"titleField": "category",
				"valueField": "column-1",
				"allLabels": [],
				"balloon": {},
				"legend": {
					"enabled": true,
					"align": "center",
					"autoMargins": false,
					"marginLeft": 0,
					"marginTop": 0,
					"marginBottom": 0,
					"marginRight": 0,
					"markerType": "circle",
					"color": "#2f3132",
					"valueAlign": "left",
					"useMarkerColorForLabels": true,
					"position": "absolute",
					"top": 240
				},
				"titles": [],
				"dataProvider": [
					{
						"category": "男姓",
						"column-1": "100"
					},
					{
						"category": "女姓",
						"column-1": "25"
					}
				]
			}
		);
AmCharts.makeChart("chartdiv2",
	{
		"type": "pie",
		"hideCredits": "true",
		"angle": 12,
		"balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
		"depth3D": 15,
		"color": "#2f3132",
		"maxLabelWidth": 62,
		"percentPrecision": 0,
		"autoMarginOffset": -50,
		"marginLeft": -100,
		"marginRight": -100,
		"marginTop": -50,
		"marginBottom": 0,
		"pullOutRadius": "20%",
		"autoMarginOffset": 0,
		"colors": [
			"#00ead0",
			"#c3c6c8"
		],
		"titleField": "category",
		"valueField": "column-1",
		"allLabels": [],
		"balloon": {},
		"legend": {
			"enabled": true,
			"align": "center",
			"autoMargins": false,
			"marginLeft": 0,
			"marginRight": 0,
			"markerType": "circle",
			"color": "#2f3132",
			"valueAlign": "left",
			"useMarkerColorForLabels": true,
			"position": "absolute",
			"top": 240
		},
		"titles": [],
		"dataProvider": [
			{
				"category": "新會員",
				"column-1": "100"
			},
			{
				"category": "既有會員",
				"column-1": "3600"
			}
		]
	}
);
		AmCharts.makeChart("chartdiv3", {
		  "type": "serial",
		  "hideCredits": "true",
		  "rotate": true,
		  "angle": 12,
		  "depth3D": 15,
		  "marginBottom": 50,
		  "color": "#2f3132",
		  "colors": [
					"#00b8fc",
					"#ff2947"
			],
		  "dataProvider": [{
		    "age": "65+",
		    "male": 10,
		    "female": 3
		  }, {
		    "age": "55-65",
		    "male": 60,
		    "female": 36
		  }, {
		    "age": "45-54",
		    "male": 90,
		    "female": 80
		  }, {
		    "age": "35-44",
		    "male": 350,
		    "female": 125
		  }, {
		    "age": "25-34",
		    "male": 623,
		    "female": 341
		  }, {
		    "age": "18-24",
		    "male": 153,
		    "female": 90
		  }],
		  "startDuration": 1,
		  "graphs": [{
		    "fillAlphas": 0.8,
		    "lineAlpha": 0.2,
		    "type": "column",
		    "valueField": "male",
		    "title": "男性",
		    "clustered": true,
		    "labelFunction": function(item) {
		      return Math.abs(item.values.value);
		    },
		    "balloonFunction": function(item) {
		      return item.category + ": " + Math.abs(item.values.value);
		    }
		  }, {
		    "fillAlphas": 0.8,
		    "lineAlpha": 0.2,
		    "type": "column",
		    "valueField": "female",
		    "title": "女性",
		    "clustered": true,
		    "labelFunction": function(item) {
		      return Math.abs(item.values.value);
		    },
		    "balloonFunction": function(item) {
		      return item.category + ": " + Math.abs(item.values.value);
		    }
		  }],
		  "categoryField": "age",
		  "categoryAxis": {
		    "gridPosition": "start",
		    "gridAlpha": 0.2,
		    "axisAlpha": 0
		  },
		  "valueAxes": [{
		    "gridAlpha": 0,
		    "ignoreAxisWidth": true,
		    "labelFunction": function(value) {
		      return Math.abs(value);
		    },
		    "guides": [{
		      "value": 0,
		      "lineAlpha": 0.2
		    }]
		  }],
		  "balloon": {
		    "fixedPosition": true
		  },
		  "chartCursor": {
		    "valueBalloonsEnabled": false,
		    "cursorAlpha": 0.05,
		    "fullWidth": true
		  },
		  "allLabels": [],
		 "export": {
		    "enabled": true
		  },
		  "legend": {
		  	"useMarkerColorForLabels": true
		  }

		});

		AmCharts.makeChart("chartdiv4", {
		  "type": "serial",
		  "hideCredits": "true",
		  "columnWidth": 0.3,
		  "rotate": true,
		  "angle": 12,
		  "depth3D": 15,
		  "marginBottom": 50,
		  "color": "#2f3132",
		  "colors": [
					"#dcfd00"	
			],
		  "dataProvider": [{
		    "area": "北部",
		    "people": 150,
		  }, {
		    "area": "中部",
		    "people": 120,
		  }, {
		    "area": "南部",
		    "people": 90,
		  }, {
		    "area": "東部",
		    "people": 50,
		  }],
		  "startDuration": 1,
		  "graphs": [{
		    "fillAlphas": 0.8,
		    "lineAlpha": 0.2,
		    "type": "column",
		    "valueField": "people",
		    "title": "地區",
		    "clustered": true,
		    "labelFunction": function(item) {
		      return Math.abs(item.values.value);
		    },
		    "balloonFunction": function(item) {
		      return item.category + ": " + Math.abs(item.values.value);
		    }
		  }],
		  "categoryField": "area",
		  "categoryAxis": {
		    "gridPosition": "start",
		    "gridAlpha": 0.2,
		    "axisAlpha": 0
		  },
		  "valueAxes": [{
		    "gridAlpha": 0,
		    "ignoreAxisWidth": true,
		    "labelFunction": function(value) {
		      return Math.abs(value);
		    },
		    "guides": [{
		      "value": 0,
		      "lineAlpha": 0.2
		    }]
		  }],
		  "balloon": {
		    "fixedPosition": true
		  },
		  "chartCursor": {
		    "valueBalloonsEnabled": false,
		    "cursorAlpha": 0.05,
		    "fullWidth": true
		  },
		  "allLabels": [],
		 "export": {
		    "enabled": true
		  }

		});