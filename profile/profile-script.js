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
const html = `<a href="../edit/edit.php" class="add-a">+ Add</a>`;
document.querySelectorAll('.add-js').forEach(ele =>{
    if(ele.textContent==="--"){
        ele.textContent = '';
        ele.innerHTML = html;
    }
})
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
document.querySelector('.left-div').addEventListener('click', function(e){
    if(e.target.classList[0]=="dashboard-div" && !document.querySelector('.dashboard-div').classList.contains('active-div')){
        hideDiv2();
        hideDiv3();
        hideDiv4();
        document.querySelector('.right-div-1').classList.remove('hidden');
        document.querySelector('.right-div-1').classList.add('flex');
        document.querySelector('.dashboard-div').classList.add('active-div');
    }
    if(e.target.classList[0]=="help-faq-div" && !document.querySelector('.help-faq-div').classList.contains('active-div')){
        hideDiv1();
        hideDiv3();
        hideDiv4();
        document.querySelector('.right-div-2').classList.remove('hidden');
        document.querySelector('.right-div-2').classList.add('flex');
        document.querySelector('.help-faq-div').classList.add('active-div');
    }
    if(e.target.classList[0]=="messages-and-support-div" && !document.querySelector('.messages-and-support-div').classList.contains('active-div')){
        hideDiv1();
        hideDiv2();
        hideDiv4();
        document.querySelector('.right-div-3').classList.remove('hidden');
        document.querySelector('.right-div-3').classList.add('flex');
        document.querySelector('.messages-and-support-div').classList.add('active-div');
    }
    if(e.target.classList[0]=="report-a-bug-div" && !document.querySelector('.report-a-bug-div').classList.contains('active-div')){
        hideDiv1();
        hideDiv2();
        hideDiv3();
        document.querySelector('.right-div-4').classList.remove('hidden');
        document.querySelector('.right-div-4').classList.add('flex');
        document.querySelector('.report-a-bug-div').classList.add('active-div');
    }
});