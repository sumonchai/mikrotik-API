$(document).ready(function(){
		var timer;



		var auto_refresh = setInterval(
		function ()
		{
			$('.logs').load('../real-time/logs.php').fadeIn("fast");
			$('.user-online').load('../real-time/useronline.php').fadeIn("fast");
			$('.cpu-load').load('../real-time/cpuload.php').fadeIn("fast");
			$('.free-memory').load('../real-time/freemem.php').fadeIn("fast");
			$('.free-hdd-space').load('../real-time/hddspace.php').fadeIn("fast");
			$('.up-time').load('../real-time/uptime.php').fadeIn("fast");
			$('.ap-online').load('../real-time/ap-online.php').fadeIn("fast");
			$('.interface-traffic').load('../real-time/interface.php').fadeIn("fast");
		$(".logs").animate({ scrollTop: $(".logs")[0].scrollHeight}, 100);
	}, 2000); // refresh every 10000 milliseconds


// ping btn 
$('.ping-btn').click(function(){
	$('.box-ping').hide();
	$('.ping-monitor').show();
});

	$('.no1').hover(function(){
	$(this).tooltip('show');
	});
	$('.no2').hover(function(){
	$(this).tooltip('show');
	});
	$('.no3').hover(function(){
	$(this).tooltip('show');
	});


		  $('#numuser,#numuser').keydown(function(event) {
                
                if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 
                    || event.keyCode == 27 || event.keyCode == 13 
                    || (event.keyCode == 65 && event.ctrlKey === true) 
                    || (event.keyCode >= 35 && event.keyCode <= 39)){
                        return;
                }else {
       
                    if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                        event.preventDefault(); 
                    }   
                }
            });



	$('.test-btn').click(function(){
		var ip = $('#ip').val();
		var user = $('#username').val();
		var pass = $('#password').val();
		var portapi = $('#portapi').val();
		var portweb = $('#portweb').val();
		$.ajax({
					type:"POST",
					url: "setup_server.php?cmd=testcon",
					cache: false,
					data:{ip:ip,user:user,pass:pass,portapi:portapi,portweb:portweb},
						success:function(data){
						$('.test-connect').html(data);
					}
			});

	});
	


	$('#search_user').keyup(function(){
		var txt =  $(this).val();
		if(txt.lenght<3){
			return false;
		}	
			$.ajax({
					type:"POST",
					url: "all_user.php",
					cache: false,
					data:{txt:txt},
						success:function(data){
						$('.responsive').html(data);
						return false;
					}
			});
	});








});