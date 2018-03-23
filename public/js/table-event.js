var totalTr = $(".myTable tr:first th");
for (k = 0; k < totalTr.length; k++) {
    myText = totalTr[k].textContent;
    //    console.log(myText);
    var myTr = $(".myTable tbody tr");
    for (l = 0; l < myTr.length; l++) {
        myTrchild = myTr[l].getElementsByTagName("td");
        for (m = 1; m < myTrchild.length; m++) {
            //            console.log(myTrchild[m]);
            if (k == m) {
                var myP = document.createElement("p");
                myP.textContent = myText;
                myP.style.display = "none";
                myTrchild[m].appendChild(myP);
            }
        }
    }
}

var myCheck;
var actualTd;
$(".myTable tbody").on("mousedown", function (e) {
    myCheck = 1;
    actualTd = e.target;
    console.log(actualTd);
    myChildren = actualTd.getElementsByTagName("input")[0];
    if (myChildren == undefined) {
        val2 = actualTd.getElementsByTagName("p")[0].textContent;
        console.log(val2);
        var myParent = $(actualTd).parents()[0];
        var parentChilds = myParent.getElementsByTagName("td");
        var te = myParent.getElementsByTagName("td")[0];
        console.log(te);
        var val = te.textContent;
        console.log(val);
        val = val2 + "_" + val;
        $(actualTd).toggleClass("selectedTD");
        var newInput = document.createElement("input");
        newInput.type = "hidden";
        newInput.value = val;
        newInput.name = actualTd.textContent;
        //            console.log(newInput);
        actualTd.appendChild(newInput);
    } else if (myCheck == 1 && myChildren != undefined) {
        actualTd.removeChild(myChildren);
        $(actualTd).toggleClass("selectedTD");
    }
});
$(".myTable tbody").on("mouseup", function () {
    myCheck = 0;
});
$(".myTable").on("mouseleave", function () {
    myCheck = 0;

});
var myTd = document.getElementsByClassName("myTable")[0].getElementsByTagName("td");
for (i = 0; i < myTd.length; i++) {
    myTd[i].addEventListener("mouseenter", function (e) {
        actualTd = e.target;
        myChildren = actualTd.getElementsByTagName("input")[0];
        //        console.log(myChildren);
        //        if(myChildren==undefined){
        //            console.log("YES");
        //        }
        if (myCheck == 1 && myChildren == undefined) {
            val2 = actualTd.getElementsByTagName("p")[0].textContent;
            console.log(val2);
            var myParent = $(actualTd).parents()[0];
            var parentChilds = myParent.getElementsByTagName("td");
            var te = myParent.getElementsByTagName("td")[0];
            console.log(te);
            var val = te.textContent;
            console.log(val);
            val = val2 + "_" + val;
            $(actualTd).toggleClass("selectedTD");
            var newInput = document.createElement("input");
            newInput.type = "hidden";
            newInput.value = val;
            newInput.name = actualTd.textContent;
            //            console.log(newInput);
            actualTd.appendChild(newInput);
        } else if (myCheck == 1 && myChildren != undefined) {
            actualTd.removeChild(myChildren);
            $(actualTd).toggleClass("selectedTD");
        }
    });
}
