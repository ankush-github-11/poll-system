if ( window.history.replaceState ) {
    window.history.replaceState(null, null, window.location.href);
}
document.querySelector(".fetched-pid").value = document.querySelector(".pid").textContent.trim();
if(document.querySelector(".main-div-2").textContent.trim() === "Poll Doesn't Exist"){
    document.querySelector('.main-div-2').classList.remove('hidden');
}
if(document.querySelector(".main-div-2").textContent.trim() === "Poll Exist"){
    document.querySelector('.main-div-3').classList.remove('hidden');
    // document.querySelector('.main-div-2').classList.add('hidden'); // Added this line
    document.querySelector('.main-div-1').classList.add('hidden');
}
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

const arr = document.querySelector('.options-div').textContent.trim().split("/*-*&^/*-");
const optionsArray = arr[0].split("<.-:.=>");
const countArray = arr[1].split("<.-:.=>").map(Number); // convert to numbers

let sum = 0;
let maxi = 0;
for (let i = 0; i < countArray.length; i++) {
    sum += countArray[i];
}

// convert to percentage (or fraction of 100 width)
for (let i = 0; i < countArray.length; i++) {
    countArray[i] = (countArray[i] / sum) * 100;
    if(countArray[i] > maxi) maxi = countArray[i];
}

for (let i = 0; i < optionsArray.length; i++) {
    let val = countArray[i].toFixed(1);
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
    percentBar.style.width = `${countArray[i]}%`;
    if(countArray[i] == maxi){
        percentText.style.color = "rgb(17, 108, 255)";
    }
}
document.querySelector(".total-participants-value").textContent = sum;