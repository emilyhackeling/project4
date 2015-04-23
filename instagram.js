// JavaScript Document


//Use this url below to get your access token
//https://instagram.com/oauth/authorize/?display=touch&client_id=0f50cc022ab747f08e1a8549d1103a4e&redirect_uri=http://emilyhackeling.com/api&response_type=token 

//if you need a user id for yourself or someone else use:
//http://jelled.com/instagram/lookup-user-id
	
						
$(function() {
	
	var apiurl = "https://api.instagram.com/v1/tags/roadtrip/media/recent?access_token=258490999.0f50cc0.50307c7f8d9d4d7196929466406fd692&callback=?&count=6"
	var access_token = location.hash.split('=')[1];
	var html = ""
	
		$.ajax({
			type: "GET",
			dataType: "json",
			cache: false,
			url: apiurl,
			success: parseData,
			
			
		});
				
		
		function parseData(json){
			console.log(json);
			
			$.each(json.data,function(i,data){
				
				html += '<div class="col-md-12 col-sm-12 col-xs-12 photogrid"><img src ="' + data.images.low_resolution.url + '" class="img-responsive"></div>'
				html += '<div class="insta-names"><strong>'+ data.user.full_name+'</strong></div>';
				html += '<p>'+ data.caption.text+'</p>';
			
			});
			
			console.log(html);
			$("#results").append(html);
			
		}
		
		
                
               
 });
		
		
		
		
	

		
