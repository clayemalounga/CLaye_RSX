let button= document.querySelectorAll('#like');
for (const li of button){
    li.addEventListener("click",(ev)=>{
        ev.preventDefault();
        let icon =ev.currentTarget;
        let curicon = icon.firstElementChild;
        let con= Document.createElement('span');
        con.innerText=1;
        curicon.append(con);
    })
}
//c'est pour le compte si l'utilisateur n'est pas connecter
let con= document.querySelectorAll('#con');
for (const li of con){
    li.addEventListener("click",(ev)=>{
        alert("Vous n'etes pas connecter pour consulter votre compte");
        ev.preventDefault;
        
    });
};