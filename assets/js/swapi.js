// infinite scroll
$(window).on('scroll', function(){
    if( $(window).scrollTop() >= $(document).height() - $(window).height() ) {
		$("#next").click();
    }
}).scroll();

// set active pada menu yang dipilih
function toggleNavSelected(el){
	$(".nav > li").removeClass("active");
    var myparent = document.getElementById(el).parentNode;
	myparent.className = "active";
	return false;
}

// load kategori
function popMe(identifier, tId){
	if (typeof tId === 'undefined') { tId = ''; }	
	$.ajax({
		type: "POST",
		url: 'index.php/welcome/api', 
		data: {url: $(identifier).data('id')},
		dataType: "text",  
		cache:false,
		beforeSend: function() {
			$("body").toggleClass("wait");
			toggleNavSelected(tId);;
		},
		success: 
		function(data){
			$('body').removeClass('wait');
			var div = document.getElementById('showMe');
			div.innerHTML = data;
		}
	});
	return false;
}

// load next set data
function popNext(identifier) {
	$.ajax({
		type: "POST",
		url: 'index.php/welcome/nextpage', 
		data: {url: $(identifier).data('next')},
		dataType: "text",  
		cache:false,
		beforeSend: function() { 
		  $("body").toggleClass("wait");
		  document.getElementById("next").innerHTML = "<span>LOADING... PLEASE WAIT</span>";
		},
		success: 
		function(data){
			document.getElementById("next").remove(); 
			$('body').removeClass('wait');
			var div = document.getElementById('showMe');
			div.innerHTML = div.innerHTML + data;
		}
	});
	return false;	
}

// load selected data
function popView(identifier) {
	$.ajax({
		type: "POST",
		url: 'index.php/welcome/view', 
		data: {url: $(identifier).data('view')},
		dataType: "text",  
		cache:false,
		beforeSend: function() { 
		  $("body").toggleClass("wait");
		},
		success: 
		function(data){
			$('body').removeClass('wait');
			var div = document.getElementById('myModalContent');
			div.innerHTML = data;
			$('#myModal').modal('show');
		}
	});
	return false;	
}