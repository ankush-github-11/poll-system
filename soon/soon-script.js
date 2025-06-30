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