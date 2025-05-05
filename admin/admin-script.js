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
const totalPolls = document.querySelector(".total-polls-content").textContent.trim().split("<(&*#$*-)>");
document.querySelector(".option-2-val").textContent = totalPolls.length - 1;
for(let i = 0; i < totalPolls.length; i++){
    const arr = totalPolls[i].split("<-/*756-=-=>");
    const html = `
        <div class="total-polls-row">
            <div class="div-11">${i + 1}</div>
            <div class="div-12">${arr[0]}</div>
            <div class="div-13">${arr[1]}</div>
            <div class="div-14">${arr[2]}</div>
            <div class="div-15">${arr[3]}</div>
            <div class="div-16">${arr[4]}</div>
            <div class="div-17">${arr[5]}</div>
        </div>
    `;
    document.querySelector('.total-polls').insertAdjacentHTML("beforeend", html);
    if(i == totalPolls.length - 2) break;
}
document.querySelector(".three-option-div").addEventListener("click", function(event) {
    const clickedOption = event.target.closest(".option-1, .option-2, .option-3");

    if (!clickedOption) return;

    if (clickedOption.classList.contains('option-1')) {
        document.querySelector(".total-users").classList.remove("hidden");
        document.querySelector(".option-1-line").classList.add("my-line");
        document.querySelector(".total-polls").classList.add("hidden");
        document.querySelector(".option-2-line").classList.remove("my-line");
    } else if (clickedOption.classList.contains('option-2')) {
        document.querySelector(".total-users").classList.add("hidden");
        document.querySelector(".option-1-line").classList.remove("my-line");
        document.querySelector(".total-polls").classList.remove("hidden");
        document.querySelector(".option-2-line").classList.add("my-line");
    }
});
