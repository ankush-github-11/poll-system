if ( window.history.replaceState ) {
    window.history.replaceState(null, null, window.location.href);
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
    }, 3000);
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
    }, 3000);
};
if(document.querySelector(".message-div").textContent.trim() === "Message Sent"){
    popupScreen1();
}
if(document.querySelector(".bug-div").textContent.trim() === "Bug Sent"){
    popupScreen2();
}
// Mode code starts
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
// Mode code ends
const hideDiv1 = function(){
    document.querySelector('.right-div-1').classList.remove('flex');
    document.querySelector('.dashboard-div').classList.remove('active-div');
    document.querySelector('.right-div-1').classList.add('hidden');
}
const hideDiv2 = function(){
    document.querySelector('.right-div-2').classList.remove('flex');
    document.querySelector('.help-faq-div').classList.remove('active-div');
    document.querySelector('.right-div-2').classList.add('hidden');
}
const hideDiv3 = function(){
    document.querySelector('.right-div-3').classList.remove('flex');
    document.querySelector('.messages-and-support-div').classList.remove('active-div');
    document.querySelector('.right-div-3').classList.add('hidden');
}
const hideDiv4 = function(){
    document.querySelector('.right-div-4').classList.remove('flex');
    document.querySelector('.report-a-bug-div').classList.remove('active-div');
    document.querySelector('.right-div-4').classList.add('hidden');
}
const togglingDivs1 = function(paneSelector, navItem){
  document.querySelectorAll('.' + navItem).forEach((ele) => {
    ele.classList.add('active-div');
  });
  document.querySelector(paneSelector).classList.remove('hidden');
  document.querySelector(paneSelector).classList.add('flex');
}
const togglingDivs2 = function(paneSelector, navItem){
  document.querySelectorAll('.' + navItem).forEach((ele) => {
    ele.classList.add('active-div');
  });
  document.querySelector(paneSelector).classList.remove('hidden');
  document.querySelector(paneSelector).classList.add('flex');
}
document.querySelector('.left-div').addEventListener('click', function(e) {
  const navItem = e.target.closest('.dashboard-div, .help-faq-div, .messages-and-support-div, .report-a-bug-div');
  if (!navItem) return;
  if (navItem.classList.contains('active-div')) return;
  hideDiv1(); hideDiv2(); hideDiv3(); hideDiv4();
  document.querySelectorAll('.left-div > div').forEach(el => el.classList.remove('active-div'));
  document.querySelectorAll('.top-nav-div > div').forEach(el => el.classList.remove('active-div'));
  let paneSelector;
  if (navItem.classList.contains('dashboard-div')) {
    paneSelector = '.right-div-1';
  }
  else if (navItem.classList.contains('help-faq-div')) {
    paneSelector = '.right-div-2';
  }
  else if (navItem.classList.contains('messages-and-support-div')) {
    paneSelector = '.right-div-3';
  }
  else {
    paneSelector = '.right-div-4';
  }
  document.querySelector(paneSelector).classList.remove('hidden');
  document.querySelector(paneSelector).classList.add('flex');
  navItem.classList.add('active-div');
  togglingDivs1(paneSelector, navItem.classList[0]);
});
document.querySelector('.top-nav-div').addEventListener('click', function(e) {
  const navItem = e.target.closest('.dashboard-div, .help-faq-div, .messages-and-support-div, .report-a-bug-div');
  if (!navItem) return;
  if (navItem.classList.contains('active-div')) return;
  hideDiv1(); hideDiv2(); hideDiv3(); hideDiv4();
  document.querySelectorAll('.top-nav-div > div').forEach(el => el.classList.remove('active-div'));
  document.querySelectorAll('.left-div > div').forEach(el => el.classList.remove('active-div'));
  let paneSelector;
  if (navItem.classList.contains('dashboard-div')) {
    paneSelector = '.right-div-1';
  }
  else if (navItem.classList.contains('help-faq-div')) {
    paneSelector = '.right-div-2';
  }
  else if (navItem.classList.contains('messages-and-support-div')) {
    paneSelector = '.right-div-3';
  }
  else {
    paneSelector = '.right-div-4';
  }
  document.querySelector(paneSelector).classList.remove('hidden');
  document.querySelector(paneSelector).classList.add('flex');
  navItem.classList.add('active-div');
  togglingDivs1(paneSelector, navItem.classList[0]);
});

                                                                                        // Navbar code starts
document.querySelector('.hamburger-div').addEventListener("click", function(){
    document.querySelector('.navbar-side-div').classList.remove('slide-animation-rev');
    document.querySelector('.total-div').classList.remove('blur-rev');
    document.querySelector('.footer').classList.remove('blur-rev');
    document.querySelector('.my-navbar-div').classList.remove('blur-rev');
    document.querySelector('.navbar-side-div').classList.remove('hidden');
    document.querySelector('.navbar-side-div').classList.add('flex');
    document.querySelector('.navbar-side-div').classList.add('slide-animation');
    document.querySelector('.total-div').classList.add('blur');
    document.querySelector('.footer').classList.add('blur');
    document.querySelector('.my-navbar-div').classList.add('blur');
});
document.querySelector('.navbar-fa-div').addEventListener("click", function(){
    document.querySelector('.navbar-side-div').classList.remove('slide-animation');
    document.querySelector('.navbar-side-div').classList.add('slide-animation-rev');
    document.querySelector('.total-div').classList.add('blur-rev');
    document.querySelector('.footer').classList.add('blur-rev');
    document.querySelector('.my-navbar-div').classList.add('blur-rev');
    setTimeout(()=>{
        document.querySelector('.navbar-side-div').classList.remove('flex');
        document.querySelector('.navbar-side-div').classList.add('hidden');
        document.querySelector('.total-div').classList.remove('blur');
        document.querySelector('.footer').classList.remove('blur');
        document.querySelector('.my-navbar-div').classList.remove('blur');
    },600);

});
window.addEventListener("resize", function () {
    if (window.innerWidth >= 768) {
      document.querySelector(".navbar-side-div").classList.remove("flex");
      document.querySelector(".navbar-side-div").classList.add("hidden");
      document.querySelector('.total-div').classList.remove('blur');
      document.querySelector('.footer').classList.remove('blur');
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
document.querySelector('.website-right-div').href = document.querySelector('.website-right-div').textContent;
document.querySelector('.website-right-div').style.color = "rgb(60, 93, 255)";
const year = new Date().getFullYear();
document.querySelector(".footer-bottom p").textContent = `© ${year} Poll Now. All rights reserved.`; 
