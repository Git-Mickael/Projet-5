class Calendar{
    constructor(){
        this.reservationElt = document.getElementsByClassName("cbrd");
        this.reservation();
    }
    reservation(){
        for (let i = 0; i < this.reservationElt.length; i++){
            this.reservationElt[i].addEventListener("click",() =>{
            this.reservationElt[i].style.backgroundColor = "red";
            })
        }
    }
}
class Navigation{
    constructor(){
        this.navigationElt = document.getElementById("nav");
        this.connectElt = document.getElementById("connectButton");
        this.display();
    }
    display(){
        this.connectElt.addEventListener("click",() =>{
            this.navigationElt.style.visibility = "hidden";
        })
    }
}
new Calendar();
new Navigation();