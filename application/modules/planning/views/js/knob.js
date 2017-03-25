    $(function() {
        $(".knob").knob({

        'change' : function (v) { 

           // alert(v)
           console.log(v);
           if(v>20)
           {
              
                        
           }
        }
        
       });

 // set status commit percent auto

    $('#project-status').change(function(){
        console.log($(this).val());
       if($(this).val()==6)  // close activity
       {
          // $('#percent-comitted').val(100);
          $('.knob').val(100).trigger('change');
       }
        if($(this).val()==2)  // close activity
       {
          // $('#percent-comitted').val(100);
          $('.knob').val(100).trigger('change');
       }

     if($(this).val()==3) // stop project
       {
          // $('#percent-comitted').val(100);
          $('.knob').val(0).trigger('change');
       }

    });

    });
