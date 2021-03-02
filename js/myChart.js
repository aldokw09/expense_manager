var currentId = $('#currentId').text();

var ChartArea = new Vue({
	el: "#ChartArea",
	data:{
		balanceChart: []
    },
    methods:{
    	balancess: function(){
    		axios.get('indexBalanceChartLine.php?id_user='+currentId)
    		.then(function (result) {
    			ChartArea.balanceChart = result.data;
    			balanceChartlength = ChartArea.balanceChart.length;

    			var dataChart = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
    			for(var i=0;i<balanceChartlength; i++){
    				var str = ChartArea.balanceChart[i].date.split("-");
    				dateNumber = parseInt(str[str.length-1]);
    				dataChart[dateNumber-1] = ChartArea.balanceChart[i].balance;
    			}

    			var currentDate = new Date();
  				var currentM = currentDate.getMonth();
  				if(currentM == 0){
  					currentM = "January";
  				} else if(currentM == 1){
  					currentM = "February";
  				} else if(currentM == 2){
  					currentM = "March";
  				} else if(currentM == 3){
  					currentM = "April";
  				} else if(currentM == 4){
  					currentM = "May";
  				} else if(currentM == 5){
  					currentM = "June";
  				} else if(currentM == 6){
  					currentM = "July";
  				} else if(currentM == 7){
  					currentM = "August";
  				} else if(currentM == 8){
  					currentM = "September";
  				} else if(currentM == 9){
  					currentM = "October";
  				} else if(currentM == 10){
  					currentM = "November";
  				} else if(currentM == 11){
  					currentM = "Desember";
  				}
  				$('#bulanSkrg').html(currentM);
    			
    			var newBar = {
    				labels: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31],
						datasets: [{
							label: 'Balance',
							lineTension: 0.3,
							backgroundColor: "rgba(153, 217, 234, 0)",
							borderColor: "rgb(153, 217, 234)",
							pointBackgroundColor: "rgba(0, 0, 255)",
							data: dataChart,
						}]
    			}

				var ctx = document.getElementById("myAreaChart");
				var myChart = new Chart(ctx, {
					type: 'line',
					data: newBar,
				});
			});
    },
    incomess: function(){
        axios.get('indexBalanceChartPieIn.php?id_user='+currentId)
        .then(function (result) {
          ChartArea.balanceChart = result.data;
          balanceChartlength = ChartArea.balanceChart.length;

          var dataChartCategory = [];
          var dataChartValue = [];
          var randomrgb = [];
          for(var i=0;i<balanceChartlength; i++){
            dataChartCategory[i] = ChartArea.balanceChart[i].name_category;
            dataChartValue[i] = ChartArea.balanceChart[i].balance;
            randomrgb[i] = random_rgba();
          }

          var currentDate = new Date();
          var currentM = currentDate.getMonth();
          if(currentM == 0){
            currentM = "January";
          } else if(currentM == 1){
            currentM = "February";
          } else if(currentM == 2){
            currentM = "March";
          } else if(currentM == 3){
            currentM = "April";
          } else if(currentM == 4){
            currentM = "May";
          } else if(currentM == 5){
            currentM = "June";
          } else if(currentM == 6){
            currentM = "July";
          } else if(currentM == 7){
            currentM = "August";
          } else if(currentM == 8){
            currentM = "September";
          } else if(currentM == 9){
            currentM = "October";
          } else if(currentM == 10){
            currentM = "November";
          } else if(currentM == 11){
            currentM = "Desember";
          }
          $('#bulanSkrg2').html(currentM);
          
          var newBar = {
            labels: dataChartCategory,
            datasets: [{
              label: 'Balance',
              lineTension: 0.3,
              backgroundColor: randomrgb,
              borderColor: "rgb(153, 217, 234)",
              data: dataChartValue,
            }]
          }

        var ctx = document.getElementById("myAreaChart2");
        var myChart = new Chart(ctx, {
          type: 'pie',
          data: newBar,
        });
      });
    },
    expensess: function(){
      axios.get('indexBalanceChartPieEx.php?id_user='+currentId)
        .then(function (result) {
          ChartArea.balanceChart = result.data;
          balanceChartlength = ChartArea.balanceChart.length;

          var dataChartCategory = [];
          var dataChartValue = [];
          var randomrgb = [];
          for(var i=0;i<balanceChartlength; i++){
            dataChartCategory[i] = ChartArea.balanceChart[i].name_category;
            dataChartValue[i] = ChartArea.balanceChart[i].balance;
            randomrgb[i] = random_rgba();
          }

          var currentDate = new Date();
          var currentM = currentDate.getMonth();
          if(currentM == 0){
            currentM = "January";
          } else if(currentM == 1){
            currentM = "February";
          } else if(currentM == 2){
            currentM = "March";
          } else if(currentM == 3){
            currentM = "April";
          } else if(currentM == 4){
            currentM = "May";
          } else if(currentM == 5){
            currentM = "June";
          } else if(currentM == 6){
            currentM = "July";
          } else if(currentM == 7){
            currentM = "August";
          } else if(currentM == 8){
            currentM = "September";
          } else if(currentM == 9){
            currentM = "October";
          } else if(currentM == 10){
            currentM = "November";
          } else if(currentM == 11){
            currentM = "Desember";
          }
          $('#bulanSkrg3').html(currentM);
          
          var newBar = {
            labels: dataChartCategory,
            datasets: [{
              label: 'Balance',
              lineTension: 0.3,
              backgroundColor: randomrgb,
              borderColor: "rgb(153, 217, 234)",
              data: dataChartValue,
            }]
          }

        var ctx = document.getElementById("myAreaChart3");
        var myChart = new Chart(ctx, {
          type: 'pie',
          data: newBar,
        });
      });
    },


  },
  created(){
    this.balancess();
    this.incomess();
    this.expensess();
  }
});

function random_rgba() {
    var o = Math.round, r = Math.random, s = 255;
    return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ', 0.3)';
}