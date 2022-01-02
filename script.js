function triggerClick(){

    document.querySelector('#profileimage').click();
}
function displayImage(e){
if (e.files[0]){
    var reader = new FileReader();
    reader.onload = function(e){

        document.querySelector('#profiledisplay').setAttribute('src',e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
}

}