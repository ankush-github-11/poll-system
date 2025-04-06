if ( window.history.replaceState ) {
    window.history.replaceState(null, null, window.location.href);
}

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
setTimeout(() => {
    popupScreen();
}, 3000);
document.querySelector('.view-btn').addEventListener('click', function(){
    window.location.href = `${document.querySelector('.link-print-div').textContent}`;
});