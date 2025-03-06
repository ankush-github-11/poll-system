if(document.querySelector('.wrongEmail').textContent)
  document.querySelector('.email-input').value = document.querySelector('.wrongEmail').textContent.trim();
if(document.querySelector('.wrongPassword').textContent)
  document.querySelector('.password-input').value = document.querySelector('.wrongPassword').textContent.trim();

if(document.querySelector('.invalidCredentials').textContent!='no')
  document.querySelector('.invalidCredentials').classList.remove('hidden');

const popup1 = function () {
  document.querySelector(".popup-1").classList.remove("hidden");
  document.querySelector(".popup-1").classList.add("flex");
  setTimeout(() => {
    document.querySelector(".popup-1").classList.remove("flex");
    document.querySelector(".popup-1").classList.add("hidden");
  }, 2000);
};
const initializeTheme = () => {
  const userPreference = localStorage.getItem('theme'); 
  const systemPreference = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'; 
  const theme = userPreference || systemPreference;
  if (theme === 'dark'){
      document.body.classList.add('darkmode'); 
      document.querySelector('.left-image').classList.toggle('image-filter-light');
      document.querySelector('.left-image').classList.toggle('image-filter-dark');
  }
  else{
      document.body.classList.remove('darkmode');
  }
}
initializeTheme();