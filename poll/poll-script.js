// UI decisions based on the choice of user
if(!document.querySelector('.sessionUsername').textContent.trim()){
    document.querySelector('.login-to-submit').classList.remove('hidden');
    document.querySelector('.login-to-submit').classList.add('flex');
}
if(document.querySelector(".voted-or-not").textContent.trim() === "Already Voted"){
    document.querySelector(".footer-form").classList.add('hidden');
    document.querySelector(".already-voted-text").classList.remove('hidden');
}
let timeText = document.querySelector('.startDateAndTime').textContent.trim();
if (timeText.toLowerCase() === 'no') {
    const fallbackTime = document.querySelector('.timeCreated').textContent.trim();
    timeText = fallbackTime.slice(0, 16);
}
const countdownEl = document.getElementById('countdown');
if (timeText) {
    const startingTime = new Date(timeText.replace(' ', 'T'));
    const currentTime = new Date();
    if (startingTime > currentTime) {
        document.querySelector('.not-started-yet').classList.remove('hidden');
        document.querySelector('.not-started-yet').classList.add('flex');
        const updateCountdown = () => {
            const now = new Date();
            const diffMs = startingTime - now;
            if (diffMs <= 0) {
                countdownEl.textContent = "The event has started!";
                clearInterval(intervalId);
                setTimeout(() => {
                    location.reload();
                }, 1000);
                return;
            }
            const diffSeconds = Math.floor(diffMs / 1000);
            const days = Math.floor(diffSeconds / (3600 * 24));
            const hours = Math.floor((diffSeconds % (3600 * 24)) / 3600);
            const minutes = Math.floor((diffSeconds % 3600) / 60);
            const seconds = diffSeconds % 60;
            countdownEl.textContent = `Starts in: ${days}d ${hours}h ${minutes}m ${seconds}s`;
        };
        updateCountdown();
        const intervalId = setInterval(updateCountdown, 1000);
    }
}
const durationText = document.querySelector('.duration').textContent.trim();
if(durationText !== "Infinite Time"){
    const startingTime = new Date(timeText.replace(' ', 'T'));
    const [numStr, unit] = durationText.split(' ');
    const n = parseInt(numStr, 10);
    let deltaMs = 0;
    if (unit.startsWith('Hour')) {
    deltaMs = n * 60 * 60 * 1000;
    }
    else if (unit.startsWith('Day')) {
        deltaMs = n * 24 * 60 * 60 * 1000;
    }
    const endingTime = new Date(startingTime.getTime() + deltaMs);
    if (Date.now() > endingTime.getTime()) {
        document.querySelector(".ended").classList.remove("hidden");
        document.querySelector(".ended").classList.toggle("flex");
    }
}
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
function equalizeOptionHeights() {
    const optionDivs = document.querySelectorAll('.participant-poll-options-div .option-div');
    optionDivs.forEach(div => div.style.height = 'auto');
    let maxHeight = 0;
    optionDivs.forEach(div => {
        const height = div.offsetHeight;
        if (height > maxHeight) maxHeight = height;
    });
    optionDivs.forEach(div => {
        div.style.height = `${maxHeight}px`;
    });
}
equalizeOptionHeights();
window.addEventListener('load', equalizeOptionHeights);
window.addEventListener('resize', equalizeOptionHeights);


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
    const themeEl = document.querySelector('.theme');
    if (themeEl && themeEl.textContent.trim() === 'gradient') {
        document.querySelectorAll(".option-div").forEach(ele => {
            const darkcolor = getRandomDarkColor();
            const lightcolor = getRandomLightColor();
            const userPreference = localStorage.getItem('theme'); 
            const systemPreference = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'; 
            const theme = userPreference || systemPreference;
            if (theme === 'dark'){
                ele.style.background = `linear-gradient(135deg, ${darkcolor}, ${lightcolor})`;
            }
            else{
                ele.style.background = `linear-gradient(135deg, ${lightcolor}, ${darkcolor})`;
            }
        });
    }
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
        if(document.querySelector('.login-to-submit').classList.contains('hidden')) document.querySelector('.participants-footer-btn-submit').classList.remove('disabled-button');
        document.querySelector('.selected-option').value = optionDiv.textContent.trim();
        // document.querySelector('.voted-pid').value = document.querySelector('.pid').textContent.trim();
    }
});
// Theme
function getRandomColor() {
    return '#' + Math.floor(Math.random() * 16777215).toString(16).padStart(6, '0');
}
function getRandomLightColor() {
    const r = Math.floor(200 + Math.random() * 56);
    const g = Math.floor(200 + Math.random() * 56);
    const b = Math.floor(200 + Math.random() * 56);
    return `rgb(${r}, ${g}, ${b})`;
}
function getRandomDarkColor() {
    const r = Math.floor(Math.random() * 56);
    const g = Math.floor(Math.random() * 56);
    const b = Math.floor(Math.random() * 56);
    return `rgb(${r}, ${g}, ${b})`;
}
document.addEventListener("DOMContentLoaded", function () {
    const themeEl = document.querySelector('.theme');

    if (themeEl && themeEl.textContent.trim() === 'colorful') {
        document.querySelectorAll(".option-div").forEach(ele => {
            const randomColor = getRandomColor();
            ele.style.outline = `2px solid ${randomColor}`;
        });
    }

    if (themeEl && themeEl.textContent.trim() === 'gradient') {
        document.querySelectorAll(".option-div").forEach(ele => {
            const darkcolor = getRandomDarkColor();
            const lightcolor = getRandomLightColor();
            const userPreference = localStorage.getItem('theme'); 
            const systemPreference = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'; 
            const theme = userPreference || systemPreference;
            if (theme === 'dark'){
                ele.style.background = `linear-gradient(135deg, ${darkcolor}, ${lightcolor})`;
            }
            else{
                ele.style.background = `linear-gradient(135deg, ${lightcolor}, ${darkcolor})`;
            }
        });
    }
});


const year = new Date().getFullYear();
document.querySelector(".footer-bottom p").textContent = `© ${year} Poll Now. All rights reserved.`; 
