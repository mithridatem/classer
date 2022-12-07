//récupération de l'élément HTML
const articles = document.querySelector('#liste');
//récupération du bouton
const bt = document.querySelector('#bt');
let url = "";
//récupération des composantes de de l'url
const {
    host, hostname, href, origin, pathname, port, protocol, search
  } = window.location
//si search est différent de vide
if(search==''){
    console.log('cas 1')
    url = "http://localhost/classer/get"; 
}
if(search!=''){
    console.log('cas 2')
    console.log(search)
    url = "http://localhost/classer/get"+search;
}
//fonction qui récupére les articles
async function getArticle(url){
    //récupéation du json
    const list = await fetch(url);
    //convertion en tableau
    const choice = await list.json();
    console.log(choice);
    //version avec forEach
    choice.forEach(obj=>{
        const cat = obj.categories.split(',');
        const article = document.createElement("h4");
        article.textContent = obj.id+" "+obj.nom;
        articles.appendChild(article);
        const catContainer = document.createElement("div");
        articles.appendChild(catContainer);
        const title = document.createElement("p");
        title.textContent = 'Categories :'
        catContainer.appendChild(title);
        const cat1 = document.createElement("h5");
        cat1.textContent = cat[0];
        catContainer.appendChild(cat1);
        if(cat[1]!= null){
            const cat2 = document.createElement("h5");
            cat2.textContent = cat[1];
            catContainer.appendChild(cat2);
        }
        else{
        }
        if(cat[2]!= null){
            const cat3 = document.createElement("h5");
            cat3.textContent = cat[2];
            catContainer.appendChild(cat3);
        }
        else{
    }}); 
}
getArticle(url);
