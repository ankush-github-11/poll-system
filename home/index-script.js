// Profile Code Starts
if(document.querySelector(".sessionName").textContent.trim()){
    document.querySelector(".login").classList.add('hidden');
    document.querySelector(".signup").classList.add('hidden');
    document.querySelector(".dropdown-profile-div").classList.remove('hidden');
    document.querySelector(".dropdown-profile-div").classList.add('flex');
}
else{
    document.querySelector(".dropdown-profile-div").classList.remove('flex');
    document.querySelector(".dropdown-profile-div").classList.add('hidden');
    document.querySelector(".login").classList.remove('hidden');
    document.querySelector(".signup").classList.remove('hidden');
}
const dropdown = document.querySelector('.profile-dropdown-div');
const profileLogo = document.querySelector('.profile-logo');
profileLogo.addEventListener('click', (event) => {
    event.stopPropagation();
    dropdown.classList.toggle('hidden');
    dropdown.classList.toggle('flex');
});
document.addEventListener('click', (event) => {
    if (dropdown && !dropdown.contains(event.target) && event.target !== profileLogo) {
        dropdown.classList.remove('flex');
        dropdown.classList.add('hidden');
    }
});
document.querySelector('.signout-div').addEventListener('mouseenter', () => {
    document.querySelector('.sign-out-btn').style.backgroundColor = "var(--hover-color)";
});
document.querySelector('.signout-div').addEventListener('mouseleave', () => {
    document.querySelector('.sign-out-btn').style.backgroundColor = "var(--dropdown-bg-color)";
});
// Profile Code Ends

