// UI decisions based on the choice of user


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

const optionsStr = document.querySelector('.options').textContent;
let optionsArr = optionsStr.split(/<\.-:\.=>/);
for(let i = 0 ; i < optionsArr.length ; i++){
    const html = `  
                    <div class="option-div">
                        <div class="preview-option">
                            ${optionsArr[i]}
                        </div>
                        <div class="green-dot-div">
                            <div class="green-dot-border">
                                <div class="green-dot"></div>
                            </div>
                        </div>
                    </div>
                `;
    document.querySelector('.participant-poll-options-div').insertAdjacentHTML("beforeend", html);
}


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
                                                                                    // Dark mode code ends

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
document.querySelectorAll('.voted-pid').forEach((ele) =>{
    ele.value = document.querySelector('.pid').textContent.trim();
});
document.querySelector('.participant-poll-options-div').addEventListener('click', function (event) {
    let optionDiv = event.target.closest('.option-div');
    if (optionDiv && this.contains(optionDiv)) {
        document.querySelectorAll('.green-dot').forEach((ele) => {
            ele.classList.remove('green-dot-bg-add');
        });
        let greenDot = optionDiv.querySelector('.green-dot');
        if (greenDot) greenDot.classList.add('green-dot-bg-add');
        document.querySelector('.participants-footer-btn-submit').classList.remove('disabled-button');
        document.querySelector('.selected-option').value = optionDiv.textContent.trim();
        // document.querySelector('.voted-pid').value = document.querySelector('.pid').textContent.trim();
    }
});
// Theme

document.addEventListener("DOMContentLoaded", function () {
    const themeEl = document.querySelector('.theme');

    // Function to generate a random hex color
    function getRandomColor() {
        return '#' + Math.floor(Math.random() * 16777215).toString(16).padStart(6, '0');
    }

    if (themeEl && themeEl.textContent.trim() === 'colorful') {
        document.querySelectorAll(".option-div").forEach(ele => {
            const randomColor = getRandomColor();
            ele.style.outline = `2px solid ${randomColor}`;
        });
    }
});


const year = new Date().getFullYear();
document.querySelector(".footer-bottom p").textContent = `© ${year} Poll Now. All rights reserved.`; 
