function add_form(){
    document.getElementById('add-aticle-form').appendChild(document.getElementById('multi-form').cloneNode(true));
}
function send_data(){
    let loops=document.getElementsByClassName('form-counter');
    let data= [];
    let formData = new FormData();
    let c = 1;
    for(let i of loops){  
        let article_name = i.querySelector("input[name='article-name']").value;
        let article_cat = i.querySelector("select[name='article-cat']").value;
        let article_auth = i.querySelector("select[name='article-auth']").value;
        let article_content = i.querySelector("textarea[name='content']").value;
        let row= {
            name: article_name,
            category: article_cat,
            author:article_auth,
            content:article_content
        }
        data.push(row);
    }
    fetch('../controller/admin.controller.php?add-article', {
        method: 'POST',
        headers: {
            'Content-Type':'application/json'
        },
        body: JSON.stringify(data)
    })
    .then((response) => response.text())
    .then((result)=>{
        console.log(result);
    })
}

function edit_category_form_fill(element){
    // console.log(document.querySelector('input[name="category"]'));
    document.querySelector('input[name="category"]').value=element.parentElement.children[1].innerText;
    document.querySelector('button[name="add-category"]').setAttribute('name','edit-category');
    document.querySelector('input[name="edit-category-id"]').value=element.id;
}
function clearBtn(){
    document.querySelector('button[name="edit-category"]').setAttribute('name','add-category');
}
function delete_category(id){
        window.location.href = `../controller/admin.controller.php?delete-category=${id}`;
}
function edit_article_form_fill(element){
    document.querySelector('input[name="article-name"]').value=element.parentElement.children[0].innerText;
    document.querySelector('select[name="article-cat"]').value=element.parentElement.children[1].innerText;
    document.querySelector('select[name="article-auth"]').value=element.parentElement.children[2].innerText;
    document.querySelector('textarea[name="content"]').value=element.parentElement.children[3].innerText;
}