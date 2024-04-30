

//To open and close side bar
function openNav(){
    document.getElementById("mySideBar").style.width = "250px";
}

function closeNav(){
    document.getElementById("mySideBar").style.width = "0";
}

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.star-rating input').forEach(star => {
        star.addEventListener('change', function() {
            alert('Thank you for your review');
        });
    });
});

