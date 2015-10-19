	var TextAreaList = [
		26, 2, 5
	];
$(document).ready(function()
{
	// $('#demo1').simplyCountable();
  var x;
  var prefix = {
		txtarea : '#wpbdp-field-',
    wrapper : 'howmany-',
    span : '#wordcounter-'
  };




	for (x in TextAreaList) {
		$(prefix.txtarea + TextAreaList[x]).simplyCountable({
			counter: prefix.span + TextAreaList[x],
			countType: 'words',
			maxCount: 100,
			countDirection: 'up',
			strictMax: true
		});
		document.getElementById(prefix.wrapper + TextAreaList[x]).style.display = 'block';
  }
});

