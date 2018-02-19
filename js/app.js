// app.js
var slide = $("header > img");
var last = slide.length - 1;
var sno = 0;
var dir = "right";
for(var i=0; i<slide.length;i++){
	var point = "<span data-no='" + i + "'>●</span>";
	$("#pointer").append(point);
}
var pointers = $("#pointer > span");

function slideAction() {
	if( dir == "left" ) {
		var target = "-100%";
		var targetAfter = "100%";
	} else if( dir == "right" ){
		var target = "100%";
		var targetAfter = "-100%";
	}
	$(slide[sno]).siblings("img").css("left",targetAfter);

	$( slide[sno] ).animate({
		left: target
	},1000,function(){
		$(this).css({left: targetAfter});
	});
	sno++; //sno = sno + 1;
	if( sno > last ) sno = 0;
	$( slide[sno] ).animate({
		left: "0"
	},1000,function(){
		$("#pointer > span").removeClass("sel");
		$( pointers[sno] ).addClass("sel");
	});
}

$("header").click(function(){
	// slideAction();
});

var timer = null;
function setTimer() {
	if( timer == null ) {
		startTimer();
	} else {
		stopTimer();
	}
}

function startTimer(){
	timer = setInterval(function(){
		slideAction();
	},2000);
	$("#control > a > span").attr("class","glyphicon glyphicon-play");
}

function stopTimer(){
	clearInterval(timer);
	timer = null;
	$("#control > a > span").attr("class","glyphicon glyphicon-pause");
}


setTimer();


$("#pointer > span").click(function(){
	var no = $(this).attr("data-no");
	no = parseInt(no,10);
	stopTimer();
	$("header > img").css("left","-100%");
	$(slide[no]).css("left","0");
	sno = no;
	$("#pointer > span").removeClass("sel");
	$(pointers[sno]).addClass("sel");
	setTimer();
});

$(".dir").click(function(){
	dir = $(this).attr("data-dir");
	stopTimer();
	slideAction();
});