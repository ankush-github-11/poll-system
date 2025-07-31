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


document.querySelector(".schedule-and-duration-div-2-calendar").value = 'Calendar';
const arrayOfSidebar = new Set();
arrayOfSidebar.add("sidebar-1");
flatpickr("#start-date-time", {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    minDate: "today", // Disables past dates
    minuteIncrement: 1,
    onChange: function (selectedDates) {
        validateDate(selectedDates[0]);
    },
});

const validateDate = (selectedDate) => {
    const now = new Date();
    const messageEl = document.querySelector(".schedule-message");
    if (selectedDate <= now) {
        messageEl.textContent = "Select a future date and time";
        messageEl.style.color = "red";
    } else {
        messageEl.textContent = "Valid date selected";
        messageEl.style.color = "#28a745";
    }
};
const createOption = function (i) {
    const html = `
    <div class="input-field option" data-dynamic="true">
        <input type="text" required spellcheck="false" autocomplete="off" name="option${i}">
        <label>Option ${i}</label>
        <span class="cross-btn">&times;</span>
    </div>
    `;
    document
        .querySelector('.question-and-poll-options')
        .insertAdjacentHTML('beforeend', html);
    i++;
};
const renameOptionNumbers = function(){
    document.querySelectorAll('.option > label').forEach((ele, index) => {
        ele.textContent = `Option ${index+1}`;
    });
};
const hideQuestionAndPollOptionDiv = function(){
    document.querySelectorAll('.question-and-poll-options > div').forEach((ele) => {
        ele.classList.add('hidden');
    });
};
const addQuestionAndPollOptionDiv = function(){
    document.querySelectorAll('.question-and-poll-options > div').forEach((ele) => {
        ele.classList.remove('hidden');
    });
};
const hideChooseTemplateDiv = function(){
    document.querySelector('.choose-template').classList.remove('flex');
    document.querySelector('.choose-template').classList.add('hidden');
};
const addChooseTemplateDiv = function(){
    document.querySelector('.choose-template').classList.remove('hidden');
    document.querySelector('.choose-template').classList.add('flex');
};
const hideScheduleAndDuration = function(){
    document.querySelector('.schedule-and-duration').classList.remove('flex');
    document.querySelector('.schedule-and-duration').classList.add('hidden');
}
const addScheduleAndDuration = function(){
    document.querySelector('.schedule-and-duration').classList.remove('hidden');
    document.querySelector('.schedule-and-duration').classList.add('flex');
}
const hideAdvancedSettings = function(){
    document.querySelector('.advanced-settings').classList.remove('flex');
    document.querySelector('.advanced-settings').classList.add('hidden');
}
const addAdvancedSettings = function(){
    document.querySelector('.advanced-settings').classList.remove('hidden');
    document.querySelector('.advanced-settings').classList.add('flex');
}
const hidePreviewAndSharePoll = function(){
    document.querySelector('.preview-and-share-poll').classList.remove('flex');
    document.querySelector('.preview-and-share-poll').classList.add('hidden');
}
const addPreviewAndSharePoll = function(){
    document.querySelector('.preview-and-share-poll').classList.remove('hidden');
    document.querySelector('.preview-and-share-poll').classList.add('flex');
}
const popupScreen1 = function () {
  document.querySelector(".popup-screen").classList.remove("hidden");
  document.querySelector(".popup-screen").classList.add("flex");
  document.querySelector(".popup-1").classList.remove("hidden");
  document.querySelector(".popup-1").classList.add("flex");
  setTimeout(() => {
    document.querySelector(".popup-screen").classList.remove("flex");
    document.querySelector(".popup-screen").classList.add("hidden");
    document.querySelector(".popup-1").classList.remove("flex");
    document.querySelector(".popup-1").classList.add("hidden");
  }, 2000);
};
const popupScreen2 = function () {
  document.querySelector(".popup-screen").classList.remove("hidden");
  document.querySelector(".popup-screen").classList.add("flex");
  document.querySelector(".popup-2").classList.remove("hidden");
  document.querySelector(".popup-2").classList.add("flex");
  setTimeout(() => {
    document.querySelector(".popup-screen").classList.remove("flex");
    document.querySelector(".popup-screen").classList.add("hidden");
    document.querySelector(".popup-2").classList.remove("flex");
    document.querySelector(".popup-2").classList.add("hidden");
  }, 2000);
};
const continueBtnClick = function(){
    let flag = 0;
    let str = "";
    let i = 1;
    document.querySelectorAll('.sidebar-options > div').forEach((ele) => {
        if(flag==1){
            ele.classList.toggle('op-active');
            flag = 0;
            str = ele.querySelector(`.sidebar-${i}-text`).textContent;
            document.querySelector('.right-div-heading').textContent = ele.querySelector('.js-select').textContent;
            const classArr = JSON.stringify(ele.querySelector('.js-select').classList.value);
            let n = classArr.match(/\d+/)[0];

            document.querySelectorAll('.sidebar-options > div').forEach((ele) =>{
                ele.classList.remove('op-active');
            });
            document.querySelector(`.sidebar-${n}`).classList.toggle('op-active');

            document.querySelector('.step-p').textContent = `Step ${n} of 5`;
            document.querySelectorAll('.inner-bar').forEach((ele) => ele.style.width = String(n * 20) + '%');
            hideQuestionAndPollOptionDiv();
            hideChooseTemplateDiv();
            hideScheduleAndDuration();
            hideAdvancedSettings();
            hidePreviewAndSharePoll();
    
            if(n == 1) addQuestionAndPollOptionDiv();
            if(n == 2) addChooseTemplateDiv();
            if(n == 3) addScheduleAndDuration();
            if(n == 4) addAdvancedSettings();
            if(n == 5) addPreviewAndSharePoll();
            return;
        }
        if(ele.classList.contains('op-active')){
            const activeEleClass = ele.classList.value.split(' ')[0];
            if (activeEleClass === "sidebar-1") {
              if(
                !(
                  document.querySelector(".form-title > input").value.trim() &&
                  document.querySelector(".form-desc > input").value.trim() &&
                  document.querySelector(".required-poll-option-1 > input").value.trim() &&
                  document.querySelector(".required-poll-option-2 > input").value.trim()
                )
              ) {
                popupScreen1();
                return;
              }
              else{
                  arrayOfSidebar.add("sidebar-2");
              }
            }
            if(activeEleClass==="sidebar-2"){
                let isChecked = false;
                document.getElementsByName('caseOptions').forEach((ele) =>{
                    if(ele.checked) isChecked = true;
                });
                if(!isChecked){
                    popupScreen2();
                    return;
                }
                else{
                    arrayOfSidebar.add("sidebar-3");
                }
            }
            if (activeEleClass === "sidebar-3") {
                const isPublishImmediatelyChecked = document.querySelector('.publish-immediately-checkbox').checked;
                const isValidDateSelected = document.querySelector('.schedule-message').textContent.trim() === "Valid date selected";
                if (!(isPublishImmediatelyChecked || isValidDateSelected)) {
                    popupScreen2();
                    return;
                }
                else{
                    arrayOfSidebar.add("sidebar-4");
                }
            }
            
            if(activeEleClass==="sidebar-4"){
                let isChecked = false;
                if(document.querySelector('.initial-input').checked || document.querySelector('.counter-input').checked)
                    isChecked = true;
                if(!(isChecked && document.querySelector('.btn-advanced-settings-div-3-under').textContent.trim()!=="Results")){
                    popupScreen2();
                    return;
                }
                else{
                    document.querySelector(".btn-continue").classList.add("hidden");
                    document.querySelector(".btn-create").classList.remove("hidden");
                    document.querySelector(".btn-create").classList.add("glow-button");
                    arrayOfSidebar.add("sidebar-5");
                }
            }
            if(activeEleClass==="sidebar-5"){

            }
            flag = 1;
            ele.classList.toggle('op-active');
        }
        i++;
    });
};

