
<?php 
	

	$controller = new controller;
	$numbersOfMeasure = json_decode($data['numbersOfMeasure'],true);
	// print_r($numbersOfMeasure);
	// print_r($data);
	$donvi = $controller->model("donvido");
	$khuvuon_obj = json_decode($data['khuvuon_obj'],true);
 ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card-group">
				<?php foreach ($numbersOfMeasure as $measure): ?>
					<?php 
						$donviOjb = json_decode($donvi->getByKey($measure['Ma_donvido']),true);
					 ?>
					  <div class="card">
					  	<div class="card-header">
					  		<h5 class="card-title"><?= $measure['Ten_dailuong'] ?></h5>
					  	</div>
					    <div class="card-body">
					    	<table class="table border" >
					    		<tr style="background-color: <?= $measure['mau_canh_bao'] ?>" >
					    			<th class="border">Giá Trị</th>
					    			<td id="val_<?= $khuvuon_obj['Ma_khuvuon'] ?>_<?= $measure['Ma_dailuong'] ?>">28 * C</td>
					    		</tr>
					    		<tr>
					    			<th class="border">Thời Gian</th>
					    			<td id="time_<?= $khuvuon_obj['Ma_khuvuon'] ?>_<?= $measure['Ma_dailuong'] ?>">8:50:56</td>
					    		</tr>
					    		<tr>
					    			<th class="border">Đơn Vị</th>
					    			<td><?= $donviOjb['Ten_donvido'] ?></td>
					    		</tr>
					    		<tr>
					    			<th class="border">Mức Cảnh Báo</th>
					    			<td><?= $measure['muc_canh_bao'] ?></td>
					    		</tr>
					    		<tr>
					    			<th class="border">Màu Sắc Cảnh Báo</th>
					    			<td>
					    				<input type="color" style="width: 100%" value="<?= $measure['mau_canh_bao'] ?>">
					    			</td>
					    		</tr>
					    	</table>
					    </div>
					    <div class="card-footer">
					    	<a class="btn" href="admin/edit/dailuong/<?= $measure['Ma_dailuong'] ?>">Setting</a>
					    	<a class="btn" href="collect/xoa_dl/<?= $khuvuon_obj['Ma_khuvuon'] ?>/<?= $measure['Ma_dailuong'] ?>">Remove</a>
					    </div>
					  </div> 					
				<?php endforeach ?>
			</div>
		</div>
		<div class="col">
			<hr>
			<a href="admin/add/dailuong" class="btn">Add new sensor</a>
			<hr>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
			  <div class="card-header">
			    BIỂU ĐỒ
			  </div>
			  <div class="card-body">
			    <h5 class="card-title">BIỂU ĐỒ ĐẠI LƯỢNG</h5>
			    <p class="card-text">Biểu đồ thông tin các đại lượng đo được tại khu vường này</p>
			   	<div class="chart-container" >
    				<canvas id="myChart" width="400" height="100"></canvas>
				</div>
			    <a href="#" class="btn btn-primary">Go somewhere</a>
			  </div>
			</div>
		</div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<script>
	const MeasuresList = <?= $data['numbersOfMeasure'] ?>;
	const Ma_khuvuon = <?= $khuvuon_obj['Ma_khuvuon'] ?>;


	function browse(Ma_khuvuon,MeasuresList) {
		MeasuresList.forEach(function(elem) {
			setValue(Ma_khuvuon,elem['Ma_dailuong']);
		});
	}


	var lastTime = [];


	MeasuresList.forEach(function(elem) {
		lastTime[elem['Ma_dailuong']] = "";
	});


	function setValue(ma_tram,ma_dailuong) {
		$.get("collect/load/"+ma_tram+"/"+ma_dailuong,function(val){
			// console.log(val);
			val = $.parseJSON(val);
			// console.log(val);
			value = val['val'];
			newTime = val['time'];
			var myTime = newTime.substr(11, 8);		
			$('#val_'+ma_tram+"_"+ma_dailuong).html(value);
			$('#time_'+ma_tram+"_"+ma_dailuong).html(myTime);
			if(lastTime[ma_dailuong] != newTime){
				addData(chart,ma_dailuong,myTime,value);
				remove(chart,ma_dailuong,10);
			}
			lastTime[ma_dailuong] = newTime;
		});
	}

	$(document).ready(function(){
		setInterval(function(){		
			browse(Ma_khuvuon,MeasuresList);
		}, 500);
	});


	function addData(chart,Ma_dailuong,label,data){
		console.log("allo");
		chart.data.labels.push(label);
		chart.data.datasets[Ma_dailuong-1].data.push(data);
		chart.update();
	}


	function remove(chart, Ma_dailuong,lim){
		if(chart.data.labels.length >= lim){
			chart.data.labels.shift();
			chart.data.datasets[Ma_dailuong-1].data.shift();
		}
	}


	var ctx = document.getElementById('myChart').getContext('2d');


	
	var chart = new Chart(ctx, {
	    // The type of chart we want to create
	    type: 'line',
	    data: {
	        labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050],
		   datasets: [{ 
		        data: [1,2,3,4,5,6,7,8,9],
		        label: "Nhiệt Độ",
		        borderColor: "#3e95cd",
		        fill: true
		      }, { 
		        data: [],
		        label: "độ ẩm",
		        borderColor: "#8e5ea2",
		        fill: false
		      }
		    ]
		  },
	  options: {
	    title: {
	      display: true,
	      text: 'ĐẠI LƯỢNG THÔNG SỐ KHÔNG KHÍ TẠI KHU VƯỜN TRÊN MÂY'
		    }	     
		scales: {
		yAxes: [{
		    display: true,
		    ticks: {
			beginAtZero: true,
			max: 100,
			min: 0
		    }
		}]
		  }
	  }
	});
</script>