// UI Modifications based on Database Interection
window.onload = function(){
    for(let i = 1 ; i <= 3 ; i++){
        if(document.querySelector(`.UI-decision-${i}`).dataset.value=="Voted"){
            document.querySelector(`.modal-${i}-options-div`).style.display = 'none';
            document.querySelector(`.modal-${i}-cancel-submit`).style.display = 'none';
            document.querySelector(`.modal-${i}-result`).classList.toggle('hidden');
            document.querySelector(`.modal-${i}-result`).classList.toggle('flex');
        }
    }
}
const toggleVote1andDivs = function(){
    document.querySelector('.modal-1').classList.toggle('hidden');
    document.querySelector('.total-div-3').classList.toggle('hidden');
    document.querySelector('.total-div-3').classList.toggle('total-div-3-css');
    document.querySelector('.modal-1').classList.toggle('modal-1-css');
    document.querySelector('.total-div-1').classList.toggle('index-blur');
    document.querySelector('.total-div-2').classList.toggle('index-blur');
    document.querySelector('footer').classList.toggle('index-blur');
};
const toggleVote2andDivs = function(){
    document.querySelector('.modal-2').classList.toggle('hidden');
    document.querySelector('.total-div-3').classList.toggle('hidden');
    document.querySelector('.total-div-3').classList.toggle('total-div-3-css');
    document.querySelector('.modal-2').classList.toggle('modal-2-css');
    document.querySelector('.total-div-1').classList.toggle('index-blur');
    document.querySelector('.total-div-2').classList.toggle('index-blur');
    document.querySelector('footer').classList.toggle('index-blur');
};
const toggleVote3andDivs = function(){
    document.querySelector('.modal-3').classList.toggle('hidden');
    document.querySelector('.total-div-3').classList.toggle('hidden');
    document.querySelector('.total-div-3').classList.toggle('total-div-3-css');
    document.querySelector('.modal-3').classList.toggle('modal-3-css');
    document.querySelector('.total-div-1').classList.toggle('index-blur');
    document.querySelector('.total-div-2').classList.toggle('index-blur');
    document.querySelector('footer').classList.toggle('index-blur');
};
document.querySelector('.btn-vote-1').addEventListener("click",function(){
    toggleVote1andDivs();
});
document.querySelector('.btn-vote-2').addEventListener("click",function(){
    toggleVote2andDivs();
});
document.querySelector('.btn-vote-3').addEventListener("click",function(){
    toggleVote3andDivs();
});
document.querySelector('.x-1').addEventListener('click',function(){
    const allDivs = document.querySelectorAll('.modal-1-options-div > div');
    allDivs.forEach(div => {
        div.classList.remove('active-bg');
        div.classList.remove('active-text');
    });
    toggleVote1andDivs();
});
document.querySelector('.x-2').addEventListener('click',function(){
    const allDivs = document.querySelectorAll('.modal-2-options-div > div');
    allDivs.forEach(div => {
        div.classList.remove('active-bg');
        div.classList.remove('active-text');
    });
    toggleVote2andDivs();
});
document.querySelector('.x-3').addEventListener('click',function(){
    const allDivs = document.querySelectorAll('.modal-3-options-div > div');
    allDivs.forEach(div => {
        div.classList.remove('active-bg');
        div.classList.remove('active-text');
    });
    toggleVote3andDivs();
});
document.querySelector('.cancel-1').addEventListener('click',function(){
    const allDivs = document.querySelectorAll('.modal-1-options-div > div');
    allDivs.forEach(div => {
        div.classList.remove('active-bg');
        div.classList.remove('active-text');
    });
    toggleVote1andDivs();
});
document.querySelector('.cancel-2').addEventListener('click',function(){
    const allDivs = document.querySelectorAll('.modal-2-options-div > div');
    allDivs.forEach(div => {
        div.classList.remove('active-bg');
        div.classList.remove('active-text');
    });
    toggleVote2andDivs();
});
document.querySelector('.cancel-3').addEventListener('click',function(){
    const allDivs = document.querySelectorAll('.modal-3-options-div > div');
    allDivs.forEach(div => {
        div.classList.remove('active-bg');
        div.classList.remove('active-text');
    });
    toggleVote3andDivs();
});
document.querySelector('.modal-1-options-div').addEventListener('click', function (event) {
    if (event.target.parentElement === this && event.target.tagName === 'DIV') {
        const allDivs = this.querySelectorAll('div');
        allDivs.forEach(div => {
            div.classList.remove('active-bg');
            div.classList.remove('active-text');
        });
        event.target.classList.add('active-bg');
        event.target.classList.add('active-text');
        document.querySelector('.result-1').textContent = event.target.textContent;
    }
});
document.querySelector('.modal-2-options-div').addEventListener('click', function (event) {
    if (event.target.parentElement === this && event.target.tagName === 'DIV') {
        const allDivs = this.querySelectorAll('div');
        allDivs.forEach(div => {
            div.classList.remove('active-bg');
            div.classList.remove('active-text');
        });
        event.target.classList.add('active-bg');
        event.target.classList.add('active-text');
        document.querySelector('.result-2').value = event.target.textContent;
    }
});
document.querySelector('.modal-3-options-div').addEventListener('click', function (event) {
    if (event.target.parentElement === this && event.target.tagName === 'DIV') {
        const allDivs = this.querySelectorAll('div');
        allDivs.forEach(div => {
            div.classList.remove('active-bg');
            div.classList.remove('active-text');
        });
        event.target.classList.add('active-bg');
        event.target.classList.add('active-text');
        document.querySelector('.result-3').value = event.target.textContent;
    }
});
document.querySelector('.submit-1').addEventListener('click', function(){
    let flag = 1;
    document.querySelectorAll('.modal-1-options-div > div').forEach((ele) => {
        if(ele.classList.contains('active-bg')) flag = 0;
    });
    if(flag){
        window.alert("Please Select an Option");
        return;
    }
    document.querySelector('.modal-1-options-div').style.display = 'none';
    document.querySelector('.modal-1-cancel-submit').style.display = 'none';
    document.querySelector('.modal-1-result').classList.toggle('hidden');
    document.querySelector('.modal-1-result').classList.toggle('flex');
});
document.querySelector('.submit-2').addEventListener('click', function(){
    let flag = 1;
    document.querySelectorAll('.modal-2-options-div > div').forEach((ele) => {
        if(ele.classList.contains('active-bg')) flag = 0;
    });
    if(flag){
        window.alert("Please Select an Option");
        return;
    }
    document.querySelector('.modal-2-options-div').style.display = 'none';
    document.querySelector('.modal-2-cancel-submit').style.display = 'none';
    document.querySelector('.modal-2-result').classList.toggle('hidden');
    document.querySelector('.modal-2-result').classList.toggle('flex');
});
document.querySelector('.submit-3').addEventListener('click', function(){
    let flag = 1;
    document.querySelectorAll('.modal-3-options-div > div').forEach((ele) => {
        if(ele.classList.contains('active-bg')) flag = 0;
    });
    if(flag){
        window.alert("Please Select an Option");
        return;
    }
    document.querySelector('.modal-3-options-div').style.display = 'none';
    document.querySelector('.modal-3-cancel-submit').style.display = 'none';
    document.querySelector('.modal-3-result').classList.toggle('hidden');
    document.querySelector('.modal-3-result').classList.toggle('flex');
});
                                                                                // Light or Dark Mode JS
