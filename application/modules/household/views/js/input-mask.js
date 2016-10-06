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
$('#budget').inputmask("myNum");
	
});