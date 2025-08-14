 // Profile Code Starts
 document.querySelectorAll('.profile-name-div > a').forEach(link => {
    const words = link.textContent.trim().split(/\s+/);
    link.innerHTML = words.map(word => `<span>${word}</span>`).join('');
});
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
    document.querySelector('footer').classList.remove('blur-rev');
    document.querySelector('.my-navbar-div').classList.remove('blur-rev');
    document.querySelector('.navbar-side-div').classList.remove('hidden');
    document.querySelector('.navbar-side-div').classList.add('flex');
    document.querySelector('.navbar-side-div').classList.add('slide-animation');
    document.querySelector('main').classList.add('blur');
    document.querySelector('footer').classList.add('blur');
    document.querySelector('.my-navbar-div').classList.add('blur');
});
document.querySelector('.navbar-fa-div').addEventListener("click", function(){
    document.querySelector('.navbar-side-div').classList.remove('slide-animation');
    document.querySelector('.navbar-side-div').classList.add('slide-animation-rev');
    document.querySelector('main').classList.add('blur-rev');
    document.querySelector('footer').classList.add('blur-rev');
    document.querySelector('.my-navbar-div').classList.add('blur-rev');
    setTimeout(()=>{
        document.querySelector('.navbar-side-div').classList.remove('flex');
        document.querySelector('.navbar-side-div').classList.add('hidden');
        document.querySelector('main').classList.remove('blur');
        document.querySelector('footer').classList.remove('blur');
        document.querySelector('.my-navbar-div').classList.remove('blur');
    },600);

});
window.addEventListener("resize", function () {
    if (window.innerWidth >= 768) {
      document.querySelector(".navbar-side-div").classList.remove("flex");
      document.querySelector(".navbar-side-div").classList.add("hidden");
      document.querySelector('main').classList.remove('blur');
      document.querySelector('footer').classList.remove('blur');
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
const year = new Date().getFullYear();
document.querySelector(".footer-bottom p").textContent = `© ${year} Poll Now. All rights reserved.`; 


const array1 = ['C', 'C++', 'Java', 'Python', 'Javascript', 'C#', 'PHP', 'Ruby', 'Go', 'Rust', 'HTML', 'Assembly', 'R', 'Swift', 'Kotlin'];
const array2 = ['Summer', 'Monsoon', 'Fall', 'Winter', 'Spring'];
const array3 = ['Smartphone', 'Laptop', 'Smartwatch', 'Tablet'];

let optionsArray = [];
const val = document.querySelector('.view').dataset.value;
if (val == 1){
    optionsArray = array1;
    document.querySelector('.head-1').classList.remove('hidden');
    document.querySelector('.head-2').classList.add('hidden');
    document.querySelector('.head-3').classList.add('hidden');
}
if (val == 2){
    optionsArray = array2;
    document.querySelector('.head-1').classList.add('hidden');
    document.querySelector('.head-2').classList.remove('hidden');
    document.querySelector('.head-3').classList.add('hidden');
    
}
if (val == 3){
    optionsArray = array3;
    document.querySelector('.head-1').classList.add('hidden');
    document.querySelector('.head-2').classList.add('hidden');
    document.querySelector('.head-3').classList.remove('hidden');

}


const arr = document.querySelector('.view-array').value.trim().split(" ").map(Number);

let sum = 0;
let maxi = 0;
for (let i = 0; i < arr.length; i++) {
    sum += arr[i];
}
if(sum == 0){
    for (let i = 0; i < arr.length; i++) {
        arr[i] = 0;
        if(arr[i] > maxi) maxi = arr[i];
    }
}
else{
    // convert to percentage (or fraction of 100 width)
    for (let i = 0; i < arr.length; i++) {
        arr[i] = (arr[i] / sum) * 100;
        if(arr[i] > maxi) maxi = arr[i];
    }
}

for (let i = 0; i < arr.length; i++) {
    let val = arr[i].toFixed(1);
    const html = `
        <div class="poll-display-box">
            <div class="option-and-percent">
            <div class="poll-option">${optionsArray[i]}</div>
            <div class="percent">${val}%</div>
            </div>
            <div class="poll-display-percent"></div>
        </div>
    `;
    document.querySelector('.left-div').insertAdjacentHTML("beforeend", html);

    const container = document.querySelector(".left-div");
    const lastChild = container.lastElementChild;
    const percentBar = lastChild.querySelector('.poll-display-percent');
    const percentText = lastChild.querySelector('.percent');
    percentBar.style.width = `${arr[i]}%`;
    if(arr[i] == maxi && sum != 0){
        percentText.style.color = "rgb(17, 108, 255)";
    }
}