const initializeTheme = function() {
    const userPreference = localStorage.getItem('theme'); 
    const systemPreference = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'; 
    const theme = userPreference || systemPreference;
    if (theme === 'dark'){
        document.body.classList.add('darkmode');
        document.querySelectorAll('.my-fa-1, .my-fa-3').forEach((ele) => ele.classList.add('my-fa-linear-gradient'));
        document.querySelector('.dark-mode-svg').classList.remove('hidden');
        document.querySelector('.light-mode-svg').classList.add('hidden'); 
    }
    else{
        document.body.classList.remove('darkmode');
        document.querySelectorAll('.my-fa-1, .my-fa-3').forEach((ele) => ele.classList.remove('my-fa-linear-gradient'));
        document.querySelector('.dark-mode-svg').classList.add('hidden');
        document.querySelector('.light-mode-svg').classList.remove('hidden'); 
    }
}
let key = null;
const updateBarStyles = function() {
    const screenWidth = window.innerWidth;
    if (screenWidth > 992 && key !== 'large') {
        document.querySelectorAll('.admin-inner-bar').forEach((bar, i) => {
            const val = Math.trunc(Math.random()*35+1);
            bar.style.height = `${val}%`;
            bar.style.width = '';
        });
        key = 'large';
    }
    else if (screenWidth <= 992 && key !== 'small') {
        document.querySelectorAll('.admin-inner-bar').forEach((bar, i) => {
            const val = Math.trunc(Math.random()*35+1);
            bar.style.width = `${val}%`;
            bar.style.height = '';
        });
        key = 'small';
    }
}
// Function Area Ends

