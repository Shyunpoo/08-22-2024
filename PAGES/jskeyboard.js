var SwitchBtnsOff = document.querySelectorAll('.tgl-color')
SwitchBtnsOff.forEach(btnoff => {
    btnoff.addEventListener('click', function ChangeColor(){
        var btnOn = document.querySelector('.tgl-color.active')
        btnOn.classList.remove('active');
        btnoff.classList.add('active');
    });
});

function ChangeCasecolor(loc){
    if (SwitchCap.classList[1] === 'active'){
        BackgroundtoucheS.forEach(Backgroundtouche => {
            if (Backgroundtouche.attributes.d.nodeValue.slice(0,15) === loc){
                console.log('oiuuiouiouoiuiouiouio')
                var btnOn = document.querySelector('.tgl-color.active')
                Backgroundtouche.attributes.fill.nodeValue = (btnOn.attributes.datahex.nodeValue);
                }
        });
    }
};

const Alphamodif = document.querySelector('#Alphamodif')
const AlphalocS = document.querySelector('#G-Alpha').childNodes
var pathNodesofAlpha = Array.from(AlphalocS).filter(function(node) {
    return node.nodeName.toLowerCase() === 'path';
});
Alphamodif.addEventListener('click', function ChangebygroupAlpha(){
    pathNodesofAlpha.forEach(locAlpha => {
        var loc = locAlpha.attributes[4].value.slice(0,15)
        ChangeCasecolor(loc)
    });
})
const Gmodif = document.querySelector('#Gmodif')
const GlocS = document.querySelector('#G-Mods').childNodes
var pathNodesofG = Array.from(GlocS).filter(function(node) {
    return node.nodeName.toLowerCase() === 'path';
});
Gmodif.addEventListener('click', function ChangebygroupG(){
    pathNodesofG.forEach(locG => {
        var loc = locG.attributes[4].value.slice(0,15)
        ChangeCasecolor(loc)
    });
})
const Allmodif = document.querySelector('#Allmodif')
Allmodif.addEventListener('click', function ChangebygroupAll(){
    BackgroundtoucheS.forEach(Backgroundtouche => {
        if (SwitchCap.classList[1] === 'active'){
            var btnOn = document.querySelector('.tgl-color.active')
            Backgroundtouche.attributes.fill.nodeValue = (btnOn.attributes.datahex.nodeValue);
        }
    });
})

const backplatepick = document.querySelector('.backplatepick')

backplatepick.addEventListener('click', function Changebackplate(){
    var radioon = document.querySelector('input[name="radiobackplate"]:checked');
    var Lastcase = document.querySelector(".Case.show");
    Lastcase.classList.remove('show');
    var showcase = document.querySelector('#'+radioon.attributes.d.nodeValue);
    showcase.classList.add('show')
})
var keyBSteps = document.querySelectorAll('.keyB-step')

keyBSteps.forEach(Step => {
    Step.addEventListener('click', function Choosestep(){
        var Chosenstep = document.querySelector('.keyB-step.active')
        Chosenstep.classList.remove('active')
        Step.classList.add('active')
        var text = Step.attributes.steptxt.nodeValue
        var i = 7;
        function writing() {   
            setTimeout(function() {  
                Step.innerHTML = "<p>" + text.slice(0,i) + "</p>"
                i++;
                if (!(Step.classList.value == 'keyB-step active')){
                    Step.innerHTML = "<p>" + Step.attributes.step.nodeValue + "</p>"
                }else{
                if (i < text.length +1) {
                    writing();
                }}
            }, 30)
        }
        writing();
        Chosenstep.innerHTML = "<p>" + Chosenstep.attributes.step.nodeValue + "</p>"
        if (Step.id === 'step1'){
            document.querySelector('.Switch-case').style.display = 'inline'
        }else{
            document.querySelector('.Switch-case').style.display = 'none'
        }
        if (Step.id === 'step2'){
            document.querySelector('#keyboardmain').style.top = '0'
            document.querySelector('.KeyGroup').classList.add('show')
        }else{
            document.querySelector('#keyboardmain').style.top = '-100px'
            document.querySelector('.KeyGroup').classList.remove('show')
        }
        
    })            
})




const SwitchCap = document.getElementById('tgl-key-caps')
const SwitchText = document.getElementById('tgl-key-text')

SwitchText.addEventListener('click', function(e) {ChangeTarget()});
SwitchCap.addEventListener('click', function(e) {ChangeTarget()});

function ChangeTarget(){
    SwitchText.classList.toggle('active');
    SwitchCap.classList.toggle('active');
};

const BackgroundtoucheS = document.querySelectorAll('#W-Key_Base path');

$(document).ready(function(){

    $('g:not(.Web_-_Click_Area) > *').click(function(e) {
        var loc = e.target.attributes[4].value.slice(0,15)
        ChangeCasecolor(loc)
    });
});