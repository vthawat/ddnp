$(document).ready(function(){
	
/*	 tinymce.init({
    selector: '#content_detail',

  });
  */
 // web_url='"http://devops.io/ddnp';
 tinymce.init({
  selector: "#content_detail",

  plugins: [
    "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
    "table contextmenu directionality emoticons template textcolor paste fullpage textcolor responsivefilemanager colorpicker textpattern"
  ],

  toolbar1: "newdocument | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
  toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink image responsivefilemanager media code | insertdatetime preview | forecolor backcolor",
  toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
  image_advtab: true ,
  external_filemanager_path:"http://devops.io/ddnp/filemanager/",
  filemanager_title:"Filemanager" ,
  filemanager_access_key:"myPrivateKey",
  external_plugins: { "filemanager" : "http://devops.io/ddnp/filemanager/plugin.min.js"},
  menubar: false,
  style_formats: [{
    title: 'Bold text',
    inline: 'b'
  }, {
    title: 'Red text',
    inline: 'span',
    styles: {
      color: '#ff0000'
    }
  }, {
    title: 'Red header',
    block: 'h1',
    styles: {
      color: '#ff0000'
    }
  }, {
    title: 'Example 1',
    inline: 'span',
    classes: 'example1'
  }, {
    title: 'Example 2',
    inline: 'span',
    classes: 'example2'
  }, {
    title: 'Table styles'
  }, {
    title: 'Table row 1',
    selector: 'tr',
    classes: 'tablerow1'
  }],

  templates: [{
    title: 'Test template 1',
    content: 'Test 1'
  }, {
    title: 'Test template 2',
    content: 'Test 2'
  }],
});
  
});