const initializeTheme = () => {
    const userPreference = localStorage.getItem('theme'); 
    const systemPreference = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'; 
    const theme = userPreference || systemPreference;
    if (theme === 'dark'){
        document.body.classList.add('darkmode');
        document.querySelector('.dark-mode-svg').classList.remove('hidden');
        document.querySelector('.light-mode-svg').classList.add('hidden'); 
    }
    else{
        document.body.classList.remove('darkmode');
        document.querySelector('.dark-mode-svg').classList.add('hidden');
        document.querySelector('.light-mode-svg').classList.remove('hidden'); 
    }
}
initializeTheme();
document.querySelector('.light-dark-div').addEventListener('click', function () {
    document.body.classList.toggle('darkmode');
    const isDarkMode = document.body.classList.contains('darkmode');
    document.querySelector('.dark-mode-svg').classList.toggle('hidden');
    document.querySelector('.light-mode-svg').classList.toggle('hidden');
    localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');
});

                                                                                        // Navbar code starts
document.querySelector('.hamburger-div').addEventListener("click", function(){
    document.querySelector('.navbar-side-div').classList.remove('slide-animation-rev');
    document.querySelector('main').classList.remove('blur-rev');
    document.querySelector('.my-navbar-div').classList.remove('blur-rev');
    document.querySelector('.navbar-side-div').classList.remove('hidden');
    document.querySelector('.navbar-side-div').classList.add('flex');
    document.querySelector('.navbar-side-div').classList.add('slide-animation');
    document.querySelector('main').classList.add('blur');
    document.querySelector('.my-navbar-div').classList.add('blur');
});
document.querySelector('.navbar-fa-div').addEventListener("click", function(){
    document.querySelector('.navbar-side-div').classList.remove('slide-animation');
    document.querySelector('.navbar-side-div').classList.add('slide-animation-rev');
    document.querySelector('main').classList.add('blur-rev');
    document.querySelector('.my-navbar-div').classList.add('blur-rev');
    setTimeout(()=>{
        document.querySelector('.navbar-side-div').classList.remove('flex');
        document.querySelector('.navbar-side-div').classList.add('hidden');
        document.querySelector('main').classList.remove('blur');
        document.querySelector('.my-navbar-div').classList.remove('blur');
    },600);

});
window.addEventListener("resize", function () {
    if (window.innerWidth >= 768) {
      document.querySelector(".navbar-side-div").classList.remove("flex");
      document.querySelector(".navbar-side-div").classList.add("hidden");
      document.querySelector('main').classList.remove('blur');
      document.querySelector('.my-navbar-div').classList.remove('blur');
    }
});
document.querySelectorAll('.nav-items-div a').forEach((navItem, index) => {
    const hoverDiv = document.querySelector(`.nav-item-${index + 1}-hover-div`);
    
    navItem.addEventListener('mouseover', () => {
        hoverDiv.style.backgroundColor = "var(--bg-1)";
    });

    navItem.addEventListener('mouseout', () => {
        hoverDiv.style.backgroundColor = "transparent";
    });
});
                                                                                        // Navbar code ends
