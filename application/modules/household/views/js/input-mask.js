$(function () {
   Inputmask.extendAliases({
  'myNum': {
    alias: "numeric",
    placeholder: '',
    allowPlus: false,
    allowMinus: false,
    rightAlign:false,
    digits:2,
    groupSeparator:',',
    autoGroup:true
  }
});
$('.money-per-month').inputmask("myNum");
$('.num-male').inputmask("myNum");
$('.num-female').inputmask("myNum");
$('.num-family-member').inputmask("myNum");
$('.person-id').inputmask("9-9999-99999-99-9");


$('.person-id').keyup(function(){

      //alert($(this).inputmask('unmaskedvalue'));
  person_id=$(this).inputmask('unmaskedvalue');
     // if(person_id.length != 13) return false;
     if(person_id.length==13)
     {
 
            for(i=0, sum=0; i < 12; i++) sum += parseFloat(person_id.charAt(i))*(13-i);
         
            if((11-sum%11)%10!=parseFloat(person_id.charAt(12))) alert('หมายเลขประจำตัวประชาชนไม่ถูกต้อง') //return false; 
         
            return true;

      }

});

});