i = 3;
document.querySelector('.btn-add-op').addEventListener('click', function(){
    createOption(i);
    i++;
});
document.querySelector('.question-and-poll-options').addEventListener('click', function (e) {
    if (e.target.classList.contains('cross-btn')) {
        const inputField = e.target.closest('.input-field');
        
        // Remove only if it's dynamically created
        if (inputField && inputField.hasAttribute('data-dynamic')) {
            inputField.remove();
        }
    }
    renameOptionNumbers();
});

document.querySelector('.btn-continue').addEventListener('click',function(){
    continueBtnClick();
});
                                                                                    // Sidebar Click Event
document.querySelectorAll('.sidebar-options > div').forEach((ele) => {
    ele.addEventListener('click',function(){
        const classArr = JSON.stringify(ele.querySelector('.js-select').classList.value);
        let n = classArr.match(/\d+/)[0];
        if(!arrayOfSidebar.has(`sidebar-${n}`)){
            return;
        }
        document.querySelectorAll('.sidebar-options > div').forEach((ele) =>{
            ele.classList.remove('op-active');
        });
        ele.classList.toggle('op-active');
        document.querySelector('.right-div-heading').textContent = ele.querySelector('.js-select').textContent;
        document.querySelector('.step-p').textContent = `Step ${n} of 5`;
        document.querySelectorAll('.inner-bar').forEach((ele) => ele.style.width = String(n * 20) + '%');
        hideQuestionAndPollOptionDiv();
        hideChooseTemplateDiv();
        hideScheduleAndDuration();
        hideAdvancedSettings();
        hidePreviewAndSharePoll();
        if(n == 1) addQuestionAndPollOptionDiv();
        if(n == 2) addChooseTemplateDiv();
        if(n == 3) addScheduleAndDuration();
        if(n == 4) addAdvancedSettings();
        if(n == 5) addPreviewAndSharePoll();
    }); 
});
document.querySelectorAll('.sidebar-nav > i').forEach((ele) => {
    ele.addEventListener('click',function(){
        const classArr = JSON.stringify(ele.classList.value);
        let n = classArr.match(/\d+/)[0];
        if(!arrayOfSidebar.has(`sidebar-${n}`)){
            return;
        }
        document.querySelector('.right-div-heading').textContent = ele.querySelector('.my-fa').textContent;
        
        document.querySelectorAll('.sidebar-options > div').forEach((ele) =>{
            ele.classList.remove('op-active');
        });
        document.querySelector(`.sidebar-${n}`).classList.toggle('op-active');

        document.querySelector('.step-p').textContent = `Step ${n} of 5`;
        document.querySelectorAll('.inner-bar').forEach((ele) => ele.style.width = String(n * 20) + '%');
        hideQuestionAndPollOptionDiv();
        hideChooseTemplateDiv();
        hideScheduleAndDuration();
        hideAdvancedSettings();
        hidePreviewAndSharePoll();

        if(n == 1) addQuestionAndPollOptionDiv();
        if(n == 2) addChooseTemplateDiv();
        if(n == 3) addScheduleAndDuration();
        if(n == 4) addAdvancedSettings();
        if(n == 5) addPreviewAndSharePoll();

    });
});
document.querySelector('.publish-immediately-checkbox').addEventListener('click',function(){
    document.querySelector('.schedule-and-duration-div-2').classList.toggle('pointer-events-none');
    document.querySelector('.schedule-and-duration-div-2').classList.toggle('no-select');
    document.querySelector('.schedule-and-duration-div-2 input').classList.toggle('color-disabled');
    document.querySelector('.schedule-and-duration-div-2-under i').classList.toggle('color-disabled');
    document.querySelector('.schedule-message').classList.toggle('color-disabled');
    document.querySelector('.schedule-and-duration-div-2 input').classList.toggle('color-fade');
    document.querySelector('.schedule-and-duration-div-2 label').classList.toggle('color-disabled');
});
document.querySelector('.preview-btn-toggle').addEventListener('click', function(){
    document.querySelectorAll('.preview-btn-toggle > div').forEach((ele) => {
        ele.classList.toggle('my-btn-toggle');
    });
    document.querySelector('.admin-view').classList.toggle('hidden');
    document.querySelector('.participant-view').classList.toggle('hidden');
});
document.querySelector('.participant-poll-options-div').addEventListener('click', function (event) {
    let optionDiv = event.target.closest('.option-div');
    if (optionDiv && this.contains(optionDiv)) {
        document.querySelectorAll('.green-dot').forEach((ele) => {
            ele.classList.remove('green-dot-bg-add');
        });
        let greenDot = optionDiv.querySelector('.green-dot');
        if (greenDot) greenDot.classList.add('green-dot-bg-add');
    }
});
                                                                                // Light or Dark Mode JS

