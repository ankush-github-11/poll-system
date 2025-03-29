if ( window.history.replaceState ) {
    window.history.replaceState(null, null, window.location.href);
}
document.querySelector('.clipboard-btn').addEventListener('click', function(){
    const text = document.querySelector('.link-print-div').textContent;
    navigator.clipboard.writeText(text);
    popupScreen();
    document.querySelector('.clipboard-btn').classList.remove('fa-regular');
    document.querySelector('.clipboard-btn').classList.remove('fa-clone');
    document.querySelector('.clipboard-btn').classList.add('fa-solid');
    document.querySelector('.clipboard-btn').classList.add('fa-check');
    setTimeout(()=>{
        document.querySelector('.clipboard-btn').classList.remove('fa-solid');
        document.querySelector('.clipboard-btn').classList.remove('fa-check');
        document.querySelector('.clipboard-btn').classList.add('fa-regular');
        document.querySelector('.clipboard-btn').classList.add('fa-clone');
    }, 1800);
});
document.querySelector(".btn").addEventListener("click", async () => {
    const URL = document.querySelector(".link-print-div").textContent.trim();
    if (navigator.share) {
        await navigator.share({
            title: "Check out this poll!",
            text: "I found this poll interesting. Take a look!",
            url: URL
        });
    } 
});
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
document.querySelector('.view-btn').addEventListener('click', function(){
    window.location.href = `${document.querySelector('.link-print-div').textContent}`;
});