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

const text = "Page Not Found!";
const speed = 150;
let index = 0;
const element = document.querySelector(".typewriter");

function type() {
  if (index < text.length) {
    element.textContent += text.charAt(index);
    index++;
    setTimeout(type, speed);
  }
}

type();