document.querySelector('.light-dark-div').addEventListener('click', function () {
    document.body.classList.toggle('darkmode');
    const isDarkMode = document.body.classList.contains('darkmode');
    document.querySelectorAll('.my-fa-1, .my-fa-3').forEach((ele) => ele.classList.toggle('my-fa-linear-gradient'));
    document.querySelector('.dark-mode-svg').classList.toggle('hidden');
    document.querySelector('.light-mode-svg').classList.toggle('hidden');
    localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');
});
initializeTheme();
window.addEventListener('resize', updateBarStyles);
updateBarStyles();
const arr = [15, 15, 20, 30, 10, 10];
for (let i = 0; i < 6; i++) {
    const html = `
        <div class="poll-display-box">
            <div class="option-and-percent">
            <div class="poll-option">Option ${i + 1}</div>
            <div class="percent">${arr[i]}%</div>
            </div>
            <div class="poll-display-percent"></div>
        </div>
    `;
    document.querySelector('.admin-body-div').insertAdjacentHTML("beforeend", html);

    const container = document.querySelector(".admin-body-div");
    const lastChild = container.lastElementChild;
    const percentBar = lastChild.querySelector('.poll-display-percent');
    const percentText = lastChild.querySelector('.percent');
    percentBar.style.width = `${arr[i]}%`;
    if(arr[i] == 30){
        percentText.style.color = "rgb(17, 108, 255)";
    }
}
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
const year = new Date().getFullYear();
document.querySelector(".footer-bottom p").textContent = `© ${year} Poll Now. All rights reserved.`; 
