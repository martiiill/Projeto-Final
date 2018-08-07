/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function convertDate(d) {
    var p = d.split("/");
    return +(p[2] + p[1] + p[0]);
}

function sortByDate() {
    var tbody = document.querySelector("#conteudo td");
    // get trs as array for ease of use
    var rows = [].slice.call(tbody.querySelectorAll("tr"));

    rows.sort(function (a, b) {
        return convertDate(a.cells[02].innerHTML) - convertDate(b.cells[2].innerHTML);
    });

    rows.forEach(function (v) {
        tbody.appendChild(v); // note that .appendChild() *moves* elements
    });
}

$(document).ready(function () {
    $('.menu a').click(function (e) {

        $('.menu a.active').removeClass('active');

        var $parent = $(this).parent();
        $parent.addClass('active');
        e.preventDefault();
    });
    
    document.querySelector("button").addEventListener("click", sortByDate);
});

