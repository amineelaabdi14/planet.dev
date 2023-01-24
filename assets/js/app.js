function add_form(){
    document.getElementById('add-aticle-form').appendChild(document.getElementById('multi-form').cloneNode(true));
    console.log(document.getElementById('multi-form').cloneNode(true));
}