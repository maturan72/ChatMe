 function preview_snapshot() {
        Webcam.set({
          width: 320,
          height: 240,
          image_format: 'jpeg',
          jpeg_quality: 90
        });
        Webcam.attach( '#my_camera' );
      // freeze camera so user can preview pic
      Webcam.freeze();
      
      // swap button sets
      document.getElementById('pre_take_buttons').style.display = 'none';
      document.getElementById('post_take_buttons').style.display = '';
    }
    
    function save_photo() {
      // actually snap photo (from preview freeze) and display it
      Webcam.snap( function(data_uri) {
        // display results in page
        document.getElementById('my_camera').innerHTML = 
          '<img src="'+data_uri+'"/>';
         document.getElementById('profileImage').innerHTML = 
          '<input type="hidden" name="profileImage" id="profileImage" value="'+data_uri+'"/>';
        document.getElementById('profile').innerHTML = 
          '<img id="profile" src="'+data_uri+'"/>';

      } );
    }