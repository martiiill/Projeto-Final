/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


window.onload = function () {
    window.setTimeout(fadeout, 4000); //4 seconds
};

function fadeout() {
    document.getElementById('alert').style.opacity = '0';
}