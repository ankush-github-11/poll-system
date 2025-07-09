if ( window.history.replaceState ) {
    window.history.replaceState(null, null, window.location.href);
}
const initializeTheme = () => {
    const userPreference = localStorage.getItem('theme'); 
    const systemPreference = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'; 
    const theme = userPreference || systemPreference;
    if (theme === 'dark'){
        document.body.classList.add('darkmode');
    }
    else{
        document.body.classList.remove('darkmode');
    }
}
initializeTheme();
const popupScreen = function () {
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
setTimeout(() => {
    popupScreen();
}, 3000);