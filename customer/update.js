	document.getElementById('profile-picture').addEventListener('change', function(event){
			var file = event.target.files[0];
			var reader = new FileReader();

			reader.onload = function(e) {
				var newImage = new Image();
				newImage.src = e.target.result;

				newImage.onload = function(){

					document.getElementById('profile-image').src = newImage.src;
				};
				
			};
			reader.readAsDataURL(file);
		});