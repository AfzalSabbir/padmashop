(()=>{

	/*
	 * +++++++++++++++++++++++
	 * Get User Permission
	 * And Push Message
	 * ++++++++++++++++++
	*/
	let server 	= (window.location.origin).search('localhost');
	let href = window.location.href;
	let baseUrl = '';

	if(0 > server)
	{
		baseUrl = window.location.origin;
	}
	else{
		baseUrl = window.location.origin + href.slice((server+9) , href.indexOf(server, '/'));
		console.log('Your Project Install in Localhost');
	}
	

	if(window.Notification)
	{
	   	fetch(baseUrl+'/push/notification')
	   	.then(myJson=>myJson.json())
	   	.then(data=>{
	   		let image = (data.image ? baseUrl+'/'+data.image : '');
	   		let code = window.localStorage.authenticaion;
	   		if(!code){
	   			window.localStorage.authenticaion = data.code;
		   		notification(data.title, data.body, image);
	   		}
	   		else if(code != data.code){
		   		notification(data.title, data.body, image);
		   		window.localStorage.authenticaion = data.code;
	   		}
	   	});

	   	function notification(title, body, image){
		    if (Notification.permission === 'granted') {
		        let smg = new Notification(title, {
		        	body:body,
		        	icon:image
		        });
		    } else { 
		        // request permission from user
		        Notification.requestPermission().then(function(permission) {
		           if(permission === 'granted') {
		               let smg = new Notification(title, {
		               	body:body,
		               	icon:image
		               });
		           }
		        })
		        .catch(function(err) {
		            console.error(err);
		        });
		    }
		}
	}
})()