$(document).ready(function(){
	
            $('#gm-map').gmap3({

            	center:[view_location.lat, view_location.lon],
       			 zoom:12
            })
             .marker({
        position: [view_location.lat, view_location.lon],
        icon: images_path.imgpath+'/placeholder.png',
        title:project_title.name
     	 })
          .streetviewpanorama('#street-view',
        {
          position: [view_location.lat, view_location.lon],
          pov: {
            heading: 34,
            pitch: 10,
            zoom: 1
          }
        }
      );

});
