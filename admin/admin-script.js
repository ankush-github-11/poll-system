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
const totalUsers = document.querySelector(".total-users-content").textContent.trim().split("<(&*#$*-)>");
document.querySelector(".option-1-val").textContent = totalUsers.length - 1;
for(let i = 0; i < totalUsers.length; i++){
    const arr = totalUsers[i].split("<-/*756-=-=>");
    const html = `
        <div class="total-users-row">
            <div class="div-11">${i + 1}</div>
            <div class="div-12">${arr[0]}</div>
            <div class="div-13">${arr[1]}</div>
            <div class="div-14">${arr[2]}</div>
            <div class="div-15">${arr[3]}</div>
            <div class="div-16">${arr[4]}</div>
            <div class="div-17">${arr[5]}</div>
        </div>
    `;
    document.querySelector('.total-users').insertAdjacentHTML("beforeend", html);
    if(i == totalUsers.length - 2) break;
}