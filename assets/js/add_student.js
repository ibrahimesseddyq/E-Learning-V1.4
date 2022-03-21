let model = document.getElementById("model");
let saveBtn = document.getElementById("savestd");
let modelBtn = document.getElementById("newstudent");
let background = document.getElementById("bg_model");
modelBtn.addEventListener("click", e => {
    console.log("ff")
    model.classList.remove("hide_model");
    background.classList.add('modelcont');
});
saveBtn.addEventListener("click", e => {
    model.classList.add("hide_model");
    background.classList.remove("modelcont");
})